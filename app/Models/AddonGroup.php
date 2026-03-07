<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class AddonGroup extends Model
{
    protected $fillable=['name','status'];

    public function addons()
    {
        return $this->hasMany(Addon::class,'group_id');
    }
}