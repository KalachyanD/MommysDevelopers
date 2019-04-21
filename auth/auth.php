<?php

$login = $_POST["login"];
$password = $_POST["password"];

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$queryCheckLogin = "SELECT email FROM passwords WHERE email = '$login'";
$queryCheckPassword = "SELECT password FROM passwords WHERE email = '$login'";

$result = $conn->query($queryCheckLogin);

if (!$result) die ($conn-> error);

if($result->num_rows == 0 ){
    //Логина не существует
    echo "Логина не существует";
    $result->close();
    $conn->close();
}
else {

    $result = $conn->query($queryCheckPassword);

    if (!$result) die ($conn->error);

    if($password != $result->fetch_array(MYSQLI_ASSOC)['password']){
        //Неверный пароль
		echo "Неверный пароль";
        $result->close();
        $conn->close();
    }
    else{
        header('Location: http://localhost/forum/home.html');
        $result->close();
        $conn->close();
    }
}

?>