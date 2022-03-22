<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Recipe;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recipes = Recipe::inRandomOrder()->take(10)->get();
        return view('homepage',
    [
        'recipes' => $recipes
    ]);
    }
}
