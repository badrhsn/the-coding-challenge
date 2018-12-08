<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function getDashboard(){

        if (Auth::check()){

            $shops = $this->displayShops();
            return view('dashboard',['shops'=>$shops]);

        }
        return redirect()->back();
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('welcome');
    }


    public function displayShops(){

        $shopsThatLikedId = DB::table('likes')->where([
            ['user_id','=',Auth::user()->id],
            ['like','=',1],
        ])->pluck('shop_id');

        $shopsExceptThatAlreadyLiked = DB::table('shops')->whereNotIn('id',$shopsThatLikedId)->get();

        return $shopsExceptThatAlreadyLiked;
    }
}
