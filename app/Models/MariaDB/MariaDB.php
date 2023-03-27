<?php

namespace App\Models\MariaDB;

use Illuminate\Database\Eloquent\Model;

class MariaDB extends Model
{
    protected $connection = 'mariadb';
    protected $guarded = ['id'];
}
