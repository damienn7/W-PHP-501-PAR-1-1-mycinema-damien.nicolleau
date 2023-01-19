<?php

//recherche de films par genre

if (isset($_GET["search"])) {

    $request = $_GET["search"];

    $match = array();
    $request = htmlspecialchars($request);
    //echo $request;
    if (isset($request)) {
        try {
            $query = "SELECT title FROM movie WHERE title LIKE \"%$request%\"";
            $statementQuery = $db->prepare($query);
            $statementQuery->execute();
            $match = $statementQuery->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo "mouchkir";
            var_dump($match);
            echo $e;
        }
        //var_dump($match);
    }



}

?>

<?php foreach ($match as $value): ?>

    <p class="container_container-main_article-get-movies_by-name_p">
        <?php echo $value["title"]; ?>
    </p>

<?php endforeach; ?>