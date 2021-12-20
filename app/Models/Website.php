<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['domain','name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function Subscribers()
    {
        return $this->belongsToMany(Subscriber::class,'website_subscriber');
    }
}
