<?php
/** @var \App\Models\Post[] $data */

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <link rel="stylesheet" href="Style/index.css">
</head>
<body>
<div id="progressbar"></div>
<div id="scrollPath"></div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-6 ">
            <?php foreach ($data as $post) { ?>
                <div class="card " style="width: 50rem ; background-color: rgba(255,0,0,0.2)">
                    <img src="/framework/<?= \App\Config\Configuration::UPLOAD_DIR . "/" . $post->file ?>"
                         class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"></p>
                        <a href="?c=home&a=addLike&postId=<?= $post->id ?>" class="btn btn-primary">
                            <?= $post->likes > 0 ? $post->likes : "" ?>
                            <i class="bi bi-hand-thumbs-up"></i>
                        </a>
                        <?php if (\App\Auth::isLogged()) { ?>
                            <div>
                                <?php foreach ($post->comments() as $comment) { ?>
                                    <d>
                                        <?= $comment->text ?>
                                        <?php if (\App\Auth::getName()=="admin") { ?>
                                        <a href="?c=home&a=delComment&delete=<?= $comment->id ?>"><button>ZMAZ</button></a>
                                        <?php } ?>
                                    </d>
                                    <hr>
                                <?php } ?>
                                <form action="/framework/?c=home&a=addComment" method="post">
                                    <input type="text" name="comment" style="background-color: rgba(123,123,123,0.5)">
                                    <input type="hidden" name="postid" value="<?= $post->id ?>">
                                    <input type="submit" value="Pridaj">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>