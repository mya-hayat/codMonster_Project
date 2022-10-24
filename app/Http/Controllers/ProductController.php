<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Store;
use App\Models\Image;
use App\Models\Category;
use App\Models\Variant;
use App\Models\Option;

use Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
            }else{
                $isAdmin = 'User';
            }

            $id_store = $request->session()->get('id_store');
            if($id_store == null) {
                return redirect('/store');
            }
            $store = Store::find($id_store);

            $products = Product::where('storeID', '=', $store->id)->orderBy('id','desc')->paginate(4);

            $images = Image::all();

            if(!$products) {
                $products = [];
            }
            $categories = Category::all();

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['product'] = 'Product Listing';

            $data = [
                'name'                  => 'Product',
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'store'                 => $store,
                'products'              => $products,
                'categories'            => $categories,
                'images'                => $images,
                'breadcrump'            => $breadcrump,
            ];

            return view('pages.products.index',compact('products'))->with($data);
        } else {
            redirect('/store');
        }
    }

    public function addView(Request $request)
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
            $categories = Category::where('storeID','=',$store->id)->paginate(20);

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['product'] = 'Product Listing';
            $breadcrump['product.add.view'] = ' Add Product';

            $data = [
                'name'                  => 'Product Add',
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'store'                 => $store,
                'categories'            => $categories,
                'breadcrump'            => $breadcrump,

            ];
            return view('pages.products.add')->with($data);
        }

        else{
            return redirect('/login');
        }
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        if( $user ) {
            $validator = Validator::make($request->all(), [
                'product_name' => ['required', 'string', 'max:255'],
                'slug'         => ['required', 'string', 'max:255'],
                'status'       => ['required', 'string', 'max:255'],
                'description'  => ['required', 'string', 'max:1500'],
                'category'     => ['required', 'string', 'max:255'],
            ]);
            $file   = $request->file('avatar');

            if( $file) {
                $name   = Str::random(10);
                $url    = Storage::putFileAs('images', $file, $name . '.' . $file->extension());
            }

            $id_store               = $request->session()->get('id_store');
            $store                  = Store::find($id_store);
            $category               = Category::find($request->category);

            $product                = new  Product();
            $product->title         = $request->product_name;
            $product->status        = $request->status;
            $product->description   = $request->description;
            $product->slug          = $request->slug;
            $product->storeID       = $store->id;
            if(isset($request->category)){
                $product->categoryID    = $request->category;
            }else{
                return redirect()->back()->with(['messageCat'=> 'You should select a category  !!']);
            }
            $product->save();

            if( isset($url) ) {
                $image              = new Image();
                $image->url         = $url;
                $image->type        = "png";
                $image->ID_pro_var  = $product->id;
                $image->save();
            }
            return redirect('/product/edit/'.$product->id)->with(['message'=> 'Complete your product informations  !!']);

        } else {
            return redirect('/login');
        }
    }

    public function remove(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        if( $user ) {
            $data = $request->all();
            if(isset($data['id'])){
                Product::destroy($data['id']);
            }

            return redirect('/product')->with(['message_delete' => 'Product deleted successfully']);

        } else {
            return redirect('/product');
        }
    }

    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        if( $user ) {

            $id_store = $request->session()->get('id_store');
            if($id_store == null) {
                return redirect('/store');
            }

            $data           = $request->all();
            $product        = Product::find($id);
            $image          = Image::where('ID_pro_var', $id)->first();
            $store          = Store::find($id_store);
            $categories     = Category::where('storeID','=',$store->id)->paginate(20);
            $option         = [];
            $options        = Option::where('productID', $id)->get();
            foreach ($options as $key => $value) {
                $option[$value->name] = json_decode($value->values);
            }

            if($user->permissionID == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }

            $variants = Variant::where('productID', @$id)->get();

            $data = [
                'name'                  => 'Product Edit',
                'product'               => $product,
                'store'                 => $store,
                'user'                  => $user,
                'categories'            => $categories,
                'isAdmin'               => $isAdmin,
                'image'                 => @$image,
                'options'               => $options,
                'option'                => $option,
                'activate'              => 0,
                'variants'              => $variants,
            ];

            return view('pages.products.edit', $data);

        } else {
            return redirect('/login');
        }
    }
    //************************* OPTION ************************/
    //******* add option *******/
    public function option_add(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $validator = Validator::make(
            $request->all(),
            [
                'option' => ['required', 'string', 'max:255'],
                'id_product' => ['required', 'string', 'max:255']
            ]
        );
        if ($validator->fails()) {
            dd('faild');
        } else {
            $product = Product::find($request->id_product);
            if ($product) {
                $id_store = $request->session()->get('id_store');
                $option_find = Option::where('name', $request->option)->where('productID', $request->id_product)->first();
                if (!$option_find) {
                    $values = [];
                    $values = json_encode($values);
                    $option = new Option();
                    $option->name = $request->option;
                    $option->productID = $request->id_product;
                    $option->values = $values;
                    $option->save();
                    return response(['status' => 1, 'option' => $option]);
                } else {
                    return response(['status' => 0, 'message' => "deja kayan"]);
                }
            }
        }
    }
    //******* add option value *******/
    public function option_add_value(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $validator = Validator::make(
            $request->all(),
            [
                'option' => ['required', 'string', 'max:255'],
                'id_product' => ['required', 'string', 'max:255'],
                'value' => ['required', 'string', 'max:255']
            ]
        );
        if ($validator->fails()) {
            dd('faild');
        } else {
            $product = Product::find($request->id_product);
            if ($product) {
                $id_store = $request->session()->get('id_store');
                $option_find = Option::where('name', $request->option)->where('productID', $request->id_product)->first();
                if ($option_find) {
                    $values = (array)json_decode($option_find->values);
                    if( count($values) == 0 ) {
                        array_push($values, $request->value);
                    } else {
                        if(!in_array($request->value, $values)) {
                            array_push($values, $request->value);
                        }
                    }
                    $option_find->values = json_encode($values);
                    $option_find->save();

                    $option_all = Option::where('productID', $request->id_product)->get();
                    $array[] = [];
                    foreach ($option_all as $key => $value) {
                       $array[$key] = json_decode($value->values);
                    }
                    $variant = Variant::where('productID', $request->id_product)->delete();
                    if( isset( $array[0] ) ) {
                        foreach ( (array)$array[0] as $key => $value_1) {
                            if( isset($array[1]) ) {
                                foreach ((array)$array[1] as $key => $value_2) {
                                    if ( isset( $array[2] ) ) {
                                        foreach ((array)$array[2] as $key => $value_3) {
                                            $variant = Variant::where('title', $value_1.'/'.$value_2.'/'.$value_3)->where('productID', $request->id_product)->first();
                                            if( !$variant ) {
                                                $variant                = new Variant();
                                                $variant->title         = $value_1.'/'.$value_2.'/'.$value_3;
                                                $variant->productID     = $request->id_product;
                                                $variant->price         = 1;
                                                $variant->qty_stock       = 1;
                                                $variant->save();
                                            }
                                        }
                                    } else {
                                        $variant = Variant::where('title', $value_1.'/'.$value_2)->where('productID', $request->id_product)->first();
                                        if( !$variant ) {
                                            $variant                = new Variant();
                                            $variant->title         = $value_1.'/'.$value_2;
                                            $variant->productID     = $request->id_product;
                                            $variant->price         = 1;
                                            $variant->qty_stock       = 1;
                                            $variant->save();
                                        }
                                    }
                                }
                            } else {
                                $variant = Variant::where('title', $value_1)->where('productID', $request->id_product)->first();
                                if( !$variant ) {
                                    $variant                = new Variant();
                                    $variant->title         = $value_1;
                                    $variant->productID     = $request->id_product;
                                    $variant->price         = 1;
                                    $variant->qty_stock           = 1;
                                    $variant->save();
                                }
                            }
                        }
                    }
                    $variant = Variant::where('productID', $request->id_product)->get();
                    return response([
                        'status'    => 1,
                        'option'    => $option_find,
                        'variant'   => $variant
                    ]);
                } else {
                    return response(['status' => 1, 'message' => 'sir dkhal option hya lawla']);
                }
            }
        }
    }

    //******* delete option value *******/
    public function option_delete_value(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $id = $user->id;
        $validator = Validator::make(
            $request->all(),
            [
                'option' => ['required', 'string', 'max:255'],
                'id_product' => ['required', 'string', 'max:255'],
                'value' => ['required', 'string', 'max:255']
            ]
        );
        if ($validator->fails()) {
            dd('faild');
        } else {
            $product = Product::find($request->id_product);
            if ($product) {
                $id_store = $request->session()->get('id_store');
                $option_find = Option::where('name', $request->option)->where('productID', $request->id_product)->first();
                if ($option_find) {
                    $values =  (array) json_decode($option_find->values);
                    $key = array_search(  $request->value , $values );
                    if (false !== $key) {
                        unset($values[$key]);
                    }
                    $option_find->values = json_encode($values);
                    $option_find->save();

                    $option_all = Option::where('productID', $request->id_product)->get();
                    $array[] = [];
                    foreach ($option_all as $key => $value) {
                    $array[$key] = json_decode($value->values);
                    }
                    $variant = Variant::where('productID', $request->id_product)->delete();
                    if( isset( $array[0] ) ) {
                        foreach ( (array)$array[0] as $key => $value_1) {
                            if( isset($array[1]) ) {
                                foreach ((array)$array[1] as $key => $value_2) {
                                    if ( isset( $array[2] ) ) {
                                        foreach ((array)$array[2] as $key => $value_3) {
                                            $variant = Variant::where('title', $value_1.'/'.$value_2.'/'.$value_3)->where('productID', $request->id_product)->first();
                                            if( !$variant ) {
                                                $variant                = new Variant();
                                                $variant->title         = $value_1.'/'.$value_2.'/'.$value_3;
                                                $variant->productID     = $request->id_product;
                                                $variant->price         = 1;
                                                $variant->qty_stock       = 1;
                                                $variant->save();
                                            }
                                        }
                                    } else {
                                        $variant = Variant::where('title', $value_1.'/'.$value_2)->where('productID', $request->id_product)->first();
                                        if( !$variant ) {
                                            $variant                = new Variant();
                                            $variant->title         = $value_1.'/'.$value_2;
                                            $variant->productID     = $request->id_product;
                                            $variant->price         = 1;
                                            $variant->qty_stock       = 1;
                                            $variant->save();
                                        }
                                    }
                                }
                            } else {
                                $variant = Variant::where('title', $value_1)->where('productID', $request->id_product)->first();
                                if( !$variant ) {
                                    $variant                = new Variant();
                                    $variant->title         = $value_1;
                                    $variant->productID     = $request->id_product;
                                    $variant->price         = 1;
                                    $variant->qty_stock           = 1;
                                    $variant->save();
                                }
                            }
                        }
                    }
                    $variant = Variant::where('productID', $request->id_product)->get();


                    return response([
                        'status' => 1,
                        'option' => $option_find,
                        "remove"=> $request->value,
                        'variant'   => $variant
                    ]);
                } else {
                    return response(['status' => 0, 'message' => 'makaynch option']);
                }
            }
        }
    }

    //******** delete list option *****/
    public function option_delete_listOption(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'option' => ['required', 'string', 'max:255'],
                'id_product' => ['required', 'string', 'max:255']
            ]
        );
        if ($validator->fails()) {
            return response(['status' => 0, "message"=> "Error in validation" ]);
        }
        else{
            $product = Product::find($request->id_product);
            $option = Option::where("productID",$request->id_product)->where("name",$request->option)->first();
            if ($option) {
                $option->delete();

                $option_all = Option::where('productID', $request->id_product)->get();
                $array[] = [];
                foreach ($option_all as $key => $value) {
                   $array[$key] = json_decode($value->values);
                }
                $variant = Variant::where('productID', $request->id_product)->delete();
                if( isset( $array[0] ) ) {
                    foreach ( (array)$array[0] as $key => $value_1) {
                        if( isset($array[1]) ) {
                            foreach ((array)$array[1] as $key => $value_2) {
                                if ( isset( $array[2] ) ) {
                                    foreach ((array)$array[2] as $key => $value_3) {
                                        $variant = Variant::where('title', $value_1.'/'.$value_2.'/'.$value_3)->where('productID', $request->id_product)->first();
                                        if( !$variant ) {
                                            $variant                = new Variant();
                                            $variant->title         = $value_1.'/'.$value_2.'/'.$value_3;
                                            $variant->productID     = $request->id_product;
                                            $variant->price         = 1;
                                            $variant->qty_stock       = 1;
                                            $variant->save();
                                        }
                                    }
                                } else {
                                    $variant = Variant::where('title', $value_1.'/'.$value_2)->where('productID', $request->id_product)->first();
                                    if( !$variant ) {
                                        $variant                = new Variant();
                                        $variant->title         = $value_1.'/'.$value_2;
                                        $variant->productID     = $request->id_product;
                                        $variant->price         = 1;
                                        $variant->qty_stock       = 1;
                                        $variant->save();
                                    }
                                }
                            }
                        } else {
                            $variant = Variant::where('title', $value_1)->where('productID', $request->id_product)->first();
                            if( !$variant ) {
                                $variant                = new Variant();
                                $variant->title         = $value_1;
                                $variant->productID     = $request->id_product;
                                $variant->price         = 1;
                                $variant->qty_stock           = 1;
                                $variant->save();
                            }
                        }
                    }
                }
                $variant = Variant::where('productID', $request->id_product)->get();

            }

            return response([
                'status' => 1,
                "remove"=> $request->option,
                'variant'   => $variant

            ]);
        }
    }

    //******** delete list option *****/
    public function variant_update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => ['required'],
                'qty' => ['required'],
                'price' => ['required']
            ]
        );
        if ($validator->fails()) {
            dd('faild');
        }
        else{
            $variant            = Variant::find($request->id);
            $variant->price     = $request->price;
            $variant->qty_stock       = $request->qty;
            $variant->save();
            return response(['status' => 1, "remove"=> $request->option ]);
        }
    }
    //******** delete list option *****/
    public function variant_update_all(Request $request)
    {
        $data = $request->all();
        foreach (json_decode($data['variant']) as $key => $value) {
            $variant                    = Variant::find($value->id);
            $variant->price             = $value->price;
            $variant->qty_stock         = $value->qty;
            $variant->save();
        }
        return response(['status' => 1 ]);

    }
    // ********************************************************
    // ********************************************************
    // ********************************************************
    public function update(Request $request)
    {
        $user = Auth::user();

        if( $user ) {
            $validator = Validator::make($request->all(), [
                'product_name' => ['required', 'string', 'max:255'],
                'slug'         => ['required', 'string', 'max:255'],
                'status'       => ['required', 'string', 'max:255'],
                'description'  => ['required', 'string', 'max:1500'],
                'product_id'   => ['required'],
            ]);
            if ($validator->fails()) {
                return redirect('/product/edit/'.$request->product_id)->with('activate', 0);;
            } else {
                $file   = $request->file('avatar');
                if( $file ) {
                    $name   = Str::random(10);
                    $url    = Storage::putFileAs('images', $file, $name . '.' . $file->extension());
                }
                $id_store               = $request->session()->get('id_store');
                $store                  = Store::find($id_store);
                $category               = Category::find($request->category);
                $product                = Product::find($request->product_id);

                if( @$product ) {
                    $product->title         = @$request->product_name;
                    $product->status        = @$request->status;
                    $product->description   = @$request->description;
                    $product->slug          = @$request->slug;
                    $product->categoryID    = @$request->category;
                    $product->save();
                }

                if( isset($url) ) {

                    $image              = new Image();
                    $image->url         = $url;
                    $image->type        = "png";
                    $image->ID_pro_var  = $product->id;
                    $image->save();

                }

                return redirect('/product')->with(['message'=> 'Product added successfully !!']);;;
            }

        } else {
            return redirect('/login');
        }
    }

}
