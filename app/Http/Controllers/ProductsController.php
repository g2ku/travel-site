<?php

namespace App\Http\Controllers;

use App\Http\Form\ProductForm;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $products = Product::all();
        return view('products.create', compact('products'));
    }

    public function search()
    {
        $tags = \App\Models\Tag::all();
        $products = Product::all();
        return view('products.search', compact('tags','products'));
    }

    public function filterProducts(Request $request)
    {
        $tagIds = $request->input('tags');

        if (!empty($tagIds)) {
            $products = Product::whereHas('tags', function ($query) use ($tagIds) {
                $query->whereIn('tags.id', $tagIds);
            })->get();
        } else {
            $products = Product::all();
        }

        return view('products.search_results', compact('products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $product = new Product();

        $product->name = $request->input('name');
        $product->products = $request->input('products');
        $product->tag = $request->input('tag');
        $product->phone = $request->input('phone');

        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View|Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View|Response
     */


}
