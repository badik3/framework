<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Recenzie;
use App\Models\User;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControlerWithRedirect
{

    public function index()
    {
        $post = Post::getAll();
        return $this->html($post);

    }
    public function post()
    {
        return $this->html(
            []
        );
    }




    public function usery()
    {
        $users =User::getAll();
        return $this->json($users);
    }

    public function nehnutelnosti(){
        return $this->html();
    }

    public function addLike()
    {
        $postId = $this->request()->getValue('postId');
        if ($postId){
            $post = Post::getOne($postId);
            $post->likes+=1;
            $post->save();
        }
        $this->redirectHome();
    }

    public function upload()
    {
        if (isset($_FILES["subor"]) && $_FILES["subor"]["error"] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["subor"]["tmp_name"];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = date("Y-m-H-i-s_") . ($_FILES["subor"]["name"]);
            $path = Configuration::UPLOAD_DIR . "/$name";
            move_uploaded_file($tmp_name, $path);
            $newPost = new Post();
            $newPost->file = $name;
            $newPost->likes = 0;
            $newPost->nadpis = $this->request()->getValue('nadpis');
            $newPost->popis = $this->request()->getValue('popis');
            $newPost->telefon = $this->request()->getValue('telefon');
            $newPost->lokalita = $this->request()->getValue('lokalita');
            $newPost->rozloha = $this->request()->getValue('rozloha');
            $newPost->cena = $this->request()->getValue('cena');
            $newPost->save();
        }
        $this->redirectHome();
        
    }

    public function addComment()
    {
        if(!Auth::isLogged()){
            $this->redirectHome();
        }
        $postId = $this->request()->getValue('postid');
        if ($postId){
            $comm= new Comment();
            $comm->text= $this->request()->getValue('comment');
            $comm->post_id= $postId;
            $comm->save();
        }
        $this->redirectHome();
        
    }
    public function delComment()
    {
        if(!Auth::isLogged()){
            $this->redirectHome();
        }
        $comId = $this->request()->getValue('delete');
        if ($comId){
            $coment = Comment::getOne($comId);
            $coment->delete();
        }
        $this->redirectHome();

    }

    public function delPrispevok()
    {
        if(!Auth::isLogged()){
            $this->redirectHome();
        }
        $postId = $this->request()->getValue('delete');
        if ($postId){
            $coments = new Comment();
            $coments->deleteAll($postId);
            $post = Post::getOne($postId);
            $post->delete();
        }
        $this->redirectHome();

    }
    public function vsetciUser()
    {
        return User::getAll();

    }

    public function delBlog()
    {
        if(!Auth::isLogged()){
            $this->rediBlog();
        }
        $postId = $this->request()->getValue('deleteBlog');
        if ($postId){
            $post = Blog::getOne($postId);
            $post->delete();
        }
        $this->rediBlog();

    }
    public function uploadPrispevok()
    {
        $hodnota = $this->request()->getValue('zmena');
        $volba = $this->request()->getValue('volba');
        $id = $this->request()->getValue('plssId');

        $post = Post::getOne($id);
        if ($hodnota) {
            if ($volba == "1") {
                $post->telefon = $hodnota;
            }
            if ($volba == "2") {
                $post->rozloha = $hodnota;
            }
            if ($volba == "3") {
                $post->lokalita = $hodnota;
            }
            if ($volba == "4") {
                $post->cena = $hodnota;
            }
        }
        $post->save();
        $this->redirectHome();

    }
    public function pridajRec()
    {
        $meno = $this->request()->getValue('menorec');
        $recenzia = $this->request()->getValue('recenzia');
        $hodnotenie = $this->request()->getValue('hodnotenie');

        $rec = new Recenzie();
        $rec->meno=$meno;
        $rec->recenzia=$recenzia;
        $rec->hodnotenie=$hodnotenie;
        $rec->save();
        $this->rediRectrecenzia();

    }


    public function blogUpload()
    {
        if (isset($_FILES["subor"]) && $_FILES["subor"]["error"] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["subor"]["tmp_name"];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = date("Y-m-H-i-s_") . ($_FILES["subor"]["name"]);
            $path = Configuration::UPLOAD_DIR . "/$name";
            move_uploaded_file($tmp_name, $path);
            $newPost = new Blog();
            $newPost->file = $name;
            $newPost->nadpis = $this->request()->getValue('blogNadpis');
            $newPost->text = $this->request()->getValue('blogText');
            $newPost->save();
        }
        $this->rediBlog();

    }




}