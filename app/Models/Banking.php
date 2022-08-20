<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Banking extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'banking';
    
}
