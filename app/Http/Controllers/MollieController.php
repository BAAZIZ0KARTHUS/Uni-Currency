<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use App\Models\User;
use App\Models\Userpayments;

class MollieController extends Controller
{
    //
    public function pay(Request $request)
    {
        
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'gateway' => 'required|string',
            'currency' => 'required|string',
            'value' => 'required|string',
            'note' => 'sometimes'
        ]);

        $name = $fields['name'];
        $email = $fields['email'];
        $gateway = $fields['gateway'];
        $currency = $fields['currency'];
        $value = $fields['value'];
        $note = $fields['note'];

        $user = User::where('email', '=', $fields['email'])->first();
        if(!$user)
        {
            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email']
            ]);
        }

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => $currency,
                "value" => $value // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "method"=>$gateway,//creditcard
            "redirectUrl" => route('order.success'),
            "description" => "Payment by " . $name,
            "webhookUrl" => 'https://12700.eu-1.sharedwithexpose.com/webhooks/mollie',
            "metadata"=>[
                "consumerNote"=> "".$note,
                "consumerId"=>$user->id,
                "consumerName"=>$user->name,
                "consumerAccount"=>$user->email,
            ]
        ]);

        $fee = '';
        $gtwy = '';
        switch ($gateway) {
            case 'creditcard':
                $fee = '€' . (($value * 0.018)+0.25) . ' = €0.25 + 1.8% ';
                $gtwy = 'Credi Card';
                break;
            
            case 'paypal':
                $fee = '€0.10 + PayPal fees';
                $gtwy = 'PayPal';
                break;
        }
        
        // redirect customer to Mollie checkout page
        return view('summary', ['data'=>['name'=>$name, 'fee'=> $fee, 'value'=>$value.' '.$currency, 'gateway'=>$gtwy, 'url'=>$payment->getCheckoutUrl()]]);
        //return redirect($payment->getCheckoutUrl(), 303);

    }
    public function webhook(Request $request) {
        if (! $request->has('id')) {
            return;
        }
    
        
        $payment = Mollie::api()->payments()->get($request->id);
        
        $userp = new Userpayments();
        $userp->payment_id = $request->id; 
        $userp->note = $payment->metadata->consumerNote; 
        $userp->amount = $payment->amount->value; 
        $userp->currency = $payment->amount->currency; 
        $userp->method = $payment->method; 
        $userp->status = $payment->status; 
        $userp->user_id = $payment->metadata->consumerId;
        $userp->save();

        //dd($payment);
    }
}
