<?php

if (isset($_GET["search"])|| isset($_GET["genre"])||isset($_GET["distrib"])) {

    $genre = $_GET["genre"];
    $movie = $_GET["search"];
    $distrib = $_GET["distrib"];

    $stmtQuery = $db->prepare("select g.name,m.title,d.name from movie as m inner join movie_genre as mg on mg.id_movie=m.id inner join genre as g on g.id=mg.id_genre inner join distributor as d on d.id=m.id_distributor where (g.name like\"%$genre%\" and d.name like \"%$distrib%\") and m.title like \"%$movie%\"");

    $stmtQuery->execute();
    $matchNGD = $stmtQuery->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($matchNGD);
}
?>