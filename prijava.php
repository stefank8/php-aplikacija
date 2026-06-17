<?php

include "nav.php";

$poruka = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ok = true;

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $ok = false;
        $poruka = "Popunite sva polja.";
    }

    $result = mysqli_query($conn, "SELECT * FROM `korisnici` WHERE `username` = '$username'");
    $u = mysqli_fetch_assoc($result);

    if (!$u) {
        $ok = false;
        $poruka = "Pogresni podaci";
    }

    if ($ok) {
        if (!password_verify($password, $u["sifra_hash"])) {
            $ok = false;
            $poruka = "Pogresni podaci";
        }

        if ($ok) {
            mysqli_close($conn);
            $id = $u["id"];
            setcookie("token", $id, [
                "path" => "/"
            ]);

            header("Location: ./index.php");
        }
    }
}

?>

<main class="auth-container">
    <form class="auth-form" method="POST">
        <h1>Prijavi Se</h1>

        <div class="error-message">
            <?= $poruka ?>
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
            Prijava
        </button>

        <p class="auth-link">
            Nemas nalog?
            <a href="./registracija.php">Registruj se</a>
        </p>
    </form>
</main>

</body>
</html>