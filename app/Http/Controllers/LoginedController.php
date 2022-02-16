<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class LoginedController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('logined', ['restaurants' => $restaurants]);
    }

    public function result(Request $request)
    {
        $keyword_restaurant_name = $request->restaurant_name;
        $keyword_area_name = $request->input('pref');
        $keyword_genre_name = $request->input('genre');

        $action = $request->get('action', 'return');

        if ($action === 'submit') {

            // 何も指定なしで検索
            if (
                empty($keyword_restaurant_name)
                && empty($keyword_area_name)
                && empty($keyword_genre_name)
            ) {

                $restaurants = Restaurant::all();

                return view('logined')->with('restaurants', $restaurants);

                return redirect('/logined');
            }

            // 名前で検索
            elseif (!empty($keyword_restaurant_name) && empty($keyword_area_name) && empty($keyword_genre_name)) {

                $query = Restaurant::query();
                $restaurants = $query->where('restaurant_name', 'like', '%' . $keyword_restaurant_name . '%')->get();

                return view('logined')->with('restaurants', $restaurants);
            }

            // エリアで検索
            elseif (
                empty($keyword_restaurant_name)
                && !empty($keyword_area_name) && empty($keyword_genre_name)
            ) {

                $query = Restaurant::query();
                $restaurants = $query->where('area_id', 'like', '%' . $keyword_area_name . '%')->get();

                return view('logined')->with('restaurants', $restaurants);
            }

            // ジャンルで検索
            elseif (
                empty($keyword_restaurant_name)
                && empty($keyword_area_name) && !empty($keyword_genre_name)
            ) {

                $query = Restaurant::query();
                $restaurants = $query->where('genre_id', 'like', '%' . $keyword_genre_name . '%')->get();

                return view('logined')->with('restaurants', $restaurants);
            }

            // 名前・エリアで検索
            elseif (!empty($keyword_restaurant_name) && !empty($keyword_area_name) && empty($keyword_genre_name)) {

                $query = Restaurant::query();
                $restaurants = $query->where('restaurant_name', 'like', '%' . $keyword_restaurant_name . '%')->where('area_id', 'like', '%' . $keyword_area_name . '%')->get();

                return view('logined')->with('restaurants', $restaurants);
            }

            // 名前・ジャンルで検索
            elseif (!empty($keyword_restaurant_name) && empty($keyword_area_name) && !empty($keyword_genre_name)) {

                $query = Restaurant::query();
                $restaurants = $query->where('restaurant_name', 'like', '%' . $keyword_restaurant_name . '%')->where('genre_id', 'like', '%' . $keyword_genre_name . '%')->get();

                return view('logined')->with('restaurants', $restaurants);
            }

            // エリア・ジャンルで検索
            elseif (empty($keyword_restaurant_name) && !empty($keyword_area_name) && !empty($keyword_genre_name)) {

                $query = Restaurant::query();
                $restaurants = $query->where('area_id', 'like', '%' . $keyword_area_name . '%')->where('genre_id', 'like', '%' . $keyword_genre_name . '%')->get();

                return view('logined')->with('restaurants', $restaurants);
            }

            // 全てで検索
            elseif (!empty($keyword_restaurant_name) && !empty($keyword_area_name) && !empty($keyword_genre_name)) {

                $query = Restaurant::query();
                $restaurants = $query->where('restaurant_name', 'like', '%' . $keyword_restaurant_name . '%')->where('area_id', 'like', '%' . $keyword_area_name . '%')->where('genre_id', 'like', '%' . $keyword_genre_name . '%')->get();

                return view('logined')->with('restaurants', $restaurants);
            } else {
                return redirect('/logined');
            }
        }
    }
}
