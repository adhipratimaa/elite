<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->delete();
        $data = [
        	['title'=>'STRUCTURAL ENGINEERING','slug'=>str_slug('structural engineering'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1'],
        	['title'=>'MECHANICAL HVAC','slug'=>str_slug('mechanical hvac'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1'],
        	['title'=>'ELECTRICAL','slug'=>str_slug('electrical'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1'],
            ['title'=>'PLUMBING ENGINEERING','slug'=>str_slug('plumbing engineering'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1'],
            ['title'=>'POOL ENGINEERING','slug'=>str_slug('pool engineering'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1'],
            ['title'=>'ARTITECTURAL DESIGN & DRAFTING','slug'=>str_slug('architectural design and drafting'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1'],

            
        	];
        \App\Models\Service::insert($data);
    }
    
}
