<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\UserInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:6',                 // must be at least 5 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ],
        [
            'name.required' => 'Please enter valid name',
            'password.required' => 'Your password must be of 5 minimum character',
            'password.confirmed' => 'Your password did not match',
            'password.regex' => 'Your password must contain a letter (capital and small), a number and symbol',
            'email.required' => 'Please enter a valid email',
        ]
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $country = DB::table('countries')->where('id', $data['country'] )->pluck('country_name');
        $state = DB::table('states')->where('id', $data['state'] )->pluck('state_name');
        $city = DB::table('cities')->where('id', $data['city'] )->pluck('city_name');

        if( $data['type'] == 'organization' )
        {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $userInfo = new UserInfo;
            $userInfo->user_id = $user->id;
            $userInfo->street = $data['street'];
            $userInfo->type = $data['type'];
            $userInfo->type = $data['company_name'];
            $userInfo->type = $data['position'];
            $userInfo->country = $data['country'];
            $userInfo->state = $data['state'];
            $userInfo->city = $data['city'];
            $userInfo->post_code = $data['post_code'];
            $userInfo->save();
            return $user;
        }
        else{
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $userInfo = new UserInfo;
            $userInfo->user_id = $user->id;
            $userInfo->street = $data['street'];
            $userInfo->type = $data['type'];
            $userInfo->country = $data['country'];
            $userInfo->state = $data['state'];
            $userInfo->city = $data['city'];
            $userInfo->post_code = $data['post_code'];
            $userInfo->save();
            return $user;
        }
    }

    public function showRegistrationForm()
    {
        $countries = DB::table('countries')->select('id', 'country_name')->get();
        return view('auth.register')->with('countries', $countries);
    }
}
