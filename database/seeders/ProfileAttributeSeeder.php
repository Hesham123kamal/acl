<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfileAttribute;

class ProfileAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile_attributes = ProfileAttribute::create(
            [
                'attribute_name'   => 'username',
                'percentage_value' => 30
            ]
        );

        $profile_attributes = ProfileAttribute::create(
            [
                'attribute_name'   => 'email',
                'percentage_value' => 30
            ]
        );

        $profile_attributes = ProfileAttribute::create(
            [
                'attribute_name'   => 'gender',
                'percentage_value' => 40
            ]
        );
    } // end of run...
}
