<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Course;
use App\Models\MethodPay;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function showPlans()
    {
        return view('plans', [
            'plans' => Plan::all(),
            'courses' => Course::all()
        ]);

        /*
            SELECT * FROM `plans`;
            SELECT * FROM `courses`;
        */
    }

    public function setUpTransaction($id)
    {
        return view('detail', [
            'plan' => Plan::findOrFail($id),
            'methodPays' => MethodPay::all(),
        ]);

        /*
            SELECT * FROM `plans` WHERE `plans`.`id` = '1' LIMIT 1;
            SELECT * FROM `method_pays
        */
    }

    public function makeTransaction(Request $request){

        Transaction::create($request->all());
        /*
            INSERT INTO `transactions` (`method_pay_id`, `plan_id`, `user_id`, `updated_at`, `created_at`) 
                VALUES ( $request->method_pay_id, 
                         $request->plan_id, 
                         $request->user_id, 
                         now(), 
                         now()
                        );
        */
        
        return redirect('/paket-belajar/history')->with('success', "Pesanan paket belajar telah dibuat, silahkan selesaikan pembayaran!");
    }


    public function showHistory()
    {
        
        return view('history', [
            'transcs' => Transaction::all()
            /*
                SELECT * FROM `transaction`;
            */
        ]);
    }



    public function updatePay(Request $request, Transaction $trans)
    {        
        
        
        $validated = $request->validate([
            'proof_of_payment' => 'required|image|file|max:1024',
        ]);

        if($request->file('proof_of_payment')) {
            $validated['proof_of_payment'] = $request->file('proof_of_payment')->store('payment_images');
        }
        
        $trans->update([
            'proof_of_payment' => $validated['proof_of_payment']
        ]);

        /*
            $trans didapat dari route model binding
            SELECT * FROM transactions WHERE id = {trans} -> id yang diberi lewat URI

            Query Update :
            UPDATE transaction SET proof_of_payment = $validated['proof_of_payment] WHERE id = {trans} -> id yang diberi lewat URI
         */

        
        return redirect('/paket-belajar/history');
    }



    public function editPay(Transaction $trans)
    {
        /*
         * Menggunakan Route Model Binding
         * 
         * SELECT * FROM transactions WHERE id = {trans} ---> dari URI
         *
         */
        
        return view('uploadpay', [
            'transaction' => $trans
        ]);
    }
}
