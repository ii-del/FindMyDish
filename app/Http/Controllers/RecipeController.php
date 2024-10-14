<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use App\Http\Requests\RecipeRequest;

class RecipeController extends Controller
{
    public function index(Recipe $recipe)
    {
        // 全てのレシピを取得し、各レシピに関連する材料と手順も一緒に取得
        //$recipes = $recipe->with(['ingredients', 'steps'])->get();
        
        return view('recipes.index')->with(['recipes' => $recipe->get()]);
    }

    
    public function create()
    {
        return view('recipes.create');
    }
    
    public function store(Request $request, Recipe $recipe, Ingredient $ingredient, Step $step)
    {
        $input_recipe = $request['recipe'];
        $input_recipe['user_id'] = Auth::id();
        $recipe->fill($input_recipe)->save();
        
        // 手順
        foreach($request['step'] as $number => $input_step){
            $input_step['recipe_id'] = $recipe->id;
            $newStep = new Step();
            $newStep->fill($input_step)->save();
        }
        
        // 材料
        foreach($request['ingredient'] as $number => $input_ingredient){
            $input_ingredient['recipe_id'] = $recipe->id;
            $newIngredient = new Ingredient();
            $newIngredient->fill($input_ingredient)->save();
        }
        
        return redirect('/recipes');
    }
    
    public function show(Recipe $recipe)
    {
        
        return view('recipes.show')->with(['recipe' => $recipe]);
    }

    
    public function store_img(Request $request)
    {
        $user = new User;

        // name属性が'thumbnail'のinputタグをファイル形式に、画像をpublic/avatarに保存
        $image_path = $request->file('thumbnail')->store('public/avatar/');

        // 上記処理にて保存した画像に名前を付け、userテーブルのthumbnailカラムに、格納
        $user->thumbnail = basename($image_path);

        $user->save();

        return redirect()->route('任意のビュー');
    }
    
    public function index_img()
    {
      $user = User::all();
    
      return view('任意のビュー', $user);
    }

}
