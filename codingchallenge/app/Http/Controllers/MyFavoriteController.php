<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyFavoriteController extends Controller
{
    //

    public function getIndex(){

        $shops = $this->displayLikeShops();
        return view('myfavorite',['shops'=>$shops]);
    }

    public function displayLikeShops(){

        $shopsid = DB::table('likes')->where([
            ['user_id','=',Auth::user()->id],
            ['like','=',1]
        ])->pluck('shop_id');

        $shops = DB::table('shops')->whereIn('id',$shopsid)->get();

        return $shops;
    }
}
