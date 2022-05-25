<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Subscription;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        return view('dashboard.transactions.index', [
            'transactions' => Transaction::all()
        ]);
    }

    public function needverif()
    {
        $result = Transaction::where('paid_status', NULL)
                             ->whereNotNull('proof_of_payment')
                             ->get();

        return view('dashboard.transactions.verif', [
            'transactions' => $result
        ]);
    }

    public function verify(Request $request, Transaction $trans)
    {
        
        if($request && $request->status === "pass"){
            $result = $trans->update([
                'paid_status' => 'success',
                'paid_at' => now(),
                'admin_id' => mt_rand(1, 5), //perlu id amdmin
            ]);
            
            $time = explode(" ", $trans->plan->duration);

            if($result){
                Subscription::create([
                    'user_id' => $trans->user_id,
                    'plan_id' => $trans->plan_id,
                    'transaction_id' => $trans->id,
                    'end_at' => now()->add($time[0], $time[1]),
                    'status' => 'active'
                ]);

                return redirect('/dashboard/transaksi')->with('success', "Transaksi telah berhasil di update");
            }
    }
}
}