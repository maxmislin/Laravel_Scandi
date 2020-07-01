<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\applyRequest;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\addAtributeRequest;
use App\Http\Requests\deleteRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Atribute;
use App\Models\ProductAtribute;
use Illuminate\Support\Facades\Validator;

class applyController extends Controller
{
    public function submit(applyRequest $req) {
        
        $applyProduct = new Product();
        $category = Category::where('name', '=', $req->switcher)->first();
        $atributes = Atribute::where('category_id', '=', $category->id)->get();

        foreach($atributes as $atribute){
            $atribute->aName = str_replace(" ","_",$atribute->aName);
        }

        $rules = array();

        foreach($atributes as $atribute){
            $rules[$atribute->aName] = "";
            if ($atribute->required)
                $rules[$atribute->aName] = $rules[$atribute->aName].'|required';
            if ($atribute->numeric)
                $rules[$atribute->aName] = $rules[$atribute->aName].'|numeric';   
            if ($atribute->unique)
                $rules[$atribute->aName] = $rules[$atribute->aName].'|unique:App\Models\ProductAtribute,atribute,'.$atribute->aName;
            if ($atribute->min)
                $rules[$atribute->aName] = $rules[$atribute->aName].'|min:'.$atribute->min;
            if ($atribute->max)
                $rules[$atribute->aName] = $rules[$atribute->aName].'|max:'.$atribute->max;         
        }    

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return redirect('apply')
                        ->withErrors($validator)
                        ->withInput();
        }

        $applyProduct->category_id = $category->id;
        $applyProduct->sku = $req->input('sku');
        $applyProduct->name = $req->input('name');
        $applyProduct->price = $req->input('price');
        $applyProduct->save();

        foreach($atributes as $atribute){
            $productAtribute = new ProductAtribute();
            $productAtribute->product_id = $applyProduct->id;
            $productAtribute->atribute = $req->input($atribute->aName);
            $atribute->aName = str_replace("_"," ",$atribute->aName);
            $productAtribute->aName = $atribute->aName;
            $productAtribute->units = $atribute->units;

            if ($req->hidden == 'true')
                $productAtribute->hidden = true;
            else
                $productAtribute->hidden = false;

            $productAtribute->save();
        }

        return redirect()->route('index')->with('success', 'Product added');
    }

    public function submitCategories(addCategoryRequest $req) {
        
        $addCategory = new Category();
        $addCategory->name = $req->input('name');
        $addCategory->save();

        return redirect()->route('index')->with('success', 'Category added');
    }

    public function submitAtributes(addAtributeRequest $req) {

        $addAtribute = new Atribute();
        $category = Category::where('name', '=', $req->switcher)->first();
        $addAtribute->category_id = $category->id;
        $addAtribute->aName = $req->input('name');
        $addAtribute->units = $req->input('units');

        if ($req->required == 'true')
            $addAtribute->required = true;
        else
            $addAtribute->required = false;

        if ($req->numeric == 'true')
            $addAtribute->numeric = true;
        else
            $addAtribute->numeric = false;
            
        if ($req->unique == 'true')
            $addAtribute->unique = true;
        else
            $addAtribute->unique = false;    
        
        $addAtribute->min = $req->input('min');
        $addAtribute->max = $req->input('max');

        $addAtribute->save();

        return redirect()->route('index')->with('success', 'Attribute added');
    }

    public function allProductData() {
        return view('index', ['productData' => Product::all(), 'atributeData' => ProductAtribute::all()]); 
    }

    public function allCategoryData() {
        return view('apply', ['categoryData' => Category::all(), 'atributeData' => Atribute::all()]); 
    }
    
    public function addCategoriesData() {
        return view('addCategories');
    }

    public function addAtributesData() {
        return view('addAtributes', ['data' => Category::all()]);
    }

    public function massDelete(deleteRequest $req) {
        

        foreach($req->id as $id){
            Product::find($id)->delete();
        }

        return redirect()->route('index')->with('success', 'Products deleted');
    }
}
