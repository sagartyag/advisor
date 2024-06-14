<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuyFund;
use App\Models\Bank;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Hexters\CoinPayment\CoinPayment;
use App\Models\CoinpaymentTransaction;
use Log;
use Redirect;
class AddFund extends Controller
{

public function index(Request $request)
{
$user=Auth::user();
$bank = Bank::where('user_id',$user->id)->first();
$this->data['bank'] = $bank;
$this->data['page'] = 'user.fund.addFund';
return $this->dashboard_layout();

}



public function fundHistory(Request $request)
{

    $user=Auth::user();
    $limit = $request->limit ? $request->limit : paginationLimit();
    $status = $request->status ? $request->status : null;
    $search = $request->search ? $request->search : null;
    $notes = CoinpaymentTransaction::where('buyer_name',$user->username);      
    if($search <> null && $request->reset!="Reset"){ 
    $notes = $notes->where(function($q) use($search){
    $q->Where('buyer_name', 'LIKE', '%' . $search . '%')          
    ->orWhere('txn_id', 'LIKE', '%' . $search . '%')
    ->orWhere('address', 'LIKE', '%' . $search . '%')
    ->orWhere('amount_total_fiat', 'LIKE', '%' . $search . '%')
    ->orWhere('coin', 'LIKE', '%' . $search . '%');
    });

    }
  $notes = $notes->paginate($limit)
      ->appends([
          'limit' => $limit
      ]);

$this->data['search'] =$search;
$this->data['add_fund_report'] =$notes;
$this->data['page'] = 'user.fund.fundHistory';
return $this->dashboard_layout();

}





public function SubmitBuyFund(Request $request)
{

    try{
          $validation = Validator::make($request->all(), [
    'amount' => 'required|numeric|min:0',
    'transaction_hash' => 'required',
    'icon_image' => 'max:5000|mimes:jpeg,png,jpg,svg',
]);
  
          if($validation->fails()) {
              Log::info($validation->getMessageBag()->first());
  
              return redirect()->route('user.AddFund')->withErrors($validation->getMessageBag()->first())->withInput();
          }
  
  
          $icon_image = $request->file('icon_image');
          $imageName = time().'.'.$icon_image->extension();
          $request->icon_image->move(public_path('slip/'),$imageName);
  
          $user=Auth::user();
  
                 $data = [
                      'txn_no' =>$request->transaction_hash,
                      'user_id' => $user->id,
                      'user_id_fk' => $user->username,
                      'amount' => $request->amount,
                      'slip' => 'public/slip/'.$imageName,
                      'type' => 'USDT',
                      'bdate' => Date("Y-m-d"),
  
                  ];
                 $payment =  BuyFund::create($data);
  
  
        $notify[] = ['success', 'Fund Request Submited successfully'];
        return redirect()->back()->withNotify($notify);
        }
         catch(\Exception $e){
          Log::info('error here');
          Log::info($e->getMessage());
          print_r($e->getMessage());
          die("hi");
          return  redirect()->route('user.AddFund')->withErrors('error', $e->getMessage())->withInput();
      }
  
  }
  



}
