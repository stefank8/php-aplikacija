<?php

include "nav.php";

$result = mysqli_query($conn, "SELECT * FROM `objave`");

?>

<?php if ($usr) { ?>
    <header class="pocetna-header">
        <h1 class="pocetna-title">Dobrodosao, <?php echo $usr["ime"] ?>.</h1>
    </header>
<?php } ?>

<main class="pocetna-main">
    <section class="pocetna-posts">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <article class="pocetna-post">
                <h2 class="pocetna-author">Objavio: <?= $row["autor"] ?></h2>
                <p class="pocetna-content"><?= $row["tekst"] ?></p>
                <?php if ($usr) { if ($row["autor"] == $usr["ime"]) { ?>
                <a class="pocetna-delete-btn" href="./obrisi.php?id=<?php echo $row['id'] ?>">Obrisi</a>
                <?php }} ?>
                </article>
            </article>
        <?php } ?>
    </section>
</main>

</body>
</html>
