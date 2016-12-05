<?php

//Script.php
function getTable() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "te14";
    $mysqli = new mysqli($server, $user, $pass, $database);
    if ($mysqli->connect_error) { //databaskopplingen fungerade inte
        echo "<p>Något blev fel, försök igen om en liten stund.</p>";
    } else {//fungerar
        $sql = "SELECT * FROM products"; //sql-fråga
        $result = $mysqli->query($sql); //ställ fråga
        //om resultat finnes bygg och skriv ut tabell
        if ($result) {
            $table = "<table>";
            $table .= "<tr><th>Produkt</th><th>beskrivning</th>";
            $table .= "<th>pris</th><th>tabort</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $table .= "<tr><td>{$row['name']}</td>";
                $table .= "<td>{$row['text']}</td>";
                $table .= "<td>{$row['price']} kr</td>";
                $table .= "<td><a href='?delete={$row['id']}'>x</a></td></tr>";
            }
            $table .= "</table>";
            echo $table;
        }
        mysqli_close($mysqli); //stäng databas
    }
}

function deleteProduct($id) {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "te14";
    $mysqli = new mysqli($server, $user, $pass, $database);
    if ($mysqli->connect_error) { //databaskopplingen fungerade inte
        echo "<p>Något blev fel, försök igen om en liten stund.</p>";
    } else {//fungerar
        $sql = "DELETE FROM products WHERE id={$id}"; //frågan
        $mysqli->query($sql); //ställ fråga
        $mysqli->close(); //annat sätt att stänga
    }
}

function insertProduct($name, $text, $price){
     $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "te14";
    $mysqli = new mysqli($server, $user, $pass, $database);
    if ($mysqli->connect_error) { //databaskopplingen fungerade inte
        echo "<p>Något blev fel, försök igen om en liten stund.</p>";
    } else {//fungerar
        //noggran att det skall vara ' ' runt de som är varchars
        $sql = "INSERT INTO products VALUES(null,'{$name}','{$text}',{$price})"; 
        $mysqli->query($sql); //ställ fråga
        $mysqli->close(); //annat sätt att stänga
    }
}
