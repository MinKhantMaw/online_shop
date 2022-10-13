<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function product()
    {
        $product = Product::all();
        return view('admin.product', compact('product'));
    }
    //    create product
    public function createProduct()
    {
        return view('admin.create-product');
    }
    //    store product
    public function upload(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = new Product;
        $image = $request->file('image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->move(public_path() . '/image/', $imageName);
        $product->image = $imageName;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->route('product')->with('success', 'Product added successfully');
    }

    // edit product
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit-product', compact('product'));
    }
    // update product
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $product = Product::find($id);
        $image = $request->file('image');
        if ($image) {
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/image/', $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->route('product')->with('success', 'Product updated successfully');
    }

    public function details($id)
    {
        $productDetail = Product::find($id);
        return view('admin.product-detail', compact('productDetail'));
    }

    // delete product
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    // search product
    public function search(Request $request)
    {

        $search = $request->search;
        $product = Product::where('name', 'like', '%' . $search . '%')->paginate(3);
        $search->appends($request->all());
        return view('frontend.home', compact('product'));
    }
}
