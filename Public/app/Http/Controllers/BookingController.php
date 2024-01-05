<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\post;
use Midtrans\Snap;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
        return view('booking.index', [
            'post' => post::all()
        ]);

    }

    
    public function invoice()
    {
       
        $booking = booking::all();
              
        return view('booking.Transaksi', [
            'booking' => $booking
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, post $post)
    {
    
        $data = new booking;

        $data->full_name = $request->full_name;
        $data->type = $request->type;
        $data->room_number = $request->room_number;

        $data->check_in = $request->check_in;
        $data->check_out = $request->check_out;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->message = $request->message;

        $checkInDate = Carbon::parse($data->check_in);
        $checkOutDate = Carbon::parse($data->check_out);

        $quantity = $checkInDate->diffInDays($checkOutDate);

        $data->quantity = $quantity;

        $data->price = $request->price;
        $data->room_price = $data->price * $quantity;

        $data->save();


        //Midtrans
        \Midtrans\Config::$serverKey = \config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $data->id,
                'gross_amount' => $data->room_price,
            ),
            'customer_details' => array(
                'first_name' => $data->full_name,
                'last_name' => 'pratama',
                'email' => $data->email,
                'phone' => $data->phone_number,
            ),
        );

        $snapToken = Snap::getSnapToken($params);
        

        $booking = booking::all();
        return view('booking.Transaksi', [
            'booking' => $booking,
            'snapToken' => $snapToken
        ]);
        
    }

    public function callback(Request $request){
        $serverKey = \config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $booking = booking::find($request->order_id);
                $booking->update(['status' => 'paid']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
