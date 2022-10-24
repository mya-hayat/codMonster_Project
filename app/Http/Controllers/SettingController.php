<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Store;
use App\Models\Product;
use App\Models\Variant;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = Auth::user();
        if( $user ) {
            if($user->isAdmin == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }
            $id_store = $request->session()->get('id_store');
            if($id_store == null) {
                $data = [
                    'name'   => 'Store',
                ];
                redirect('/store')->with($data);
            }

            $store = Store::find($id_store);
            if( $store ) {
                $products = Product::where('storeID', '=', $store->id)->paginate(20);
                $variants = Variant::all();

                $settings = Settings::where("storeID",$store->id)->first();

                if( $settings ) {
                    if( $settings->setting ) {
                        $settings = json_decode(@$settings->setting);
                    } else {
                        $settings = $this->settings_default();
                        $settings = Settings::create([
                            'setting'   => json_encode($settings),
                            'storeID'   => $store->id
                        ]);
                        $settings = json_decode(@$settings->setting);
                    }
                } else {
                    $settings = $this->settings_default();
                    $settings = Settings::create([
                        'setting'   => json_encode($settings),
                        'storeID'   => $store->id
                    ]);
                    $settings = json_decode(@$settings->setting);
                }

                $breadcrump = [];
                $breadcrump['store'] = 'Home';
                $breadcrump['dashbord'] = 'Dashboard';
                $breadcrump['settings.index'] = 'Settings';

                $data = [
                    'name'                  => 'Smart Form',
                    'user'                  => $user,
                    'isAdmin'               => $isAdmin,
                    'store'                 => $store,
                    'breadcrump'            => $breadcrump,
                    'products'              => $products,
                    'settings'              => $settings,
                    'variants'              =>$variants,
                ];

                return view('pages.settings.form')->with($data);
            } else {
                $data = [
                    'name'   => 'Store',
                ];
                redirect('/store')->with($data);
            }
        } else {
            $data = [
                'name'  => 'Store',
            ];
            redirect('/store')->with($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if( $user ) {
            $data = $request->all();
            if($user->isAdmin == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }

            $id_store = $request->session()->get('id_store');
            if($id_store == null) {
                $data = [
                    'name'  => 'Store',
                ];
                redirect('/store')->with($data);
            }

            $store = Store::find($id_store);
            if ($store) {
                $settings       = Settings::where("storeID",$store->id)->first();
                $settings_form  = collect( json_decode( @$settings->setting ) );
                foreach ($data as $key => $value) {
                    if( $key != "_token" || $key != "_method"  ) {
                        $settings_form[$key] = $data[$key];
                    }
                }
                $settings->update([
                    'setting' => json_encode($settings_form)
                ]);
                return redirect()->back()->with([
                    'message_form'=>"Smart Form edited succefuly !!"
                ]);
            } else {
                $data = [
                    'name'  => 'Store',
                ];
                redirect('/store')->with($data);
            }
        }
    }



    public function script(Request $request)
    {
        $user = Auth::user();
        if( $user ) {

            if($user->isAdmin == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }

            $id_store = $request->session()->get('id_store');
            if($id_store == null) {
                return redirect('/store');
            }

            $store = Store::find($id_store);
            if ($store) {

                $settings   = Settings::where("storeID",$store->id)->first();

                $breadcrump = [];
                $breadcrump['store'] = 'Home';
                $breadcrump['settings.index'] = 'Settings';
                $breadcrump['settings.script'] = 'My Script';

                $data = [
                    'name'                  => 'My script',
                    'slug'                  => 'My script',
                    'user'                  => $user,
                    'isAdmin'               => $isAdmin,
                    'store'                 => $store,
                    'breadcrump'            => $breadcrump,
                ];

                return view('pages.settings.script')->with($data);
            } else {
                $data = [
                    'name'   => 'Store'
                ];
                redirect('/store')->with($data);
            }
        } else {
            $data = [
                'name'   => 'Store'
            ];
            redirect('/store')->with($data);
        }

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
        //
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

    private function settings_default() {
        return Helpers::instance()->settings_default();
    }

}
