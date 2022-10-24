<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\models\Store;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Item;
use App\Models\Address;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $user = Auth::user();
        if( $user ) {

            if($user->permissionID == 1){

                $isAdmin = 'Admin';

                $data = [
                    'name'                  => $isAdmin,
                    'user'                  => $user,
                    'isAdmin'               => $isAdmin
                ];

                return view('pages.Admin.index')->with($data);

            }else{

                $isAdmin    = 'User';
                $id_store   = $request->session()->get('id_store');

                if( $id_store == null ){
                   return redirect('/store');
                }
                $store = Store::find($id_store);

                if($store->status == 'Innactive'){
                    return redirect('/store');
                } else{
                    $breadcrump = [];
                    $breadcrump['store'] = 'Home';
                    $breadcrump['dashbord'] = 'Dashboard';

                    $products       = Product::where('storeID', $id_store)->get(['id']);
                    $orders         = Order::where('storeID', $id_store)->get(['id','total_price', 'customerID']);
                    $orders_cust    = Order::where('storeID', $id_store)->get(['customerID']);
                    $sales          = $orders->sum('total_price');
                    $count_order    = $orders->count();

                    $customers = [];
                    foreach ($orders_cust as $key => $value) {
                        if( !in_array($value->customerID, $customers) ) {
                            array_push($customers,$value->customerID);
                        }
                    }

                    $orders_last = DB::table('orders')
                                ->join('customers', 'orders.customerID', '=', 'customers.id')
                                ->where('orders.storeID', $id_store)
                                ->take(5)
                                ->orderBy('orders.created_at', 'desc')
                                ->select('order_number', 'total_price', 'customers.last_name', 'customers.first_name')
                                ->get();

                    $customer_last = DB::table('orders')
                                ->join('customers', 'orders.customerID', '=', 'customers.id')
                                ->take(5)
                                ->where('orders.storeID', $id_store)
                                ->orderBy('orders.created_at', 'asc')
                                ->select('order_number', 'total_price', 'customers.last_name', 'customers.first_name', 'customers.phone')
                                ->get();

                    $data = [
                        'name'                  => $store->name,
                        'slug'                  => "dashbord",
                        'store'                 => $store,
                        'user'                  => $user,
                        'isAdmin'               => @$isAdmin,
                        'breadcrump'            => @$breadcrump,
                        'sales'                 => @$sales,
                        'count_order'           => @$count_order,
                        'count_customers'       => @count($customers),
                        'count_products'        => @$products->count(),
                        'orders_last'           => @$orders_last,
                        'customer_last'         => @$customer_last
                    ];

                    return view('pages.index')->with($data);
                }

            }



        } else {
            redirect('/');
        }


    }


    public function test(Request $request){


        $user = Auth::user();

        if( $user ) {
            if($user->permissionID == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }

            // $data = [
            //     'name'                  => 'Store',
            //     'slug'                  => 'store',
            //     'user'                 => $user,
            //     'isAdmin'               => $isAdmin,
            // ];
            return view('pages.test');

        } else {
            return redirect('/login');
        }

    }


}
    // GET COUNTRY IN FUNCTION get_country from HELPER

