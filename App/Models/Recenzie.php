<?php

namespace App\Models;

use App\Core\Model;

class Recenzie extends Model
{
    public $id;
    public $meno;
    public $recenzia;
    public $hodnotenie;

    static public function setDbColumns()
    {
        return['id','meno','recenzia','hodnotenie'];
    }

    static public function setTableName()
    {
        return 'recenzie';
    }
}