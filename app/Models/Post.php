<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['title', 'description', 'notify', 'website_id'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
