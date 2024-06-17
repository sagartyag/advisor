<?php
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Income;
use App\Models\Extension;
use App\Models\Investment;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;
use Carbon\Carbon; 
$downline="";

function siteName()
{
    $general = GeneralSetting::first();
    return $general->sitename;
}

function currency()
{
    $general = GeneralSetting::first();
    return $general->cur_sym;
}

function generalDetail()
{
    $general = GeneralSetting::first();
    return $general;
}


function menuActive($routeName, $type = null)
{
    if ($type == 3) {
        $class = 'side-menu--open';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } else {
        $class = 'active';
    }
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}


function changeDateToUTC($date)
{
     $time = Carbon::parse($date)->setTimezone('UTC')->toDateTimeString();
    return $time;
}

function paginationLimit()
{
    $general = GeneralSetting::first();
    return $general->PaginationLimit;
}


function sendEmail($user, $type = null, $shortCodes = [])
{

  $mail_data=array('subject'=>$type,'MailDetail'=>$shortCodes);
  \Mail::to($user)->send(new Sendmail($mail_data));
}


function captchaVerify($code, $secret)
{
    $captcha = Extension::where('act', 'custom-captcha')->where('status', 1)->first();
    $wwww = json_decode($captcha->shortcode);
    $captchaSecret = hash_hmac('sha256', $code, $wwww->random_key->value);
    if ($captchaSecret == $secret) {
        return true;
    }
    return false;
}

function reCaptcha()
{
    $reCaptcha = Extension::where('act', 'google-recaptcha2')->where('status', 1)->first();
    return $reCaptcha ? $reCaptcha->generateScript() : '';
}


  function getCustomCaptcha($height = 46, $width = '300px', $bgcolor = '#003', $textcolor = '#03f356')
{
    $textcolor = '#'.GeneralSetting::first()->base_color;
    $captcha = Extension::where('act', 'custom-captcha')->where('status', 1)->first();
 
    if($captcha){
        $code = rand(100000, 999999);
        $char = str_split($code);
        $ret = '<link href="https://fonts.googleapis.com/css?family=Henny+Penny&display=swap" rel="stylesheet">';
        $ret .= '<div style="height: ' . $height . 'px; line-height: ' . $height . 'px; width:' . $width . '; text-align: center; background-color: ' . $bgcolor . '; color:#03f356; font-size: ' . ($height - 20) . 'px; font-weight: bold; letter-spacing: 20px; font-family: \'Henny Penny\', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;">';
        foreach ($char as $value) {
            $ret .= '<span style="    float:left;     -webkit-transform: rotate(' . rand(-60, 60) . 'deg);">' . $value . '</span>';
        }
        $ret .= '</div>';
        $wwww = json_decode($captcha->shortcode);
        
        $captchaSecret = hash_hmac('sha256', $code, $wwww->random_key->value);
        $ret .= '<input type="hidden" name="captcha_secret" value="' . $captchaSecret . '">';
        return $ret;
    }else{
        return false;
    }
}



//moveable
function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}

function osBrowser(){
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;

    return $data;
}

function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}

function add_leadership_bonus($id,$amt)
{

  //$user_id =$this->session->userdata('user_id_session')
$data = User::where('id',$id)->orderBy('id','desc')->first();

$user_id = $data->username;
$fullname=$data->name;

$rname = $data->username;
$user_mid = $data->id;


      $cnt = 1;

      $amount = $amt/100;


        while ($user_mid!="" && $user_mid!="1"){

              $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
              $sponsor=$Sposnor_id->sponsor;
              if (!empty($sponsor))
               {
                $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
                $sp_status=$Sposnor_status->active_status;
                $rank=$Sposnor_status->rank;
                $lastPackage = \DB::table('investments')->where('user_id',$Sposnor_status->id)->where('status','Active')->sum("amount");
                $total_profit = \DB::table('incomes')->where('user_id',$Sposnor_status->id)->sum("comm");
                $total_get = $lastPackage*200/100;
              }
              else
              {
                $Sposnor_status =array();
                $sp_status="Pending";
                $Sposnor_cnt=0;
                $rank=0;
                $total_get=0;
                $total_profit=0;
              }

              $pp=0;
               if($sp_status=="Active")
               {
                 if($cnt==1)
                  {
                    $pp= $amount*5;

                  } if($cnt==2)
                  {
                    $pp= $amount*3;

                  } if($cnt==3)
                  {
                    $pp= $amount*1;

                  }  
                  

                }
                else
                {
                  $pp=0;
                }


              $max_income=$total_get;
             $n_m_t = $max_income - $total_profit;
           // dd($total_received);
             if($pp >= $n_m_t)
             {
                 $pp = $n_m_t;
             }  

              $user_mid = @$Sposnor_status->id;
              $spid = @$Sposnor_status->id;
              $idate = date("Y-m-d");

              $user_id_fk=$sponsor;
              if($spid>0 && $cnt<=3){
                if($pp>0){

                 $data = [
                'user_id' => $user_mid,
                'user_id_fk' =>$Sposnor_status->username,
                'amt' => $amt,
                'comm' => $pp,
                'remarks' =>'Leadership Income',
                'level' => $cnt,
                'rname' => $rname,
                'fullname' => $fullname,
                'ttime' => Date("Y-m-d"),

            ];
             $user_data =  Income::create($data);


        }
       }

        $cnt++;
}

return true;
}



 function add_level_income($id,$amt)
        {

          //$user_id =$this->session->userdata('user_id_session')
      $data = User::where('id',$id)->orderBy('id','desc')->first();

        $user_id = $data->username;
        $fullname=$data->name;

        $rname = $data->username;
        $user_mid = $data->id;


              $cnt = 1;

              $amount = $amt/100;


                while ($user_mid!="" && $user_mid!="1"){

                      $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
                      $sponsor=$Sposnor_id->sponsor;
                      if (!empty($sponsor))
                       {
                        $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                        $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
                        $sp_status=$Sposnor_status->active_status;
                        $rank=$Sposnor_status->rank;
                        $lastPackage = \DB::table('investments')->where('user_id',$Sposnor_status->id)->where('status','Active')->orderBy('id','DESC')->limit(1)->first();
                        $plan = ($lastPackage)?$lastPackage->plan:0;
                      }
                      else
                      {
                        $Sposnor_status =array();
                        $sp_status="Pending";
                        $Sposnor_cnt=0;
                        $rank=0;
                      }

                      $pp=0;
                      $remarks= "Level Income";
                       if($sp_status=="Active")
                       {
                         if($cnt==1 && $Sposnor_cnt>=$cnt)
                          {
                            $pp= $amount*15;
                          
                          } if($cnt==2 && $Sposnor_cnt>=$cnt )
                          {
                            $pp= $amount*9;

                          } if($cnt==3 && $Sposnor_cnt>=$cnt)
                          {
                            $pp= $amount*7;

                          } if($cnt==4 && $Sposnor_cnt>=$cnt)
                          {
                            $pp= $amount*6;

                          }  
                          
                          if($cnt==5 && $Sposnor_cnt>=$cnt)
                          {
                            $pp= $amount*5;

                          }  
                           if($cnt==6 && $Sposnor_cnt>=$cnt)
                          {
                            $pp= $amount*5;

                          }  
                         if($cnt==7 && $Sposnor_cnt>=$cnt)
                          {
                            $pp= $amount*3;

                          }  
                         
                          if($cnt>=8 && $cnt<=15 && $Sposnor_cnt>=$cnt)
                          {
                            $pp= $amount*1;

                          } 
                        }
                        else
                        {
                          $pp=0;
                        }



                      $user_mid = @$Sposnor_status->id;
                      $spid = @$Sposnor_status->id;
                      $idate = date("Y-m-d");

                      $user_id_fk=$sponsor;
                      if($spid>0 && $cnt<=15){
                        if($pp>0){

                         $data = [
                        'user_id' => $user_mid,
                        'user_id_fk' =>$Sposnor_status->username,
                        'amt' => $amt,
                        'comm' => $pp,
                        'remarks' =>$remarks,
                        'level' => $cnt,
                        'rname' => $rname,
                        'fullname' => $fullname,
                        'ttime' => Date("Y-m-d"),

                    ];
                     $user_data =  Income::create($data);


                }
               }

                $cnt++;
     }

     return true;
  }


  
 function add_pool_income($id,$amt,$table)
 {

   //$user_id =$this->session->userdata('user_id_session')
$data = User::where('id',$id)->orderBy('id','desc')->first();

 $user_id = $data->username;
 $fullname=$data->name;

 $rname = $data->username;
 $user_mid = $data->username;


       $cnt = 1;

       $amount = $amt;


         while ($user_mid!="" && $user_mid!="0"){

               $Sposnor_id = \DB::table($table)->where('username',$user_mid)->orderBy('id','desc')->first();
               
               $sponsor=$Sposnor_id->ParentId;
              
               if (!empty($sponsor))
                {
                 $Sposnor_status = User::where('username',$sponsor)->orderBy('id','desc')->first();
                 $sp_status=($Sposnor_status)?$Sposnor_status->active_status:0;
                
               }
               else
               {
                 $Sposnor_status =array();
                 $sp_status="Pending";
               
               }
            
               
               $pp=0;
               $remarks= "Level Income";
                if($sp_status=="Active")
                {
                if($cnt>=1 && $cnt<=10)
                  {
                    $pp= $amount[$cnt];
                  
                  }
                 }
                 else
                 {
                   $pp=0;
                 }



               $user_mid = ($Sposnor_status)?$Sposnor_status->username:0;
               $spid = ($Sposnor_status)?$Sposnor_status->id:0;
               $idate = date("Y-m-d");

              //  echo $user_mid." ".$spid;
            
              
               if($spid>0 && $cnt<=10){
                 if($pp>0){

                 
                
                  $data = [
                 'user_id' => $Sposnor_status->id,
                 'user_id_fk' =>$Sposnor_status->username,
                 'amt' => $pp,
                 'comm' => $pp,
                 'remarks' =>$remarks,
                 'level' => $cnt,
                 'tleft' => $table,
                 'rname' => $rname,
                 'fullname' => $fullname,
                 'ttime' => Date("Y-m-d"),

             ];

              $user_data =  Income::create($data);


         }
        }

         $cnt++;
}

return true;
}



function add_direct_income_new($id,$amt,$newDate,$newDateTime)
{

  //$user_id =$this->session->userdata('user_id_session')
$data = User::where('id',$id)->orderBy('id','desc')->first();

$user_id = $data->username;
$fullname=$data->name;

$rname = $data->username;
$user_mid = $data->id;


      $cnt = 1;

        $amount = $amt/100;

              $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
              $sponsor=$Sposnor_id->sponsor;
              if (!empty($sponsor))
               {
                $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
              $sp_status=$Sposnor_status->active_status;
              $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
              }
              else
              {
                $Sposnor_status =array();
                $sp_status="Pending";
                $Sposnor_cnt =0;
              }
             $percent = 5;

             if($sp_status=="Active")
               {

                $pp = $amount*$percent;

              }else
              {
                $pp=0;
              }

              $user_mid = @$Sposnor_status->id;
              //echo $user_id;
             //die;
              $idate = date("Y-m-d");

              $spid = @$Sposnor_status->id;


              $user_id_fk=$sponsor;
              //print_r($user_id_fk);die;
             // echo $cnt." ".$spid." ".$pp."<br>";
              if($spid>0 && $pp>0){
                 $data = [
                'user_id' => $user_mid,
                'user_id_fk' =>$Sposnor_status->username,
                'amt' => $amt,
                'comm' => $pp,
                'remarks' => 'Referral Income',
                'level' => $cnt,
                'rname' => $rname,
                'fullname' => $fullname,
                'ttime' => $newDate,
                'created_at' => $newDateTime,

            ];
            $user_data =  Income::Create($data);


       }


return true;
}


function add_direct_income($id,$amt)
{

  //$user_id =$this->session->userdata('user_id_session')
$data = User::where('id',$id)->orderBy('id','desc')->first();

$user_id = $data->username;
$fullname=$data->name;

$rname = $data->username;
$user_mid = $data->id;


      $cnt = 1;

        $amount = $amt/100;

              $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
              $sponsor=$Sposnor_id->sponsor;
              if (!empty($sponsor))
               {
                $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                $sp_status=$Sposnor_status->active_status;
                $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
                $lastPackage = \DB::table('investments')->where('user_id',$Sposnor_status->id)->where('status','Active')->sum("amount");
                $total_profit = \DB::table('incomes')->where('user_id',$Sposnor_status->id)->sum("comm");
                $total_get = $lastPackage*5;
              }
              else
              {
                $Sposnor_status =array();
                $sp_status="Pending";
                $Sposnor_cnt =0;
                $total_profit =0;
                $total_get =0;
              }
             $percent = 20;

             if($sp_status=="Active")
               {

                $pp = $amount*$percent;

              }else
              {
                $pp=0;
              }

              $user_mid = @$Sposnor_status->id;
              //echo $user_id;
             //die;
              $idate = date("Y-m-d");

              $spid = @$Sposnor_status->id;
        
                 $max_income=$total_get;
             $n_m_t = $max_income - $total_profit;
           // dd($total_received);
             if($pp >= $n_m_t)
             {
                 $pp = $n_m_t;
             }  
             

              $user_id_fk=$sponsor;
              //print_r($user_id_fk);die;
             // echo $cnt." ".$spid." ".$pp."<br>";
              if($spid>0 && $pp>0){
                 $data = [
                'user_id' => $user_mid,
                'user_id_fk' =>$Sposnor_status->username,
                'amt' => $amt,
                'comm' => $pp,
                'remarks' => 'Direct Income',
                'level' => $cnt,
                'rname' => $rname,
                'fullname' => $fullname,
                'ttime' => Date("Y-m-d"),

            ];
            $user_data =  Income::Create($data);


       }


return true;
}


function getPosition($parentid,$table)
{
    $childid = getPositionNew($parentid,$table);
    $res = getPositionId($childid,$table);
    return $res;
}

function getPositionNew($parentid,$table)
{
    $childid = getTreeChildIdNew($parentid,$table);
    if ($childid->count()<5) 
    {
      return $parentid;
    }
    else {
      foreach($childid as $key => $value)
      {
        $childid2 = getTreeChildIdNew($value->username,$table);

        if ($childid2->count()<5)
         {
          return $value->username;
        }
      }
    }
}


function getTreeChildIdNew($parentid,$table)
{
    $cou = \DB::table($table)->where('ParentId', $parentid)->get();
      return $cou;
}


function getPoolIncome($user_id,$remraks,$level)
{
    $cou = \DB::table('incomes')->where('user_id_fk', $user_id)->where('tleft',$remraks)->where('remarks','Level Income')->where('level',$level)->sum('comm');
      return $cou;
}

function getPositionId($id,$table)
{
  $cou = \DB::table($table)->where('ParentId', $id)->where('position','Left')->first();
  if (!$cou) 
  {
    $res['pos_id'] = $id;
    $res['position'] = "Left";
    return $res;
  }
  $cou = \DB::table($table)->where('ParentId', $id)->where('position','Left1')->first();
  if (!$cou) 
  {
    $res['pos_id'] = $id;
    $res['position'] = "Left1";
    return $res;
  }
  $cou = \DB::table($table)->where('ParentId', $id)->where('position','Middle')->first();
  if (!$cou) 
  {
    $res['pos_id'] = $id;
    $res['position'] = "Middle";
    return $res;
  }
  $cou = \DB::table($table)->where('ParentId', $id)->where('position','Right1')->first();
  if (!$cou) 
  {
    $res['pos_id'] = $id;
    $res['position'] = "Right1";
    return $res;
  }
  $right = \DB::table($table)->where('ParentId', $id)->where('position','Right')->first();
  if (!$right) 
  {
    $res['pos_id'] = $id;
    $res['position'] = "Right";
    return $res;
  }

}


function getTreeChildId($table)
{
    $parentid = DB::table($table)->where('paid_left',0)->orWhere('paid_left1',0)->orWhere('paid_middle',0)->orWhere('paid_right1',0)->orWhere('paid_right',0)->orderBy('id','ASC')->limit(1)->first();
   if (!$parentid) 
   {
    $res['parentId'] =0;
    $res['position'] =1;
   }
   else
   {
    $res['parentId'] =$parentid->user_id_fk;
    if ($parentid->paid_left ==0) 
    {
      $res['position'] =1;
    } 
    elseif($parentid->paid_left1 ==0)
    {
      $res['position'] =2;
    }
    elseif($parentid->paid_middle ==0)
    {
      $res['position'] =3;
    }
    elseif($parentid->paid_right1 ==0)
    {
      $res['position'] =4;
    }
    else
    {
      $res['position'] =5;
    }



   }

   return $res;
  
}







?>
