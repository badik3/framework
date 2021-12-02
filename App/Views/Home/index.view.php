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
<section class="wrapper-gallery" id="skuska">
    <div class="row justify-content-md-center">
        <div class="col col-center ">
            <?php foreach ($data as $post) { ?>
                <div class="card " style=" background-color: rgba(255,0,0,0.2)">
                    <div>
                        <h2 id="elementH2"><?= $post->nadpis ?></h2>
                        <?php if (\App\Auth::getName()=="admin") { ?>
                            <a  href="?c=home&a=delPrispevok&delete=<?= $post->id ?>"><button id="zmaz">ZMAZ</button></a>
                        <?php } ?>
                    </div>

                    <br>
                    <img src="/framework/<?= \App\Config\Configuration::UPLOAD_DIR . "/" . $post->file ?>"
                         class="card-img-top" alt="...">
                    <br>
                    <h3 id="informacie">Informácie:</h3>
                    <?php if (\App\Auth::getName()=="admin") { ?><a><button class="butty" id="1/<?= $post->id ?>" ><i class="bi bi-pen-fill"></i></button></a><?php } ?><p id="inf"><i class="bi bi-telephone-fill"></i><?= $post->telefon ?></p>
                    <?php if (\App\Auth::getName()=="admin") { ?><a><button class="butty" id="2/<?= $post->id ?>" ><i class="bi bi-pen-fill"></i></button></a><?php } ?><p id="inf"><i class="bi bi-aspect-ratio-fill"></i> <?= $post->rozloha ?> m<sup>2</sup></p>
                    <?php if (\App\Auth::getName()=="admin") { ?><a><button class="butty" id="3/<?= $post->id ?>" ><i class="bi bi-pen-fill"></i></button></a><?php } ?><p id="inf"><i class="bi bi-geo-alt-fill"></i> <?= $post->lokalita ?></p>
                    <?php if (\App\Auth::getName()=="admin") { ?><a><button class="butty" id="4/<?= $post->id ?>" ><i class="bi bi-pen-fill"></i></button></a><?php } ?><p id="inf"><i class="bi bi-cash"></i> <?= $post->cena ?>€</p>
                    <div>
                        <h4 id="popis">Popis</h4>
                        <p id="elementP"><?= $post->popis ?></p>
                    </div>

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
                                            <a  href="?c=home&a=delComment&delete=<?= $comment->id ?>"><button id="zmaz">ZMAZ</button></a>
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
                <br>
            <?php } ?>
        </div>
    </div>
</section>
<script src="Scripts/editovanie.js"></script>
</body>
