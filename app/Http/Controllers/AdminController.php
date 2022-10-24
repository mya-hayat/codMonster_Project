<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Store;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Image;


use Illuminate\Support\Facades\Hash;
use Str;

class AdminController extends Controller
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

        if( $user->permissionID == 1 ) {
            $breadcrump = [];
            $breadcrump['admin'] = 'Dashboard';


            $products       = Product::get(['id']);
            $orders         = Order::get(['id','total_price', 'customerID']);
            $orders_cust    = Order::get(['customerID']);
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
                        ->take(5)
                        ->orderBy('orders.created_at', 'desc')
                        ->select('order_number', 'total_price', 'customers.last_name', 'customers.first_name')
                        ->get();

            $stores = DB::table('stores')
                        ->take(5)
                        ->orderBy('stores.created_at', 'asc')
                        ->get();

            $data = [
                'name'                  => 'Admin',
                'user'                  => $user,
                'isAdmin'               =>'Admin',
                'breadcrump'            => $breadcrump,
                'sales'                 => @$sales,
                'count_order'           => @$count_order,
                'count_customers'       => @count($customers),
                'count_products'        => @$products->count(),
                'orders_last'           => @$orders_last,
                'stores'                => @$stores
            ];

            return view('pages.Admin.index')->with($data);

        } else {
            return redirect('/');
        }

    }


    public function store(Request $request)
    {
        $user = Auth::user();
        if( $user->permissionID == 1 ) {
            $stores = Store::paginate(4);
            $commercial = User::all();
            $breadcrump = [];
            $breadcrump['admin'] = 'Dashboard';
            $breadcrump['admin.store'] = 'Store Listing';

            $data = [
                'name'                  => 'Stores',
                'user'                  => $user,
                'isAdmin'               =>'Admin',
                'stores'                =>$stores,
                'commercial'            => $commercial,
                'breadcrump'            => $breadcrump,
            ];

            return view('pages.Admin.stores.listStore',compact('stores'))->with($data);
        } else {
            return redirect('/');
        }
    }


    public function store_infos($id)
    {
        $user = Auth::user();
        if( $user->permissionID == 1 ) {
            $store = Store::find($id);
            $commercial = User::find($store->userID);
            $products = Product::where('storeID', '=', $store->id)->paginate(4);
            $orders = Order::where('storeID', '=', $store->id)->paginate(4);
            $images = Image::all();
            $customers = Customer::all();

            $breadcrump = [];
            $breadcrump['admin'] = 'Dashboard';
            $breadcrump['admin.store'] = 'Store';

            // $breadcrump['admin.store.infos'] = 'Informations';


            $data = [
                'name'                  => 'Store',
                'user'                  => $user,
                'isAdmin'               =>'Admin',
                'store'                 => $store,
                'commercial'            => $commercial,
                'products'              => $products,
                'orders'                =>$orders,
                'images'                => $images,
                'customers'              => $customers,
                'breadcrump'            => $breadcrump,

            ];

            return view('pages.Admin.stores.store_infos')->with($data);
        } else {
            return redirect('/');
        }
    }


    public function user_add(Request $request)
    {
        $ahth_user = Auth::user();
        if( $ahth_user->permissionID == 1 ) {

            $validator = Validator::make($request->all(), [
                'full_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:1500'],
            ]);

            if ($validator->fails()) {

            } else {
                $user               = new User();
                $password = Str::random(8);
                $user->name = $request->full_name;
                $user->email = $request->email;
                $user->phone = "0666666666";
                $user->password=$password;
                $user->save();
               return redirect()->back();
            }
        } else {

        }
    }


    public function remove(Request $request)
    {
        $user = Auth::user();
        if( $user ) {



        } else {

            return redirect('/login');
        }

    }

    public function users_list(Request $request)
    {
        $user = Auth::user();
        if( $user->permissionID == 1 ) {

            $users = User::where('permissionID','!=' ,1)->paginate(4);
            $breadcrump = [];
            $breadcrump['admin'] = 'Dashboard';
            $breadcrump['users.list'] = 'Users listing';

            $data = [
                'name'                  => 'List Users',
                'user'                  => $user,
                'isAdmin'               =>'Admin',
                'users'                 =>$users,
                'breadcrump'            => $breadcrump,
            ];

            return view('pages.Admin.users.users_list',compact('users'))->with($data);
        } else {
            return redirect('/');
        }


    }

    public function customers_list(Request $request)
    {
        $user = Auth::user();
        if( $user->permissionID == 1 ) {

            $customers = Customer::paginate(4);
            $adresses = Address::all();
            $breadcrump = [];
            $breadcrump['admin'] = 'Dashboard';
            $breadcrump['customer.list'] = 'Customers listing';

            $data = [
                'name'                  => 'List Customres',
                'user'                  => $user,
                'isAdmin'               =>'Admin',
                'customers'             =>$customers,
                'breadcrump'            => $breadcrump,
                'addresses'             =>$adresses,
            ];

            return view('pages.Admin.customers.customer_list',compact('customers'))->with($data);
        } else {
            return redirect('/');
        }


    }


    public function activate_user(Request $request)
    {
        $data = $request->all();

        if( isset( $data['user'] )) {
            $user = User::find( $data['user'] );
            $user->isActive = $data['active'] ;
            $user->save();

            return response([
                'status'  => 1,
                'message' => "User Desactivated ",
                'rep'  => @$user->isActive,
            ]);

        } else {
                return response([
                    'status'  => 0,
                    'message' => "failed"
                ]);
            }

    }

    public function user_details($id){

        $user = Auth::user();
        if( $user->permissionID == 1 ) {

            $commercial = User::find($id);
            $stores = Store::where('userID','=',$commercial->id)->paginate(5);

            $breadcrump = [];
            $breadcrump['admin'] = 'Dashboard';
            $breadcrump['users.list'] = 'Users Listing';

            $data = [
                'name'                  => 'User Infos',
                'user'                  => $user,
                'isAdmin'               =>'Admin',
                'breadcrump'            => $breadcrump,
                'stores'                =>$stores,
                'commercial'            =>$commercial,
            ];

            return view('pages.Admin.users.user_infos',compact('stores'))->with($data);
        } else {
            return redirect('/');
        }
    }


}



