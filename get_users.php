<?php

$fn = $_GET["firstname"];
$ln = $_GET["lastname"];

try {
    //$stmtQuery = $db->prepare("select firstname, lastname,id from user where firstname like \"%$fn%\" and lastname like \"%$ln%\"");
    $stmtQuery = $db->prepare("select u.id as id,u.firstname as firstname,u.lastname as lastname 
    from user as u
    where u.firstname like \"%$fn%\" and u.lastname like \"%$ln%\"");
    $stmtQuery->execute();
    $users = $stmtQuery->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo $e->getMessage();
    echo "here";
}

?>


<?php foreach ($users as $value): ?>

    <?php
    try {
        $stmtQuery = $db->prepare("select u.id as id,u.firstname as firstname,u.lastname as lastname, m.id_subscription as id_subs,m.disabled as disabled
    from user as u join membership as m on m.id_user= u.id
    where m.id_user = :id");
    $stmtQuery->execute(["id"=>$value["id"]]);
    $id_subs = $stmtQuery->fetchAll();
    } catch (Exception $e) {
        echo "new error";
        die("Erreur : ".$e->getMessage());
    }

    if ($id_subs[0]["id_subs"]!="") {
    
    try {
        echo "";
        $stmtQuery = $db->prepare("select name from subscription
        where id = :id_subs");
        $stmtQuery->execute(["id_subs"=>$id_subs[0]["id_subs"]]);
        $name_subs = $stmtQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage();
        echo "here2";
    }

}

    ?>

    <section class="container_container-main_article-get-movies_by-name">
    <div class="row">
        <p class="container_container-main_article-get-movies_by-name_p">
            <?php echo $value["firstname"]; ?>
        </p>
        <p class="container_container-main_article-get-movies_by-name_p">
            <?php echo $value["lastname"]; ?>
        </p>
        </div>
        <p class="container_container-main_article-get-movies_by-name_h1">
            <?php echo $name_subs[0]["name"]; ?>
        </p>

        <form action="./user_manager.php" method="POST" class="form-users">
            <select type="search" name="id_subs" class="container_container-main_form-search_input-select">
                <?php if (isset($name_subs[0]["name"])&&$name_subs[0]["name"]!=""): ?>
                    <option value="<?php echo $name_subs[0]["name"]; ?>">--<?php echo $name_subs[0]["name"]; ?>--</option>
                <?php else: ?>
                    <option value="">--NOT A MEMBER--</option>
                <?php endif; ?>
                <option value="1">VIP</option>
                <option value="2">GOLD</option>
                <option value="3">Classic</option>
                <option value="4">Pass Day</option>
            </select>
            <div>
                <input type="hidden" value="<?php echo $value["id"]; ?>" name="id_user">
                <input type="hidden" value="<?php echo $fn; ?>" name="firstname">
                <input type="hidden" value="<?php echo $ln; ?>" name="lastname">
                <?php if(isset($name_subs[0]["name"])&&$name_subs[0]["name"]!=""):?>
                <?php if($id_subs[0]["disabled"] == false):?>
                    <button type="submit" class="button btn--green" name="update">Modifier</button>
                    <button type="submit" class="button btn--red" name="delete">Desactiver</button>
                <?php else: ?>
                    <button type="submit" class="button btn--red" name="create">Activer</button>
                <?php endif; ?>
                <?php else: ?>
                    <button type="submit" class="button btn--green" name="update">Creer</button>
                <?php endif; ?>
            </div>
        </form>
            <form action="./get_set_historical.php" method="POST" class="form-details">
                <input type="hidden" value="<?php echo $value["id"]; ?>" name="id_user">
                <button type="submit" class="button btn--details">
                    Plus de details
                </button>
            </form>
    </section>

<?php endforeach; ?>