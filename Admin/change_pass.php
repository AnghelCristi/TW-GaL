<?php

if (empty($_POST['user_name']) == TRUE or empty($_POST['password'] == TRUE)) {

    echo "<p>Trebuie sa completezi toate campurile</p>";
} else {
    //if (isset($_POST['Modify'])) {

        $username = $_POST['user_name'];
        $password = $_POST['password'];

        //realizam conectiunea cu baza de date
        $conn = mysqli_connect("localhost", "root", "", "tw_gal");

        // verificam conectiunea
        if ($conn->connect_error) {

            die("Connection failed: " . $conn->connect_error);
        }

        $query = " select email from tabela_urseri where email = '" . $username . "'";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {

            //interogarea sql
            $query = " update tabela_urseri set parola = '" . $password . "' where email='" . $username . "'";
            $result = mysqli_query($conn, $query);
            echo "<p>Operatiunea a fost realizata cu succes</p>";
        } else {
            echo "<p>Utilizatorul nu a fost gasit in baza de date</p>";
        }


        //inchidem conexiunea
        $conn->close();
    //}
}

?>
