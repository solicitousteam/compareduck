<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\order;
use App\Models\product_attr;
use App\Models\product;

class FrontendController extends Controller
{
      public function index()
    {
 return view('Frontend/index');
    }
    
    
          public function about()
    {
 return view('Frontend/about');
    }
    
    
          public function investment()
    {
 return view('Frontend/investment');
    }
    
    
          public function contact()
    {
 return view('Frontend/contact');
    }
    
    
          public function login()
    {
 return view('Frontend/login');
    }
    
          public function blog()
    {
 return view('Frontend/blog');
    }
    
    
    public function getsubcatt(Request $request){
$cid=$request->post('cid');
$getSubcat=DB::table('subcategories')->where('catagory_id',$cid)->orderBy('sub_categroy','asc')->where('status',"1")->get();

$html='<option value="">Select Subcategroy</option>';
foreach($getSubcat as $list){
$html.='<option value="'.$list->id.'">'.$list->sub_categroy.'</option>';
}
echo $html;
}


public function datadetails($id){

$data= order::where('id',$id)->first();

$list = DB::table('subcategories')->where('id',$data->payment_type)->first();
$listt= DB::table('subcategories')->where('id',$data->subcategoryy)->first();


$products = product::join('subcategories','subcategories.id','=','products.subcategroy_id')->where('products.subcategroy_id',$list->id)->select('products.id as proid')->first();
$productss = product::join('subcategories','subcategories.id','=','products.subcategroy_id')->where('products.subcategroy_id',$listt->id)->select('products.id as proidd')->first();
// print_r($listt);
// die;

$product_attrss = product_attr::where('pro_id',$products->proid)->get();
$product_attrs = product_attr::where('pro_id',$productss->proidd)->get();



 return view('Frontend/data-details',compact('data','list','listt','product_attrs','product_attrss'));
    
}


public function getSuggestions(Request $request)
{
    $input = $request->input('query');
    
    $suggestions = Order::where('total_amount', 'like', '%' . $input . '%')
                        ->select('id', 'total_amount') // Select both ID and total_amount
                        ->get()
                        ->toArray();
    
    return response()->json($suggestions);
}





   public function selectSearch(Request $request)
    {
    	$movies = [];

        if($request->has('q')){
            $search = $request->q;
            $movies =DB::table('subcategories')->select("id", "sub_categroy")
            		->where('sub_categroy', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($movies);
    }
    
    
    
    
   public function selectresult($id)
    {
        
    $sub = DB::table('subcategories')->where('id',$id)->first();        
     
     $db = DB::table('products')->where('subcategroy_id',$id)->first();
     
     $db = DB::table('product_attrs')->where('pro_id',$db->id)->get();
     ?>
     <tr>
         <td>
            <b><?php echo  $sub->sub_categroy ?></b>
         </td>
     </tr>
     <?php
    foreach($db as $db)
    {
        ?>
        <tr>
        <td>
   <?php   print_r($db->images); ?>
     </td>
     </tr>
     
     <?php
    }
        
    }
    
    
    public function enquiry(Request $request){
       

       $details = [
           'name' =>$request->name,
           'email' =>$request->email,
           'mobile' =>$request->mobile,
           'sub' =>$request->sub,
           'msg' =>$request->msg
           
           ];
       
       
         \Mail::to('info@compareduck.com')->send(new \App\Mail\NotifyMail($details));
       
       return back()->with('success','Thanks for Enquiry!');
       
    }
    
    
    
    







}
