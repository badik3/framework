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


</head>
<script type="text/javascript" src="Scripts/formularInfo.js"></script>
<body>

<?php if($_SESSION['error'] == true){ ?><div class="alert alert-danger alert-dismissible">
    <label>Zle zadane meno alebo heslo.</label>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <?= $_SESSION['error'] ?></div>

<?php } ?>
<?php if($_SESSION['errorData'] == true){ ?><div class="alert alert-danger alert-dismissible">
    <label>Takyto login v databaze neexistuje.</label>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <?= $_SESSION['errorData'] ?></div>
<?php } ?>
<div class="col-md-6" ">

    <div class="text" data-tooltip="Pre vytvorenie noveho prihlasenia je potrebne pridat novy unikatny login zadat nove heslo a zopakovat heslo"><i class="bi bi-exclamation-circle"></i></div>

    <form method="post" action="/framework/?c=auth&a=novyLogin">
        <div class="col-md-5">
            <label for="exampleFormControlInput1" class="form-label">Nový Login</label>
            <input type="text" class="form-control " name="login" id="exampleFormControlInput1" placeholder="name" required>
        </div>
        <div class="col-md-5">
            <label for="exampleFormControlInput1" class="form-label">Heslo</label>
            <input type="password" class="form-control" name="heslo" id="exampleFormControlInput2" placeholder="password" required>
        </div>
        <div class="col-md-5">
            <label for="exampleFormControlInput1" class="form-label">Zopakuj Heslo</label>
            <input type="password" class="form-control" name="heslorepeat" id="exampleFormControlInput3" placeholder="password" required>
        </div>
        <a><input type="submit" value="Vytvorit Login"></div></a>
</form>
        <div  class="nwm col-md-6" ">
        <form method="post" action="/framework/?c=auth&a=odstranitLogin">
            <div class="col-md-5">
                <label for="exampleFormControlInput1" class="form-label">Odstranit Login</label>
                <input type="text" class="form-control " name="logindel" id="exampleFormControlInput5" placeholder="name" required>
            </div>
            <a><input type="submit" value="Odstranit"></div></a>
            </div>

<br>
<div>
    <table >
        <tr>
            <th>Meno</th>
        </tr>
        <?php foreach ($toto = \App\Models\User::getAll() as $user) { ?>
        <tr>
            <td><?= $user->meno ?></td>
        </tr>
        <?php } ?>
    </table>
</div>



</form>
</body>

</html>