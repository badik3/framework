<!DOCTYPE html>
<html lang="sk">
<head>
    <title>LEVELREALITY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css.css">

</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark justify-content-end">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="public/imgs/levelLogo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?c=home&a=nehnutelnosti">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=home">Nehnuteľnosti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=Auth&a=blog">Blog</a>
                </li>
                <?php if(!\App\Auth::isLogged()){?>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=Auth&a=recenzia">Recenzie</a>
                    </li>
                <?php }?>
                <?php if(\App\Auth::isLogged()){?>
                    <?php if(\App\Auth::getName()=='admin'){?>
                            <?php $_SESSION['error'] = false ?>
                            <?php $_SESSION['errorData'] = false ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?c=Auth&a=pridat">Pridat Login</a>
                        </li>


                    <?php }?>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=home&a=post">Pridat Prispevok</a>
                    </li>
                    <?php if(\App\Auth::getName()!='admin'){?>
                        <?php $_SESSION['error'] = false ?>
                        <?php $_SESSION['errorData'] = false ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?c=Auth&a=ucet">Učet</a>
                        </li>
                    <?php }?>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=Auth&a=logout">Logout</a>
                    </li>

                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=Auth&a=loginForm">Login</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mt-2">
        <div class="col">
                <?= $contentHTML ?>
        </div>
    </div>
</div>

<div id="spod" class="col-md-12">
    <div class="container">
        <div class="row">
            <div class="col-lg text-left text-lg-center align-content-center mb-4 mb-lg-0">
                <div>
                    <img src="https://levelreality.sk/app/themes/level-reality/dist/images/logo_white_2b8ffbab.svg" alt="" width="180">

                </div>
            </div>

            <div class="col-lg">
                <section class="widget text-2 widget_text"><h5>Kontakty</h5>			<div class="textwidget"><p>Marcel Vydra<br>
                            <a href="tel:+421 911 781 636">+421 911 781 636</a></p>
                        <p>Samuel Badík<br>
                            <a href="tel:+421 910 543 004">+421 910 543 004</a></p>
                    </div>
                </section>                </div>

            <div class="col-lg">
                <section class="widget nav_menu-2 widget_nav_menu"><h5>Služby</h5><div class="menu-footer-sluzby-container"><ul id="menu-footer-sluzby" class="menu"><li id="menu-item-66" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-66"><a href="/sluzby#development">Development</a></li>
                            <li id="menu-item-67" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-67"><a href="/sluzby#realitne-sluzby">Realitné služby</a></li>
                            <li id="menu-item-68" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-68"><a href="/sluzby#financne-sluzby">Finančné služby</a></li>
                            <li id="menu-item-69" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-69"><a href="/sluzby#stavebnictvo">Stavebníctvo</a></li>
                            <li id="menu-item-70" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-70"><a href="/sluzby#vykup-pozemkov">Výkup pozemkov</a></li>
                        </ul></div></section>                </div>

            <div class="col-lg">
                <section class="widget nav_menu-3 widget_nav_menu"><h5>O spoločnosti</h5><div class="menu-footer-2-container"><ul id="menu-footer-2" class="menu"><li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="https://levelreality.sk/o-nas/">O nás</a></li>
                            <li id="menu-item-72" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-72"><a href="/blog/">Blog</a></li>
                            <li id="menu-item-73" class="menu-item menu-item-type-post_type_archive menu-item-object-nehnutelnosti menu-item-73"><a href="https://levelreality.sk/nehnutelnosti/">Nehnuteľnosti</a></li>
                            <li id="menu-item-74" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-74"><a href="https://levelreality.sk/kariera/">Kariéra</a></li>
                            <li id="menu-item-75" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-75"><a href="https://levelreality.sk/kontakt/">Kontakt</a></li>
                            <li id="menu-item-76" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-76"><a target="_blank" rel="noopener" href="https://webmail.levelreality.sk">Privátna zóna</a></li>
                            <li id="menu-item-350" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-350"><a href="/app/uploads/2021/09/podmienky_sprostredkovania.docx">Podmienky sprostredkovania</a></li>
                        </ul></div></section>                </div>
        </div>
    </div>
</div>
</body>
</html>

