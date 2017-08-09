<?php

namespace App;

use BaoPham\DynamoDb\DynamoDbModel as Model;

class DynamoPost extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'txt', 'media', 'ext'
    ];
}
