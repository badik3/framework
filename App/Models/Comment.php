<?php

namespace App\Models;

use App\Core\Model;

class Comment extends Model
{
    public $id;
    public $post_id;
    public $text;

    static public function setDbColumns()
    {
        return['id','post_id','text'];
    }

    static public function setTableName()
    {
        return 'comments';
    }
}