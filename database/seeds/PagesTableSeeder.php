<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();
        $data = [
        	['title'=>'REFERRAL PROGRAM','slug'=>str_slug('referral-programs'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1','main'=>1],
            ['title'=>'CAREER','slug'=>str_slug('career'),'image'=>'','description'=>'','short_description'=>'','publish'=>'1','main'=>1],
        	
            
        	];
        \App\Models\Page::insert($data);
    }
}
