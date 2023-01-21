<?php

//recherche de films par genre



if (isset($_GET["search"])) {

    $request = $_GET["search"];
    $matchGenre = array();
    try {
        $statementQuery = $db->prepare("SELECT id FROM genre WHERE name LIKE \"%$request%\"");
        $statementQuery->execute();
        $matchGenre = $statementQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    if (!$e && isset($matchGenre[0]["id"])) {
        include("./get_movies_by_genres.php");

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

            $scriptName = "";
            
            $scriptName .= "let article = document.getElementsByClassName(\"container_container-main_article-get-movies\")[0];article.style.display = \"flex\";article.style.flexDirection = \"row\";let section = document.getElementsByClassName(\"container_container-main_article-get-movies_by-name\");section[0].style.width = \"50%\";section[1].style.width = \"50%\";section[1].style.display = \"\";section[1].style.visibility = \"\";";
            
            $scriptName = $start . $scriptName . $end;
        }
    } else {


        //var_dump($matchGenre);
        //echo $matchGenre[0]["id"];

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
if (!isset($matchGenre[0]["id"])) {

    ?>

<?php foreach ($match as $value): ?>

<p class="container_container-main_article-get-movies_by-name_p">
    <?php echo $value["title"]; ?>
</p>

<?php endforeach; ?>

<?php }}?>