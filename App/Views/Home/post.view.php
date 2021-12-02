<?php /** @var Array $data */ ?>
<link rel="stylesheet" href="Style/loginFormular.css">
<div class="row">
    <div class="col">
        <form method="post" enctype="multipart/form-data" action="?c=home&a=upload">
            <div>
                <label for="formFileLg" class="form-label">Obrazok</label>
                <input name="subor" class="form-control form-control-lg" id="formFileLg" type="file" accept="image/jpeg" required>
            </div>
            <div>
                <label for="formFileLg" class="form-label">Nadpis</label>
                <input class="form-control form-control-lg" type="text" name="nadpis" id="nadpis" placeholder="Nadpis"required>
            </div>
            <div>
                <label for="formFileLg" class="form-label">Tel.č.</label>
                <input pattern="[0-9]{4} [0-9]{3} [0-9]{3}" title="Číslo musi byt v tvare XXXX XXX XXX" class="form-control form-control-lg" type="text" name="telefon" id="nadpis" placeholder="Telefon"required>
            </div>
            <div>
                <label for="formFileLg" class="form-label">Lokalita</label>
                <input class="form-control form-control-lg" type="text" name="lokalita" id="nadpis" placeholder="Lokalita"required>
            </div>
            <div>
                <label for="formFileLg" class="form-label">Rozloha m<sup>2</sup></label>
                <input pattern="[0-9]{1,}" title="Rorloha musi obsahovat len čísla " class="form-control form-control-lg" type="text" name="rozloha" id="nadpis" placeholder="Rozloha"required>
            </div>
            <div>
                <label for="formFileLg" class="form-label">Cena</label>
                <input pattern="[0-9]{3} [0-9]{3}" title="Suma musi byt v tvare XXX XXX" class="form-control form-control-lg" type="text" name="cena" id="popis" placeholder="Cena">
            </div>
            <div>
                <label for="formFileLg" class="form-label">Popis</label>
                <textarea name="popis" id="textarea" cols="30" rows="5" class="form-control" placeholder="Popis" required=""></textarea>

            </div>
            <div>
                <a><input type="submit" value="Odosli"></a>
            </div>
        </form>
    </div>
</div>

