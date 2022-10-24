<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Address;
use App\Models\Image;
use App\Models\Store;
use App\Models\Order;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Item;

class OrderController extends Controller
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
            $customers = Customer::all();
            $orders = Order::where('storeID', '=', $store->id)->orderBy('id','desc')->paginate(4);

            if(!$orders) {
                $orders = [];
            }

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['order'] = 'Orders';

            $data = [
                'name'                  => 'Order',
                'customers'             => $customers,
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'store'                 => $store,
                'orders'                => $orders,
                'breadcrump'            => $breadcrump,
            ];


            return view('pages.order.index',compact('orders'))->with($data);
        }
        else {
            redirect('/login');
        }
    }



    public function order_details(Request $request, $id)
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


            $order=Order::find($id);
            $customer = Customer::find($order->customerID);
            $addresses= Address::all();

            foreach($addresses as $add){
                if($add->customerID == $customer->id){
                    $address = Address::find($add->id);
                }
            }
            $items = Item::where('orderID','=',$order->id)->paginate(20);

            $products = [];
            $items_com=[];

            $variants = Variant::all();

            foreach ( $items as $it ){
                foreach ( $variants as $variant ){
                    if( $variant->id == $it->variantID){
                        $product = Product::find($variant->productID);
                        $item = Item::find($it->id);
                        array_push($items_com,$item);
                        array_push($products,$product);
                    }
                }
            }
            $variant = Variant::find($item->variantID);
            $images = Image::all();

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['order'] = 'Order Listing';
            //$breadcrump['order.details'] = 'Order Details';

            $data = [
                'name'                  => 'Order Details',
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'customer'              =>$customer,
                'order'                 =>$order,
                'address'               =>$address,
                'items_com'             =>$items_com,
                'products'              =>$products,
                'store'                 => $store,
                'variant'               =>$variant,
                'images'               =>$images,
                'breadcrump'           =>$breadcrump
            ];

            return view('pages.order.order_details')->with($data);
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
    public function edit_status(Request $request){

        $data = $request->all();

        if( isset( $data['order'] )) {
            $order = Order::find( $data['order'] );
            $order->status = $data['status'] ;
            $order->save();

            return response([
                'status'  => 1,
                'message' => "Status Modified ",
                'status_rep'  => @$order->status,
            ]);

        } else {
                return response([
                    'status'  => 0,
                    'message' => "Modification failed"
                ]);
            }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
