<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\applyRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;

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
        foreach($atributes as $atribute){
            //dd($atribute->aName);
            $applyProduct->atribute = $req->input($atribute->aName);
        }

        /*if ($req->switcher == 'disc')
            $applyProduct->atribute = $req->input('disc');
         
        if ($req->switcher == 'book')
            $applyProduct->atribute = $req->input('book');

        if ($req->switcher == 'furniture')
            $applyProduct->atribute = $req->input('height').'x'.$req->input('width').'x'.$req->input('lenght');*/

        $applyProduct->save();

        return redirect()->route('index')->with('success', 'Product added');
    }

    public function allProductData() {
        return view('index', ['data' => Product::all()]); 
    }

    public function allCategoryData() {
        return view('apply', ['data' => Category::all(), 'data1' => Attribute::all()]); 
    }



    public function massDelete(Request $req) {
        

        foreach($req->id as $id){
            Product::find($id)->delete();
        }

        return redirect()->route('index')->with('success', 'Products deleted');
    }
}
