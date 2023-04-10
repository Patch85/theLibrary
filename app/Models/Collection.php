<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * A Collection belongs to one user
     * 
     * @return BelongsTo 
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A Collection can contain many Holdings
     * 
     * @return HasMany 
     */
    public function contents()
    {
        return $this->hasMany(Holding::class);
    }
}
