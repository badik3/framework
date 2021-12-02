<?php
/** @var \App\Models\Post[] $data */

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <link rel="stylesheet" href="Style/index.css">
    <link rel="stylesheet" href="Style/raiting.css">
</head>

<body>
<div class="container mt-5">
    <form method="post" action="/framework/?c=home&a=pridajRec">
        <label for="exampleFormControlInput1" class="form-label">meno</label>
        <input type="text" class="form-control " name="menorec" id="exampleFormControlInput1" placeholder="name" required>
        <label for="formFileLg" class="form-label">Váš názor</label>
        <textarea name="recenzia" id="textarea" cols="30" rows="5" class="form-control" placeholder="Recenzia" required=""></textarea>
        <label for="formFileLg" class="form-label">Váše hodnotenie</label>
        <input type="number" name="hodnotenie" id="rating-control" class="form-control" step="1" min="0" max="5" placeholder="Rate 1 - 5" >
        <a><input type="submit" value="Odosli"></a>
    </form>
    <h2 id="nadpR">RECENZIE</h2>
    <div id="recenzieTab">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Meno</th>
            <th>Recenzia</th>
            <th>Hodnotenie</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($toto = \App\Models\Recenzie::getAll() as $recenzia) { ?>
            <tr class="sony">
                <td><?= $recenzia->meno ?></td>
                <td>
                    <?php  for ($i=0 ; $i<$recenzia->hodnotenie ; $i++) { ?>
                        <i class="bi bi-star-fill"></i>
                    <?php } ?>
                    <span class="number-rating"></span>
                </td>
                <td id="boxRecenzie"><?= $recenzia->recenzia ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
    </div>
</div>

</body>
