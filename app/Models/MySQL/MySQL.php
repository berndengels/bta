<?php

namespace App\Models\MySQL;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MySQL\MySQL
 *
 * @method static Builder|MySQL newModelQuery()
 * @method static Builder|MySQL newQuery()
 * @method static Builder|MySQL query()
 * @mixin Eloquent
 */
class MySQL extends Model
{
    protected $connection = 'mysql';
    protected $guarded = ['id'];
}
