<?php 

include "db.php";

$uid = $_COOKIE["token"] ?? null;

$result = mysqli_query($conn, "SELECT * FROM `korisnici` WHERE `id` = '$uid'");
$usr = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CefiTwitter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <div class="site-title">CefiTwitter</div>

        <nav>
            <ul>
                <li><a href="./index.php">Pocetna</a></li>
                <?php if ($usr == null) { ?>
                <li><a href="./prijava.php">Prijavi Se</a></li>
                <li><a href="./registracija.php" class="nav-button">Registruj Se</a></li>
                <?php } else { ?>
                <li><a href="./novo.php">Nova Objava</a></li>
                <li><a href="./odjava.php" class="nav-button">Odjava</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>