<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Recipe;
use App\models\Category;
use Auth;

class CategoryController extends Controller
{
    public function getCategoryList(Category $category, Recipe $recipes){

        $recipes = Recipe::get();

        $category = Category::all();

        $category->categoryRecipe()->withPivot('category_id');

        return view('category',[
            'category' => $category,
            'recipes' => $recipes
        ]);
    }
}
