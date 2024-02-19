<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    use HasFactory;

    protected $primaryKey = 'we_user';
    protected $keyType = 'string';
    
    protected $fillable = [ "we_server", 
                            "we_internal_hostaddress",
                            "we_maintained_by",
                            "we_quota",
                            "we_php_vers",
                            "we_is_online",
                            "we_online_since",
                            "we_comment"];
}
