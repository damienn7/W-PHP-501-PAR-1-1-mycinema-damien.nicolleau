<?php
include("./config/mysql.php");

try {
    $stmtQuery=$db->prepare("select id from membership where disabled = true");
    $stmtQuery->execute();
    $disabled_membership = $stmtQuery->fetchAll();
    if ($disabled_membership[0]["id"]!="") {
        foreach ($disabled_membership as $value) {
            $stmtQuery=$db->prepare("insert into membership_disabled(id_membership,date_end) values(:id,current_date())");
            $stmtQuery->execute(["id"=>$value["id"]]);
        }
    }
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}

?>