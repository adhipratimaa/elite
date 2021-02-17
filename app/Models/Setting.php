<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table='settings';
   	protected $fillable=['facebook','twitter','linkedin','email','youtube','fav_icon','logo','home','program_banner_image','services_banner_image','career_banner_image','home_text','contact_banner_image','services_banner_image', 'blog_banner_image', 'complete_project', 'experience', 'work', 'image', 'title', 'short_description', 'description', 'footer_description', 'quote_banner_image','footer_logo', 'phone', 'address', 'office_map', 'cell'];

   	
   	public function youtubeVideo($url){
    	$url_string = parse_url($url, PHP_URL_QUERY);
  		parse_str($url_string, $args);
  		return isset($args['v']) ? $args['v'] : false;
    }
}
