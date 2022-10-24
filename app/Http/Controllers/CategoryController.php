<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Store;

class CategoryController extends Controller
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
        if( $user->permissionID == 2 ) {

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

            $categories = Category::where('storeID', '=', $store->id)->paginate(4);

            if(!$categories) {
                $categories = [];
            }

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['category'] = 'Category';

            $data = [
                'name'                  => 'Category',
                'slug'                  => 'category',
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'store'                 => $store,
                'categories'            => $categories,
                'breadcrump'            => $breadcrump,
            ];

            return view('pages.category.index',compact('categories'))->with($data);
        } else {
            $data = [
                'name'   => 'Store'

            ];
            redirect('/store')->with($data);
        }
    }

    public function add(Request $request)
    {
        $user = Auth::user();

        if( $user->permissionID == 2 ) {
            $validator = Validator::make($request->all(), [
                'category_name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:15000'],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 0,
                    'errors' => $validator->errors()
                ]);
            } else {
                $id_store = $request->session()->get('id_store');
                $store = Store::find($id_store);

                $category               = new Category();
                $category->name         = $request->category_name;
                $category->description  = $request->description;
                $category->storeID      = $store->id;
                $category->save();
                $categories = Category::where('storeID', $id_store )->get();

                if( isset($request->add) && $request->add == "category" ) {
                    return response([
                        'status'        =>  1,
                        'category_id'   =>  @$category->id,
                        'category_name' =>  @$category->name
                    ]);
                } else {
                    return redirect()->back()->with([
                        'status' => 1,
                        'message_add'=>"Category added successfully"
                    ]);
                }
            }
        } else {
            return redirect('/');
        }
    }

    public function remove(Request $request)
    {
        $user = Auth::user();
        if( $user->permissionID == 2 ) {
            $data = $request->all();
            if(isset($data['id'])){
                Category::destroy($data['id']);
            }
            return redirect()->back()->with([
                'message_delete'=>"Category deleted successfully"
            ]);

        } else {
            return redirect('/category');
        }
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        if( $user->permissionID == 2 ) {

            $data = $request->all();
            $category = Category::find($data['id']);

            return response(["status"=>1, "data"=>$category]);

        } else {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if( $user->permissionID == 2 ) {
                $validator = Validator::make($request->all(),[
                    'id_update_cat' => ['required'],
                    'name_edit' => ['required', 'string', 'max:255'],
                    'description_edit' => ['required', 'string', 'max:15000'],
                ]);

                if($validator->fails()){
                    return redirect('/category');
                }
                else{
                    $data = $request->all();
                    $category = Category::find($data['id_update_cat']);
                    $category->name = $data['name_edit'];
                    $category->description = $data['description_edit'];
                    $category->save();

                    return redirect()->back()->with([
                        'message_edit'=>"Category edited successfully"
                    ]);
                }

        } else {
             return redirect('/');
        }
    }

}
