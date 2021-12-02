<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Comment;
use App\Models\Post;

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


}