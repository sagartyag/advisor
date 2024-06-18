<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fundtransfer;
use App\Models\BuyFund;
use App\Models\Bank;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Hexters\CoinPayment\CoinPayment;
use App\Models\CoinpaymentTransaction;
use Hash;
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

  
// public function fundtransfer(Request $request)
// {

// $this->data['page'] = 'user.fund.fundtransfer';
// return $this->dashboard_layout();
// }

public function fundtransfer(Request $request)
{
    

    $user = Auth::user();
    // Fetch fund transfers where transfer_id matches the authenticated user's ID
    $fund_transfers = Fundtransfer::where('transfer_id', $user->id)->paginate(5); // Using pagination
    $this->data['fund_transfers'] = $fund_transfers;
    $this->data['page'] = 'user.fund.fundtransfer';
    return $this->dashboard_layout();
    
}


public function submittransfer(Request $request)
{
    try {
        $validation = Validator::make($request->all(), [
            'amount' => 'required|min:0',
            'username' => 'required|exists:users,username',
            'tpassword' => 'required',
            'wallet' => 'required|in:1,2',
        ]);

        if ($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
            return redirect()->route('user.fundtransfer')->withErrors($validation->getMessageBag()->first())->withInput();
        }

        $user = Auth::user();
        $user_detail = User::where('username', $request->username)->orderBy('id', 'desc')->limit(1)->first();
        $password = $request->tpassword;
        $amount = $request->amount;
        // $charge = $amount * 5 / 100;
        // $netAmt = $amount - $charge;

        $available_balance = Auth::user()->available_balance();
        $FundBalance = Auth::user()->FundBalance();

        if (Hash::check($password, $user->tpassword)) {
            $sufficientBalance = false;

            if ($request->wallet == '1') {
                $sufficientBalance = $available_balance >= $amount;
            } elseif ($request->wallet == '2') {
                $sufficientBalance = $FundBalance >= $amount;
            }

            if ($sufficientBalance) {
                $data = [
                    'transfer_id' => $user->id,
                    'transfered_id' => $user_detail->id,
                    'user_id_from' => $user->username,
                    'user_id_to' => $user_detail->username,
                    'amount' => $amount,
                    'from_wallet' => $request->wallet,
                    'transfer_date' => date("Y-m-d"),
                ];
                $payment = Fundtransfer::create($data);

                $notify[] = ['success', $user_detail->username . ' Fund Transfer Submitted successfully'];
                return redirect()->route('user.fundtransfer')->withNotify($notify);
            } else {
                return Redirect::back()->withErrors(['Insufficient Balance in Selected Wallet']);
            }
        } else {
            return Redirect::back()->withErrors(['Invalid Transaction Password']);
        }
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->route('user.fundtransfer')->withErrors(['error' => $e->getMessage()])->withInput();
    }
}



}

