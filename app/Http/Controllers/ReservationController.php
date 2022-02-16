<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function offer(ReservationRequest $request)
    {
        $reservation = new Reservation();
        $reservation->restaurant_id = $request->restaurant_id;
        $reservation->reservation_date = $request->date;
        $reservation->reservation_time = $request->time;
        $reservation->member = $request->member;

        return view('offer');
    }

    public function complete(ReservationRequest $request)
    {
        // DBへ保存
        $reservation = new Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->restaurant_id = $request->restaurant_id;
        $reservation->reservation_date = $request->date;
        $reservation->reservation_time = $request->time;
        $reservation->member = $request->member;
        $reservation->save();

        return view('complete');
    }
}
