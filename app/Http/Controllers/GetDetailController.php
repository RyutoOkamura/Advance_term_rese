<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class GetDetailController extends Controller
{
    // ログイン前
    public function getdetail($id)
    {
        $restaurant_detail = Restaurant::find($id);

        return view('detail', ['restaurant_detail' => $restaurant_detail]);
    }

    // ログイン後
    public function logined_getdetail($id)
    {
        $restaurant_detail = Restaurant::find($id);

        return view('logined-detail', ['restaurant_detail' => $restaurant_detail]);
    }
}
