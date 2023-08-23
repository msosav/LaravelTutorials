<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        if (Product::find($id) != null) {
            $viewData = [];
            $product = Product::find($id);
            $viewData['title'] = $product['name'].' - Online Store';
            $viewData['subtitle'] = $product['name'].' - Product information';
            $viewData['product'] = $product;

            return view('product.show')->with('viewData', $viewData);
        } else {
            return redirect()->route('home.index');
        }
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Product created';
        $viewData['subtitle'] = 'Product created successfully';
        $viewData['name'] = $request->input('name');
        $viewData['price'] = $request->input('price');
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);

        //return view('product.saved')->with('viewData', $viewData);

        Product::create($request->only(['name', 'price']));

        return back();
    }
}
