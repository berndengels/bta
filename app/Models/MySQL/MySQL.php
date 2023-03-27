<?php

namespace App\Models\MySQL;

use Illuminate\Database\Eloquent\Model;

class MySQL extends Model
{
    protected $connection = 'mysql';
    protected $guarded = ['id'];
}
