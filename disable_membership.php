<?php
include("./config/mysql.php");

if (isset($_POST["delete"])) {
    if (isset($_POST["id_user"])) {
        $id_user = htmlspecialchars($_POST["id_user"]);



        try {
            $stmtQuery =$db->prepare("update membership set disabled=true where id_user=:id_user;");
            $stmtQuery->execute(["id_user" => $id_user]);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        header('Location: http://localhost:8080/users.php?firstname=' . $_POST["firstname"] . '&lastname=' . $_POST["lastname"]);

    }

}


?>