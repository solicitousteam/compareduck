<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_attr;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function categoryslist(Request $requestuest){
$data['categoryslist']=DB::table('categories')->orderBy('categroy','asc')->where('status',1)->get();
$data['taxes'] = Tax::where('status',1)->get();
return view('admin/add-products',$data);
}


public function getsubcat(Request $request){
$cid=$request->post('cid');
$getSubcat=DB::table('subcategories')->where('catagory_id',$cid)->orderBy('sub_categroy','asc')->where('status',"1")->get();

$html='<option value="">Select Subcategroy</option>';
foreach($getSubcat as $list){
$html.='<option value="'.$list->id.'">'.$list->sub_categroy.'</option>';
}
echo $html;
}








public function add_product(Request $request){
    
$pro =NEW product;
$pro->catagory_id=$request->catagory;
$pro->subcategroy_id=$request->subcategory;
$result = $pro->save();


   if($request->hasFile('excel')){
       
       
       $the_file = $request->file('excel');
        
        
        try{
           $spreadsheet = IOFactory::load($the_file->getRealPath());
           $sheet        = $spreadsheet->getActiveSheet();
           $row_limit    = $sheet->getHighestDataRow();
           $column_limit = $sheet->getHighestDataColumn();
           $row_range    = range( 2, $row_limit );
           $column_range = range( 'F', $column_limit );
           $startcount = 2;
           $data = array();
           
           foreach ( $row_range as $row ) {
               $data[] = [
                   'pro_id' =>$pro->id,
                   'color_id' => $sheet->getCell( 'A' . $row )->getValue(),
                   'images' => $sheet->getCell( 'B' . $row )->getValue(),
               ];
               $startcount++;
           }
           
            DB::table('product_attrs')->insert($data);
       } catch (Exception $e) {
           $error_code = $e->errorInfo[1];
           return back()->withErrors('There was a problem uploading the data!');
       }
        
        
    }
    else
    {

// print_r($result);
// die;


if($result){
    

      
$i=0;

            foreach($request->title as $cimg){
                
                
               
   $productAttrArr=[];

             foreach ($request->{'data' . $i} as $file) 
                {
                    
                
                    $productAttrArr['pro_id'] = $pro->id; 
                    $productAttrArr['images'] = $file; 
                              
      
      
                }
             $file=[];
     
                     $productAttrArr['color_Id'] = $cimg;   
                 
   
                    DB::table('product_attrs')->insert($productAttrArr); 
                    
                    

                  

              
             $i++;
        
            }

    }
 

}

return redirect('admin/view-product')->with('success','Product Added Susscssfully');


}

public function proselect(Request $request){
    
    $view = product::Orderby('id','Desc')->paginate(10);
    
    return view('admin/view-product',['proview'=>$view]);
    
    
}

public function updateStatus(Request $request)
{
$user = product::findorfail($request->id);


$user->status = $request->status;
$user->save();

return response()->json(['message' => 'Product status updated successfully.']);
}


public function deleteproduct($id) {
$prodelete = Crypt::decrypt($id);
$image = product::find($prodelete);
if (File::exists(public_path("uploads/product_images/product_single_img/{$image->pro_img}"),public_path("uploads/product_images/product_multi_img/{$image->pro_multi_img}"))) {
File::delete(public_path("uploads/product_images/product_single_img/{$image->pro_img}"),public_path("uploads/product_images/product_multi_img/{$image->pro_multi_img}"));
}else{

echo  'no File exists';
}
$image->delete();

return back()->with('error','Product Successfully Deleted');



}

public function singalproduct($id){
    
 
    
    $pro['list'] = product::join('subcategories', 'products.subcategroy_id', '=', 'subcategories.id')
->join('categories', 'categories.id', '=', 'subcategories.catagory_id')
 ->select('categories.categroy', 'subcategories.sub_categroy','products.*')->find($id);
 
 
 $color['color']  = product_attr::where('pro_id',$id)->select('color_id','images')->get();
      

    
    // print_r($color);
    // die;
      
      
return view('admin/view-singal-product',$pro,$color); 
}





public function updateselectproduct($id){
    
   
    $updateselectproduct = crypt::decrypt($id);

    $data = product::find($updateselectproduct);
     $color['color']  = product_attr::where('pro_id',$updateselectproduct)->get();
     
     
    //         echo "<pre>";
    //   echo  $color['color'];
    //   die;
  
     return view('admin/update_product',['proselect'=>$data],$color);

}

function edit(request $req){
    


$pro = product::find($req->id);

$pro->pro_name=$req->pro_name;
$pro->pro_price=$req->pro_price;
$pro->pro_mrp=$req->pro_mrp;
$pro->pro_url=$req->pro_url;
$pro->size=implode(',', $req->size);
$pro->pro_discount=$req->pro_discount;
$pro->pro_about=$req->pro_about;
$pro->pro_description=$req->editor;
$pro->type=$req->type;
$pro->sku=$req->sku;





if ($req->hasFile('pro_img')) {
$image = $req->file('pro_img');
             if (File::exists(public_path("uploads/product_images/product_single_img/{$pro->pro_img}"))) {
        File::delete(public_path("uploads/product_images/product_single_img/{$pro->pro_img}"));
    }
$Extension = $image->getClientOriginalExtension();
$filename =time().'.'.$Extension;
$destinationPath = public_path('uploads/product_images/product_single_img');
$imagePath = $destinationPath. "/".  $filename;
$image->move($destinationPath, $filename);
$pro->pro_img = $filename;
}

if($req->hasfile('colorimg')){
        $i=0;
            foreach($req->file('colorimg') as $cimg){               
                
               
   $productAttrArr=[];
                foreach($req->file('images'.$i) as $file)
                {
                    
                     $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
                     $path = public_path() . '/uploads/product_images/product_multi_img/';
                     $file->move($path, $name);
                     $Imgdata[] = $name; 
                $productAttrArr['pro_id'] = $req->id; 
                $productAttrArr['images'] = json_encode($Imgdata);
        // $productAttrArr['images'] =$image_name;
      
                }
                $Imgdata=[];
                $cname = uniqid() . '_' . time(). '.' . $cimg->getClientOriginalExtension();
                     $path2 = public_path() . '/uploads/product_images/product_multi_img/';
                     $cimg->move($path2, $cname);
                     $productAttrArr['color_Id'] = $cname;
                    $productAttrArr['colorsize'] = implode(',', $req->get('colorsize'.$i));
                    $productAttrArr['color'] = $req->get('color'.$i);
                    $productAttrArr['sku'] = $req->get('sku'.$i); 
                       DB::table('product_attrs')->insert($productAttrArr);       
              
             $i++;
        
            }
        }
/* if($req->hasfile('pro_multi_img'))
             {
                foreach($req->file('pro_multi_img') as $file)
                {
                                 if (File::exists(public_path("uploads/product_images/product_multi_img/{$pro->pro_multi_img}"))) {
        File::delete(public_path("uploads/product_images/product_multi_img/{$pro->pro_multi_img}"));
    }
                     $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
                     $path = public_path() . '/uploads/product_images/product_multi_img/';
                     $file->move($path, $name);
                     $Imgdata[] = $name;
                }
                $pro->pro_multi_img = json_encode($Imgdata);
             }*/

$pro -> save();

return redirect('admin/view-product')->with('warning','Product Successfully Updated');

}





}
