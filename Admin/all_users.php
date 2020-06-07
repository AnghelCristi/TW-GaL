<?php

    //realizam conectiunea cu baza de date
    $conn = mysqli_connect("localhost", "root", "", "tw_gal");

    // verificam conectiunea
    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    }

    //interogarea sql
    $sql = "SELECT email FROM tabela_urseri";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // output interogare
        while ($row = $result->fetch_assoc()) {

            echo "<div><h1>" . $row["email"] . "</h1></div>";
        }
    } else {
        echo "Nu sunt utilizatori";
    }

    //inchidem conexiunea
    $conn->close();

?>