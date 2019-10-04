<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        return view('front/home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactform(Request $request)
    {
        $data = $request->except( array( '_token' ) );
        // var_dump($data);
        // $data = $request->all();
        $rule = array(
            'name' => 'required',
            'subject' => 'required',
            'email'    => 'required|email',
            'message' => 'required',
        );

        $validator = Validator::make( $data, $rule );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message'=> 'Sorry something wrong', 'error'=> $validator->errors()->all() ]);
        } else {
            $name = 'Krunal';
            $send = Mail::to('vinove@getnada.com')->send(new SendMailable($request->name));
            if($send){
                return response()->json(['success'=>true, 'message'=> 'Your query has been successfully send...']);
            }else{
                return response()->json(['success'=>false, 'message'=>'Sorry',  'error' => ['Your query has been failed'] ]);
            }
        }
    }

    /**

     * Send email.

     *

     */
    public function mail()
    {
    $name = 'Krunal';
    Mail::to('kushal.sharma@mail.vinove.com')->send(new SendMailable($name));

    return 'Email was sent';
    }

}
