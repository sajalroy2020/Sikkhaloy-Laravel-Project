<?php

namespace Database\Seeders;

use App\Models\TBLAdmin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DistrictListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ['school_id' => 1, 'district_name' => 'Bagerhat'],
            ['school_id' => 1, 'district_name' => 'Bandarban'],
            ['school_id' => 1, 'district_name' => 'Barguna'],
            ['school_id' => 1, 'district_name' => 'Barisal'],
            ['school_id' => 1, 'district_name' => 'Bhola'],
            ['school_id' => 1, 'district_name' => 'Bogra'],
            ['school_id' => 1, 'district_name' => 'Brahmanbaria'],
            ['school_id' => 1, 'district_name' => 'Chandpur'],
            ['school_id' => 1, 'district_name' => 'Chattogram'],
            ['school_id' => 1, 'district_name' => 'Chuadanga'],
            ['school_id' => 1, 'district_name' => 'Comilla'],
            ['school_id' => 1, 'district_name' => 'Cox\'sBazar'],
            ['school_id' => 1, 'district_name' => 'Dhaka'],
            ['school_id' => 1, 'district_name' => 'Dinajpur'],
            ['school_id' => 1, 'district_name' => 'Faridpur'],
            ['school_id' => 1, 'district_name' => 'Feni'],
            ['school_id' => 1, 'district_name' => 'Gaibandha'],
            ['school_id' => 1, 'district_name' => 'Gazipur'],
            ['school_id' => 1, 'district_name' => 'Gopalganj'],
            ['school_id' => 1, 'district_name' => 'Hobiganj'],
            ['school_id' => 1, 'district_name' => 'Jamalpur'],
            ['school_id' => 1, 'district_name' => 'Jessore'],
            ['school_id' => 1, 'district_name' => 'Jhalokathi'],
            ['school_id' => 1, 'district_name' => 'Jhenaidah'],
            ['school_id' => 1, 'district_name' => 'Joypurhat'],
            ['school_id' => 1, 'district_name' => 'Khagrachari'],
            ['school_id' => 1, 'district_name' => 'Khulna'],
            ['school_id' => 1, 'district_name' => 'Kishoreganj'],
            ['school_id' => 1, 'district_name' => 'Kurigram'],
            ['school_id' => 1, 'district_name' => 'Khushtia'],
            ['school_id' => 1, 'district_name' => 'Lakshmipur'],
            ['school_id' => 1, 'district_name' => 'Lalmonirhat'],
            ['school_id' => 1, 'district_name' => 'Madaripur'],
            ['school_id' => 1, 'district_name' => 'Magura'],
            ['school_id' => 1, 'district_name' => 'Manikgonj'],
            ['school_id' => 1, 'district_name' => 'Meherpur'],
            ['school_id' => 1, 'district_name' => 'Moulvibazar'],
            ['school_id' => 1, 'district_name' => 'Meherpur'],
            ['school_id' => 1, 'district_name' => 'Munshigonj'],
            ['school_id' => 1, 'district_name' => 'Mymensingh'],
            ['school_id' => 1, 'district_name' => 'Naogaon'],
            ['school_id' => 1, 'district_name' => 'Narail'],
            ['school_id' => 1, 'district_name' => 'Narayangonj'],
            ['school_id' => 1, 'district_name' => 'Narshingdi'],
            ['school_id' => 1, 'district_name' => 'Natore'],
            ['school_id' => 1, 'district_name' => 'Nawabganj'],
            ['school_id' => 1, 'district_name' => 'Netrakona'],
            ['school_id' => 1, 'district_name' => 'Nilphamari'],
            ['school_id' => 1, 'district_name' => 'Noakhali'],
            ['school_id' => 1, 'district_name' => 'Pabna'],
            ['school_id' => 1, 'district_name' => 'Panchagarh'],
            ['school_id' => 1, 'district_name' => 'Patuakhali'],
            ['school_id' => 1, 'district_name' => 'Pirojpur'],
            ['school_id' => 1, 'district_name' => 'Rajbari'],
            ['school_id' => 1, 'district_name' => 'Rajshahi'],
            ['school_id' => 1, 'district_name' => 'Rangamati'],
            ['school_id' => 1, 'district_name' => 'Rangpur'],
            ['school_id' => 1, 'district_name' => 'Satkhira'],
            ['school_id' => 1, 'district_name' => 'Shariatpur'],
            ['school_id' => 1, 'district_name' => 'Sherpur'],
            ['school_id' => 1, 'district_name' => 'Sirajganj'],
            ['school_id' => 1, 'district_name' => 'Sunamganj'],
            ['school_id' => 1, 'district_name' => 'Sylhet'],
            ['school_id' => 1, 'district_name' => 'Tangail'],
            ['school_id' => 1, 'district_name' => 'Thakurgaon'],
        ];

        foreach ($districts as $district) {
            DB::table('tbl_district_list')->insert($district);
        }
    }
}
