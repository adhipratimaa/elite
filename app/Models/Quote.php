<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table='quotes';
    protected $fillable=['first_name','last_name','email','phone_number','state','city','project_location','zip', 'services', 'other_services', 'project_type', 'storey', 'house_area', 'design_start_date', 'estimated_starting_date', 'budget', 'further_information'];
}
