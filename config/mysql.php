<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'damien', 'PETITnuage-26');
} catch (Exception $e) {
    echo "Biiiiig mouchkir !!!!";
    die('Erreur : ' . $e->getMessage());
}

try {
    $query = "update membership set disabled=true where now() > date_close;";
    $stmtQuery = $db->prepare($query);
    $stmtQuery->execute();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>