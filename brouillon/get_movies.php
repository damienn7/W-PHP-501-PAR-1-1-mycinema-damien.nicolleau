<?php

//recherche de films par genre



if (isset($_GET["search"])) {

    $request = $_GET["search"];
    //echo $request;
    $matchGenre = array();
    try {
        $statementQuery = $db->prepare("SELECT id,name FROM genre WHERE name = \"$request\"");
        $statementQuery->execute();
        $matchGenre = $statementQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


    //var_dump($matchGenre);
    //echo $_GET["search"];


    if ((!$e && isset($matchGenre[0]["id"]))) {



        include("./get_movies_by_genres.php");
        //echo $matchGenre[0]["name"];
        //echo $_GET["search"];
        $match = array();
        $request = htmlspecialchars($request);
        //echo $request;
        if (isset($request)) {
            try {
                $query = "SELECT id,title FROM movie WHERE title LIKE \"%$request%\" or title = \"$request\"";
                $statementQuery = $db->prepare($query);
                $statementQuery->execute();
                $matchMovie = $statementQuery->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {
                echo "mouchkir";
                var_dump($match);
                echo $e;
            }
            //var_dump($match);

            // $scriptName = "";

            // $scriptName = "let article = document.getElementsByClassName(\"container_container-main_article-get-movies\")[0];article.style.display = \"flex\";article.style.flexDirection = \"row\";let section = document.getElementsByClassName(\"container_container-main_article-get-movies_by-name\");section[1].style.display = \"\";section[1].style.visibility = \"\";section[2].style.display = \"none\";section[2].style.visibility = \"hidden\";";

            // $scriptName = $start . $scriptName . $end;

        }
    } else {


        //var_dump($matchGenre);
        //echo $matchGenre[0]["id"];

        $match = array();
        $request = htmlspecialchars($request);
        //echo $request;
        if (isset($request)) {
            try {
                $query = "SELECT id,title FROM movie WHERE title LIKE \"%$request%\" or title = \"$request\"";
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
        
<p class="container_container-main_article-get-movies_by-name_h1" name="movie">Resultats par NOM</p>
<?php foreach ($match as $value): ?>

<p class="container_container-main_article-get-movies_by-name_p border" value="<?php echo $value["id"]; ?>">
    <?php echo $value["title"]; ?>
</p>

<?php endforeach; ?>

<?php } else { 

    ?>

    
<?php foreach ($match as $value): ?>

<p class="container_container-main_article-get-movies_by-name_p border" value="<?php echo $value["id"]; ?>">
    <?php echo $value["title"]; ?>
</p>

<?php endforeach; ?>



<?php }
}?>