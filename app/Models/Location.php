<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Location
 *
 * @property int $id
 * @property int $zipcode
 * @property string $place
 * @property string $state
 * @property string|null $community
 * @property string|null $community_code
 * @property string|null $latitude
 * @property string|null $longitude
 * @method static Builder|Location newModelQuery()
 * @method static Builder|Location newQuery()
 * @method static Builder|Location query()
 * @method static Builder|Location whereCommunity($value)
 * @method static Builder|Location whereCommunityCode($value)
 * @method static Builder|Location whereId($value)
 * @method static Builder|Location whereLatitude($value)
 * @method static Builder|Location whereLongitude($value)
 * @method static Builder|Location wherePlace($value)
 * @method static Builder|Location whereState($value)
 * @method static Builder|Location whereZipcode($value)
 * @mixin Eloquent
 */
class Location extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
}
