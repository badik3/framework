<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public $meno;
    public $heslo;

    static public function setDbColumns()
    {
        return ['meno','heslo'];
    }

    static public function setTableName()
    {
        return 'users';
    }


}