<?php

if (isset($_POST["create"])) {
    if (isset($_POST["id_user"])) {
        $id_user = htmlspecialchars($_POST["id_user"]);
        try {
            $stmtQuery =$db->prepare("update membership set disabled=false where id_user=:id_user;");
            $stmtQuery->execute(["id_user" => $id_user]);
            $stmtQuery =$db->prepare("delete from membership_disabled where id_membership=(select m.id from membership as m where id_user=:id_user);");
            $stmtQuery->execute(["id_user" => $id_user]);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        header('Location: http://localhost:8080/users.php?firstname=' . $_POST["firstname"] . '&lastname=' . $_POST["lastname"]);

    }

}

?>