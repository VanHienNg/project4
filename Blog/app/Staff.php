<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name', 'positon', 'office', 'age', 'start_date', 'salary'];
}
