<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class order extends Model
{
    use HasFactory;
    
    
    public function order_items(){

        return $this->hasMany('App\Models\OrderProduct','order_id');
     }
     
        public static function order_push($orderid){

        $orderDetails = order::with('order_items')->join('order_metas','order_metas.order_id','=','orders.id')->join('order_products','order_products.order_id','=','orders.id')->where('orders.id',$orderid)->select('orders.created_at as order_date','orders.*','order_products.*','order_metas.*','order_products.order_id as ORDERID')->first()->toArray();
    
     //dd($orderDetails) ; die;
        
        $orderDetails['order_id'] = $orderDetails['ORDERID'];
        $orderDetails['order_date'] = $orderDetails['order_date'] ; 
        $orderDetails['pickup_location'] = "Primary"; 
        $orderDetails['channel_id'] = "2979946" ; 
        $orderDetails['comment'] = "" ; 
        $orderDetails['billing_customer_name'] = $orderDetails['fname'] ; 
        $orderDetails['billing_last_name'] = ""; 
        $orderDetails['billing_address'] = $orderDetails['billing_address'] ; 
        $orderDetails['billing_address_2'] = $orderDetails['billing_address2'] ; 
        $orderDetails['billing_city'] = $orderDetails['city'] ; 
        $orderDetails['billing_pincode'] = $orderDetails['zipcode'] ; 
        $orderDetails['billing_state'] = $orderDetails['state'] ; 
        $orderDetails['billing_country'] = "India" ; 
        $orderDetails['billing_email'] = $orderDetails['email'] ; 
        $orderDetails['billing_phone'] = $orderDetails['mobile'] ; 
        
        
        $orderDetails['shipping_is_billing'] = true;
        $orderDetails['shipping_customer_name'] = $orderDetails['fname'] ; 
        $orderDetails['shipping_last_name'] = "" ; 
        $orderDetails['shipping_address'] = $orderDetails['billing_address'] ; 
        $orderDetails['shipping_address_2'] = $orderDetails['billing_address2'] ; 
        $orderDetails['shipping_city'] = $orderDetails['city'] ; 
        $orderDetails['shipping_pincode'] = $orderDetails['zipcode'] ; 
        $orderDetails['shipping_country'] = "India"; 
        $orderDetails['shipping_state'] = $orderDetails['state'] ; 
        $orderDetails['shipping_email'] =  $orderDetails['email'] ; 
        $orderDetails['shipping_phone'] = $orderDetails['mobile'] ; 
 
        
        foreach($orderDetails['order_items'] as $key=>$item){
            
            $orderDetails['order_items'][$key]['name'] = $item['pro_name'];
            $orderDetails['order_items'][$key]['sku'] = $item['sku'];
            $orderDetails['order_items'][$key]['units'] = $item['quantity'];
            $orderDetails['order_items'][$key]['selling_price'] = $item['price'];
            $orderDetails['order_items'][$key]['discount'] = "";
            $orderDetails['order_items'][$key]['tax'] = "";
            $orderDetails['order_items'][$key]['hsn'] = "";
 
        }
           $orderDetails['payment_method'] = $orderDetails['payment_type']; 
          $orderDetails['shipping_charges'] = 0; 
        $orderDetails['giftwrap_charges'] = 0;  
         $orderDetails['transaction_charges'] = 0; 
         $orderDetails['total_discount'] = 0; 
        $orderDetails['sub_total'] = $orderDetails['total_amount'] ;  
         $orderDetails['length'] = 1; 
         $orderDetails['breadth'] = 1; 
        $orderDetails['height'] = 1;  
         $orderDetails['weight'] = 1; 
         
       $orderDetails =json_encode($orderDetails);
         
    //   echo "<pre>";
    //   print_r($orderDetails);
    //   die;
      
      //Access Token
      
      $c  = curl_init();
      $url = "https://apiv2.shiprocket.in/v1/external/auth/login";
      curl_setopt($c, CURLOPT_URL, $url);
      curl_setopt($c, CURLOPT_POST, 1);
      curl_setopt($c, CURLOPT_POSTFIELDS, "email=amanmeena730016@gmail.com&password=Forapiadd@1");
      curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
      $server_output = curl_exec($c);
      curl_close($c);
      $server_output = json_decode($server_output,true);
    //       echo "<pre>";
    //   print_r($server_output);
    //   die;
    
    
    //Create Or Update Order
    
    $ourl = "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc";
    $ch = curl_init($ourl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $orderDetails);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer '.$server_output['token'].''));
    $result = curl_exec($ch);
    curl_close($ch);
    
    $result  = json_decode($result,true);
        
    //   print_r($result);
    //   die;
      
      
      if(isset($result['status_code'])&&$result['status_code']==1){
          
          order::where('id',$orderid)->update(['is_pushed'=>1]);
          
          $status = "true";
          $msg = "Order successfully pushed to ShipRocket";
  
      }else{
          
          
          $status = "false";
          $msg = "Order not pushed to ShipRocket. Please contact Admin.";
      }
      
      return array('status'=>$status,'msg'=>$msg); 
        
     }



}