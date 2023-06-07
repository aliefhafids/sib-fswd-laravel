<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    public function index(){
        $product = Product::get();
        return response()->json([
            'status' => '200',
            'message' => 'Success',
            'data' => $product
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'slug' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::create($validatedData);

        return response()->json([
            'status' => '200',
            'message' => 'Success',
            'data' => $product
        ]);
    }
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::where('id', $product->id)
        ->update($validatedData);

        return response()->json([
            'status' => '200',
            'message' => 'Success',
            'data' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        if($product->image){
            Storage::delete($product->image);
        }
    Product::destroy($product->id);
    return response()->json([
        'status' => '200',
        'message' => 'Success',
        'data' => $product
    ]);
    }

}
