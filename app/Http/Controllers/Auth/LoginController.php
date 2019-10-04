<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('front/login');
    }
    public function login( Request $request )
    {
        $data = $request->except( array( '_token' ) );

        // $data = $request->all();
        $rule = array(
            'email'    => 'required|email',
            'password' => 'required',
        );

        $validator = Validator::make( $data, $rule );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message'=> 'Login failed!!', 'error'=> $validator->errors()->all() ]);
        } else {
            // no need to populate $data again with the same values
            $data = $request->except( array( '_token' ) );

            if (Auth::attempt( $data )) {
                // here i want to check logged in user role
                $user = Auth::user();
                if ( $user->role != 'subscriber' ) {
                    // return Redirect::to( '/dashboard' );
                    return response()->json(['success'=>true, 'message'=> 'Login success! Please wait...', 'redirect_to'=> 'admin/dashboard' ]);
                }
                return response()->json(['success'=>true, 'message'=> 'Login success! Please wait...', 'redirect_to'=> '' ]);
            }else{
                return response()->json(['success' => false, 'message'=> 'Login failed!!', 'error'=> ['No record found!!!'] ]);
            }
        }
    }
}
