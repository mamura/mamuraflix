<?php

namespace Modules\Videos\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Videos\Database\Factories\VideoFactory;

class Video extends Model
{
    use HasFactory;

    protected $table    = 'videos';
    protected $fillable = ['title', 'description', 'url'];

}
