<?php

    $todos = json_decode(file_get_contents('../db/todo.db'), true);

    if (isset($_POST['index']) && is_numeric($_POST['index'])) {
        $index = $_POST['index'];
    } else {
        exit("Greska 1 - index");
    }
    if (isset($_POST['tekst']) && $_POST['tekst'] !== "") {
        $tekst = $_POST['tekst'];
    } else {
        exit("Greska 2 - tekst");
    }
    if (isset($_POST['opis']) && $_POST['opis'] !== "") {
        $opis = $_POST['opis'];
    } else {
        exit("Greska 3 - opis");
    }

    $todos[$index]['tekst'] = $tekst;
    $todos[$index]['opis'] = $opis;

    if (file_put_contents('../db/todo.db', json_encode($todos))) {
        exit("OK");
    } else {
        exit("Greska pri izmjeni");
    }


?>