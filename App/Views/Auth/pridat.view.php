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
    <link rel="stylesheet" href="Style/pridat.css">


</head>
<script type="text/javascript" src="Scripts/formularInfo.js"></script>
<script type="text/javascript" src="Scripts/script.js"></script>


<!-- JQUERY load -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>

<?php if($_SESSION['error'] == true){ ?><div class="alert alert-danger alert-dismissible">
    <label>Zle zadane meno alebo heslo.</label>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <?= $_SESSION['error'] ?></div>

<?php } ?>
<?php if($_SESSION['errorData'] == true){ ?><div class="alert alert-danger alert-dismissible">
    <label>Takýto login v databáze neexistuje alebo ste sa snažili odstránit Administrátora.</label>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <?= $_SESSION['errorData'] ?></div>
<?php } ?>

<div class="container pb-5">
    <div class="row d-flex justify-content-center align-items-center pb-2">
        <div class="col-md-4">
            <label>Meno</label>
            <input id="user-name" type="text" class="form-control login-input" placeholder="Zadajte vaše prihlasovacie meno">
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <label >Heslo:</label>
            <input id = "password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Musí obsahovať aspon jedno číslo a jedno velké a malé písmeno, a heslo musí mať aspon 8 znakov" required class="form-control login-input" placeholder="Zadajte vaše heslo">
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <label>Zadajte znovu heslo:</label>
            <input id = "confirm-password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Musí obsahovať aspon jedno číslo a jedno velké a malé písmeno, a heslo musí mať aspon 8 znakov" required class="form-control login-input" placeholder="Zadajte znovu vaše heslo">
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <button class="btn-css login-btn btn btn-secondary" onclick="addUser()">Vytvoriť účet</button>
<div class="col-md-6">
    <div class="text" data-tooltip="Pre vytvorenie noveho prihlasenia je potrebne pridat novy unikatny login zadat nove heslo a zopakovat heslo"><i class="bi bi-exclamation-circle"></i></div>


</div>
<div>
    <br>
</div>

<div  id="content" class="col-md-6">

    <table id="mazanie">
        <tr>
            <th>Meno</th>
        </tr >
        <?php foreach ($toto =\App\Models\User::getAll() as $user) { ?>
            <tr>
                <td><?= $user->meno ?></td>
                <td><a href="?c=auth&a=odstranitLogin&logindel=<?= $user->meno ?>"><button>ZMAZ</button></a></td>
            </tr>
        <?php } ?>
    </table>

</div>

<br>

</body>

</html>