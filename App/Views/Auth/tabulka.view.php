<?php
namespace App\Controllers;
include User;
use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Recenzie;
use App\Models\User;

$servername = "localhost";
$usernameDB = "root";
$passwordDB = "dtb456";
$dbname = "insta";

// Create connection
$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

?>
<table id="mazanie">
    <tr>
        <th>Meno</th>
    </tr >
    <?php foreach (usery() as $user) { ?>
        <tr>
            <td><?= $user->meno ?></td>
            <td><a href="?c=auth&a=odstranitLogin&logindel=<?= $user->meno ?>"><button>ZMAZ</button></a></td>
        </tr>
    <?php } ?>
</table>
