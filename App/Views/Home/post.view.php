<?php /** @var Array $data */ ?>
<link rel="stylesheet" href="Style/loginFormular.css">
<div class="row">
    <div class="col">
        <form method="post" enctype="multipart/form-data" action="?c=home&a=upload">
            <div>
                <label for="formFileLg" class="form-label">Obrazok</label>
                <input name="subor" class="form-control form-control-lg" id="formFileLg" type="file">
                <a><input type="submit" value="Odosli"></a>
            </div>
        </form>
    </div>
</div>

