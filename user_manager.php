<?php
include("./config/mysql.php");

//echo $_POST["id_user"];

if (isset($_POST["update"])) {
    if (isset($_POST["id_user"]) || isset($_POST["id_subs"])) {
        $id_user = htmlspecialchars($_POST["id_user"]);

        $id_subs = htmlspecialchars($_POST["id_subs"]);

        // echo $id_user;

        // echo $id_subs;



        // try {
        //     $query = "select * from membership where id_user=$id_user;";
        //     $stmtQuery = $db->prepare($query);
        //     $stmtQuery->execute();
        //     $prevSelect = $stmtQuery->fetchAll();
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }

        // foreach ($prevSelect as $key => $value) {
        //     echo "id sub : " . $value["id_subscription"];
        //     echo "<br>";
        //     echo "id user : " . $value["id_user"];
        //     echo "<br>";
        // }

        try {
            $query = "SET FOREIGN_KEY_CHECKS=0;replace into membership (id,id_user,id_subscription,date_begin) values ((select m.id from membership as m join user as u on u.id=m.id_user where u.id=$id_user),$id_user,$id_subs,CURRENT_DATE);update membership set date_close=adddate(date_begin,30) where id=3;update membership set date_close=adddate(date_begin,365) where id=2;update membership set date_close=adddate(date_begin,1) where id=4;update membership set date_close=adddate(date_begin,30) where id=1;SET FOREIGN_KEY_CHECKS=1;";
            $stmtQuery = $db->prepare($query);
            $stmtQuery->execute();
            // $stmtQuery->fetch();
            echo "ok";
            var_dump($stmtQuery);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // try {
        //     $query = "select * from membership where id_user=$id_user";
        //     $stmtQuery = $db->prepare($query);
        //     $stmtQuery->execute();
        //     $nextSelect = $stmtQuery->fetchAll();
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }

        // foreach ($nextSelect as $key => $value) {
        //     echo "id sub : " . $value["id_subscription"];
        //     echo "<br>";
        //     echo "id user : " . $value["id_user"];
        //     echo "<br>";
        // }

        //echo "hello";
        header('Location: http://localhost:8080/users.php?firstname=' . $_POST["firstname"] . '&lastname=' . $_POST["lastname"]);
        ?>
        <!-- <p>L abonnement a bien ete mis a jour !</p> -->
        <?php
    }
}

include("./disable_membership.php");

include("./enable_membership.php");
//do this delete do that command after ur delete command ---> alter table membership AUTO_INCREMENT=0;

?>