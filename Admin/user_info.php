<?php

if (empty($_GET['user_name']) == TRUE) {

    echo "<p>Trebuie sa completezi campul</p>";
} else {

    //if (isset($_GET['Search'])) {

        $username = $_GET['user_name'];

        //realizam conectiunea cu baza de date
        $conn = mysqli_connect("localhost", "root", "", "tw_gal");

        // verificam conectiunea
        if ($conn->connect_error) {

            die("Connection failed: " . $conn->connect_error);
        }

        //interogarea sql
        $query = "select u.email,l.id_joc,l.nivel_dificultate,l.puncte from tabela_urseri u,tabela_learn l where l.id_user = u.id_user and email = '" . $username . "' ";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            // output interogare
            $row = $result->fetch_assoc();
            echo '<h1>Username: ' . $row["email"] . '</h1>';
            echo '<div class="info_game"><p>Id_jpc: ' . $row["id_joc"] . '</p><p>nivel dificultate:' . $row["nivel_dificultate"] . '</p><p>puncte: ' . $row["puncte"] . '</p></div>';

            while ($row = $result->fetch_assoc()) {

                echo '<div class="info_game"><p>Id_jpc: ' . $row["id_joc"] . '</p><p>nivel dificultate:' . $row["nivel_dificultate"] . '</p><p>puncte: ' . $row["puncte"] . '</p></div>';
            }
        } else {
            echo "<p>Nu am gasit informatii despre utilizatorul respectiv</p>";
        }

        //inchidem conexiunea
        $conn->close();
    //}
}
