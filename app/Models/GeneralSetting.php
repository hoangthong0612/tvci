<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    //
    protected $guarded = []; // Cho phép fill tất cả các trường

    //
    protected $table = 'general_settings';
}
