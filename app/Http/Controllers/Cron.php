<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Income;
use App\Models\User;
use App\Models\User_trade;
use App\Models\Reward;
use App\Models\Withdraw;
use Illuminate\Support\Facades\URL;
use App\Models\Trade;
use Illuminate\Support\Facades\Http;
use DateTime;
use DateInterval;
use DatePeriod;
use Carbon\Carbon;
use Helper;
use Plisio\PlisioSdkLaravel\Payment;
use Illuminate\Support\Facades\DB;

class Cron extends Controller
{
    
public function __construct()
{
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
}
public function tradeAmt()
{
  User::where('id','>=',0)->update(['tradeAmt' => 0]);
}


public function releasefund()
{

$allResult=Investment::where('status','Pending')->get();
$todays=Date("Y-m-d");
  User::where('id',1)->update(['name' => 'etriton']);
if ($allResult)
{
 foreach ($allResult as $key => $value)
 {

  $userID=$value->user_id;
   $joining_amt = $value->amount;

  $user_detail=User::where('id',$userID)->first();
  $today=date("Y-m-d");
   $previous_date =date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));

  if ($user_detail)
  {
    
  
    $result=Helper::Gettxninfo($value->transaction_id);
    
    // dd($result);
    if($result['error']=="ok")
    {
    
      if($result['result']['status']>=1)
      {
        $invoice = substr(str_shuffle("0123456789"), 0, 7);

        $income = Investment::where('transaction_id',$value->transaction_id)->update(['status' => 'Active']);
          if ($user_detail->active_status=="Pending")
          {   
          $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$value->amount);
          User::where('id',$user_detail->id)->update($user_update);
        \DB::table('general_settings')->where('id',1)->update(['people_online'=>generalDetail()->people_online+1]);
        \DB::table('general_settings')->where('id',1)->update(['our_investors'=>generalDetail()->our_investors+1]);
         }
         else
         {
           $total=$user_detail->package+$value->amount;
            $user_update=array('package'=>$total,'active_status'=>'Active');
          User::where('id',$user_detail->id)->update($user_update); 
         }
                  $amount=  $value->amount;
                  
          \DB::table('general_settings')->where('id',1)->update(['total_fund_invested'=>generalDetail()->total_fund_invested+$amount]);
                  $plan ='BEGINNER';
                  if ($amount>=30 && $amount<=400) 
                  {
                   $plan ='BEGINNER';
                  }
                  elseif($amount>=401 && $amount<=1000)
                  {
                   $plan ='BRONZE';
                  }
                  elseif($amount>=1001 && $amount<=4000)
                  {
                   $plan ='SILVER';
                  }
                  elseif($amount>=4001 && $amount<=10000)
                  {
                   $plan ='PLATINUM';
                  }
                   
                  sendEmail($user_detail->email, 'Account Activated -'.siteName(), [
                    'name' => $user_detail->name,
                    'username' => $user_detail->username,
                    'amount' => $value->amount,
                    'plan' => $plan,
                    'date' => date("D, d M Y h:i:s a", strtotime(Date("Y-m-d H:i:s"))),
                    'viewpage' => 'activation',
    
                 ]);
                     
            add_direct_income($user_detail->id,$value->amount);


      }

    }


  }

 }
}




}




public function generate_roi()
{

$allResult=Investment::where('status','Active')->where('roiCandition',0)->get();
$todays=Date("Y-m-d");
$day=Date("l");

if ($allResult)
{

 foreach ($allResult as $key => $value)
 {

  $userID=$value->user_id;
   $joining_amt = $value->amount;
   $plan = $value->plan;
   $startDate = $value->sdate;

  $userDetails=User::where('id',$userID)->where('active_status','Active')->first();
  $today=date("Y-m-d");
   $previous_date =date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));
  
  if ($userDetails)
  {
     
     $checkRoi = Income::where('user_id',$userID)->where('remarks','Royalty Income')->where('invest_id',$value->id)->first();
     if($checkRoi)
     {
       $startDate= $checkRoi->ttime;
     }
      $days = (strtotime($today) - strtotime($startDate)) / (60 * 60 * 24);
      
      
        $total_get=$joining_amt*200/100;
        $total_profit_b = Income::where('user_id', $userID)->sum('comm');
        $total_profit=($total_profit_b)?$total_profit_b:0;
   
          $percent= 8;
    
            if ($joining_amt>=10000 && $joining_amt<=50000) 
           {
            $percent= 8;
           }
           elseif($joining_amt>=51000 && $joining_amt<=100000)
           {
             $percent= 9;
           }
           elseif($joining_amt>=110000 && $joining_amt<=250000)
           {
            $percent= 10;
           }
           elseif($joining_amt>=251000 && $joining_amt<=1000000)
           {
            $percent= 12;
           } 
           elseif($joining_amt>=1100000 && $joining_amt<=3000000)
           {
            $percent= 15;
           }    
           elseif($joining_amt>=3100000 )
           {
            $percent= 20;
           }
             
           
       
       $roi = ($joining_amt*$percent/100)/30;
     
     
     $roi = $roi*$days;
       $max_income=$total_get;
       $n_m_t = $max_income - $total_profit;
       // dd($total_received);
         if($roi >= $n_m_t)
         {
             $roi = $n_m_t;
         }  
       
      if ($roi>0)
      {

        echo "ID:".$userDetails->username." Package:".$joining_amt." Roi:".$roi."<br>";
         $data['remarks'] = 'Royalty Income';
        $data['comm'] = $roi;
        $data['amt'] = $joining_amt;
        $data['invest_id']=$value->id;
        $data['level']=0;
        $data['ttime'] = date("Y-m-d");
        $data['user_id_fk'] = $userDetails->username;
        $data['user_id']=$userDetails->id;
       $income = Income::firstOrCreate(['remarks' => 'Royalty Income','ttime'=>date("Y-m-d"),'user_id'=>$userID,'invest_id'=>$value->id],$data);
          add_level_income($userDetails->id,$roi);
       
      }
      else
      {
      Investment::where('id',$value->id)->update(['roiCandition' => 1]);
      }
      

  }

 }
 
}




}






  public function managePayout()

    {  

date_default_timezone_set("Asia/Kolkata"); 
//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->orderBy('id','ASC')->cursor();

    if ($allResult) 
    {
       $counter=1;
     foreach ($allResult as $key => $value) 
     {
      
     $userID=$value->id;
     $userName=$value->username;
     $adate_date =$value->adate;
     $balance=$value->balance;


  
     $income =Income::where('user_id',$userID)->sum('comm');
     $withdraw = Withdraw::where('user_id',$userID)->sum('amount');
     
       $balance = round($income-$withdraw,2);
  
    if($balance>0)
    {
    //   echo 'ID: '. $userName." Balance : ".$balance."<br>";   
        

        
        
    // $amountTotal= 5;
    // $transaction['item'] = 'Add wallet'; // invoice number
    // $transaction['amount'] =$amountTotal;
    // $transaction['currency1'] = 'USD';
    // $transaction['currency2'] = 'BNB.BSC';
    // $transaction['buyer_email'] = $value->email;
    // $transaction['success_url'] = URL::to('/user/invest');
    // $resultAarray = Helper::CreateTransaction($transaction);
       
    //   dd($resultAarray);
                   
    }
    
   
     $counter++;   
     }
    } 
    
    
    

}





 public function reward_bonus()
    {  

    $allResult=User::where('active_status','Active')->get();
// print_r($allResult);die;
    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
      $user_id=$value->id;
      $username=$value->username;
      $Power_leg=$value->power_leg;
      $Vicker_leg=$value->vicker_leg;
      
        // $tolteam=$this->my_level_team_count($user_id);
        
        $rightTeam_arr=$this->team_by_position($user_id,'Right');
       $leftTeam_arr=$this->team_by_position($user_id,'Left');
       
       
    //   $total_team=(!empty($tolteam)?count($tolteam):0);
       $rightBusiness=(!empty($rightTeam_arr))?Investment::whereIn('user_id',$rightTeam_arr)->where('status','Active')->sum('amount'):0;
       $leftBusiness=(!empty($leftTeam_arr))?Investment::whereIn('user_id',$leftTeam_arr)->where('status','Active')->sum('amount'):0;
       
       
    //   echo $rightBusiness."<br>";
    //   echo $leftBusiness."<br>";
       
     
     $require_power_bunsess=array('0','1000','3000','7000','20000','40000','80000','160000','320000','640000');
     $require_bonus=array('0','1','3','7','20','40','80','160','320','640');
 
     
     for($p=1;$p<10;$p++)
      {
        $my_gen_busniess=$require_power_bunsess[$p];
  
        $bonus=$require_bonus[$p];
 
        
        $toatal_business=Reward::where('status','Approved')->where('user_id',$user_id)->sum("total_business");
        $total_business=($toatal_business)?$toatal_business:0;
       
        // $power_leg=$my_gen_busniess*50/100;
        // $vicker_leg=$my_gen_busniess*50/100;
        
        // $Require_power_leg=$my_gen_busniess*60/100;
        // $Require_vicker_leg=$my_gen_busniess*40/100;
        
        $check_level=Reward::where('status','Approved')->where('user_id',$user_id)->where('level',$p)->count("id");
        // echo "<br>";
        //  echo $rightBusiness;
        //  echo "<br>";
        //  echo $leftBusiness;
        //  echo "<br>";
        //  echo $p;
        //  echo "<br>"; 
        //  echo "required p".$my_gen_busniess;
        //  echo "<br>"; 
        //  echo "required v".$my_gen_busniess;
        //  echo "<br>";
        if($check_level<=0)
        {
         $goalstatus=( $rightBusiness >= $my_gen_busniess && $leftBusiness >= $my_gen_busniess? 'Achieved':'Pending');
           if ($goalstatus=='Achieved')
               {
                   
                  echo "<br>";
          echo "ID : ".$username."<br>";
          echo "Level : ".$p;
          User::where('id', $user_id)
           ->update([
               'rank' => $p
            ]);
            
            $data['remarks'] = 'Reward Bonus';
            $data['amount'] = $bonus;
            $data['total_business'] = $my_gen_busniess;
            $data['level']=$p;
            $data['tdate'] = date("Y-m-d");
            $data['user_id_fk'] =$username;
            $data['user_id']=$user_id; 
            $data['status']='Approved'; 
          $income = Reward::firstOrCreate(['remarks' => 'Reward Bonus','level'=>$p,'user_id'=>$user_id],$data);   
    
    
               }
               
        }

          
      }
             
     
      
     
     }
    } 

}




public function dailyIncentive()
{


    $allResult=User::where('active_status','Active')->get();
    $todays=Date("Y-m-d");


    if ($allResult)
    {
        foreach ($allResult as $key => $value)
        {
        $userID=$value->id;
        $userName = $value->username;
        $userRank = $value->rank;
        
        $rewardDetail = Reward::where('user_id',$userID)->orderBy('id','DESC')->limit(1)->first();
        
        if($rewardDetail)
        {
           
            $data['remarks'] = 'Retire Royalty Bonus';
            $data['comm'] = $rewardDetail->amount;
            $data['level'] = $rewardDetail->level;
            $data['amt'] = $rewardDetail->amount;
            $data['invest_id']=$rewardDetail->id;
            $data['ttime'] = date("Y-m-d");
            $data['user_id_fk'] = $userName;
            $data['user_id']=$userID; 
          $income = Income::firstOrCreate(['remarks' => 'Retire Royalty Bonus','ttime'=>date("Y-m-d"),'user_id'=>$userID],$data);
           
        }
        
        
   


        }
    }
}




public function dynamicupicallback()
{
    
 
  
//   echo "Hello";
//   print_r($response);die();
         $response = file_get_contents('php://input');
          date_default_timezone_set('Asia/Kolkata');
          $day=date('l');
          $todays=date("Y-m-d");
         $result = json_decode($response, true);
           
         \DB::table('activities')->insert(['data' =>$response]);  
         if(!empty($result))
         {
             
             if($result['status']=="completed")
             {
                 
              $orderId= $result['order_number'];
              $username= $result['order_name'];
              $amount= $result['source_amount'];
              $updateTrue = Investment::where('orderId',$orderId)->where('status','Pending')->update(['status' => 'Active']);
           
           if($updateTrue)  
           {
            
             $user_detail=User::where('username',$username)->first();
              if ($user_detail->active_status=="Pending")
              {   
              $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$amount);
              User::where('id',$user_detail->id)->update($user_update);
            \DB::table('general_settings')->where('id',1)->update(['people_online'=>generalDetail()->people_online+1]);
            \DB::table('general_settings')->where('id',1)->update(['our_investors'=>generalDetail()->our_investors+1]);
             }
             else
             {
               $total=$user_detail->package+$amount;
                $user_update=array('package'=>$total,'active_status'=>'Active');
              User::where('id',$user_detail->id)->update($user_update); 
             }
                
                  
             \DB::table('general_settings')->where('id',1)->update(['total_fund_invested'=>generalDetail()->total_fund_invested+$amount]);
                  $plan ='BEGINNER';
                  if ($amount>=30 && $amount<=400) 
                  {
                   $plan ='BEGINNER';
                  }
                  elseif($amount>=401 && $amount<=1000)
                  {
                   $plan ='BRONZE';
                  }
                  elseif($amount>=1001 && $amount<=4000)
                  {
                   $plan ='SILVER';
                  }
                  elseif($amount>=4001 && $amount<=10000)
                  {
                   $plan ='PLATINUM';
                  }
                   
                  sendEmail($user_detail->email, 'Account Activated -'.siteName(), [
                    'name' => $user_detail->name,
                    'username' => $user_detail->username,
                    'amount' => $amount,
                    'plan' => $plan,
                    'date' => date("D, d M Y h:i:s a", strtotime(Date("Y-m-d H:i:s"))),
                    'viewpage' => 'activation',
    
                 ]);
                     
            add_direct_income($user_detail->id,$amount);

                    
           }
           
                 
             }
             else
             {
                if($result['status']=="mismatch" && $result['amount'] >= $result['invoice_total_sum']) 
                {
                    
                         
              $orderId= $result['order_number'];
              $username= $result['order_name'];
              $amount= $result['source_amount'];
              $updateTrue = Investment::where('orderId',$orderId)->where('status','Pending')->update(['status' => 'Active']);
           
           if($updateTrue)  
           {
            
             $user_detail=User::where('username',$username)->first();
              if ($user_detail->active_status=="Pending")
              {   
              $user_update=array('active_status'=>'Active','adate'=>Date("Y-m-d H:i:s"),'package'=>$amount);
              User::where('id',$user_detail->id)->update($user_update);
            \DB::table('general_settings')->where('id',1)->update(['people_online'=>generalDetail()->people_online+1]);
            \DB::table('general_settings')->where('id',1)->update(['our_investors'=>generalDetail()->our_investors+1]);
             }
             else
             {
               $total=$user_detail->package+$value->amount;
                $user_update=array('package'=>$total,'active_status'=>'Active');
              User::where('id',$user_detail->id)->update($user_update); 
             }
                
                  
             \DB::table('general_settings')->where('id',1)->update(['total_fund_invested'=>generalDetail()->total_fund_invested+$amount]);
                  $plan ='BEGINNER';
                if ($amount>=50 && $amount<=200) 
                   {
                    $plan ='BEGINNER';
                   }
                   elseif($amount>=400 && $amount<=800)
                   {
                    $plan ='STANDARD';
                   }
                   elseif($amount>=1000 && $amount<=2000)
                   {
                    $plan ='EXCLUSIVE';
                   }
                   elseif($amount>=2500 && $amount<=5000)
                   {
                    $plan ='ULTIMATE';
                   }
            
                   elseif($amount>=5000 && $amount<=10000)
                   {
                    $plan ='PREMIUM';
                   }
            
                   elseif($amount>=5000)
                   {
                    $plan ='PREMIUM';
                   }
                  add_direct_income($user_detail->id,$amount);
                  
                  
                  sendEmail($user_detail->email, 'Account Activated -'.siteName(), [
                    'name' => $user_detail->name,
                    'username' => $user_detail->username,
                    'amount' => $amount,
                    'plan' => $plan,
                    'date' => date("D, d M Y h:i:s a", strtotime(Date("Y-m-d H:i:s"))),
                    'viewpage' => 'activation',
    
                 ]);
                     
          

                    
           }
           
           
                    
                }
             }
             
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



    public function royalincome()
    {
        $users = User::all();
        $amt=$request->amount;

        foreach ($users as $user) {
            $referrals = User::where('sponsor', $user->id)->pluck('id')->toArray();
            
            if (count($referrals) >= 20) {
                $totalInvestment = Investment::whereIn('user_id', $referrals)
                                             ->whereDate('created_at', Carbon::yesterday())
                                             ->sum('amount');

                if ($totalInvestment > 0) {
                    $bonus = $totalInvestment * 0.05;

                    Income::create([
                        'user_id' => $user->id,
                        'user_id_fk' => $user->username,
                        'amt' => $amt,
                        'comm' =>   $bonus,
                        'remarks' => ' BonuRoyals',
                        'ttime' => Carbon::now(),
                        'level' => 0,
                        'tleft' => 0,
                        'tright' => 0,
                        'rname' => $user->username,
                        'fullname' => $user->name,
                        'invest_id' => 0,
                        'updated_at' => Carbon::now(),
                        'created_at' => Carbon::now(),
                        'credit_type' => 'Referral Bonus',
                    ]);
                }
            }
        }

    }

}
