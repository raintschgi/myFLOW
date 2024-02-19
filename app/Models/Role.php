<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public const IS_VIEWER = 1;
    public const IS_BILLING = 2;
    public const IS_SOC = 3;
    public const IS_ADMIN = 4;
    

    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    
}
