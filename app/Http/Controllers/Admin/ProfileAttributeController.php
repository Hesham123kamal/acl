<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileAttribute;
use Illuminate\Support\Facades\DB;


class ProfileAttributeController extends Controller {

    public function index() {

        $profile_attributes = ProfileAttribute::get();

        return view('admin.settings.index',compact('profile_attributes'));

    } // end function to display profile attributes settings

    public function edit_profile_attributes_settings() {

        $get_username_percentage_value = ProfileAttribute::where("attribute_name",'username')->first();
        $username_percentage_value = $get_username_percentage_value->percentage_value;

        $get_email_percentage_value = ProfileAttribute::where("attribute_name",'email')->first();
        $email_percentage_value = $get_email_percentage_value->percentage_value;

        $get_gender_percentage_value = ProfileAttribute::where("attribute_name",'gender')->first();
        $gender_percentage_value = $get_gender_percentage_value->percentage_value;


        return view('admin.settings.edit',compact('username_percentage_value','email_percentage_value','gender_percentage_value'));

    } // end function to edit profile attributes settings

    public function storeNewProfileAttributes(Request $request) {

        $validatedData = $request->validate([
            'username' => 'required|numeric',
            'email' => 'required|numeric',
            'gender' => 'required|numeric'
        ]);

        $new_username_percentage = $request->username;
        $new_email_percentage = $request->email;
        $new_gender_percentage = $request->gender;

        if($new_username_percentage + $new_email_percentage + $new_gender_percentage > 100) {
            return redirect()->back()->with(['error' => 'Summation Of Profile Attribute Values Can\'t Exceed 100']);
        }

         DB::table("profile_attributes")
             ->where("attribute_name",'username')
             ->update(['percentage_value' => $new_username_percentage]);

        DB::table("profile_attributes")
            ->where("attribute_name",'email')
            ->update(['percentage_value' => $new_email_percentage]);

        DB::table("profile_attributes")
            ->where("attribute_name",'gender')
            ->update(['percentage_value' => $new_gender_percentage]);

        return redirect()->back()->with(['success' => 'All Profile Attributes Updated Successfully']);


    }

}
