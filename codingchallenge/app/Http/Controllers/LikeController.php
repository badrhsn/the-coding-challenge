<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    //

    public function setLike(Request $request){

        $like = new Like();

        $like->shop_id = $request['shopId'];
        $like->user_id = $request['userId'];
        if($request['isLike']) {
            $like->like = 1;
        }else{
            $like->like =0;
        }

        $like->save();

        return response()->json('');
    }

    public function remove(Request $request){

        DB::table('likes')->where([
            ['shop_id','=',$request['shopId']],
            ['like','=',1],
            ['user_id','=',$request['userId']]])->delete();

        return response()->json('u have been removed it from your favorites');
    }
}
