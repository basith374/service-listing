<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('states')->delete();
        DB::table('states')->insert([
            ['code' => 'AN', 'name' => 'Andaman and Nicobar'],
            ['code' => 'AP', 'name' => 'Andhra Pradesh'],
            ['code' => 'AR', 'name' => 'Arunachal Pradesh'],
            ['code' => 'AS', 'name' => 'Assam'],
            ['code' => 'BR', 'name' => 'Bihar'],
            ['code' => 'CH', 'name' => 'Chandigarh'],
            ['code' => 'CG', 'name' => 'Chhattisgarh'],
            ['code' => 'DN', 'name' => 'Dadra and Nagar Haveli'],
            ['code' => 'DD', 'name' => 'Daman and Diu'],
            ['code' => 'DL', 'name' => 'Delhi'],
            ['code' => 'GA', 'name' => 'Goa'],
            ['code' => 'GJ', 'name' => 'Gujarat'],
            ['code' => 'HR', 'name' => 'Haryana'],
            ['code' => 'HP', 'name' => 'Himachal Pradesh'],
            ['code' => 'JK', 'name' => 'Jammu and Kashmir'],
            ['code' => 'JH', 'name' => 'Jharkhand'],
            ['code' => 'KA', 'name' => 'Karnataka'],
            ['code' => 'KL', 'name' => 'Kerala'],
            ['code' => 'LD', 'name' => 'Lakshadweep'],
            ['code' => 'MP', 'name' => 'Madhya Pradesh'],
            ['code' => 'MH', 'name' => 'Maharashtra'],
            ['code' => 'MN', 'name' => 'Manipur'],
            ['code' => 'ML', 'name' => 'Meghalaya'],
            ['code' => 'MZ', 'name' => 'Mizoram'],
            ['code' => 'NL', 'name' => 'Nagaland'],
            ['code' => 'OD', 'name' => 'Odisha'],
            ['code' => 'PY', 'name' => 'Puducherry'],
            ['code' => 'PB', 'name' => 'Punjab'],
            ['code' => 'RJ', 'name' => 'Rajasthan'],
            ['code' => 'SK', 'name' => 'Sikkim'],
            ['code' => 'TN', 'name' => 'Tamil Nadu'],
            ['code' => 'TS', 'name' => 'Telangana'],
            ['code' => 'TR', 'name' => 'Tripura'],
            ['code' => 'UP', 'name' => 'Uttar Pradesh'],
            ['code' => 'UK', 'name' => 'Uttarakhand'],
            ['code' => 'WB', 'name' => 'West Bengal'],
        ]);
    }
}
