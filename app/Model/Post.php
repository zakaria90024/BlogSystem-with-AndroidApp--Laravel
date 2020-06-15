<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'category_id', 'title', 'details', 'image'
  ];
}
