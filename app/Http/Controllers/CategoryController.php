<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Recipe;
use App\models\Category;
use Auth;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::orderBy('category_name')->get();

        return view('category',
            [
                'categories' => $categories
            ]
        );
    }

    public function show($category){

        $category = Category::where('category_name', $category)->get();

        return view('show-category',[
            'category' => $category
        ]);
    }
}
