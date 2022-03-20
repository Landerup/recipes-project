<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Recipe;
use App\models\Instruction;
use App\models\Ingredient;
use App\models\Pivotrecipeingredient;
use Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::inRandomOrder()->get();
                return view('homepage',
            [
                'recipes' => $recipes
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-recipe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe;

        $recipe->title = request('title');

        $recipe->pic = request('addPic');

        $recipe->cooking_time = request('cookingTime');

        $recipe->user_id = Auth::user()->id;

        $recipe->save();

        $ingredients = $request->ingredient;


        foreach($ingredients as $ingredient_value){

            $ingredientsArray[] = Ingredient::create([
                'ingredient' => $ingredient_value
            ]);
        }


        $recipe->ingredient()->sync([
            $ingredients
        ]);


        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipe', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('edit-recipe', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required',
            'addPic' => 'required',
            'cookingTime' => 'required',
        ]);

        $recipe->title = request('title');

        $recipe->pic = request('addPic');

        $recipe->cooking_time = request('cookingTime');

        $recipe->save();

        return redirect('/profile');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUserRecipe(){
        $recipes = Recipe::where('user_id', Auth::user()->id)->latest()->get();
                return view('profile',
            [
                'recipes' => $recipes
            ]);

    }
}
