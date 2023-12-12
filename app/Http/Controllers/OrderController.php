<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Carbon\Carbon;
use PhpParser\Node\Expr\New_;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan list yang order dari users yang login
        $orders = Order::with(['OrderDetail', 'User'])->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {

        $orderFirst = Order::orderBy('id_orders', 'desc')->first();
        $noOrder = $orderFirst['id_orders'];

        if ($orderFirst == null) {
            $noOrder = 1;
            $newNoOrder = Carbon::now()->format('Ymd') . str_pad($noOrder, 3, '0', STR_PAD_LEFT);
        } else {
            $newNoOrder = Carbon::now()->format('Ymd') . str_pad($noOrder, 3, '0', STR_PAD_LEFT);
        }


        $order = new Order();
        $order->user_id = $request->user_id;
        $order->no_order = $newNoOrder;
        $order->bayar = 0;
        $order->total_bayar = 0;
        $order->status = 'Proses';
        $order->save();

        $order_id = $order->id;

        return redirect()->route('client.index')->with('success', 'Order successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
