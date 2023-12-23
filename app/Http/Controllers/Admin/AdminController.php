<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use App\Models\websetting;
use App\Models\category;
use App\Models\subcategory;
use App\Models\Banner;
use App\Models\order;
use App\Models\OrderMeta;
use App\Models\OrderProduct;
use App\Models\swithcbanner;
use App\Models\SliderBanner;
use Illuminate\Support\Facades\DB;
use Session;
// use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\product;


class AdminController extends Controller
{
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.index');
         }else{
             return redirect()->route('admin.login')->with('error','Invalid E-mail Or Password');
         }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    
    
    /****************************************************************************************Admin Auth End*************************************************************************************************************/

/****************************************************************************************Web Setting Start*************************************************************************************************************/


function websetting(request $req){

    $req->validate([
        'companynames'=>'required',
        'email'=>'required',
        'mobile'=>'required',
        'logo'=>'required | dimensions:max_width=120,max_height=33'
       ]);

  
$websetting = NEW websetting;
$websetting -> companynames=$req->companynames;
$websetting -> email=$req->email;
$websetting -> mobile=$req->mobile;
$websetting -> tagline=$req->tagline;
$websetting -> address=$req->address;
$websetting -> abouttitle=$req->abouttitle;
$websetting -> description=$req->editor;
$websetting -> facebook=$req->facebook;
$websetting -> instagram=$req->instagram;
$websetting -> twitter=$req->twitter;
$websetting -> linkdin=$req->linkdin;
$websetting -> youtube=$req->youtube;
$websetting -> Pinterest=$req->Pinterest;
$websetting -> map=$req->map;

if ($req->hasFile('logo')) {
    $logo = $req->file('logo');
    $Extension = $logo->getClientOriginalExtension();
    $logoname =time().'logo.'.$Extension;
    $destinationPath = public_path('uploads/system_setting');
    $logoPath = $destinationPath. "/".  $logoname;
    $logo->move($destinationPath, $logoname);
    $websetting->logo = $logoname;
  }

  if ($req->hasFile('favicon')) {
    $favicon = $req->file('favicon');
    $Extension = $favicon->getClientOriginalExtension();
    $faviconname =time().'favicon.'.$Extension;
    $destinationPath = public_path('uploads/system_setting');
    $faviconPath = $destinationPath. "/".  $faviconname;
    $favicon->move($destinationPath, $faviconname);
    $websetting->favicon = $faviconname;
  }

  if ($req->hasFile('footerlogo')) {
    $footerlogo = $req->file('footerlogo');
    $Extension = $footerlogo->getClientOriginalExtension();
    $footerlogoname =time().'footerlogo.'.$Extension;
    $destinationPath = public_path('uploads/system_setting');
    $footerlogoPath = $destinationPath. "/".  $footerlogoname;
    $footerlogo->move($destinationPath, $footerlogoname);
    $websetting->footerlogo = $footerlogoname;
  }

 if($req->hasfile('Aboutimg'))
             {
                foreach($req->file('Aboutimg') as $file)
                {
                     $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
                     $path = public_path() . '/uploads/system_setting/';
                     $file->move($path, $name);
                     $Imgdata[] = $name;
                }
                $websetting->Aboutimg = json_encode($Imgdata);
             }

$websetting -> save();

return back()->with('success','Successfully Submited');

}


function viewwebsetting(){


    $data = websetting::All();

   return view('admin/viewwebsetting',['viewwebsettings'=>$data]);
}

function updatedata($id){
    
    $catupdate = crypt::decrypt($id);

    $data = websetting::find($catupdate);
  
     return view('admin/updatewebsetting',['upadates'=>$data]);

}



function updatewebsetting(Request $req){
    
    
    //     $req->validate([
    //     'logo'=>'required '
    //   ]
   // [
    //       | dimensions:max_width=120,max_height=33
    //       'logo.dimensions'=>'The Logo was resized to fit within the maximum allowed dimensions of 33x120 pixels'
           
    //       ]
       
      
       
    //   );

    $websetting = websetting::find($req->id);
    

 $websetting -> companynames=$req->companynames;

$websetting -> email=$req->email;
$websetting -> mobile=$req->mobile;
$websetting -> tagline=$req->tagline;
$websetting -> address=$req->address;
$websetting -> abouttitle=$req->abouttitle;
$websetting -> description=$req->editor;
$websetting -> facebook=$req->facebook;
$websetting -> instagram=$req->instagram;
$websetting -> twitter=$req->twitter;
$websetting -> linkdin=$req->linkdin;
$websetting -> youtube=$req->youtube;
$websetting -> Pinterest=$req->Pinterest;
$websetting -> map=$req->map;


if ($req->hasFile('logo')) {
    $logo = $req->file('logo');
    $Extension = $logo->getClientOriginalExtension();
    $logoname =time().'logo.'.$Extension;
    $destinationPath = public_path('uploads/system_setting');
    $logoPath = $destinationPath. "/".  $logoname;
    $logo->move($destinationPath, $logoname);
    $websetting->logo = $logoname;
  }else{
    $websetting -> logo=$req->logohidden;
  }

  if ($req->hasFile('favicon')) {
    $favicon = $req->file('favicon');
    $Extension = $favicon->getClientOriginalExtension();
    $faviconname =time().'favicon.'.$Extension;
    $destinationPath = public_path('uploads/system_setting');
    $faviconPath = $destinationPath. "/".  $faviconname;
    $favicon->move($destinationPath, $faviconname);
    $websetting->favicon = $faviconname;
  }else{
    $websetting -> favicon=$req->faviconhidden;
  }


  if ($req->hasFile('footerlogo')) {
    $footerlogo = $req->file('footerlogo');
    $Extension = $footerlogo->getClientOriginalExtension();
    $footerlogoname =time().'footerlogo.'.$Extension;
    $destinationPath = public_path('uploads/system_setting');
    $footerlogoPath = $destinationPath. "/".  $footerlogoname;
    $footerlogo->move($destinationPath, $footerlogoname);
    $websetting->footerlogo = $footerlogoname;
  }else{
    $websetting -> footerlogo=$req->footerlogohidden;
  }

 if($req->hasfile('Aboutimg'))
             {
                foreach($req->file('Aboutimg') as $file)
                {
                     $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
                     $path = public_path() . '/uploads/system_setting/';
                     $file->move($path, $name);
                     $Imgdata[] = $name;
                }
                $websetting->Aboutimg = json_encode($Imgdata);
             }

$websetting -> save();

return redirect('admin/viewwebsetting')->with('success','Successfully Updated');

}




/**************************************************************************************WEB SETTING END***************************************************************************************************************/


/****************************************************************************************Categroy Start*************************************************************************************************************/


function addcategroy(request $req){

    $req->validate([
        'categroy'=>'required | unique:categories,categroy',
       ]);
       
       $categroy = NEW category;
$categroy -> categroy=$req->categroy;

  
  $categroy -> save();

return redirect('admin/viewcategroy')->with('success','Category Successfully Submited');

}

function viewcategroy(){


    $data = category::paginate(10);

   return view('admin/viewcategory',['viewcategroy'=>$data]);
}


function updatecatagroydata($id){
    
    $catupdate = Crypt::decrypt($id);
$datas = category::find($catupdate);


     return view('admin/updatecategroy',['upadatecate'=>$datas]);

}

function updatecategroy(request $req){
    


 $categroy = category::find($req->id);

$categroy->categroy=$req->categroy;

  $categroy -> save();

return redirect('admin/viewcategroy')->with('warning','Category Successfully Updated');

}




public function deletecategroy($id) {
    $catupdate = Crypt::decrypt($id);
    $image = category::find($catupdate);
    $destinationPath = public_path("uploads/category/{$image->image	}");
    if (File::exists($destinationPath)) {
        File::delete($destinationPath);
    }else{
        
      echo  'no File exists';
    }
    $image->delete();

      return back()->with('error','Category Successfully Deleted');



}

public function updateStatus(Request $request)
{
    $user = category::findorfail($request->id);
        

    $user->status = $request->status;
    $user->save();

    return response()->json(['message' => 'category status updated successfully.']);
}


/**************************************************************************************Categroy END***************************************************************************************************************/


/****************************************************************************************Sub Categroy Start*************************************************************************************************************/

function add_subcategroy(request $req){

    $req->validate([
        'subcategroy'=>'required',
         'catagory_id'=>'required'
       ]);
       
       $subcategroy = NEW subcategory;
$subcategroy -> sub_categroy=$req->subcategroy;
$subcategroy -> catagory_id=$req->catagory_id;

  
  $subcategroy -> save();

return redirect('admin/view-subcategory')->with('success','Sub-Category Successfully Submited');

}


function view_subcategroy(){


    // $data = subcategory::paginate(10);
    
 $data = DB::table('categories')->join('subcategories','categories.id','=','subcategories.catagory_id')
 ->where('categories.status',"1")
->paginate(10);


   return view('admin/view-subcategory',['viewsubcategroys'=>$data]);
  
}


function selectcategory(){
$users = DB::select('select * from categories where status = :status', ['status' => 1]);

return view('admin/add-subcategory',['selectcategorys'=>$users]);
}


function update_subcatagroydata($id){
    $prodID = Crypt::decrypt($id);
    $datas = subcategory::find($prodID);

     return view('admin/update-subcategory',['upadatesubcate'=>$datas]);

}


function update_subcategroy(request $req){

 $subcategroy = subcategory::find($req->id);
$subcategroy -> sub_categroy=$req->subcategroy;

  $subcategroy -> save();

return redirect('admin/view-subcategory')->with('success','Sub-Category Successfully Updated');

}




function deletesubcategroy($id){
    $prodID = crypt::decrypt($id);
    $data= subcategory::find($prodID);
        $destinationPath = public_path("uploads/subcategory/{$data->image}");
    if (File::exists($destinationPath)) {
        File::delete($destinationPath);
    }else{
        
      echo  'no File exists';
    }
    $data->delete();
    
   return back()->with('error','Sub Category Successfully Deleted');;



}



public function updatecatStatus(Request $request)
{
    $user = subcategory::findorfail($request->id);
        

    $user->status = $request->status;
    $user->save();

    return response()->json(['message' => 'subcategory status updated successfully.']);
}




/***********************************************************************************Banner Start****************************************************************************/

public function Banner(){
    
    return view('admin/Hero_banner/banner');
}

public function add_banner(Request $req){
    
    $req->validate([
        
        'image1'=>'required | dimensions:max_width=720,max_height=720',
        'image2'=>'required | dimensions:max_width=720,max_height=720',
        'image3'=>'required | dimensions:max_width=720,max_height=720',
        
        ],[
            
           'image1.dimensions'=>'The Image1 was resized to fit within the maximum allowed dimensions of 720x720 pixels',
           'image2.dimensions'=>'The Image2 was resized to fit within the maximum allowed dimensions of 720x720 pixels',
           'image3.dimensions'=>'The Image3 was resized to fit within the maximum allowed dimensions of 720x720 pixels'
            ]);
            
            
            $bann = New Banner;
            
            if ($req->hasFile('image1')) {
    $image1 = $req->file('image1');
    $Extension = $image1->getClientOriginalExtension();
    $image1name =time().'image1.'.$Extension;
    $destinationPath = public_path('uploads/Banners');
    $image1Path = $destinationPath. "/".  $image1name;
    $image1->move($destinationPath, $image1name);
    $bann->image1 = $image1name;
  }
  
         if ($req->hasFile('image2')) {
    $image2 = $req->file('image2');
    $Extension = $image1->getClientOriginalExtension();
    $image2name =time().'image2.'.$Extension;
    $destinationPath = public_path('uploads/Banners');
    $image2Path = $destinationPath. "/".  $image2name;
    $image2->move($destinationPath, $image2name);
    $bann->image2 = $image2name;
  }
  
  
          if ($req->hasFile('image3')) {
    $image3 = $req->file('image3');
    $Extension = $image3->getClientOriginalExtension();
    $image3name =time().'image3.'.$Extension;
    $destinationPath = public_path('uploads/Banners');
    $image3Path = $destinationPath. "/".  $image3name;
    $image3->move($destinationPath, $image3name);
    $bann->image3 = $image3name;
  }
  
  $bann->save();
            
   return redirect('admin/view_banner')->with('success','Banner Successfully Added'); 
    
    
}


public function view_banner(){
    
    $data['banner'] = Banner::paginate(10);
    
    return view('admin/Hero_banner/index',$data);
}


public function banner_delete($id){


$idd = Crypt::decrypt($id);
$data = Banner::find($idd);

    if (File::exists(public_path("uploads/Banners/{$data->image1}"),public_path("uploads/Banners/{$data->image2}"),public_path("uploads/Banners/{$data->image3}"))) {
        File::delete(public_path("uploads/Banners/{$data->image1}"),public_path("uploads/Banners/{$data->image2}"),public_path("uploads/Banners/{$data->image3}"));
    }else{
        
      echo  'no File exists';
    }

$data->delete();

   return back()->with('error','Banner Successfully Deleted'); 


}


public function banner_update($id){
    
        $idd = Crypt::decrypt($id);

    
    $data['banner'] = Banner::find($idd);
    
    return view('admin/Hero_banner/banner-update',$data);
}




public function edit_banner(Request $req){
    
            $bann = Banner::find($req->id);

            
            if ($req->hasFile('image1')) {
    $image1 = $req->file('image1');
              if (File::exists(public_path("uploads/Banners/{$bann->image1}"))) {
        File::delete(public_path("uploads/Banners/{$bann->image1}"));
    }
    $Extension = $image1->getClientOriginalExtension();
    $image1name =time().'image1.'.$Extension;
    $destinationPath = public_path('uploads/Banners');
    $image1Path = $destinationPath. "/".  $image1name;
    $image1->move($destinationPath, $image1name);
    $bann->image1 = $image1name;
  }else{
      $bann->image1=$req->hiddenimage1;
  }
  
         if ($req->hasFile('image2')) {
    $image2 = $req->file('image2');
               if (File::exists(public_path("uploads/Banners/{$bann->image2}"))) {
        File::delete(public_path("uploads/Banners/{$bann->image2}"));
    }
    $Extension = $image2->getClientOriginalExtension();
    $image2name =time().'image2.'.$Extension;
    $destinationPath = public_path('uploads/Banners');
    $image2Path = $destinationPath. "/".  $image2name;
    $image2->move($destinationPath, $image2name);
    $bann->image2 = $image2name;
  }else{
      $bann->image2=$req->hiddenimage2;
  }
  
  
          if ($req->hasFile('image3')) {
    $image3 = $req->file('image3');
               if (File::exists(public_path("uploads/Banners/{$bann->image3}"))) {
        File::delete(public_path("uploads/Banners/{$bann->image3}"));
    }
    $Extension = $image3->getClientOriginalExtension();
    $image3name =time().'image3.'.$Extension;
    $destinationPath = public_path('uploads/Banners');
    $image3Path = $destinationPath. "/".  $image3name;
    $image3->move($destinationPath, $image3name);
    $bann->image3 = $image3name;
  }else{
      $bann->image3=$req->hiddenimage3;
  }
  
  $bann->save();
            
   return redirect('admin/view_banner')->with('warning','Banner Successfully Updated'); 
    
    
}


public function updateBannerStatus(Request $request)
{
    $user = Banner::findorfail($request->id);
        

    $user->status = $request->status;
    $user->save();

    return response()->json(['message' => 'Banner status updated successfully.']);
}


/******************************Switch Banner**********************************/


public function swithcbanner(){
    
    $data['switch'] = swithcbanner::first();
    
    return view('admin/Hero_banner/switch/switchbanner',$data);
}


public function updateBannerswitchStatus(Request $request)
{
    $user = swithcbanner::findorfail($request->id);
        

    $user->status = $request->status;
    $user->save();

    return response()->json(['message' => 'Banner successfully switch.']);
}

/******************************Switch Banner End**********************************/



/******************************Slider Banner**********************************/

function SliderBanner(){
    
    return view('admin/Hero_banner/SliderBanner/add');
    
}


function add_sliderBanner(Request $req){
    
    $req->validate([
        
        'title'=>'required',
         'subtitle'=>'required',
          'image'=>'required | dimensions:max_width=676,max_height=406',

        ],[
            
             'image.dimensions'=>'The Image was resized to fit within the maximum allowed dimensions of 676x406 pixels',
            ]);
        
        $slider = New SliderBanner;
        $slider->title = $req->title;
        $slider->subtitle = $req->subtitle;
    
            if ($req->hasFile('image')) {
    $image = $req->file('image');
    $Extension =$image->getClientOriginalExtension();
    $imagename =time().'image.'.$Extension;
    $destinationPath = public_path('uploads/SliderImage');
    $imagePath = $destinationPath. "/".  $imagename;
    $image->move($destinationPath, $imagename);
    $slider->image = $imagename;
  }
  
  
  $slider->save();
  return redirect('admin/View-SliderBanner')->with('success','Slider Successfully Added');
}


public function view_SliderBanner(){
    
    $data['banner'] = SliderBanner::paginate(10);
    
    return view('admin/Hero_banner/SliderBanner/index',$data);
}



public function Sliderbanner_delete($id){


$idd = Crypt::decrypt($id);
$data = SliderBanner::find($idd);

    if (File::exists(public_path("uploads/SliderImage/{$data->image}"))) {
        File::delete(public_path("uploads/SliderImage/{$data->image}"));
    }else{
        
      echo  'no File exists';
    }

$data->delete();

   return back()->with('error','SliderBanner Successfully Deleted'); 


}


function Sliderbanner_update($id){
    
    
    $idd = Crypt::decrypt($id);
    
    $data['banner'] = SliderBanner::find($idd);
    
    return view('admin/Hero_banner/SliderBanner/banner-update',$data);
    
}



function edit_Sliderbanner(Request $req){
    
    
            $slider = SliderBanner::find($req->id);
        $slider->title = $req->title;
        $slider->subtitle = $req->subtitle;
    
            if ($req->hasFile('image')) {
    $image = $req->file('image');
    $Extension =$image->getClientOriginalExtension();
    $imagename =time().'image.'.$Extension;
    $destinationPath = public_path('uploads/SliderImage');
    $imagePath = $destinationPath. "/".  $imagename;
    $image->move($destinationPath, $imagename);
    $slider->image = $imagename;
  }else{
      
    $slider->image = $req->imagehidden;  
      
  }
  
  
  $slider->save();
  return redirect('admin/View-SliderBanner')->with('success','Slider Successfully Updated');
    
}


/******************************Slider Banner End**********************************/






function tabledata(){
    
    return view('admin/add-tabledata');
}











function uploader(Request $request){
    
    
   return view('admin/upload');   
    
}



function uploader2(Request $request){
    
    
       if($request->hasFile('excel')){
       
       
       $the_file = $request->file('excel');
        
        
        try{
           $spreadsheet = IOFactory::load($the_file->getRealPath());
           $sheet        = $spreadsheet->getActiveSheet();
           $row_limit    = $sheet->getHighestDataRow();
           $column_limit = $sheet->getHighestDataColumn();
           $row_range    = range( 2, $row_limit );
           $column_range = range( 'I', $column_limit );
           $startcount = 2;
           $data = array();
           
           foreach ( $row_range as $row ) {
               
               
             $cat = $sheet->getCell( 'A' . $row )->getValue(); 
             $sub1 = $sheet->getCell( 'B' . $row )->getValue();
             $sub2 = $sheet->getCell( 'C' . $row )->getValue();
             $title = $sheet->getCell( 'H' . $row )->getValue();
             $image = $sheet->getCell( 'I' . $row )->getValue();
             
             
             $check = DB::table('orders')->where(['coupon' => $cat,'payment_type' => $sub1,'subcategoryy' => $sub2])->first();
             
             if(empty($check->coupon))
             {
             
            DB::table('orders')->insert([
                  'payment_type' => $sub1,
                  'subcategoryy' => $sub2,
                  'coupon' => $cat,
                  'total_amount' => $title,
                  'image'  => $image
                ]); 
   
             }
             
             
             
              $check1 = DB::table('products')->where(['catagory_id' => $cat,'subcategroy_id' => $sub1])->first();
              
             
              
              if(empty($check1->catagory_id)){
                  
            $pro =NEW product;
            $pro->catagory_id=$cat;
            $pro->subcategroy_id=$sub1;
            $result = $pro->save();
            
            
              
            
             
                  
                  
              }
              
              $data[] = [
                  'pro_id' =>$pro->id,
                  'color_id' => $sheet->getCell( 'D' . $row )->getValue(),
                  'images' => $sheet->getCell( 'E' . $row )->getValue(),
              ];
              
            
              
              
               $check2 = DB::table('products')->where(['catagory_id' => $cat,'subcategroy_id' => $sub2])->first();
              
            if(empty($check2->catagory_id)){
                  
             $pro2 =NEW product;
            $pro2->catagory_id=$cat;
            $pro2->subcategroy_id=$sub2;
            $result2 = $pro2->save();
            
               
                  
                  
              }
              
               $data2[] = [
                  'pro_id' =>$pro2->id,
                  'color_id' => $sheet->getCell( 'F' . $row )->getValue(),
                  'images' => $sheet->getCell( 'G' . $row )->getValue(),
              ];

            $startcount++;
               
               
            
             
           }
           
           
           
        
           
           
            DB::table('product_attrs')->insert($data);
            DB::table('product_attrs')->insert($data2);
       } catch (Exception $e) {
           $error_code = $e->errorInfo[1];
           return back()->withErrors('There was a problem uploading the data!');
       }
        
        
    }
    
    
    
 return redirect()->back();  
    
    
 
    
}




function addtabledata(request $req){
    
    
    if($req->hasFile('excel')){
        
        
        die();
        
        
    }
    else
    {
    
    
    $data = new order;
    $data->total_amount = $req->title;
        $data->payment_type = $req->subcategory;
$data->subcategoryy = $req->subcategoryy;
    $data->coupon = $req->catagory;
    //   Excel::import(new YourImportClass(), request()->file('excel_file'));
    
    
if ($req->hasFile('image')) {
    $logo = $req->file('image');
    $Extension = $logo->getClientOriginalExtension();
    $logoname =time().'image.'.$Extension;
    $destinationPath = public_path('uploads/datatable');
    $logoPath = $destinationPath. "/".  $logoname;
    $logo->move($destinationPath, $logoname);
    $data->image = $logoname;
  }
   
       $data->save();
    }

    return redirect('admin/viewDataTable')->with('success','Data Successfully Added');
    
}


public function viewDataTable(){
    
    
    $data['data'] = order::select('orders.*', 'sub1.sub_categroy as sub_categroy1', 'sub2.sub_categroy as sub_categroy2', 'categories.categroy as categroy')
    ->join('categories', 'categories.id', '=', 'orders.coupon')
    ->join('subcategories as sub1', 'sub1.id', '=', 'orders.payment_type')
    ->join('subcategories as sub2', 'sub2.id', '=', 'orders.subcategoryy')
    ->OrderBy('orders.id','DESC')->paginate(10);
    
    
    return view('admin/view-tableData',$data);
    
    
}

public function editDataTable(Request $request,$id){
    
        
    $data['data'] = order::find($id);
    
    
    return view('admin/update-DataTable',$data);
    
}


public function updateDataTable(Request $request){


$data = order::find($request->id);
$data->total_amount = $request->title;
// $data->payment_type = $req->subcategory;
// $data->subcategoryy = $req->subcategoryy;
// $data->coupon = $req->catagory;

    
if ($request->hasFile('image')) {
    $logo = $request->file('image');
    $Extension = $logo->getClientOriginalExtension();
    $logoname =time().'image.'.$Extension;
    $destinationPath = public_path('uploads/datatable');
    $logoPath = $destinationPath. "/".  $logoname;
    $logo->move($destinationPath, $logoname);
    $data->image = $logoname;
  }else{
          $data->image = $request->hiddenimage;
      
  }
   
       $data->update();
       
        return redirect('admin/viewDataTable')->with('success','Data Successfully Update');

}



public function deleteDataTable($id){

$data = order::find($id);

    if (File::exists(public_path("uploads/datatable/{$data->image}"))) {
        File::delete(public_path("uploads/datatable/{$data->image}"));
    }else{
        
      echo  'no File exists';
    }

$data->delete();

   return back()->with('error','Data Successfully Deleted'); 


}




}


