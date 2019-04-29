<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Article extends MongoModel
{
    protected $connection = 'mongodb';
    protected $collection = 'articles';
    
    protected $fillable = [
        'title', 'content', 'author', 'publish_state', 'publish_date', 'num_views'
    ];
}
