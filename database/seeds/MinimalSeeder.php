<?php

use Illuminate\Database\Seeder;

class MinimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->delete();
        DB::table('users')->insert(['username' => 'admin', 'password' => bcrypt('admin')]);
        DB::table('settings')->delete();
    	DB::table('settings')->insert([
        	['name' => 'telephone', 'value' => '0497-123456'],
        	['name' => 'mobile', 'value' => '0987654321'],
        	['name' => 'email', 'value' => 'info@example.com'],
        	['name' => 'social', 'value' => '[{"id":"facebook","icon":"/img/social/facebook.png","label":"Facebook"},{"id":"twitter","icon":"/img/social/twitter.png","label":"Twitter"},{"id":"google","icon":"/img/social/google-plus.png","label":"Google Plus"},{"id":"pinterest","icon":"/img/social/pinterest.png","label":"Pinterest"},{"id":"instagram","icon":"/img/social/instagram.png","label":"Instagram"},{"id":"linkedin","icon":"/img/social/linkedin.png","label":"LinkedIn"}]'],
            ['name' => 'facebook', 'value' => ''],
            ['name' => 'twitter', 'value' => ''],
            ['name' => 'google', 'value' => ''],
            ['name' => 'pinterest', 'value' => ''],
            ['name' => 'instagram', 'value' => ''],
            ['name' => 'linkedin', 'value' => ''],
            ['name' => 'google_analytics', 'value' => ''],
            ['name' => 'google_verification', 'value' => ''],
            ['name' => 'bing_verification', 'value' => ''],
            ['name' => 'pinterest_verification', 'value' => '']
     	]);

        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['name' => 'Motorcycle Garage', 'slug' => 'motorcycle-garage'],
            ['name' => 'Carwash', 'slug' => 'carwash'],
            ['name' => 'Event Management', 'slug' => 'event-management'],
            ['name' => 'Cameraman', 'slug' => 'cameraman'],
            ['name' => 'Contractor', 'slug' => 'contractor'],
            ['name' => 'Web Designing', 'slug' => 'web-designing'],
            ['name' => 'Attorney', 'slug' => 'attorney'],
            ['name' => 'Notary', 'slug' => 'notary'],
            ['name' => 'Orchestra', 'slug' => 'orchestra'],
            ['name' => 'School Tutor', 'slug' => 'school-tutor'],
            ['name' => 'Dance Tutor', 'slug' => 'dance-tutor'],
            ['name' => 'Travel Agent', 'slug' => 'travel-agent'],
            ['name' => 'Trade Mark Agency', 'slug' => 'trade-mark'],
            ['name' => 'Borewell', 'slug' => 'borewell'],
            ['name' => 'Martial Arts Training', 'slug' => 'martial-arts'],
            ['name' => 'Bag Repair', 'slug' => 'bag-repair']
        ]);

    }
}
