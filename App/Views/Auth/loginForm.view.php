<?php
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

 <div class="text" data-tooltip="Pre moznost comentovania a lajkovania obrazkov je nutne mat vytvoreny ucet
                    a byt prihlaseny"><i class="bi bi-exclamation-circle"></i></div>

<form class="row g-3" method="post" action="/framework/?c=auth&a=login&heslo">
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Meno</label>
        <input type="text" class="form-control " name="login" id="exampleFormControlInput1" placeholder="name" required>
        </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Heslo</label>
        <input type="password" class="form-control" name="heslo" id="exampleFormControlInput2" placeholder="password" required>
    </div>
    <a><input type="submit" value="Prihlasit"></div></a>


</form>
</body>

</html>

