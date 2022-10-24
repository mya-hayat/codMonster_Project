<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use App\Helpers\Helpers;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Settings;
use App\Models\Store;
use App\Models\Order;
use App\Models\Variant;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function data( Request $request ) {

        $data = $request->all();
        $store = Store::find( @$data['store'] );
        if( $store ) {
            $settings = Settings::where("storeID",$store->id)->first();
            // $variants = Variant::where('productID',@$settings->productID )->all();
            if( $settings ) {
                if( $settings->setting ) {
                    $html = $this->html_format( json_decode($settings->setting) );
                    return response([
                        'status'  => 1,
                        'html'    => $html,
                    ]);
                }
            }
        } else {
            return response([
                'status'=>0,
                'message'=>"store not found",
            ]);
        }

    }

    private function html_format( $settings ) {
        $variants = Variant::where("productID", @$settings->productID)->get();
        $variant = '';
        foreach ($variants as $key => $value) {
            $variant .= '<option value="'. $value->id .'"> '. $value->title .' </option>';
        }
        $style = '
            <style>
                #orderForm {
                    display: flex;
                    flex-wrap: wrap;
                    width: 600px;
                    height: 90  0px;
                    max-width: 900px;
                    min-width: 350px;
                    position: relative;
                    box-shadow:  0px 9px 19px;
                    border-radius: 5px !important;
                    background: #fff;
                    overflow: hidden;
                    padding: 15px 50px 15px 30px;
                }

                #orderForm h4 {
                    width: 100%;
                    text-align: center;
                    justify-content: center;
                }

                #orderForm .form-group{
                    flex: 0 0 100%;
                    position: relative;
                    margin-bottom: 8px;
                    text-align: start;
                    display: flex;
                    flex-wrap: wrap;
                }

                #orderForm .form-group label{
                    width: 100%;
                    display: block;
                    font-size: 15px;
                    font-weight: 600;
                    padding: 5px 0px;
                }

                #orderForm .form-group .form-control {
                    width: 100%;
                    display: block;
                    box-shadow: none;
                    outline: none;
                    font-size: 16px;
                    border-radius: 6px;
                    padding: 9px !important;
                    color: #232226;
                    background: #efefef!important;
                    -webkit-appearance: none;
                    margin: 0;
                    border: none;
                    height:auto !important;
                }

                #orderForm .form-group button{
                    width: 100%;
                    display: block;
                    box-shadow: none;
                    outline: none;
                    font-size: 16px;
                    border-radius: 6px;
                    padding: 9px !important;
                    height: auto !important;
                    color: #232226;
                    background: #efefef!important;
                    -webkit-appearance: none;
                    cursor: pointer;
                    margin-top: 20px;
                    outline: none;
                    border: 1px solid #444;
                }

                #orderForm .form-group button:hover{
                    opacity: 0.7;
                }
                #orderForm .qty-form {
                    flex: 0 0 100%;
                    position: relative;
                    margin-bottom: 8px;
                    text-align: start;
                    display: flex;
                    flex-wrap: wrap;
                }
                #orderForm .qty-form .qtyplus,
                #orderForm .qty-form .qtyminus{
                    width: 18% !important;
                    cursor: pointer;
                    height: 40px !important;
                    border-radius: 9px;
                    border: 1px solid transparent;
                }
                #orderForm .qty-form .qty {
                    width: 56% !important;
                    margin-left: 2% !important;
                    margin-right: 2% !important;
                    box-shadow: none;
                    outline: none;
                    font-size: 16px;
                    border-radius: 6px;
                    padding: 9px !important;
                    color: #232226;
                    background: #efefef!important;
                    -webkit-appearance: none;
                    margin: 0;
                    border: none;
                    height:auto !important;
                    text-align: center;
                }
                .message-validation {
                    width: 100%;
                    text-align: center;
                    background: #bbddbb;
                    border-radius: 9px;
                    color: green;
                    display: none;
                }
                .message-validation p {
                    font-size: 16px;
                    font-weight: 800;
                }
                .message-error {
                    width: 100%;
                    text-align: center;
                    background: #e1b4b4;
                    border-radius: 9px;
                    color: red;
                    display: none;
                }
                .message-error p {
                    font-size: 16px;
                    font-weight: 800;
                }
            </style>
        ';
        $html = '
            <div class="landing-page">
                <form  id="orderForm" class="form-order" style="background-color:'. @$settings->background_color .' ;">
                    <input type="hidden" name="product" id="product" value="'. @$settings->productID .'">
                    <h4 style="color: '. @$settings->color_title .'">
                        '. @$settings->title_form .'
                    </h4>

                    <div class="form-group">
                        <label for="" class="form-label">Choice a variant</label>
                        <select class="form-select " name="variant" id="variant">
                            '.$variant.'
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                        '. @$settings->first_name .'
                        </label>
                        <input class="form-control" id="first_name" name="first_name" type="text" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                        '. @$settings->last_name .'
                        </label>
                        <input class="form-control" id="last_name" name="last_name" type="text" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                        '. @$settings->email .'
                        </label>
                        <input class="form-control" id="email" name="email" type="email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                        '. @$settings->phone_number .'
                        </label>
                        <input class="form-control" id="phone" name="phone" type="text" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                        '. @$settings->address .'
                        </label>
                        <input class="form-control" id="address" name="address" type="text" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Note
                        </label>
                        <input class="form-control" id="note" name="note" type="text" autofocus="">
                    </div>

                    <div class="qty-form">
                        <input type="button" value="-" class="qtyminus minus"/>
                        <input type="text" name="qty" max="10" min="1" value="1" class="qty" id="qty" />
                        <input type="button" value="+" class="qtyplus plus" />
                    </div>

                    <div class="message-validation">
                        <p>Thanks !</p>
                    </div>
                    <div class="message-error">
                        <p>error</p>
                    </div>

                    <div class="form-group">
                        <button style="background-color:'. @$settings->back_btn .'; border:'. @$settings->border_size .' solid '. @$settings->border_color .'" id="btn_submit" type="button" class="btn btn-primary">
                        '. @$settings->btn_save .'
                        </button>
                    </div>

                </form>
            </div>

        ';

        // return trim($style) .' '. trim($html);
        // return preg_replace('/\s+/', '', $style) .' '. $html;
        return $style .' '. $html;


    }


    public function order( Request $request ) {

        $data = $request->all();

        $store = Store::find( @$data['store'] );
        if( $store ) {
            $customer = $this->create_customer( $store, $data );
            if( $customer ) {
                $address        = $this->create_address( $store, $data, $customer );
                $total_price    = $this->total_price( $store, $data );
                if( $total_price ) {
                    $order    = $this->create_order( $store, $data, $total_price, $customer );
                    if( $order ) {
                        $item    = $this->create_item( $store, $data, $order );
                        if( $item ) {
                            return response([
                                'status'    => 1,
                                'message'   => "Create order with successefly"
                            ]);
                        }else{
                            return response([
                                'status'    => 0,
                                'message'   => "Create item failed "
                            ]);
                        }

                    }else{
                        return response([
                            'status'    => 0,
                            'message'   => "Create order failed "
                        ]);
                    }
                }else{
                    return response([
                        'status'    => 0,
                        'message'   => "Create price failed "
                    ]);
                }
            }
            else{
                return response([
                    'status'    => 0,
                    'message'   => "Create costomer failed "
                ]);
            }
        } else {
            return response([
                'status'=>0,
                'message'=>"store not found",
            ]);
        }

    }

    private function create_customer( $store, $data) {

        // $store = Store::find( @$data['store'] );
        $customer = Customer::where('email', @$data['email'])->first();
        if( $customer ) {
            return $customer;
        } else {
            $customer = new Customer();
            $customer->first_name = @$data['first_name'];
            $customer->last_name = @$data['last_name'];
            $customer->phone = @$data['phone'];
            $customer->email = @$data['email'];
            $customer->save();
            return $customer;
        }

    }

    private function create_address( $store, $data, $customer) {
        $address = Address::where('customerID', $customer->id)->first();
        if( $address ) {
            $address->city = @$data['address'];
            $address->country = @$data['address'];
            $address->description = @$data['address'];
            $address->zip_code = @$data['address'];
            $address->customerID = $customer->id;
            $address->save();
        } else {
            $address = new Address();
            $address->city = @$data['address'];
            $address->country = @$data['address'];
            $address->description = @$data['address'];
            $address->zip_code = @$data['address'];
            $address->customerID = $customer->id;
            $address->save();
            return $address;
        }
    }

    private function create_order( $store, $data, $total, $customer) {

        $number_order = Order::where('storeID', $store->id)->orderBy('id', 'DESC')->first();
        if( !$number_order ) {
            $number_order = 1000;
        } else {
            $number_order = 1000+1;
        }
        $order = new Order();
        $order->order_number = $number_order;
        $order->total_price = $total;
        $order->sub_total = $total;
        $order->total_discount = $total;
        $order->note = @$data['note']?:"Note Empty";
        $order->storeID = @$store->id;
        $order->customerID = $customer->id;
        $order->save();
        return $order;
    }

    private function create_item( $store, $data, $order) {
        $item = new Item();
        $variant = Variant::find(@$data['variant']);
        $item->sku = random_int(1000, 9999);
        $item->title = $variant->title;
        $item->price = $variant->price;
        $item->qty_com = @$data['qty'];
        $item->variantID = $variant->id;
        $item->orderID = $order->id;
        $item->save();
        return $item;
    }

    private function total_price( $store, $data) {
        $variant = Variant::find(@$data['variant']);
        $total_price = 0;
        if( $variant ) {
            $total_price = $data["qty"] * $variant->price;
            return $total_price;
        } else {
            return $total_price;
        }
    }

}
