<?php

// requete a effectuer pour recuperer l'id des films a afficher par genre

$id = htmlspecialchars($_GET["id_genre"]);

$stmtQueryGenre = $db->prepare("select id_movie from movie_genre where id_genre=:id");
$stmtQueryGenre->execute([
    "id" => $id,
]);
$title = array();
$id_movie = $stmtQueryGenre->fetchAll();
//var_dump($id_movie);
$count = 0;
$buttons = array();
foreach ($id_movie as $key => $value) {

    $stmtQueryGenre = $db->prepare("select title from movie where id=:id");
    $stmtQueryGenre->execute([
        "id" => $value["id_movie"],
    ]);

    $id_movie = $stmtQueryGenre->fetch();
    //echo $value["id_movie"];
    //echo $count;
    //echo $key;
    $res = (intval($key) + 1) % 30;
    //echo " $count";
    if ($count < 10) {
        $button = "<button class=\"container_container-main_article-get-movies_by-name_p-link button" . ($count) . "\" id=\"$count\" name=\"visible\" style=\"display:;visibility:;\">" . ($count + 1) . "</button>";
    }

    if ($count >= 10) {
        $button = "<button class=\"container_container-main_article-get-movies_by-name_p-link button" . ($count) . "\" id=\"$count\" name=\"hidden\" style=\"display:none;visibility:hidden;\">" . ($count + 1) . "</button>";
    }

    $buttons[$count] = $button;
    // var_dump($buttons);
    if ($res == 0) {
        $count += 1;
        echo "<p class=\"container_container-main_article-get-movies_by-name_p class$count\" name=\"$count\">" . $id_movie["title"] . "</p>";
    } else {
        echo "<p class=\"container_container-main_article-get-movies_by-name_p class$count\" name=\"$count\">" . $id_movie["title"] . "</p>";
    }

}

echo "<div class=\"container_container-main_article-get-movies_by-name_p-pagination\">";
$array = [];
$scriptButtons = "";
for ($i = 0; $i < $count + 1; $i++) {


    echo "$buttons[$i]";





    if ($i >= 10) {
        $idButtonToBeHidden = $i - 10;
        $idButtonToBeVisible = $i;
        $idButtonEvent = $i - 1;
        $scriptButtons .= "document.getElementsByClassName(\"button$idButtonEvent\")[0].addEventListener(\"click\",()=>{document.getElementsByClassName(\"button$idButtonToBeHidden\")[0].style.display=\"none\";document.getElementsByClassName(\"button$idButtonToBeHidden\")[0].name = \"hidden\";document.getElementsByClassName(\"button$idButtonToBeHidden\")[0].style.visibility=\"hidden\";document.getElementsByClassName(\"button$idButtonToBeVisible\")[0].style.display=\"\";document.getElementsByClassName(\"button$idButtonToBeVisible\")[0].style.visibility=\"\";document.getElementsByClassName(\"button$idButtonToBeVisible\")[0].name = \"visible\";document.getElementsByName(\"visible\")[0].addEventListener(\"click\",()=>{let id = document.getElementsByName(\"visible\")[0].id;id= parseInt(id);if(id>0){console.log(id);document.getElementsByName(\"visible\")[9].style.display = \"none\";document.getElementsByName(\"visible\")[9].style.visibility = \"hidden\";document.getElementsByName(\"visible\")[9].name = \"hidden\";let newId = id - 1; document.getElementById(newId).style.display = \"\"; document.getElementById(newId).style.visibility = \"\"; document.getElementById(newId).name = \"visible\";}});});\n";

        //$scriptButtons .= "for(let i = 1;i <$count;i++){let hidden = i + 9;let visible = i - 1; console.log(hidden);console.log(i);document.getElementsByName(\"visible\")[0].addEventListener(\"click\",()=>{document.getElementsByClassName(\"container_container-main_article-get-movies_by-name_p-link\")[hidden].style.display=\"none\";document.getElementsByClassName(\"container_container-main_article-get-movies_by-name_p-link\")[hidden].style.visibility=\"hidden\";document.getElementsByClassName(\"container_container-main_article-get-movies_by-name_p-link\")[visible].style.display=\"\";document.getElementsByClassName(\"container_container-main_article-get-movies_by-name_p-link\")[visible].style.visibility=\"\";});}\n";
        //$scriptButtons .= "document.getElementsByName(\"visible\")[0].addEventListener(\"click\",()=>{let id = document.getElementsByName(\"visible\")[0].id;id= parseInt(id);if(id>0){console.log(id);document.getElementsByName(\"visible\")[9].style.display = \"none\";document.getElementsByName(\"visible\")[9].style.visibility = \"hidden\";document.getElementsByName(\"visible\")[9].name = \"hidden\";let newId = id - 1; document.getElementById(newId).style.display = \"\"; document.getElementById(newId).style.visibility = \"\"; document.getElementById(newId).name = \"visible\";}});";
        // $scriptButtons .= "document.getElementsByClassName(\"button$i\")[0].style.display=\"none\";document.getElementsByClassName(\"button$i\")[0].style.visibility=\"hidden\";\n";
    }
    // if ($i ==10) {
    //     echo "<button class=\"container_container-main_article-get-movies_by-name_p-link another\" id=\"$count\">...</button>";
    // }
    if ($i != 0) {
        $middle .= "let els" . $i . " = document.getElementsByClassName(\"class" . $i . "\");Array.from(els" . $i . ").forEach(el => {el.style.display = \"none\"; el.style.visibility=\"hidden\";});\n";
    }
    if ($i <= $count) {


        $display = "";
        for ($j = 0; $j < $count; $j++) {
            $display .= "let item$i$j = document.getElementsByClassName(\"class$i\")[$j];item$i$j.style.display = \"\"; item$i$j.style.visibility=\"\";\n";
        }
        //ajouter l'affichage du bouton 0
        $inter = "document.getElementsByClassName(\"button$i\")[0].addEventListener(\"click\",()=>{let allItems = document.getElementsByClassName(\"container_container-main_article-get-movies_by-name_p\");Array.from(allItems).forEach(allEl=>{allEl.style.display = \"none\";allEl.style.visibility=\"hidden\";});" . $display . "});\n";
        $middle .= "$inter\n";
        // $middle .= "$scriptButtons\n";
    }


}

echo "</div>";

$start = "<script async>
        //window.onload = function(){
            document.addEventListener('DOMContentLoaded', function () {
            ";

$end = "
            });
        //}
    </script>";


$script = $start . $middle . $scriptButtons .$end;
//print_r($script);

?>