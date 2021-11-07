<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    public function store(Request $request)
    {

        try {
            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->save();
            return redirect()->back()->with('message', 'Added Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error!' . $e);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit')->with('product', $product);
    }

    public function update($id, Request $request)
    {

        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->save();
            return redirect()->back()->with('message', 'Updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error!' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            return redirect()->back()->with('message', 'Deleted Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error!' . $e);
        }
    }
}
