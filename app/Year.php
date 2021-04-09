<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $dates = [
        'closure_date', 'final_closure_date',
    ];
}
