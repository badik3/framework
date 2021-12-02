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
    public function recenzia()
    {
        return $this->html();
    }
    public function blog()
    {
        return $this->html();
    }
    public function pridat()
    {

        return $this->html();
    }
    public function ucet()
    {
        return $this->html();
    }
    public function tabulka()
    {
        return $this->html();
    }

    public function usery()
    {


        $users =User::getAll();
        return $this->json($users);
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
        if($jeVDatabaze && password_verify($passw,$jeVDatabaze->heslo)){
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

        $name = $this->request()->getValue("username");
        $passw = $this->request()->getValue("password");
        $passwrep = $this->request()->getValue("confirmPassword");
        $jeVDatabaze = User::getMeno($name);
        if(!$jeVDatabaze && $passw==$passwrep && $name!="" && $passw!=""){
            $novyUser = new User();
            $novyUser->meno = $name;
            $hash = password_hash($passw,PASSWORD_DEFAULT);
            $novyUser->heslo = $hash;
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

    public function updateHeslo()
    {
        $name = $_SESSION["name"];
        $passw = $this->request()->getValue("heslo");
        $passwrep = $this->request()->getValue("heslorepeat");
        if ($passw == $passwrep && $name != "" && $passw != "") {
            $jeVDatabaze = User::getMeno($name);
            if ($jeVDatabaze && $name != 'admin') {
                $jeVDatabaze->updatePassword(password_hash($passw,PASSWORD_DEFAULT), $name);
                $this->redirectUcet();
            }
        }
        else{

            $_SESSION['error'] = true;
            $this->redirectUcet();


        }
    }
}