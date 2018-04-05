<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $table = "EPISODE";
    
    protected $fillable = [
        'episode_title', 
        'series_id',
    ];
    
    public function series()
    {
        return $this->belongsTo('App\model\Series');
    }
    
    public function page()
    {
        return $this->hasMany('App\model\Page');
    }
}
