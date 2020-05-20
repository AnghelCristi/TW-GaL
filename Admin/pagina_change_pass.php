<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin_page.css" rel="stylesheet" type="text/css">
    <title>GaL</title>
</head>
<body>

    <header>

        <p class="paragraf">GaL</p>

    </header>


    <main>

        <div class="content_stanga">

            <button class="buton" onclick=window.location.href='pagina_start_admin.html'>Home</button>
            <button class="buton" onclick=window.location.href='pagina_info_users.php'>Info Users</button>
            <button class="buton" onclick=window.location.href='pagina_top_users_categorii.php'>Top 10 Users</button>
            <button class="buton_selected">Change password</button>
            <button class="buton" onclick=window.location.href='pagina_messages.html'>Messages</button>
            <button class="buton" >Logout</button>

        </div>

        <div class="content_dreapta">

        <h1>Schimbare parola user</h1>

        <div class="form">
    
            <form action="pagina_change_pass.php" method="POST">
                <label for="user_name">Username: </label><br><br>
                <input type="text" id="user_name" name="user_name"><br><br>
                <label for="password">New Password: </label><br><br>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Modify" name ="Modify" >
            </form>

            <?php

                if(empty($_POST['user_name'])==TRUE or empty($_POST['password']==TRUE)){
                
                    echo "<p>Trebuie sa completezi toate campurile</p>";
                
                    }else{
                        if(isset($_POST['Modify'])){

                        $username = $_POST['user_name'];
                        $password = $_POST['password'];

                        //realizam conectiunea cu baza de date
                        $conn = mysqli_connect("localhost", "root", "", "tw_gal");

                        // verificam conectiunea
                        if ($conn->connect_error) {

                            die("Connection failed: " . $conn->connect_error);

                        }
                        
                        $query = " select email from tabela_urseri where email = '".$username."'";
                        $result = mysqli_query($conn,$query);
                        
                        if ($result->num_rows > 0) {

                            //interogarea sql
                            $query = " update tabela_urseri set parola = '".$password."' where email='".$username."'";
                            $result = mysqli_query($conn,$query);
                            echo "<p>Operatiunea a fost realizata cu succes</p>";
                            
                            
                        } else { echo "<p>Utilizatorul nu a fost gasit in baza de date</p>"; }


                        //inchidem conexiunea
                        $conn->close();

                    }
            
                }
            ?>

        </div>

        </div>


    </main>

    <footer>
    
    <p>Developers:</p>
    <button class="buton" onclick=window.location.href='https://www.facebook.com/cristi.anghel.10'>Anghel-Marius Cristi</button>
    <button class="buton" onclick=window.location.href='https://www.facebook.com/galatanu.mirceaandrei'>Galatanu Mircea Andrei</button>
    <button class="buton" onclick=window.location.href='https://www.facebook.com/felix.hugeanu'>Felix Hugeanu</button>

    </footer>
    
</body>
</html>