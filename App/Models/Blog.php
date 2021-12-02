<?php

namespace App\Models;

use App\Core\Model;

class Blog extends Model
{
    public $id;
    public $file;
    public $nadpis;
    public $text;


    static public function setDbColumns()
    {
        return ['id','nadpis','text','file'];
    }

    static public function setTableName()
    {
        return 'blog';
    }

}