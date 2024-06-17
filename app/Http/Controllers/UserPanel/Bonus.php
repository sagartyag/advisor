<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Income;
use App\Models\Reward;
use App\Models\Boost_direct;
use App\Models\User_trade;
use Illuminate\Support\Facades\DB;
use Auth;
use Log;
use Redirect;
use Hash;
use Validator;

class Bonus extends Controller
{
    public function index(Request $request)
    {
       $user=Auth::user();
    
       $my_level_team=$this->my_level_team_count($user->username,'matrix_club100');
       $gen_team1=(array_key_exists(1,$my_level_team) ?count($my_level_team[1]):0);
       $gen_team2=(array_key_exists(2,$my_level_team) ?count($my_level_team[2]):0);
       $gen_team3=(array_key_exists(3,$my_level_team) ?count($my_level_team[3]):0);
       $gen_team4=(array_key_exists(4,$my_level_team) ?count($my_level_team[4]):0);
       $gen_team5=(array_key_exists(5,$my_level_team) ?count($my_level_team[5]):0);
       $gen_team6=(array_key_exists(6,$my_level_team) ?count($my_level_team[6]):0);
       $gen_team7=(array_key_exists(7,$my_level_team) ?count($my_level_team[7]):0);
       $gen_team8=(array_key_exists(8,$my_level_team) ?count($my_level_team[8]):0);
       $gen_team9=(array_key_exists(9,$my_level_team) ?count($my_level_team[9]):0);
       $gen_team10=(array_key_exists(10,$my_level_team) ?count($my_level_team[10]):0);

        $this->data['gen_team1'] = $gen_team1;
        $this->data['gen_team2'] = $gen_team2;
        $this->data['gen_team3'] = $gen_team3;
        $this->data['gen_team4'] = $gen_team4;
        $this->data['gen_team5'] = $gen_team5;
        $this->data['gen_team6'] = $gen_team6;
        $this->data['gen_team7'] = $gen_team7;
        $this->data['gen_team8'] = $gen_team8;
        $this->data['gen_team9'] = $gen_team9;
        $this->data['gen_team10'] = $gen_team10;
     
        $this->data['user'] = $user;
        $this->data['page'] = 'user.bonus.level-income';
        return $this->dashboard_layout();
        


    }


    public function my_level_team_count($userid,$table,$level=10){
      $arrin=array($userid);
      $ret=array();

      $i=1;
      while(!empty($arrin)){
          $alldown=\DB::table($table)->select('username')->whereIn('ParentId',$arrin)->get()->toArray();
          if(!empty($alldown)){
              $arrin = array_column($alldown,'username');
              $ret[$i]=$arrin;
              $i++;
              if($i>$level)
              {
                break;  
              }


          }else{
              $arrin = array();
          }
      }

      // $final = array();
      // if(!empty($ret)){
      //     array_walk_recursive($ret, function($item, $key) use (&$final){
      //         $final[] = $item;
      //     });
      // }


      return $ret;

  }


    public function cashback_income(Request $request)
    {
       $user=Auth::user();


          $limit = $request->limit ? $request->limit : paginationLimit();
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Direct Income')->orderBy('id', 'DESC');
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('rname', 'LIKE', '%' . $search . '%')
              ->orWhere('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('level', 'LIKE', '%' . $search . '%')
              ->orWhere('remarks', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });

      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        $this->data['level_income'] =$notes;

        $this->data['search'] =$search;
        $this->data['page'] = 'user.bonus.cashback-income';
        return $this->dashboard_layout();


    }

    public function activitiesBonus(Request $request)
    {
       $user=Auth::user();

          $limit = $request->limit ? $request->limit : paginationLimit();
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Activities Bonus')->orderBy('id', 'DESC');
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('rname', 'LIKE', '%' . $search . '%')
              ->orWhere('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('level', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });

      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        $this->data['level_income'] =$notes;
        $this->data['search'] =$search;
        $this->data['page'] = 'user.bonus.activitiesBonus';
        return $this->dashboard_layout();


    }


    public function gap_margin_bonus(Request $request)
    {
       $user=Auth::user();

          $limit = $request->limit ? $request->limit : paginationLimit();
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Gap Margin Bonus')->orderBy('id', 'DESC');
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('rname', 'LIKE', '%' . $search . '%')
              ->orWhere('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('level', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });

      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        $this->data['level_income'] =$notes;
        $this->data['search'] =$search;
        $this->data['page'] = 'user.bonus.gap-margin-bonus';
        return $this->dashboard_layout();


    }



    public function dailyIncentive(Request $request)
    {
       $user=Auth::user();

          $limit = $request->limit ? $request->limit : paginationLimit();
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Retire Royalty Bonus')->orderBy('id', 'DESC');
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id', 'LIKE', '%' . $search . '%')
              ->orWhere('level', 'LIKE', '%' . $search . '%')
              ->orWhere('remarks', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });

      }
            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        $this->data['level_income'] =$notes;
        $this->data['search'] =$search;
        $this->data['page'] = 'user.bonus.daily-incentive';
        return $this->dashboard_layout();


    }


    public function reward_income(Request $request)
    {
    $user=Auth::user();

    $this->data['first_lvl'] = Reward::where('user_id',$user->id)->where('level',1)->count('id');
    $this->data['second_lvl'] = Reward::where('user_id',$user->id)->where('level',2)->count('id');
    $this->data['third_lvl'] = Reward::where('user_id',$user->id)->where('level',3)->count('id');
    $this->data['four_lvl'] = Reward::where('user_id',$user->id)->where('level',4)->count('id');
    $this->data['five_lvl'] = Reward::where('user_id',$user->id)->where('level',5)->count('id');
    $this->data['six_lvl'] = Reward::where('user_id',$user->id)->where('level',6)->count('id');
    $this->data['seven_lvl'] = Reward::where('user_id',$user->id)->where('level',7)->count('id');
    $this->data['eight_lvl'] = Reward::where('user_id',$user->id)->where('level',8)->count('id');
    $this->data['nine_lvl'] = Reward::where('user_id',$user->id)->where('level',9)->count('id');
    $this->data['ten_lvl'] = Reward::where('user_id',$user->id)->where('level',10)->count('id');
    $this->data['eleven_lvl'] = Reward::where('user_id',$user->id)->where('level',11)->count('id');
    $this->data['page'] = 'user.bonus.reward-bonus';
    return $this->dashboard_layout();

    }

 

    public function roi_income(Request $request)
    {
           $user=Auth::user();


          $limit = $request->limit ? $request->limit :  paginationLimit();
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Income::where('user_id',$user->id)->where('remarks','Royalty Income')->orderBy('id', 'DESC');
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
              $q->Where('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('amt', 'LIKE', '%' . $search . '%')
              ->orWhere('rname', 'LIKE', '%' . $search . '%')
              ->orWhere('comm', 'LIKE', '%' . $search . '%');
            });

      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);

    $this->data['level_income'] =$notes;
    $this->data['search'] =$search;
    $this->data['page'] = 'user.bonus.roi-bonus';
    return $this->dashboard_layout();

    }



public function top_balance()
{
  $this->data['page'] = 'user.bonus.top_balance';
  return $this->dashboard_layout();
}





}
