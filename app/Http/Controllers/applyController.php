<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\applyRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ProductAtribute;

class applyController extends Controller
{
    public function submit(applyRequest $req) {
        
        //dd($req);

        $applyProduct = new Product();
        $category = Category::where('name', '=', $req->switcher)->first();
        $atributes = Attribute::where('category_id', '=', $category->id)->get();
        $applyProduct->category_id = $category->id;
        $applyProduct->sku = $req->input('sku');
        $applyProduct->name = $req->input('name');
        $applyProduct->price = $req->input('price');
        $applyProduct->save();

        foreach($atributes as $atribute){
            //dd($atribute);
            $productAtribute = new ProductAtribute();
            $productAtribute->product_id = $applyProduct->id;
            $productAtribute->atribute = $req->input($atribute->aName);

            if ($req->hidden == 'true')
                $productAtribute->hidden = true;
            else
                $productAtribute->hidden = false;

            $productAtribute->save();
        }

        return redirect()->route('index')->with('success', 'Product added');
    }

    public function allProductData() {
        return view('index', ['productData' => Product::all(), 'atributeData' => ProductAtribute::all()]); 
    }

    public function allCategoryData() {
        return view('apply', ['data' => Category::all(), 'data1' => Attribute::all()]); 
    }
    
    public function addCategoriesData() {
        return view('addCategories');
    }

    public function addAtributesData() {
        return view('addAtributes');
    }

    public function massDelete(Request $req) {
        

        foreach($req->id as $id){
            Product::find($id)->delete();
        }

        return redirect()->route('index')->with('success', 'Products deleted');
    }
}
