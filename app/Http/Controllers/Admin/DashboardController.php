<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$users = [
			'total' => User::count(),
			'week' => User::where('created_at', '>=', now()->subWeek())->count(),
			'month' => User::where('created_at', '>=', now()->subMonth())->count(),
			'archive' => User::onlyTrashed()->count(),
		];


		$products = Product::selectRaw('products.*, SUM(order_items.quantity) as items_count')
			->join('order_items', 'order_items.product_id', '=', 'products.id')
			->join('orders', 'orders.id', '=', 'order_items.order_id')
			->where('orders.created_at', '>=', now()->subDays(30))
			->groupBy('products.id')
			->orderBy('items_count', 'desc')
			->take(10)
			->get();

		$orders = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
			->where('created_at', '>=', now()->subDays(30))
			->groupBy('date')
			->get()
			->pluck('total', 'date')
			->toArray();

		$orders2 = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total')
			->where('created_at', '>=', now()->subDays(30))
			->groupBy('date')
			->get()
			->pluck('total', 'date')
			->toArray();

		$products2 = Product::selectRaw('DATE(created_at) as date, COUNT(*) as total')
			->where('created_at', '>=', now()->subDays(30))
			->groupBy('date')
			->get()
			->pluck('total', 'date')
			->toArray();

		$outlets = Outlet::selectRaw('DATE(created_at) as date, COUNT(*) as total')
			->where('created_at', '>=', now()->subDays(30))
			->groupBy('date')
			->get()
			->pluck('total', 'date')
			->toArray();

		$total = [
			'orders' => Order::count(),
			'sales' => Order::sum('total'),
			'outlets' => Outlet::count(),
			'products' => Product::count(),
		];

		return view('admins.dashboards.index', [
			'users' => $users,
			'products' => $products,
			'products2' => $products2,
			'orders' => $orders,
			'orders2' => $orders2,
			'outlets' => $outlets,
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
