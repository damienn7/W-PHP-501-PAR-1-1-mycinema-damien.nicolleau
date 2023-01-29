<?php
session_start();
include("./config/mysql.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <!-- <script src="./script/script.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cinema</title>
</head>

<body class="container">

    <header class="container_container-header">
        <nav class="container_container-header_nav">
            <ul class="container_container-header_nav_ul">
                <li class="container_container-header_nav_ul_li">
                    <a href="http://localhost:8080/index.php?distrib=&genre=&search=" class="container_container-header_nav_ul_li_a">Home</a>
                </li>
                <li class="container_container-header_nav_ul_li">
                    <a href="http://localhost:8080/users.php?firstname=&lastname=" class="container_container-header_nav_ul_li_a">Utilisateurs</a>
                </li>
                <li class="container_container-header_nav_ul_li">
                    <a href="#" class="container_container-header_nav_ul_li_a">Room</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="container_container-main">
        <!-- recherche de films par nom, genre, distributeur -->
        <form action="./index.php" class="container_container-main_form-search" method="get">
            <!-- <div class="container_container-main_form-search_input-search-div"> -->
            <input type="text" name="distrib" class="container_container-main_form-search_input-text"
                placeholder="DISTRIBUTEUR" value="">
                <select type="search" name="genre" class="container_container-main_form-search_input-select">
                    <option value="">GENRE</option>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Animation">Animation</option>
                    <option value="Biography">Biography</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Crime">Crime</option>
                    <option value="Drama">Drama</option>
                    <option value="Family">Family</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Horror">Horror</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Romance">Romance</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Thriller">Thriller</option>
                </select>
            <input type="search" name="search" class="container_container-main_form-search_input-search"
                placeholder="NOM" value="">
                <button type="submit" class="container_container-main_form-search_submit-button"><i class="fa fa-search"></i></button>
            <!-- </div> -->
        </form>
        <?php if (isset($_GET["search"])): ?>
            <div>
                <p class="container_container-main_article-get-movies_by-name_h1 resultInfo" style="color:white;">Resultats
                    pour le mot cle "<?php echo $_GET["search"]; ?>"
                </p>
            </div>
        <?php endif; ?>
        <article class="container_container-main_article-get-movies" id="article1">
            <?php include("./get_by_genre_distrib_name.php"); ?>
            <section class="container_container-main_article-get-movies_by-name none" id="section0">
            <?php foreach ($matchNGD as $value): ?>

                <p class="container_container-main_article-get-movies_by-name_h1">
                    <?php echo $value["title"]; ?>
                </p>
                <p class="container_container-main_article-get-movies_by-name_p_title" >
                    <?php echo $value["name"]; ?>
                </p>
            <?php endforeach; ?>
            </section>
        </article>
    </main>

    <?php if (isset($script)) {
        echo $script;
    }

    if (isset($scriptName)) {
        echo $scriptName;
    } ?>
    
</body>
</html>