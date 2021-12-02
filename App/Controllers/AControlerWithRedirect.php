<?php

namespace App\Controllers;

use App\Core\AControllerBase;

abstract class AControlerWithRedirect extends AControllerBase
{
    protected function redirectHome()
    {
        header("Location:?c=home");
    }

    protected function redirectLogin()
    {
        header("Location:?c=Auth&a=loginForm");
    }
    protected function redirectPridat()
    {
        header("Location:?c=Auth&a=pridat");
    }

    protected function redirectUcet()
    {
        header("Location:?c=Auth&a=ucet");
    }
    protected function rediRectrecenzia()
    {
        header("Location:?c=Auth&a=recenzia");
    }
    protected function rediBlog()
    {
        header("Location:?c=Auth&a=blog");
    }
}