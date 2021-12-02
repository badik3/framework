<?php

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    public $id;
    public $likes;
    public $file;

    static public function setDbColumns()
    {
        return ['id','likes','file'];
    }

    static public function setTableName()
    {
        return 'posts';
    }

    /**
     * @return Comment[]
     * @throws \Exception
     */
    public function comments()
    {
        return Comment::getAll("post_id=?",[intval($this->id)]);
    }
}