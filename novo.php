<?php

include "nav.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tekst = $_POST["tekst"];

    $sifra = password_hash($password, PASSWORD_BCRYPT);

    $ime = $usr["ime"];
    mysqli_query($conn, "INSERT INTO `objave` (`autor`, `tekst`) VALUES ('$ime', '$tekst')");

    mysqli_close($conn);

    header("Location: ./index.php");
}

?>

<header class="novo-header">
    <h1 class="novo-naslov">Kreiraj novi post</h1>
</header>

<main class="novo-main">
    <form class="novo-forma" method="POST">

        <div class="novo-polje">
            <label for="sadrzaj" class="novo-oznaka">Sadržaj:</label>
            <textarea id="sadrzaj" name="tekst" class="novo-textarea"></textarea>
        </div>

        <button type="submit" class="novo-dugme">Objavi</button>
    </form>
</main>