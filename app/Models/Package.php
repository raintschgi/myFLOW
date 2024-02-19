<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Package extends Model
{
    use HasFactory, LogsActivity;

    protected $primaryKey = "pa_id";
    protected $fillable = [
        "pa_product_name",
        "pa_default_quota"
    ];


    //logging - Simon - Logged alles was mit dem Model passiert. gibt spezifische log Beschreibung mit (created/deleted)
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])->setDescriptionForEvent(function (string $eventName) {
                if ($eventName === 'created') {
                    return 'Produkt wurde erstellt';
                }

                if ($eventName === 'deleted') {
                    return 'Produkt wurde gelöscht';
                }

                return $eventName;
            });
    }
}
