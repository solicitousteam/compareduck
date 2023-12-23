<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class APIController extends Controller
{
   public function orderpush($id){
        
        $getproductdetails = order::order_push($id);
        return response()->json(['status'=>$getproductdetails['status'],'msg'=>$getproductdetails['msg']]);
        
    }
}
