<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Store;
use App\Models\Order;
use App\Models\Customer;


class CustomerController extends Controller
{


    public function index(Request $request)
    {
        $user = Auth::user();
        if( $user ) {

            if($user->permissionID == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }

            $id_store = $request->session()->get('id_store');
            if($id_store == null) {
                return redirect('/store');
            }
            $store = Store::find($id_store);

            $orders = Order::where('storeID', '=', $store->id)->paginate(5);

            $customers = Customer::all();

            $addresses = Address::all();

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['customer'] = 'Customer';

            $data = [
                'name'                  => 'Customer',
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'store'                 => $store,
                'orders'                =>$orders,
                'customers'             =>$customers,
                'addresses'             =>$addresses,
                'breadcrump'            => $breadcrump,
            ];


            return view('pages.customer.index',compact('orders'))->with($data);
        }
        else {
            redirect('/');
        }
    }


    public function customer_infos(Request $request, $id)
    {
        $user = Auth::user();
        if( $user ) {
            if($user->permissionID == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }

            $id_store = $request->session()->get('id_store');
            $store = Store::find($id_store);


            $customer=Customer::find($id);
            $orders = Order::where('customerID','=',$customer->id)->paginate(20);

            $adresses= Address::where('customerID','=',$customer->id)->paginate(1);

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['customer'] = 'Customer Listing';
            //$breadcrump['customer.infos'] = 'Customer Details';

            $data = [
                'name'                  => 'Customer Information',
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'customer'              =>$customer,
                'orders'                =>$orders,
                'adresses'              =>$adresses,
                'store'                 => $store,
                'breadcrump'            =>$breadcrump,
            ];
            return view('pages.customer.customer_infos')->with($data);
        }else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if( $user->permissionID == 2 ) {
            $validator = Validator::make($request->all(),[
                'address' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'digits:10'],
                'id_customer' => ['integer', 'max:255'],
                'id_address' => ['integer', 'max:255'],
            ]);

            $customer = Customer::find($request->id_customer);
            $adress = Address::find($request->id_address);

            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $adress->city    = $request->address;
            $adress->country    = $request->address;
            $adress->description    = $request->address;
            $adress->save();
            $customer->save();
            return redirect()->back()->with([
                'message'=>"Successfull customer informations modification"
            ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
