<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Validator;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $outlet = null;
        if($request->has('outlet_id')){
            $outlet = Outlet::findOrFail($request->outlet_id);
        }
        $products = Product::all();
        return view('transactions.create', compact('outlet', 'products'));
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $rules = [
            'customer_phone' => 'required|exists:customers,phone',
            'outlet_id' => 'required|exists:outlets,id',
            'product_id' => 'required|exists:products,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        $customer = Customer::where('phone', $request->customer_phone)->first();
        $product = Product::find($request->product_id)->first();
        $vat = $product->price * (11/100);
        $total = $product->price + $vat;
        Transaction::create([
            'user_id' => Auth::user()->id,
            'customer_id' => $customer->id,
            'outlet_id' => $request->outlet_id,
            'product_id' => $request->product_id,
            'status' => 'pending',
            'vat_fee' => $vat,
            'total_price' => $total
        ]);
        return redirect()->route('outlets.show',$request->outlet_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transaction = Transaction::find($transaction->id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $rules = [
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        if($transaction->status === 'done' && $request->status !== 'done' && $transaction->done_at !== ''){
            $transaction->done_at = null;
            $transaction->late_fee = 0;
        }
        if ($request->status === 'done') {
            $transaction->done_at = now();
        }
        $transaction->status = $request->status;
        $transaction->save();
        return redirect()->route('outlets.show', $transaction->outlet->id);
    }
    public function pickup($id){
        $transaction = Transaction::findOrFail($id);
        $transaction->picked_up = !$transaction->picked_up;
        $transaction->save();
        return redirect()->route('outlets.show',$transaction->outlet->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('outlets.show', $transaction->outlet_id);
    }
}
