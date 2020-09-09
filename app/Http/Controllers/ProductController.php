<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    //
    public function create(Request $request)
    {
        return view('product.create');
    }

    public function show(Request $request)
    {

        $perPage = $request->has('perPage') ? $request->input('perPage') : 10;
        \View::share('page_size', $perPage);
        $index = $request->input('page');
        \View::share('page_id', $index);
        $products = Product::take($perPage)->offset($perPage * ($index - 1))->get();
        $numberOfProducts = Product::count();
        $lastPage = $numberOfProducts / $perPage;

        return view('admin', [
            'pages' => $lastPage,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'amount' => 'required'
        ]);

        Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'amount' => $request->input('amount')
        ]);

        return redirect(route('admin'));
    }

    public function edit($id)
    {
        //find product in store
        $product = Product::find($id);

        return view('product.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'amount' => 'required'
        ]);

        $product = Product::find($id);

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->amount = $request->input('amount');

        $product->save();

        return redirect(route('admin'));
    }

    public function delete($id)
    {
        
        $product = Product::find($id);
        $product->forceDelete();
        return redirect(route('admin'));
    }
}
