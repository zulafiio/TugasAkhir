<?php

include("../config/database.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    try
    {
        if($id){
        $sql = "UPDATE users SET name='$name', username='$username', password='$password' WHERE id=$id";
    }else {
    $sql = "INSERT INTO users(name, username, password) VALUES ('$name', '$username', '$password')";
    
    }
    $result = mysqli_query($db, $sql);

    if ($result) {
        header("Location: index.php?success=Data tersimpan");
        } else {
            header("Location: index.php?error=Username atau Password Salah");
        }
    } catch (Exception $exception) {
        header('Location: index.php?error=' . $exception->getMessage());
    }
    
    
    }
?>