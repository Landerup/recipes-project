<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Recipe;
use App\models\Instruction;
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

        $instruction = new Instruction;

        $instruction->instruction = request('instructionOne');
        $instruction->recipe_id = $recipe->id;
        $instruction->save();

        $instruction->instruction = request('instructionTwo');
        $instruction->recipe_id = $recipe->id;
        $instruction->save();

        $instruction->instruction = request('instructionThree');
        $instruction->recipe_id = $recipe->id;
        $instruction->save();
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
