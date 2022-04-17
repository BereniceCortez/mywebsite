<?php

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"])) {
	mail(
        'berelacortez@gmail.com',
        $_POST["subject"],
        $_POST["message"],
        "From: ".$_POST["name"].", Email: ".$_POST["email"],
    );
} else {
    return false;
}
