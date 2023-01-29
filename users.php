<?php
session_start();
include("./config/mysql.php");
include("./check_able_members.php");
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
        <form action="./users.php" class="container_container-main_form-search" method="get">
                <input type="text" name="firstname" class="container_container-main_form-search_input-text"
                placeholder="eXemple : Randy">
                <input type="text" name="lastname" class="container_container-main_form-search_input-text"
                placeholder="eXemple : Black">
            <!-- </div> -->
            <button type="submit" class="fa fa-search btn"></button>
        </form>
        <?php if (isset($_GET["firstname"])||isset($_GET["lastname"])): ?>
            <div>
                <p class="container_container-main_article-get-movies_by-name_h1 resultInfo" style="color:white;">Resultats
                    pour le mot cle "<?php echo " ".$_GET["firstname"]; echo " ".$_GET["lastname"]." ";  ?>"
                </p>
            </div>
        <?php endif; ?>

        <article class="container_container-main_article-get-movies" id="article1">
            <?php if (isset($_GET["firstname"])||isset($_GET["lastname"])): ?>
                    <?php include("./get_users.php"); ?>
            <?php endif; ?>
        </article>
    </main>
</body>
</html>