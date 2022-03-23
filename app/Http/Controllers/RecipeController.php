<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Recipe;
use App\models\Instruction;
use App\models\Ingredient;
use App\models\Category;
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
        $recipes = Recipe::inRandomOrder()->take(10)->get();
        return view(
            'homepage',
            [
                'recipes' => $recipes
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-recipe', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cookingTime' => 'required|integer',
            'addPic' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'instruction' => 'required',
            'instruction.*' => 'required',
            'ingredient' => 'required|array',
            'ingredient.*' => 'required',
            'category' => 'required|array',
            'category.*' => 'required'

        ]);

        $recipe = new Recipe;

        $recipe->title = request('title');

        $recipe->cooking_time = request('cookingTime');

        $recipe->user_id = Auth::user()->id;

        if(!($request->file('addPic'))){
            $recipe->pic = 'nopic.jpg';
            $recipe->save();
        } else{
            $fileName = $request->file('addPic')->getClientOriginalName();
            $request->file('addPic')->move(public_path('customLink'),date('YmdHi').$fileName);

            $recipe->pic = date('YmdHi').$fileName;
            $recipe->save();
        }


        foreach ($request->ingredient as $ingredient_value) {
            $ingredient = Ingredient::firstOrCreate(
                [
                    'ingredient' => $ingredient_value
                ]);

                $recipe->ingredient()->attach($ingredient->id);
        }




        $categories = $request->category;

        foreach ($categories as $category_value) {
            $category = Category::firstOrCreate(
                [
                    'category_name' => $category_value
                ]);

                $recipeCategory[] = $category->id;

        }

        $recipe->category()->attach($recipeCategory);

        $instruction = new Instruction;

        $instruction->recipe_id = $recipe->id;

        $instruction->instruction = request('instruction');


        $instruction->save();

        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe, Instruction $instructions)
    {
        $instructions = Instruction::where('recipe_id', $recipe->id)->get();

        return view('recipe', [
            'recipe' => $recipe,
            'instructions' => $instructions
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
            'cookingTime' => 'required',
            'addPic' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $recipe->title = request('title');

        $recipe->cooking_time = request('cookingTime');

        if(!($request->file('addPic'))){
            $recipe->pic = $recipe->pic;
            $recipe->save();
        } else{
            $fileName = $request->file('addPic')->getClientOriginalName();
            $request->file('addPic')->move(public_path('customLink'),date('YmdHi').$fileName);

            $recipe->pic = date('YmdHi').$fileName;
            $recipe->save();
        }



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
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect('/profile');
    }

    public function getUserRecipe()
    {
        $recipes = Recipe::where('user_id', Auth::user()->id)->latest()->get();
        return view(
            'profile',
            [
                'recipes' => $recipes
            ]
        );
    }
}
