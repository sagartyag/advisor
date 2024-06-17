<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investment;
use App\Models\Income;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Log;
use Redirect;
use Hash;
use Helper;
class Invest extends Controller
{

  private $downline = "";

    public function index()
    {
        $user=Auth::user();
        $invest_check=Investment::where('user_id',$user->id)->where('status','!=','Decline')->orderBy('id','desc')->limit(1)->first();

        $this->data['last_package'] = ($invest_check)?$invest_check->amount:0;
        $this->data['user'] = $user;  // Pass the logged-in user to the view
        $this->data['page'] = 'user.invest.Deposit';
        return $this->dashboard_layout();
    }  
    
    public function deposit()
    {
        $user = Auth::user();
        $invest_check = Investment::where('user_id', $user->id)->where('status', '!=', 'Decline')->orderBy('id', 'desc')->limit(1)->first();
    
        $this->data['last_package'] = ($invest_check) ? $invest_check->amount : 0;
        $this->data['user'] = $user;  // Pass the logged-in user to the view
        $this->data['page'] = 'user.invest.Deposit2';
        return $this->dashboard_layout();
    }
    



public function cancel_payment($id)

{
    
         Investment::where('orderId',$id)->update(['status' => 'Decline']);
     
        $notify[] = ['success','Deposit canceled successfully'];
        return redirect()->route('user.invest')->withNotify($notify);
    
}

    public function confirmDeposit(Request $request)
    {
   try{
     $validation =  Validator::make($request->all(), [
        'Sum' => 'required|numeric|min:30',
        'PSys' => 'required',
     ]);


    //  dd($request->all());
    if($validation->fails()) {
        Log::info($validation->getMessageBag()->first());

        return redirect()->route('user.invest')->withErrors($validation->getMessageBag()->first())->withInput();
    }




    $user=Auth::user();
    $invest_check=Investment::where('user_id',$user->id)->where('status','Pending')->first(); 

    if ($invest_check) 
    {
      return redirect()->route('user.invest')->withErrors(array('your deposit already pending please cancel it if you dont want to pay this transaction'));
    }
   

    $min_amount = $request->minimum_amount;
    $max_amount = $request->maximum_amount;
    $plan = $request->plan;
    $paymentMode = $request->PSys;
    $amount = $request->Sum;

   
       
    if ($amount<$min_amount || $amount>$max_amount) 
    {
      return Redirect::back()->withErrors(array('minimum deposit is $ '.$min_amount.' and maximum is $ '.$max_amount));
    }
    $invest_check=Investment::where('user_id',$user->id)->where('status','!=','Decline')->orderBy('id','desc')->limit(1)->first();
    $last_package=($invest_check)?$invest_check->amount:0;
        $plan ='BEGINNER';
      if ($last_package>$amount)
      {
        return Redirect::back()->withErrors(array('Please choose amount above last package ₹ '.$amount));
      }
  
    $amountTotal= $request->Sum;
    $invoice = substr(str_shuffle("0123456789"), 0, 7);
    $this->data['paymentMode'] =$paymentMode;
    $this->data['orderId'] =$invoice;
    $this->data['amount'] =$amount;
    $this->data['page'] = 'user.invest.confirmDeposit';
    return $this->dashboard_layout();


  }
   catch(\Exception $e){
    Log::info('error here');
    Log::info($e->getMessage());
    print_r($e->getMessage());
    die("hi");
    return  redirect()->route('user.invest')->withErrors('error', $e->getMessage())->withInput();
      }

 }



    public function fundActivation(Request $request)
    {

      // dd("hiii");
      try{
        $validation =  Validator::make($request->all(), [
          
            'amount' => 'required|numeric',
            'user_id' => 'required|exists:users,username',
            'transaction_password' => 'required',
    
    
        ]);
    
    
        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
    
            return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
        }
           $user=Auth::user();
    
           $password= $request->transaction_password;
    
           if (Hash::check($password, $user->tpassword))
           {
    
          
    
          $user_detail=User::where('username',$request->user_id)->orderBy('id','desc')->limit(1)->first();
            //   $icon_image = $request->file('icon_image');
             //  print_r($user_detail);die;
             date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
            $invest_check=Investment::where('user_id',$user_detail->id)->where('status','!=','Decline')->orderBy('id','desc')->limit(1)->first();
    
    
                $invoice = substr(str_shuffle("0123456789"), 0, 7);
                $last_package=($invest_check)?$invest_check->amount:0;
    
             // print_r($last_package);die;
             $balance=0;
            
              $balance=round(Auth::user()->FundBalance(),2);
            
           
                if ($balance>=$request->amount)
                 {
              
               $data = [
                    'plan' => 1,
                    'transaction_id' =>md5(uniqid(rand(), true)),
                    'user_id' => $user_detail->id,
                    'user_id_fk' => $user_detail->username,
                    'amount' => $request->amount,
                    'payment_mode' => 'INR',
                    'status' => 'Active',
                    'sdate' => Date("Y-m-d"),
                    'active_from' => $user->username,
                    'walletType' =>1,
                    'created_at' =>Date('Y-m-d H:i:s'),
    
                ];
                $payment =  Investment::insert($data);
              
                  // If insertion successful, redirect back with success message
                 
        
     
               
                $userID= $user_detail->id;
                $userName=  $user_detail->username;
                if ($user_detail->active_status=="Pending")
                {
                 $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$request->amount);
                  User::where('id',$user_detail->id)->update($user_update);
                  add_direct_income($user_detail->id,$request->amount);
                    $round ="matrix_club100";
                    $extra_round= "extras_round100";

                    $table =$round;
                      $check_user=\DB::table($table)->where('username',$user_detail->username)->first();
                      if($check_user<=0)
                      {          
                          // dd($check_user);
                          
                         $this->downline="";
                         $this->find_position(($user_detail->sponsor_detail)?$user_detail->sponsor_detail->username:0,$table);
                         $sponsor_user =  $this->downline; 
                        $Report=getPosition($sponsor_user,$table);
                        $sponsor= (!empty($Report))?$Report['pos_id']:0;
                        $position= (!empty($Report))?$Report['position']:0;
                        $userLevel = \DB::table($table)->where('username',$sponsor)->first();               
                        $mxLevel= (!empty($userLevel)?$userLevel->level+1:0);      
                        $data = [
                              'ParentId' =>$sponsor,
                              'level' => $mxLevel,
                              'user_id' => $userID,
                              'username' => $userName,
                              'position' =>$position,
                              
                          ];
                          \DB::table($table)->insert($data);
                          $bonusArray=array(0,5,3,2,1.5,1,1,0.75,0.75,0.5,0.5);
                          add_pool_income($user_detail->id,$bonusArray,$table);
                      } 
                }
                else
                {
                  
                  $user_update=array('active_status'=>'Active','package'=>$request->amount);
                  User::where('id',$user_detail->id)->update($user_update);
                }

                $sponsor = $user_detail->sponsor;
                $referred_users = User::where('sponsor', $sponsor)->where('active_status','Active')->count();

                if ($referred_users>=20) 
                {
                  User::where('id',$sponsor)->update(['rank'=>1]);
                }
                


     
               
    
    
    
          $notify[] = ['success', $user_detail->username.' User Activation  Submited successfully'];
          return redirect()->back()->withNotify($notify);
    
          }
          else
          {
             return Redirect::back()->withErrors(array('Insufficient Balance in Wallet'));
          }
      }
        else
        {
          return Redirect::back()->withErrors(array('Invalid Transaction Password'));
        }
    
    
      }
       catch(\Exception $e){
        Log::info('error here');
        Log::info($e->getMessage());
        print_r($e->getMessage());
        die("hi");
        return  redirect()->route('user.deposit')->withErrors('error', $e->getMessage())->withInput();
          }
    
    

 }

 public function find_position($snode,$pool)
 {
     $q=User::where('username',$snode)->first();
     if ($q)
      {
        $checkPool = \DB::table($pool)->where('username',$q->username)->first();  
        if($checkPool)
        {
           $this->downline = $checkPool->username;    
        }
         else
      {
        $sponsorCode=User::where('id',$q->sponsor)->first();
       $user = ($sponsorCode)?$sponsorCode->username:0;
         // print_r($user);die();
       $this->find_position($user,$pool);   
      }
      
      }
      else
      {
         $this->downline=0; 
      }
     
 }




        public function invest_list(Request $request){

      $user=Auth::user();
      $limit = $request->limit ? $request->limit : paginationLimit();
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Investment::where('user_id',$user->id);
      if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%')
          ->orWhere('type', 'LIKE', '%' . $search . '%')
          ->orWhere('amount', 'LIKE', '%' . $search . '%');
        });

      }

        $notes = $notes->paginate($limit)->appends(['limit' => $limit ]);

      $this->data['search'] =$search;
      $this->data['deposit_list'] =$notes;
      $this->data['page'] = 'user.invest.DepositHistory';
      return $this->dashboard_layout();


        }
        public function my_deposit()
        {


          $this->data['page'] = 'user.invest.my_deposit';
          return $this->dashboard_layout();
        }
        

        public function open_deposit()
        {


          $this->data['page'] = 'user.invest.open_deposit';
          return $this->dashboard_layout();
        }
}
