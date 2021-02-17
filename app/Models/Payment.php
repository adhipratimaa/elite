<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table='payments';
	protected $fillable=['name','company_name','amount','remark','banner_image'];
    
}
