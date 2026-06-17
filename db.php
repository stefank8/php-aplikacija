<?php

$conn = mysqli_connect("localhost", "root", "", "bazapodataka");

if (!$conn) {
    die("Neuspesno povezivanje.");
}