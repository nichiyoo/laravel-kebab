<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$products = Product::latest()->paginate(8);

		return view(
			'outlets.products.index',
			compact('products')
		);
	}

	/**
	 * Add Product to Cart
	 */
	public function add(Product $product)
	{
		$order = session()->get('order');
		if (!$order) {
			$order = [
				$product->id => 1
			];
			session()->put('order', $order);
			return redirect()->back()->with('success', 'Product added to cart successfully!');
		}

		if (isset($order[$product->id])) $order[$product->id] = $order[$product->id] + 1;
		else $order[$product->id] = 1;

		session()->put('order', $order);
		return redirect()->back()->with('success', 'Product added to cart successfully!');
	}

	/**
	 * Remove Product from Cart
	 */
	public function remove(Product $product)
	{
		$order = session()->get('order');

		if (isset($order[$product->id])) {
			if ($order[$product->id] <= 1) unset($order[$product->id]);
			else $order[$product->id] = $order[$product->id] - 1;
		}

		session()->put('order', $order);
		return redirect()->back()->with('success', 'Product removed from cart successfully!');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Product $product)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Product $product)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Product $product)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Product $product)
	{
		//
	}
}
