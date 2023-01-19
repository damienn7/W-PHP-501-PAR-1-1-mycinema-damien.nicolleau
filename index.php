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
            <input type="search" name="search" class="container_container-main_form-search_input-search">
            <button class="container_container-main_form-search_submit-button" type="submit">
                send request
            </button>
        </form>
        <article class="container_container-main_article-get-movies">
            <section class="container_container-main_article-get-movies_by-name">
                <?php if (isset($_GET["id_genre"])): ?>

                    <?php include("./get_movies_by_genres.php"); ?>

                <?php else: ?>

                    <?php include("./get_movies.php"); ?>

                <?php endif; ?>
            </section>
        </article>

    </main>

    <script>
        //window.onload = function () {
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
    } ?>
</body>

</html>