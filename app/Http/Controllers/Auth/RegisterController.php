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
                'string',
                'min:6',                 // must be at least 5 characters in length
                // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                // 'regex:/[0-9]/',      // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ]);
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
                'type' => $data['type'],
                'company_name' => $data['company_name'],
                'position' => $data['position'],
                'password' => Hash::make($data['password']),

                // Address
                'street' => $data['street'],
                'country' => $country[0],
                'state' => $state[0],
                'city' => $city[0],
                'post_code' => $data['post_code'],
            ]);
            $userInfo = new UserInfo;
            $userInfo->street = $data['street'];
            $userInfo->country = $country[0];
            $userInfo->state = $state[0];
            $userInfo->city = $city[0];
            $userInfo->post_code = $data['post_code'];
            $userInfo->save();
            return $user;
        }
        else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => $data['type'],
                'password' => Hash::make($data['password']),
            ]);
            $userInfo = new UserInfo;
            $userInfo->street = $data['street'];
            $userInfo->country = $country[0];
            $userInfo->state = $state[0];
            $userInfo->city = $city[0];
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
