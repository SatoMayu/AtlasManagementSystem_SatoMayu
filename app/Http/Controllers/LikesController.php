<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store($post_id)
    {
        Auth::user()->like($post_id);
        return 'ok!';
    }

    public function destroy($post_id)
    {
        Auth::user()->unlike($post_id);
        return 'ok!';
    }
}
// 9/8に追加したコントローラー。必要か不明。
