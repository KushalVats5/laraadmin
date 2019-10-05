<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use \Crypt;
use Validator;
use Hash;
class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
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

    /**
     * Display edit profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile($id)
    {
        //
        $user= User::find($id);

        return view('admin.editProfile',compact('user'));

    }

    /**
     * Display update profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required',

            'email' => 'required',

        ]);
        User::find($id)->update($request->all());

        return redirect()->back()

                        ->with('success','Profile updated successfully');

    }

    /**
     * Show Change Password Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm(){
        return view('admin.reset');
    }

    public function updatePassword( Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        /*
        * Validate all input fields
        */
        $this->validate($request, [

            'old_password' => 'required',
            'password' => 'required|min:6|confirmed|different:old_password',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
        $user->fill([
            'password' => Hash::make($request->password)
            ])->save();

        $request->session()->flash('success', 'Your password has been changed');
            return redirect()->back();

        } else {
            $request->session()->flash('error', 'Your password does not match');
            return redirect()->back();
        }
        dd($request);
    }
}
