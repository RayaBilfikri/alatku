<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about()
    {
        return view('aboutus');
    }

    public function howToBuy()
    {
        return view('howtobuy');
    }

    public function article()
    {
        return view('article');
    }
}
