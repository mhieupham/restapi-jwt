<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'tbl_posts';
    protected $fillable=['post_content','post_image'];
    protected $primaryKey = 'id';
}
