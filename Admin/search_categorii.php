<?php

//if (isset($_GET['select_tip'])) {

    $selectoption = $_GET['tipuri'];

    //realizam conectiunea cu baza de date
    $conn = mysqli_connect("localhost", "root", "", "tw_gal");

    // verificam conectiunea
    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    }

    //interogarea sql
    $query = "select u.email,j.nume_joc,l.puncte from tabela_jocuri j,tabela_urseri u,tabela_learn l where j.id_joc = l.id_joc and l.id_user = u.id_user and tip_joc = '" . $selectoption . "' ";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        // output interogare
        while ($row = $result->fetch_assoc()) {
            echo '<div class ="info_user"><div class="info_game"><p>Nume: ' . $row["email"] . '</p><p>joc :' . $row["nume_joc"] . '</p><p>puncte: ' . $row["puncte"] . '</p></div></div>';
        }
    } else {
        echo "<p>Nu avem utilizatori la aceasta categorie<p>";
    }


    //inchidem conexiunea
    $conn->close();
//}

?>