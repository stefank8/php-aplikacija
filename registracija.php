<?php

include "nav.php";

$poruka = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ok = true;

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($name) || empty($username) || empty($password)) {
        $ok = false;
        $poruka = "Popunite sva polja.";
    }

   if ($ok) {
        $sifra = password_hash($password, PASSWORD_BCRYPT);

        mysqli_query($conn, "INSERT INTO `korisnici` (`ime`, `username`, `sifra_hash`) VALUES ('$name', '$username', '$sifra')");

        $id = mysqli_insert_id($conn);
        mysqli_close($conn);

        setcookie("token", $id, [
            "path" => "/"
        ]);

        header("Location: ./index.php");
   }
}

?>

<main class="auth-container">
    <form class="auth-form" method="POST">
        <h1>Registracija</h1>

        <div class="error-message">
            <?= $poruka ?>
        </div>

        <div class="form-group">
            <label for="name">Ime i prezime</label>
            <input type="text" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="username">Korisničko ime</label>
            <input type="text" id="username" name="username">
        </div>

        <div class="form-group">
            <label for="password">Lozinka</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit" class="submit-btn">
            Registruj se
        </button>

        <p class="auth-link">
            Već imaš nalog?
            <a href="./prijava.php">Prijavi se</a>
        </p>
    </form>
</main>

</body>
</html>