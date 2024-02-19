<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = "or_id";
    protected $fillable = [ "or_type", 
                            "or_discount",
                            "or_is_in_settlement",
                            "or_cancelled_since",
                            "or_replacement",
                            "or_price",
                            "or_creation_date",
                            "or_billing_date",
                            "or_comment",
                            
                            // FKs
                            "cu_id",
                            "ot_id",
                            "we_user",
                            "do_name"];
}
