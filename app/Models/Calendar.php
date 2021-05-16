<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'event_name',
    //     'event_image',
    //     'event_description',
    //     'start_date',
    //     'end_date'
    // ];
}
