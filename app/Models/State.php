<?php
namespace App\Models;

use App\Models\Traits\FindByCode;
use App\Models\Traits\SoftDeletes;

/**
 * Class State
 * @package App\Models
 */
class State extends Model
{
    use FindByCode;
    use SoftDeletes;

    protected $fillable = ['code', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lgas()
    {
        return $this->hasMany(LGA::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function camps()
    {
        return $this->hasManyThrough(Camp::class, LGA::class, 'state_id','lga_id');
    }

    /**
     * Persons with this state as their state of origin
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function persons()
    {
        return $this->hasManyThrough(Person::class, LGA::class);
    }
}