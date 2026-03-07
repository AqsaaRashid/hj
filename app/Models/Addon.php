<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Addon extends Model
{
    protected $fillable=[
        'group_id','name','price','image','has_flavors'
    ];

    public function group()
    {
        return $this->belongsTo(AddonGroup::class);
    }

    public function flavors()
    {
        return $this->hasMany(AddonFlavor::class);
    }
}