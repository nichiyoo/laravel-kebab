<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		$products = Product::selectRaw('products.*, SUM(order_items.quantity) as items_count')
			->join('order_items', 'order_items.product_id', '=', 'products.id')
			->join('orders', 'orders.id', '=', 'order_items.order_id')
			->where('orders.outlet_id', auth()->user()->outlet->id)
			->where('orders.created_at', '>=', now()->subDays(30))
			->groupBy('products.id')
			->orderBy('items_count', 'desc')
			->take(10)
			->get();

		$orders = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
			->where('created_at', '>=', now()->subDays(30))
			->where('outlet_id', auth()->user()->outlet->id)
			->groupBy('date')
			->get()
			->pluck('total', 'date')
			->toArray();

		$orders2 = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total')
			->where('created_at', '>=', now()->subDays(30))
			->where('outlet_id', auth()->user()->outlet->id)
			->groupBy('date')
			->get()
			->pluck('total', 'date')
			->toArray();

		$total = [
			'orders' => Order::where('outlet_id', auth()->user()->outlet->id)->count(),
			'sales' => Order::where('outlet_id', auth()->user()->outlet->id)->sum('total'),
		];

		return view('outlets.dashboards.index', [
			'products' => $products,
			'orders' => $orders,
			'orders2' => $orders2,
			'total' => $total,
		]);
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
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
