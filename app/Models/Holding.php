<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Holding extends Model
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
        'holding_type'
    ];

    /**
     * A holding belongs to one user at any given time
     * 
     * @return BelongsTo 
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
