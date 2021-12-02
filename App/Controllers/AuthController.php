<?php

namespace App\Controllers;

use App\Auth;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class AuthController extends AControlerWithRedirect
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function loginForm()
    {
        return $this->html();
    }
    public function pridat()
    {

        return $this->html();
    }

    public function pridaterr()
    {
        $_SESSION['error'] = true;
        return $this->html();
    }
    public function login()
    {

        $name = $this->request()->getValue("login");
        $passw = $this->request()->getValue("heslo");
        $jeVDatabaze = User::getMeno($name);
        if($jeVDatabaze && $jeVDatabaze->heslo==$passw){
            Auth::login($name,$passw);
            $this->redirectHome();
        }
        else{
            $this->redirectLogin();
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->redirectHome();
    }

    public function novyLogin()
    {

        $name = $this->request()->getValue("login");
        $passw = $this->request()->getValue("heslo");
        $passwrep = $this->request()->getValue("heslorepeat");
        $jeVDatabaze = User::getMeno($name);
        if(!$jeVDatabaze && $passw==$passwrep && $name!="" && $passw!=""){
            $novyUser = new User();
            $novyUser->meno = $name;
            $novyUser->heslo = $passw;
            $novyUser->save();
            $this->redirectHome();
        }
        else{

            $this->redirectPridat();
            return $_SESSION['error'] = true;

        }
    }

    public function odstranitLogin()
    {
        $name = $this->request()->getValue("logindel");
        $jeVDatabaze = User::getMeno($name);
        if($jeVDatabaze && $name != 'admin'){
            $jeVDatabaze->deleteLogin();
            $this->redirectPridat();
        }
        else{
            $_SESSION['errorData'] = true;
            $this->redirectPridat();

        }

    }
}