<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Repository\CheetahPay;
use Paystack;
use App\Models\Ticket;
use App\Models\Payment;

class PaymentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        $subjects = $request->subjects;
        return view('pay_proceed', compact('subjects'));
    }

    protected function startQuiz($subjects, $quiz_type, $token = 'wallet'){
        Ticket::create([
            'token' => $token,
            'user_id' => auth()->user()->id,
            'is_valid' => true,
        ]);
        return (new QuizController)->create($subjects, $quiz_type);
    }

    public function redirectToGateway(Request $request, $method  = 'paystack')
    {
        if (!strtolower($method == 'cheetahpay')) {
            $request->request->set('email', auth()->user()->email);
            $request->request->set('amount', (int)$request->amount * 100);
            $request->request->set('reference', Paystack::genTranxRef());
            $request->request->set('key', config('paystack.secretKey'));
            $request->request->set('quantity', 1);
            return Paystack::getAuthorizationUrl()->redirectNow();
        } else {
            $cheetahPay = new CheetahPay(getenv('CHEETAHPAY_PRIVATE_KEY'), getenv('CHEETAHPAY_PUBLIC_KEY'));
            // $response = $cheetahPay->pinDeposit($request->pin, $request->amount, $request->network, auth()->user()->user . uniqid(), auth()->user()->phone);
            $response = $cheetahPay->pinDeposit('1111222233334444', '100', 'MTN', auth()->user()->username . uniqid(), '08133230475');
            // dd($response);
            if ($response['success'] == true) {
                // dd($response['message'] . 'gdgddhdhd');
                Payment::create([
                    'reference' => $response['reference'],
                    'user_id' => auth()->user()->id,
                    'method' => 'cheetahpay',
                    'amount' => $request->amount
                ]);
                auth()->user()->wallet += (int)$request->amount();
                auth()->user()->save();
                return redirect(route('select_quiz'))->with('success', 'Deposit successful!');
            } else {
                return back()->with('error', $response['message']);
            }
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallbackCheetahPay(Request $request)
    {
        $amount = (int)$request->amount;
        if($request->status == 'credited'){
            Payment::create([
                'reference' => $request->reference,
                'user_id' => auth()->user()->id,
                'method' => 'cheetahpay',
                'amount' => $amount
            ]);
            auth()->user()->wallet += $amount;
            auth()->user()->save();
            return redirect(route('dashboard'))->with('success', 'Deposit successful!');
        } else {
            return view('deposit')->with('error', 'Payment unsuccessful, Try again!');
        }
    }
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $amount = (int)$paymentDetails['data']['amount'] / 100;
        if($paymentDetails['data']['status'] == 'success'){
            Payment::create([
                'reference' => $paymentDetails['data']['reference'],
                'user_id' => auth()->user()->id,
                'method' => 'paystack',
                'amount' => $amount
            ]);
            auth()->user()->wallet += $amount;
            auth()->user()->save();
            return redirect(route('dashboard'))->with('success', 'Deposit successful!');
        } else {
            return view('deposit')->with('error', 'Payment unsuccessful, Try again!');
        }
    }

    public function deposit()
    {
        return view('deposit');
    }
}
