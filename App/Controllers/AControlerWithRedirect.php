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

}