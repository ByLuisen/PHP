<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Postdaw2Controller extends Controller
{
    // Si tuvieramos solo un método se usaría __invoke
    // public function __invoke()
    // {
    //     $posts = [
    //         ['title' => '1r Post'],
    //         ['title' => '2n Post'],
    //         ['title' => '3r Post'],
    //         ['title' => '4r Post'],
    //         ['title' => '5th Post'],
    //     ];
    //     return view('welcomeDaw2.blog', ['posts' => $posts]);
    // }

    public function index()
    {
        $posts = [
            ['title' => '1r Post'],
            ['title' => '2n Post'],
            ['title' => '3r Post'],
            ['title' => '4r Post'],
            ['title' => '5th Post'],
        ];
        return view('welcomeDaw2.blog', ['posts' => $posts]);
    }
}
