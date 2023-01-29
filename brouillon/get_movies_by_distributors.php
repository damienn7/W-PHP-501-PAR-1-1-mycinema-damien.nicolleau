<?php

if (isset($_GET["search"])) {


    try {
        $request = htmlspecialchars($_GET["search"]);
        $stmtQuery = $db->prepare("select m.id as id,d.name as name,m.title as title,m.id_distributor as id_distributor from distributor as d inner join movie as m on m.id_distributor=d.id
        where d.name like \"%$request%\";");
        //$stmtQuery->bindParam($request);
        $stmtQuery->execute();
        $matchDistrib = $stmtQuery->fetchAll();
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    //var_dump($matchDistrib);


    $start = "<script async>
//window.onload = function(){
    document.addEventListener('DOMContentLoaded', function () {
    ";

    $end = "
    });
//}
</script>";

    // $scriptName = "let article = document.getElementsByClassName(\"container_container-main_article-get-movies\")[0];article.style.display = \"flex\";article.style.flexDirection = \"row\";let section = document.getElementsByClassName(\"container_container-main_article-get-movies_by-name\");section[0].style.width = \"33%\";section[1].style.width = \"33%\";section[2].style.width = \"33%\";section[1].style.display = \"\";section[1].style.visibility = \"\";section[2].style.display = \"\";section[2].style.visibility = \"\";";

    // $scriptName = $start . $scriptName . $end;

}


?>