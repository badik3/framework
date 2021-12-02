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
    <label>Heslá sa nezhodujú.</label>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <?= $_SESSION['error'] ?></div>

<?php } ?>

<div class="col-md-6">

    <div class="text" data-tooltip="Tu je mozne zmenit heslo k vasmu uctu "><i class="bi bi-exclamation-circle"></i></div>

    <form method="post" action="/framework/?c=auth&a=updateHeslo">
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Nové heslo</label>
            <input type="password" class="form-control" name="heslo" id="exampleFormControlInput2" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Musí obsahovať aspon jedno číslo a jedno velké a malé písmeno, a heslo musí mať aspon 8 znakov" required>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Zopakuj nové heslo</label>
            <input type="password" class="form-control" name="heslorepeat" id="exampleFormControlInput3" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Musí obsahovať aspon jedno číslo a jedno velké a malé písmeno, a heslo musí mať aspon 8 znakov" required>
        </div>
        <a><input type="submit" value="Zmeniť heslo"></a>
</div>

</body>

</html>