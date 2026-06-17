<?php

setcookie("token", "", [
    "path" => "/",
    "expires" => 0
]);

header("Location: ./prijava.php");