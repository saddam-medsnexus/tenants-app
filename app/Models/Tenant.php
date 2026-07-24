<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'slug', 'domain', 'plan', 'active'];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
