<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded  = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute () {
        return asset('banners') . "/" . $this->image;
    }
}
