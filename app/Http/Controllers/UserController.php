<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Store;
use Str;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $id_store = $request->session()->get('id_store');
        $store = Store::find($id_store);


        if( $user ) {
            if($user->permissionID == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['user'] = 'Profil';

            $data = [
                'name'                  => 'My Account',
                'slug'                  => 'My Account',
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'store'                 => $store,
                'breadcrump'            => $breadcrump,
            ];
            return view('pages.user.index')->with($data);
        } else {
            $data = [
                'name'                  => 'My Account',
                'slug'                  => 'My Account',
            ];
            return view('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(Request $request)
    {
        $user = Auth::user();

        $id_store = $request->session()->get('id_store');
        $store = Store::find($id_store);

        if( $user ) {
            if($user->permissionID == 1){
                $isAdmin = 'Admin';
            }else{
                $isAdmin = 'User';
            }

            $breadcrump = [];
            $breadcrump['store'] = 'Home';
            $breadcrump['dashbord'] = 'Dashboard';
            $breadcrump['user.edit'] = 'Account settings';

            $data = [
                'name'                  => 'My Account',
                'slug'                  => 'My Account',
                'user'                  => $user,
                'isAdmin'               => $isAdmin,
                'store'                 => $store,
                'breadcrump'            => $breadcrump,
            ];
            return view('pages.user.edit')->with($data);
        } else {
            $data = [
                'name'                  => 'My Account',
                'slug'                  => 'My Account',
            ];
            return redirect('/login');
        }
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

        if( $user ) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'digits:10'],
            ]);

            // $imageName = time() . '.' . $request->profil_img->extension();

            // $request->profil_img->storeAs('profil_images', $imageName, 'public');


            $file = $request->file('profil_images');


            if($file){
                $name = Str::random(10);
                $url = Storage::putFileAs('images', $file, $name . '.' . $file->extension());
                $user->profil_img = $url;
            }
            $user->name = $request->name;
            $user->phone = $request->phone;

            $user->save();

            return redirect('/user/edit')->with([
                'message'=>"Successfull profil modification"
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function updateMail(Request $request)
    {
        $user = Auth::user();

        if( $user ) {

            $validated = $request->validate([
                'emailaddress' => ['required', 'string', 'email', 'max:255'],
                'confirmemailpassword' => ['required', 'string'],
            ]);
            // $pw =  Hash::make($request->confirmemailpassword);
            if (Hash::check($request->confirmemailpassword, $user->password)) {
                $user->email = $request->emailaddress;
                $user->save();
                return redirect()->back()->with('success', 'L\'email a été bien modifié !!');
            } else {
                return redirect('/user/edit')->with([
                    'message_email'=>"Error , Incorrect Password !!"
                ]);
            }
        } else {
            return redirect('/login');
        }
    }


    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        if( $user ) {

            $validated = $request->validate([
                'currentpassword' => ['required', 'string'],
                'newpassword' => ['required', 'string'],
                'confirmpassword' => ['required', 'string'],
            ]);

            if (Hash::check($request->currentpassword, $user->password)) {
                if ( $request->newpassword == $request->confirmpassword) {
                    $user->password = Hash::make($request->newpassword);     ;
                    $user->save();
                    return redirect('/user/edit')->with([
                        'msg_pwd'=>"Your password is modified successfuly !!"
                    ]);
                }else {
                    return redirect('/user/edit')->withErrors(['msg' => 'Error in confirm password']);
                }
            } else {
                 return redirect('/user/edit')->withErrors(['msg' => 'Error in current password']);
            }
        } else {
            return redirect('/login');
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

    public function desactive(Request $request)
    {
        $user = Auth::user();

        if( $user ) {

            $validator = $request->validate([
                'deactivate' => ['required', 'integer', 'max:255'],
            ]);
            if ($validator->fails()) {
                return redirect('/user/desactive')->with([
                    'message_error'=>"Please check the box to deactivate your account"
                ]);
            }

            $user->isActive = 0;
            $user->save();
            return redirect('/store');

        }
    }

    public function remove(Request $request){

        $user = Auth::user();

        if( $user ) {
               $user->isActive = 0;
               $user->save();
            }
            return redirect('/');

    }
}
