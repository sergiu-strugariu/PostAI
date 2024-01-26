<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MiniShop;
use App\Models\MiniShopOrders;
use App\Models\ShortURL;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        session()->flash('flash.banner', 'Admin: Go back to ');

        $users = count(User::all());
        $orders = count(MiniShopOrders::all());
        $companies = count(Team::all());
        $links = count(ShortURL::all());

        $ordersDelivered = count(MiniShopOrders::where('status', 'Delivered')->get());
        $ordersProccesing = count(MiniShopOrders::where('status', 'Processing')->get());
        $ordersOnHold = count(MiniShopOrders::where('status', 'On Hold')->get());
        
        $ordersDeliveredRevenue = $this->getOrdersDeliveredRevenue();
        $ordersRevenue = $this->getAllOrdersRevenue();

        return Inertia::render('AdminDashboard/Dashboard', [
            'users' => $users,
            'orders' => $orders,
            'companies' => $companies,
            'links' => $links,

            'ordersDelivered' => $ordersDelivered,
            'ordersProccesing' => $ordersProccesing,
            'ordersOnHold' => $ordersOnHold,

            
            'ordersDeliveredRevenue' => $ordersDeliveredRevenue,
            'ordersRevenue' => $ordersRevenue,
        ]);
    }

    public function minishopPricing()
    {
        $minishop = MiniShop::first();
        $likes = $minishop->likes_price;
        $comments = $minishop->comments_price;
        $shares = $minishop->shares_price;
        $saved = $minishop->saves_price;

        return Inertia::render('AdminDashboard/Pages/MiniShop', [
            'likes_price' => $likes,
            'comments_price' => $comments,
            'shares_price' => $shares,
            'saves_price' => $saved,
        ]);
    }

    public function minishopOrders()
    {
        $orders = MiniShopOrders::all();
        return Inertia::render('AdminDashboard/Pages/Orders', [
            'orders' => $orders
        ]);
    }

    public function minishopOrdersStore(Request $request)
    {

        dd($request->all());
        $order = MiniShopOrders::where('id', $request->order_id)->first();
        $order->status = $request->status;
        $order->save();

        session()->flash('flash.banner', 'The order has been updated successfully.');
        return redirect()->back();
    }

    public function minishopStorePricing(Request $request)
    {
        $minishop = MiniShop::first();

        if ($request->likes_price !== null) {
            $minishop->likes_price = $request->likes_price;
        }

        if ($request->comments_price !== null) {
            $minishop->comments_price = $request->comments_price;
        }

        if ($request->shares_price !== null) {
            $minishop->shares_price = $request->shares_price;
        }

        if ($request->saves_price !== null) {
            $minishop->saves_price = $request->saves_price;
        }

        $minishop->save();

        session()->flash('flash.banner', 'Prices has been updated succesfully!');
        return redirect()->back();
    }

    public function getAllOrdersRevenue()
    {
        $ordersRevenue = MiniShopOrders::all();

        $totalRevenue = 0;

        foreach ($ordersRevenue as $order) {
            $totalRevenue += $order->total;
        }

        return $this->formatNumber($totalRevenue);
    }

    public function getOrdersDeliveredRevenue()
    {
        $ordersRevenue = MiniShopOrders::where('status', 'Delivered')->get();

        $totalRevenue = 0;

        foreach ($ordersRevenue as $order) {
            $totalRevenue += $order->total;
        }

        return $this->formatNumber($totalRevenue);
    }

    public function formatNumber($number)
    {
        $suffix = '';
        $absNumber = abs($number);

        if ($absNumber >= 1e9) {
            $formattedNumber = round($number / 1e9, 1);
            $suffix = 'B';
        } elseif ($absNumber >= 1e6) {
            $formattedNumber = round($number / 1e6, 1);
            $suffix = 'M';
        } elseif ($absNumber >= 1e3) {
            $formattedNumber = round($number / 1e3, 1);
            $suffix = 'K';
        } else {
            $formattedNumber = $number;
        }

        return $formattedNumber . $suffix;
    }
}
