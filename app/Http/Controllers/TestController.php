<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        // $values = Test::all();
        // $count = Test::count();
        // $first = Test::findOrFall(1);
        // $where = Test::where('text', '=', 'bbb')->get();

        return view('tests.test'); // viewはLaravelのヘルパ関数 フォルダ名.ファイル名
    }
}
