<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'title',
        'album_id',
        'url',
        'thumbnail_url'
    ];

    public function album()
    {
        return $this->belongsTo(Photo::class);
    }
}
