<?php
require '../vendor/autoload.php';

use Firebase\JWT\JWT;

session_start();

$CONFIG = [
    'servername' => "localhost",
    'username' => "root",
    'password' => '',
    'db' => 'test'
];

$conn = new mysqli($CONFIG["servername"], $CONFIG["username"], $CONFIG["password"], $CONFIG["db"]);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function setUserCookie($data)
{
    $cookie_name = "email";
    $cookie_value = $data->email;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

function register($data)
{
    global $conn;
    $admin = false;
    $email = $data->email;
    $password = $data->password;
    if (preg_match("/[a-zA-Z]+\.admin/", $email)) {
        $admin = true;
    }
    $stmt = $conn->prepare('INSERT INTO users SET email = ?, password = ?, admin = ?');
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bind_param('sss', $email, $password_hash, $admin);
    if ($stmt->execute()) {
        http_response_code(200);
        echo '<script>
            alert("Successfully registered.");
        </script>';

        if ($admin) {
            header("Location: ../Admin/pagina_start_admin.html");
        } else {
            header("Location: ../User/Learn/learn.view.php");
        }
    } else {
        http_response_code(400);
        echo '<script>
            alert("Not registered.");
        </script>';
    }
}

function login($data)
{
    global $conn;
    global $admin;

    $email = $data->email;
    $password = $data->password;

    $stmt = $conn->prepare('SELECT email, password FROM users WHERE email = ? LIMIT 0,1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $num = $stmt->num_rows();

    if ($num > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $password2 = $row['password'];

        if (password_verify($password, $password2)) {
            $secret_key = "YOUR_SECRET_KEY";
            $issuer_claim = "localhost"; // this can be the servername
            $issued_at_claim = time(); // issued at
            $notbefore_claim = $issued_at_claim + 10; //not before (starting 10 seconds after issue)
            $expire_claim = $issued_at_claim + 60 * 60; // expire time in seconds (available 1h)
            $token = array(
                "iss" => $issuer_claim,
                "iat" => $issued_at_claim,
                "nbf" => $notbefore_claim,
                "exp" => $expire_claim,
                "data" => array(
                    "email" => $email
                )
            );

            http_response_code(200);
            $jwt = JWT::encode($token, $secret_key);
            $_SESSION['token'] = $jwt;
            $_SESSION['email'] = $row['email'];
            $stmt = $conn->prepare('UPDATE users SET jwt = ' . $jwt);
            $stmt->execute();

            echo '<script>
                    alert("$Login successful!");
                </script>';

            if ($admin) {
                header("Location: ../Admin/pagina_start_admin.html");
            } else {
                header("Location: ../User/Learn/learn.view.php");
            }
        } else {
            http_response_code(401);
            echo '<script>
                    alert("$Wrong password!");
                </script>';
        }
    } else {
        http_response_code(404);
        echo '<script>
                    alert("Account not found!");
                </script>';
    }
}

function check_token()
{
    global $conn;

    $stmt = $conn->prepare('SELECT token password FROM users WHERE email = ? LIMIT 0,1');
    $stmt->bind_param('s', $_SESSION['email']);
    if ($stmt->execute()) {
        if ($_SESSION['token'] === $stmt->fetch()) {
            return true;
        }
    }
    return false;
}
