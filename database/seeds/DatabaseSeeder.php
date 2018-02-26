<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //keywords data to be seeded by default
        DB::table('keywords')->insert(
            ['name' => 'smackdown']
        );
        DB::table('keywords')->insert(
            ['name' => 'raw']
        );
        DB::table('keywords')->insert(
            ['name' => 'summerslam']
        );
        DB::table('keywords')->insert(
            ['name' => 'wrestlemania']
        );
        
        //Locations data to be seeded by default
        DB::table('locations')->insert(
            ['name' => 'miami']
        );
        DB::table('locations')->insert(
            ['name' => 'nyc']
        );
        DB::table('locations')->insert(
            ['name' => 'los angeles']
        );
        DB::table('locations')->insert(
            ['name' => 'san francisco']
        );
        
        //Video data to be seeded by default
        DB::table('videos')->insert(
            ['title' => 'firstupload','filename' => 'SampleVideo_1280x720_1mb.mp4','url' => 'uploads/SampleVideo_1280x720_1mb.mp4','duration' => '0:05','filesize' => '1055736','bitrate' => '1589890']
        );
        /*
        DB::table('videos')->insert(
            ['filename' => 'SampleVideo_1280x720_1mb.mp4']
        );
        DB::table('videos')->insert(
            ['url' => 'uploads/SampleVideo_1280x720_1mb.mp4']
        );
        DB::table('videos')->insert(
            ['duration' => '0:05']
        );
        DB::table('videos')->insert(
            ['filesize' => '1055736']
        );
        DB::table('videos')->insert(
            ['bitrate' => '1589890']
        );
        */

        $this->command->info('WWE META KEYWORDS  LOCATIONS AND SAMPLE VIDEO DATA HAS BEEN POPULATED WITH DEFAULT VALUES');
    }
}
