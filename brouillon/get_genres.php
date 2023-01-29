<?php

$id_genre = array();

$stmtQuery = $db->prepare("select id,name from genre");

$stmtQuery->execute();

$genre = $stmtQuery->fetchAll();
?>
<ul class="container_container-header_nav_ul_li_ul-request">


<?php
foreach ($genre as $value) {
    // creation du tableau de genres et d'id
    $name = $value["name"];
    $id = $value["id"];
    $array = ["id" => $id, "name" => $name];
    $id_genre = array_push($array);

    // affichage des genres dans le menu en display none et en display block au moment du hover sur le menu
?>
    <li class="container_container-header_nav_ul_li_ul-request_li"><form action="./index.php" method="get" class="container_container-header_nav_ul_li_ul-request_li_form"><button class="container_container-header_nav_ul_li_ul-request_li_a" type="submit" name="id_genre" value="<?php echo $id;?>"><?php echo $name;?></button></form></li>
<?php
}

?>

</ul>