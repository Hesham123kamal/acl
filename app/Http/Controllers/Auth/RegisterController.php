<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\ProfileAttribute;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
          //  'gender' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $profilePercentage = 0;

        $get_username_percentage_value = ProfileAttribute::where("attribute_name",'username')->first();
        $username_percentage_value = $get_username_percentage_value->percentage_value;

        $get_email_percentage_value = ProfileAttribute::where("attribute_name",'email')->first();
        $email_percentage_value = $get_email_percentage_value->percentage_value;

        $get_gender_percentage_value = ProfileAttribute::where("attribute_name",'gender')->first();
        $gender_percentage_value = $get_gender_percentage_value->percentage_value;

        if(isset($data['name']) && !empty($data['name'])) {
            $profilePercentage += $username_percentage_value;
        }

        if(isset($data['email']) && !empty($data['email'])) {
            $profilePercentage += $email_percentage_value;
        }

        if(isset($data['gender']) && !empty($data['gender'])) {
            $profilePercentage += $gender_percentage_value;
        }

        $user = User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'profile_percentage' => (string)$profilePercentage,
                'password' => Hash::make($data['password']),
            ]
        );

        $user->attachRole('user');

        return $user;
    }
}
