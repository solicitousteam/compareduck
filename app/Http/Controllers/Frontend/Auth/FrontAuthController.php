<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\customer;
use Crypt;
use Socialite;
use Auth;
use Exception;
class FrontAuthController extends Controller
{
 
           public function login_register(Request $req)
    {
        
        $user_id = $req->session()->get('FRONT_USER_ID');
        
        if(!empty($user_id)){
            
              return redirect('my-account');
            
        }else{
            
             return view('login-register');
        }
        

    }
    
    
      public function registration_process(Request $request)
    {
        
               $valid=Validator::make($request->all(),[
            "username"=>'required',
            "email"=>'required|email|unique:customers,email',
            "password"=>'required',
            "mobile"=>'required|numeric|digits:10|unique:customers',
            "cpassword"=>'required|same:password',
            "tc"=>'required',

       ],[
           
           
           "cpassword.same"=>'The Confirm Password and password must match.',
           "cpassword.required"=>'The Confirm Password field is required..',
           "tc.required"=>'Please indicate that you accept the Terms and Conditions.'
           ]);

       if(!$valid->passes()){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
       }else{
            $arr=[
                "username"=>$request->username,
                "email"=>$request->email,
                "password"=>Crypt::encrypt($request->password),
                "mobile"=>$request->mobile,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('customers')->insert($arr);
            if($query){
                
                // $request->session('Login')->flash('success', 'Registration successfully');

                return response()->json(['status'=>'success','msg'=>"Registration successfully Please Login..."]);
            }

       }
        
    }
    
    
    
       public function login_process(Request $request)
    {
        
     

        $result=DB::table('customers')  
            ->where(['email'=>$request->str_login_email])
            ->get(); 
        
        if(isset($result[0])){
            $db_pwd=Crypt::decrypt($result[0]->password);
            $sts = $result[0]->status;
            if(!($sts=='0')){
                
                           if($db_pwd==$request->str_login_password){
                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$result[0]->id);
                $request->session()->put('FRONT_USER_NAME',$result[0]->username);
                $status="success";
                $msg="";
            }else{
                $status="error";
                $msg="Please enter valid password";
            } 
                
            }else{
                
                 $status="error";
                $msg="Your account has been deactivated Please contact customer service!"; 
            }

        }else{
            $status="error";
            $msg="Please enter valid email id";
        }
       return response()->json(['status'=>$status,'msg'=>$msg]); 
       //$request->password
    }
    
    
    
        public function updatePassword(Request $request){
        $user_id = $request->session()->get('FRONT_USER_ID');
        if(!empty($user_id)){
            
            $valid=Validator::make($request->all(),[
                
                      'old_password' => 'required',
                'new_password' => 'required',
                'confirm_pass' => 'required|same:new_password',
                
                ],[
                    'old_password.required'=>'The Current password field is required.',
                    'new_password.required'=>'The New password field is required.',
                    'confirm_pass.required'=>'The Confirm password field is required.',
                    "confirm_pass.same"=>'The Confirm Password and password must match.',
                    ]);
                
                      if(!$valid->passes()){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
       }else{
           
                       $data =  customer::find($user_id);
            
            $old_password = Crypt::decrypt($data->password);
            
            if($request->old_password==$old_password){
                $data->password =  Crypt::encrypt($request->new_password);
                $data->save(); 
                 $status="error";
                $msg="Password update succesfully...";
            }
            else{
                 $status="error";
                $msg="Current Password is invalid...";
            }
                  return response()->json(['status'=>$status,'msg'=>$msg]); 

       }
            

        }else{
             return redirect('Login');
        }
    }
    
    
    
      public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    
    public function handleCallback(Request $request)
    {
        try {
     
            $user = Socialite::driver('google')->user();

            $finduser = customer::where('social_id', $user->id)->first();
            
            //     echo "<pre>";
            // print_r($finduser);
            // die;
      
 
            if(!empty($finduser && $finduser->status == '0')){
      
               return redirect('login-register')->with('error','Your account has been deactivated Please contact customer service!.');
      
            }elseif(!empty($finduser && $finduser->status == '1')){
                
                  $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$finduser->id);
                $request->session()->put('FRONT_USER_NAME',$finduser->username);
                Auth::login($finduser);
     
                return redirect('/');
                
                
            }
            else{
                $newUser = customer::create([
                    'username' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'image'=> $user->avatar,
                    'social_type'=> 'google',
                    'password' => encrypt('mydatapassword123')
                ]);
                
                
                // echo "<pre>";
                // print_r($newUser->username);
                // die;
                
                
                 $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$newUser->id);
                $request->session()->put('FRONT_USER_NAME',$newUser->username);
     
               Auth::login($newUser);
                
                
                
      
                return redirect('/');
            }
     
        } catch (Exception $e) {
            return redirect('login-register')->with('error','The email has already been taken.');
             //dd($e->getMessage());
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
