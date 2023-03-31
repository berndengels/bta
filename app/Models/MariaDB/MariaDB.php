<?php

namespace App\Models\MariaDB;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MariaDB\MariaDB
 *
 * @method static Builder|MariaDB newModelQuery()
 * @method static Builder|MariaDB newQuery()
 * @method static Builder|MariaDB query()
 * @mixin Eloquent
 */
class MariaDB extends Model
{
    protected $connection = 'mariadb';
    protected $guarded = ['id'];
}
