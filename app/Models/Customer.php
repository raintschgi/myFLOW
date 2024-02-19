<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Customer extends Model
{
    use HasFactory, LogsActivity;

    protected $primaryKey = "cu_id";
    protected $fillable = [
        "cu_firstname",
        "cu_lastname",
        "cu_street",
        "cu_zip",
        "cu_city",
        "cu_country",
        "cu_phonenumber",
        "cu_email",
        "cu_is_reseller",
        "cu_is_maintainer",
        "cu_uid"
    ];

    //logging - Simon - Logged alles was mit dem Model passiert. gibt spezifische log Beschreibung mit (created/deleted)
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])->setDescriptionForEvent(function (string $eventName) {
                if ($eventName === 'created') {
                    return 'Kunde wurde erstellt';
                }

                if ($eventName === 'deleted') {
                    return 'Kunde wurde gelöscht';
                }

                return $eventName;
            });
    }
}
