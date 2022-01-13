<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'company';

    protected $fillable = [
        'name', 'abbrevation', 'domain', 'country', 'state', 'pan_number', 'gst_number', 'phone_no', 'email', 'website', 'address', 'created_by', 'updated_by'];

        
}
