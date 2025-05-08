<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Carousel;


class WelcomeController extends Controller{
     
    public function index()
    {
        $carouselItem = Carousel::All();
        // dd($carousel);
    return view('welcome', compact('carouselItem'));
    }

}