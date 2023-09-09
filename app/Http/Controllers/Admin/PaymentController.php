<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::latest()->get();
        return view('admin.payment.index', compact('payment'));
    }

    public function create()
    {
        return view('admin.payment.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'payment_name' => 'required|unique:payments|max:200',

            ],
            [
                'payment_name.required' => 'The payment name is required.',
                'payment_name.unique' => 'This payment is already exists.',

            ],
        );

        $payment = new Payment;
        $payment->payment_name = $request->payment_name;
        $payment->save();
        return redirect()->route('payment.index')
            ->with('message', 'Payment added success');
    }

    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('admin.payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->payment_name = $request->payment_name;
        $payment->save();
        return redirect()->route('payment.index')
            ->with('message', 'Payment updated success');


    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('payment.index');


    }
}