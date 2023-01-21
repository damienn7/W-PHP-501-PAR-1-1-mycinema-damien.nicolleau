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
    <script src="./script/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cinema</title>
</head>

<body class="container">

    <header class="container_container-header">
        <nav class="container_container-header_nav">
            <ul class="container_container-header_nav_ul">
                <li class="container_container-header_nav_ul_li">
                    <a href="./index.php" class="container_container-header_nav_ul_li_a">Home</a>
                </li>
                <li class="container_container-header_nav_ul_li">
                    <a href="#" class="container_container-header_nav_ul_li_a">Genre</a>
                    <?php include("./get_genres.php"); ?>
                </li>
                <li class="container_container-header_nav_ul_li">
                    <a href="" class="container_container-header_nav_ul_li_a">Movies</a>
                </li>
                <li class="container_container-header_nav_ul_li">
                    <a href="" class="container_container-header_nav_ul_li_a">Distributeurs</a>
                </li>
                <li class="container_container-header_nav_ul_li">
                    <a href="" class="container_container-header_nav_ul_li_a">Utilisateurs</a>
                </li>
                <li class="container_container-header_nav_ul_li">
                    <a href="" class="container_container-header_nav_ul_li_a">Room</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="container_container-main">
        <!-- recherche de films par nom, genre, distributeur -->
        <form action="./index.php" class="container_container-main_form-search" method="get">
            <!-- <div class="container_container-main_form-search_input-search-div"> -->
            <input type="search" name="search" class="container_container-main_form-search_input-search"><button type="submit" class="container_container-main_form-search_submit-button"><i class="fa fa-search"></i></button>
            <!-- </div> -->
            <button class="container_container-main_form-search_submit-button" type="submit" style="display: none;visibility:hidden;">
                send request 
            </button>
        </form>
        <article class="container_container-main_article-get-movies">
            <section class="container_container-main_article-get-movies_by-name">
                <?php if (isset($_GET["id_genre"])): ?>
                    <h1 class="container_container-main_article-get-movies_by-name_h1">Resultats par GENRE</h1>
                    <?php include("./get_movies_by_genres.php"); ?>

                <?php else: ?>
                    <h1 class="container_container-main_article-get-movies_by-name_h1">Resultats par GENRE</h1>
                    <?php include("./get_movies.php"); ?>

                <?php endif; ?>
            </section>
            <section class="container_container-main_article-get-movies_by-name none">
                    <h1 class="container_container-main_article-get-movies_by-name_h1">Resultats par NOM</h1>
                    <?php foreach ($match as $value): ?>

                        <p class="container_container-main_article-get-movies_by-name_p_title"><?php echo $value["title"];?></p>

                    <?php endforeach; ?>

            </section>
        </article>

    </main>

    <script>
        //window.onload = function () {

        let elementsp = document.getElementsByClassName("container_container-main_article-get-movies_by-name_p");

        Array.from(elementsp).forEach(element => {
                element.style.visibility = "visible";
                element.style.display = "";
            });

        document.getElementsByClassName("container_container-header_nav_ul_li")[1].addEventListener("mouseover", addStyle);
        function addStyle() {
            document.getElementsByClassName("container_container-header_nav_ul_li_a")[1].style.color = "gold";

            document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.visibility = "visible";
            document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.display = "flex";
            document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.flexDirection = "column";
            document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.justifyContent = "space-between";
            // document.body.style.backgroundColor = "black";

            let elements = document.getElementsByClassName("container_container-header_nav_ul_li_ul-request_li");

            Array.from(elements).forEach(element => {
                element.style.visibility = "visible";
                element.style.display = "block";
            });

            let elements2 = document.getElementsByClassName("container_container-header_nav_ul_li_ul-request_li_a");

            Array.from(elements2).forEach(element => {
                element.style.visibility = "visible";
                element.style.display = "block";
            });
        }



        document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].addEventListener("mouseout", removeStyle);

        document.getElementsByClassName("container_container-header_nav_ul_li")[1].addEventListener("mouseout", removeStyle);

        function removeStyle() {
            document.getElementsByClassName("container_container-header_nav_ul_li_a")[1].style.color = "cadetblue";
            document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.visibility = "hidden";
            document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.display = "none";
            document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.flexDirection = "";
            document.getElementsByClassName("container_container-header_nav_ul_li_ul-request")[0].style.justifyContent = "";
            //document.body.style.backgroundColor = "black";

            let elements = document.getElementsByClassName("container_container-header_nav_ul_li_ul-request_li");

            Array.from(elements).forEach(element => {
                element.style.visibility = "hidden";
                element.style.display = "none";
            });

            let elements2 = document.getElementsByClassName("container_container-header_nav_ul_li_ul-request_li_a");

            Array.from(elements2).forEach(element => {
                element.style.visibility = "hidden";
                element.style.display = "none";
            });
        }
        //}
    </script>
    <?php if (isset($script)) {
        echo $script;
    }

    if (isset($scriptName)) {
        echo $scriptName;
    } ?>
</body>

</html>