<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Investment;
use App\Models\Income;
use App\Models\User_trade;
use App\Models\Activitie;
use Carbon\Carbon;
use Redirect;
use Log;
use Hash;
use Helper;
class Dashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

      $user=Auth::user();
      $user_direct=User::where('sponsor',$user->id)->where('active_status','Active')->count();
      $directIds=User::where('sponsor',$user->id)->where('active_status','Active')->pluck('id');
      $personal_deposit=Investment::where('user_id',$user->id)->where('status','Active')->sum('amount');

      $tolteam=$this->my_level_team_count($user->id);               
    
     
      $deposit_report = Investment::where('user_id',$user->id)->orderBy('id','desc')->get();
      $weekly_profit = Income::where('user_id',$user->id)
      ->whereBetween('ttime', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('comm');
      $totalIncome = Income::where('user_id',$user->id)->sum('comm');

        $transaction_data = Income::where('user_id',$user->id)->orderBy('id', 'desc')->take(10)->get();
         $total_team=User::whereIn('id',(!empty($tolteam)?$tolteam:array()))->where('active_status','Active')->count();
        $this->data['weekly_profit'] =$weekly_profit;
            $this->data['total_team'] =$total_team;
        $this->data['transaction_data'] =$transaction_data;
        $this->data['deposit_report'] =$deposit_report;
        $this->data['user_direct'] =$user_direct;
        $total = $personal_deposit*200/100;
        $portion = $totalIncome;
        if($personal_deposit>0)
        {
             $percentage = ($portion / $total) * 100; // 20 
        }
        else
        {
        $percentage=0;    
        }
      
        $this->data['willgetProfit'] =$personal_deposit*200/100;
        $this->data['remaining_amount'] =($personal_deposit*2)-$totalIncome;
        $this->data['totalIncome'] =$totalIncome;
  




      $this->data['page'] = 'user.dashboard';
      return $this->dashboard_layout();


    }



 
    public function checkPaymentStatus(Request $request)
    {
     date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

        $validation =  Validator::make($request->all(), [
            'orderId' => 'required',
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
    
            return redirect()->route('user.dashboard')->withErrors($validation->getMessageBag()->first())->withInput();
        }

         $user = Auth::user();
          $orderId=$request->orderId;
         $checkStatus= \DB::table('investments')->where('user_id',$user->id)->where('orderId',$orderId)->where('status','Active')->first();
        
        if($checkStatus)
        {
            return 1;
        }
        else
        {
            return 0;   
        }
    
    }



 
    public function lastWithdrawal(Request $request)
    {
     date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

        $validation =  Validator::make($request->all(), [
            'withdrawalId' => 'required',
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
    
            return redirect()->route('user.dashboard')->withErrors($validation->getMessageBag()->first())->withInput();
        }

         $user = Auth::user();
          $orderId=$request->withdrawalId;
         $checkStatus= \DB::table('withdraws')->where('id',$orderId)->first();
        $output='';
        if($checkStatus)
        {
            
            
           $output.='
           
             <p>'.$checkStatus->amount.' '.$checkStatus->payment_mode.' has been sent to your wallet. The operation is awaiting for confirmation by network. It may take up to 15-60 minutes to complete the confirmation process.</p>
      
            
            
              
              <a data-v-06f511d8="" href="'.route('user.Withdraw-History').'" class="result__txLink btnText _primary " ><!----> <div class="_0ccc93a to-transaction">
              To transaction
            </div></a>
            <br>
                <div data-v-1a73b4ab="" data-v-06f511d8="" class="review"><img data-v-1a73b4ab="" src="'.asset('assets/img/FOjCTYls1596032002.svg').'" alt="TrustPilot" height="32" class="review__img"> <h4 data-v-1a73b4ab="" class="review__title">
                Rate your experience!
              </h4> <div data-v-1a73b4ab="" class="review__hint">
                Leave your review about Etriton Ai on TrustPilot
              </div> <a data-v-1a73b4ab="" style="font-size: 17px;
            text-decoration: none;" href="https://uk.trustpilot.com/review/etriton.co" target="_blank" rel="noopener" class="review__link btnText _primary"> <div data-v-1a73b4ab="" class="btnText__label" style="margin-top: 13px;
            color: #5a83ed;
            font-weight: 600;">
                 <i class="fa fa-share-alt"></i>   Rate now
                </div></a></div>
            
           ';
           
           return $output;
           
        }
        else
        {
            return 1;   
        }
    
    }



    public  function my_binary($userid){
        $arrin=array($userid);
        $ret=array();
        // print_r($arrin);die();
        while(!empty($arrin)){
         $alldown= User::select('id')->whereIn('Parentid',$arrin)->get()->toArray();
         if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[]=$arrin;
              
              
            }else{
                $arrin = array();
            } 
        }
        // continue;    
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }

        return $final;
        
    }  


     public  function team_by_position($userid,$position){
        $ret=array();
        $get_position_user=User::where('Parentid',$userid)->where('position',$position)->first();
        if($get_position_user){
        
            $ret=$this->my_binary($get_position_user->id);
            $ret[]=$get_position_user->id;
        }
       
        return $ret;
    }



    public function activities()
    {
        $user=Auth::user();
        $transaction_data = Activitie::where('user_id',$user->id)->orderBy('id', 'desc')->get();
        $this->data['activities'] = $transaction_data;
        $this->data['page'] = 'user.activities';
        return $this->dashboard_layout();
    
    }
  public function market()
    {
        $user=Auth::user();
  
        $this->data['page'] = 'user.market';
        return $this->dashboard_layout();
    
    }
 public function news()
    {
        $user=Auth::user();
  
        $this->data['page'] = 'user.news';
        return $this->dashboard_layout();
    
    }

    public function my_level_team_count($userid,$level=10){
        $arrin=array($userid);
        $ret=array();
        $i=1;
        while(!empty($arrin)){
            $alldown=User::select('id')->whereIn('sponsor',$arrin)->get()->toArray();
            if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[$i]=$arrin;
                $i++;

            }else{
                $arrin = array();
            }
        }

        $final = array();
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }


        return $final;

    }

    public function my_direct_business_count($userid){

        $totalBusiness=0;
        $alldown=User::select('id')->where('sponsor',$userid)->get()->toArray();
        if(!empty($alldown)){
            $arrin = array_column($alldown,'id');

         $totalBusiness=Investment::whereIn('user_id',$arrin)->where('status','Active')->sum("amount");
        }
    return $totalBusiness;

    }



    public function tradeOn()
    {
    $user = Auth::user();
 
    $balance=Auth::user()->principleBalance();

        if ($balance>0) 
        {

        $newBalance= $user->tradeAmt+$balance;
        User::where('id',$user->id)->update(['tradeAmt' =>$newBalance]);
        $notify[] = ['success', 'AI Tool On successfully'];
        return redirect()->back()->withNotify($notify);     
      
        }
        else
        {
            return Redirect::back()->withErrors(array('Insufficient balance in Your account'));
        }

    }

    public function submitActivity(Request $request)
    {
        try{
            $validation =  Validator::make($request->all(), [
                'url' => 'required',
               

            ]);
            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            $user=Auth::user();
        

            $user_detail=Activitie::where('user_id',$user->id)->where('status','Pending')->first();
            if (!$user_detail) 
            {
                $data = [
                    'user_id' => $user->id,
                    'url' => $request->url,
                    'ttime' => Date("Y-m-d"),
                
                ];
                 
               $income = Activitie::firstOrCreate(['ttime'=>date("Y-m-d"),'user_id'=>$user->id],$data);
               $notify[] = ['success', 'Request Submitted successfully'];
               return redirect()->back()->withNotify($notify);     


            }
            else{
                return Redirect::back()->withErrors(array('activities pending'));
            }
    


        $notify[] = ['success', 'Profile Updated successfully'];
        return redirect()->back()->withNotify($notify);

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
          dd($e->getMessage());
            return back()->withErrors('error', $e->getMessage())->withInput();
        }
    }




}
