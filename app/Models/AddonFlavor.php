<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class AddonFlavor extends Model
{
    protected $fillable=['addon_id','flavor'];

    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }
}