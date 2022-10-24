<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request){
        $user = Auth::user();

        if( $user->isActive == 1) {
            $stores = Store::where('userID', '=', $user->id)->Paginate(4);

            if( $user ) {
                if($user->permissionID == 1){
                    $isAdmin = 'Admin';
                }else{
                    $isAdmin = 'User';
                }

                if(!$stores) {
                    $stores = [];
                }

                $breadcrump = [];
                $breadcrump['store'] = 'Home';

                $data = [
                    'name'                  => 'Stores',
                    'slug'                  => 'store',
                    'stores'                => $stores,
                    'user'                 => $user,
                    'isAdmin'               => $isAdmin,
                    'breadcrump'            => $breadcrump,
                ];
                return view('pages.stores.index',compact('stores'))->with($data);

            } else {
                return redirect('/');
            }
        } else{
            return redirect('/')->with(['message' => 'Your account is innactive ! To activate your account you should']);
        }


    }

    public function add(Request $request){
        $user = Auth::user();
        if( $user ) {

            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'domain' => ['required', 'string', 'max:255'],
                'country_name' => ['required', 'string', 'max:255'],
                'country_code' => ['required', 'string', 'max:8'],
                'currency' => ['required', 'string', 'max:10'],
            ]
            );
            if ($validator->fails()) {
                return redirect('/store#popup1');
            }

            else{

                $store = new Store();

                $token = $this->generateRandomString(14);

                $store->name = $request->name;
                $store->domain = $request->domain;
                $store->country_name = $request->country_name;
                $store->country_code = $request->country_code;
                $store->currency = $request->currency;
                $store->userID = $user->id;

                $store->save();

                return redirect()->back()->with([
                    'message'=>"Store Added successfully"
                ]);

            }

        } else {
            return redirect('/login');
        }
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function remove(Request $request){
        $user = Auth::user();
        if( $user ) {

            $data = $request->all();
            if( isset($data['id']) ) {
                Store::destroy($data['id']);
            }
            return redirect()->back()->with([
                'message_err'=>"Store Deleted successfully"
            ]);

        } else {

            return redirect('/login');
        }

    }

    public function edit(Request $request){
        $user = Auth::user();
        if( $user ) {

            $data = $request->all();
            $store = Store::find($data['id']);
            return response(["status"=>1, "data"=>$store]);

        } else {
            return redirect('/login');
        }


    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if( $user ) {
                $validator = Validator::make($request->all(),[
                    'id_update' => ['required'],
                    'name' => ['required', 'string', 'max:255'],
                    'domain' => ['required', 'string', 'max:255'],
                    'country_name_edit' => ['required', 'string', 'max:255'],
                    'country_code_edit' => ['required', 'string', 'max:8'],
                    'currency_edit' => ['required', 'string', 'max:10'],
                ]);

                if($validator->fails()){
                    return redirect('/store');
                }
                else{

                    $data = $request->all();
                    $store = Store::find($data['id_update']);
                    $store->name = $data['name'];
                    $store->domain = $data['domain'];
                    $store->country_name = $data['country_name_edit'];
                    $store->country_code = $data['country_code_edit'];
                    $store->currency = $data['currency_edit'];
                    $store->save();
                    return redirect()->back()->with([
                        'message_edit'=>"Store edited successfully "
                    ]);
                }
        } else {
             return redirect('/login');
        }
    }

    public function connected(Request $request, $id){
        $user = Auth::user();
        if( $user ) {
            if($id) {
                $request->session()->put('id_store', $id);
                return redirect()->route('dashbord');
            }

        } else {
            return redirect()->route('login');
        }
    }

    public function connected_store(Request $request){

        dd($request);
        $store = Store::find(1);
        $store->status = 'Innactive';
        $store->save();
        return redirect()->back()->with([
            'store_desactivated'=>"Store desactivated successfully "
        ]);
    }


    public function activate_store(Request $request){

        $data = $request->all();
        if( isset( $data['store'] )) {
            $store = Store::find( $data['store'] );
            if( isset($store) && $store ) {
                if( isset($data['isactive']) ) {
                    $store->status =  ( @$data['isactive'] == "true" )? 'Active' : 'Innactive';
                    $store->save();
                    return response([
                        'status'=>1,
                        'store'=>@$data['store'],
                        'isactive'=>@$store->status
                    ]);
                }
            } else {
                return response([
                    'status'  => 0,
                    'message' => "Store not found"
                ]);
            }

        }

    }



}



