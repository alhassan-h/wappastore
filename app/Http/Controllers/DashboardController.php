<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request)
    {
        $user = $request->user();
        
        if( $user->isAdmin() )
             return $this->adminDashbaord();

        return $this->customerDashbaord($user);

    }

    public function adminDashbaord()
    {

        // dd(idate('n'));
        $montly_sales_data = [];
        $montly_orders_data = [];

        // dd(sprintf('%02d', 8));
        
        for ($month=1; $month <= idate('n'); $month++) {
            $month = sprintf('%02d', $month);
            $montly_sales_data[] = Order::getMonthSales($month);
            $montly_orders_data[] = Order::getMonthOrders($month);
        }

        $montly_sales_data = implode(', ', $montly_sales_data);
        $montly_orders_data = implode(', ', $montly_orders_data);

        $this_month = idate('n');
        $last_month = $this_month - 1;

        // sales
        $last_month_sales = Order::getMonthSales($last_month);
        $this_month_sales = Order::getMonthSales($this_month);
        $sales_increase = (($this_month_sales - $last_month_sales) > 0)?
            ($this_month_sales - $last_month_sales):0;
        // sales percentage increase
        $sales_perc_inc = ($last_month_sales)?(($sales_increase / $last_month_sales) * 100):$sales_increase;

        // orders
        $last_month_orders = Order::getMonthOrders($last_month);
        $this_month_orders = Order::getMonthOrders($this_month);
        $orders_increase = (($this_month_orders - $last_month_orders) > 0)?
            ($this_month_orders - $last_month_orders):0;
        // orders percentage increase
        $orders_perc_inc = ($last_month_orders)?(($orders_increase / $last_month_orders) * 100):$orders_increase;
       

        // dd($montly_sales_data, $montly_orders_data);

        $analytics = [
            'total_sales' =>  Order::getTotalSales(),
            'today_sales' =>  Order::getTodaySales(),
            'total_orders' =>  Order::getTotalOrders(),
            'today_orders' =>  Order::getTodayOrders(),
            'total_deliveries' =>  Order::deliveredOrdersCount(),
            'today_deliveries' =>  Order::deliveredOrdersCount(true),
            'total_customers' =>  Customer::getTotalCustomers(),
            'today_customers' =>  Customer::getTodayCustomers(),
            'montly_sales_data' =>  $montly_sales_data,
            'montly_orders_data' =>  $montly_orders_data,
            'sales_perc_inc' =>  $sales_perc_inc,
            'orders_perc_inc' =>  $orders_perc_inc,
            'sales_last_update' =>  (Order::getLastSaleDate())?
                Carbon::parse(Order::getLastSaleDate())->DiffForHumans():'',
            'orders_last_update' =>  (Order::getLastOrderDate())?
                Carbon::parse(Order::getLastOrderDate())->DiffForHumans():'',
        ];

        $data = [
            'page_name' => 'dashboard',
            'dashboard' => 'admin',
            'analytics' => $analytics,
        ];

        return view('admin.dashboard', compact('data'));

    }

    public function customerDashbaord($user)
    {

        $analytics = [
            'products' => $user->customer->deliveredOrders()->count(),
            'orders' => $user->customer->undeliveredOrders()->count(),
        ];
        
        $data = [
            'page_name' => 'dashboard',
            'dashboard' => 'customer',
            'analytics' => $analytics,
        ];

        return view('customer.dashboard', compact('data'));

    }
        
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect(route('login'));
    }
}
