<?php
/** @var \App\Models\User[] $data */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title>FRI-MVC FW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Style/loginFormular.css">
    <link rel="stylesheet" href="Style/blog.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<script type="text/javascript" src="Scripts/formularInfo.js"></script>

<body>
    <div>
        <?php if(\App\Auth::getName()=='admin'){?>
            <?php $_SESSION['error'] = false ?>
            <?php $_SESSION['errorData'] = false ?>
            <form method="post" enctype="multipart/form-data" action="/framework/?c=home&a=blogUpload">
                <div>
                    <label for="formFileLg" class="form-label">Obrazok</label>
                    <input name="subor" class="form-control form-control-lg" id="formFileLg" type="file" accept="image/jpeg" required>
                </div>

                <div>
                    <label for="formFileLg" class="form-label">Nadpis</label>
                    <input class="form-control form-control-lg" type="text" name="blogNadpis" id="nadpis" placeholder="Nadpis"required>
                </div>

                <div>
                    <label for="formFileLg" class="form-label">Popis</label>
                    <textarea name="blogText" id="textarea" cols="30" rows="5" class="form-control" placeholder="Popis" required=""></textarea>

                </div>
                <a><input type="submit" value="Uverejniť článok"></a>

            </form>
        <?php }?>

    </div>
    <div id="Bnadpis" class="page-header">
        <div class="container">
            <h1 id="Bh1" class="page-header__title">Blog</h1>
        </div>
    </div>
    <div class="container page-content">
        <?php foreach ($toto = \App\Models\Blog::getAll() as $blog) { ?>
            <article class="post-article">
                <div>
                    <?php if (\App\Auth::getName()=="admin") { ?> <a href="?c=home&a=delBlog&deleteBlog=<?= $blog->id ?>"><button class="butty" id="1" ><i class="bi bi-trash-fill"></i></button></a> <?php } ?>
                </div>

                <div class="row">
                    <div class="col-md-5 col-lg-4">
                            <img width="1024" height="576" src="/framework/<?= \App\Config\Configuration::UPLOAD_DIR . "/" . $blog->file ?>" class="img-fluid post-thumbnail wp-post-image" alt="" loading="lazy" >
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <div class="post-categories-wrapper">

                        </div>
                        <h2 class="post-title">
                            <?= $blog->nadpis ?>
                        </h2>
                        <p><?= $blog->text ?></p>
                        <a href="https://levelreality.sk/1097-2/" class="btn p-0">CELÝ ČLÁNOK<img src="https://levelreality.sk/app/themes/level-reality/dist/images/arrow_dark_f14e3ce4.svg"></a>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</body>

</html>