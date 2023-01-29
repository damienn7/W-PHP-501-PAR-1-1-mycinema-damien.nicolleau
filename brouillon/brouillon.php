<article class="container_container-main_article-get-movies" id="article2">
<?php if (isset($_GET["id_genre"])): ?>
    <section class="container_container-main_article-get-movies_by-name">
        <p class="container_container-main_article-get-movies_by-name_h1" name="genre">Resultats par GENRE</p>
        <?php include("./get_movies_by_genres.php"); ?>
    </section>
<?php else: ?>
    <?php if (isset($_GET["search"])): ?>

        <section class="container_container-main_article-get-movies_by-name" id="section1">
            <?php include("./get_movies.php"); ?>


        </section>
        <?php if (isset($matchGenre[0]["id"]) && isset($matchMovie[0]["title"])): ?>
            <section class="container_container-main_article-get-movies_by-name none" id="section2">

                <p class="container_container-main_article-get-movies_by-name_h1">Resultats par NOM</p>
            <?php endif; ?>
            <?php foreach ($matchMovie as $value): ?>
                <p class="container_container-main_article-get-movies_by-name_p_title border"
                    value="<?php echo $value["id"]; ?>"><?php echo $value["title"]; ?></p>

            <?php endforeach; ?>


        </section>
    <?php endif; ?>
    <?php include("./get_movies_by_distributors.php"); ?>
    <?php if (isset($matchDistrib[0]["title"])): ?>
        <section class="container_container-main_article-get-movies_by-name" id="section3">

            <p class="container_container-main_article-get-movies_by-name_h1">Resultats par Distributeur</p>

            <div class="distribDiv">
                <p class="container_container-main_article-get-movies_by-name_p_title border"
                    value="<?php echo $value["id_distributor"]; ?>" style="color:crimson;"><?php echo $matchDistrib[0]["name"]; ?></p>
                <?php foreach ($matchDistrib as $value): ?>


                    <p class="container_container-main_article-get-movies_by-name_p_title border"
                        value="<?php echo $value["id"]; ?>"><?php echo $value["title"]; ?></p>

                <?php endforeach; ?>

            </div>
        </section>
    <?php endif; ?>

<?php endif; ?>
</article>