<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Thomas</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <link href="css/styles_home.css" rel="stylesheet"/>
</head>
<body>
<nav class="navigation">
    <div>
        <a class="navigation-element" href="home.html">Site Thomas</a>
    </div>
</nav>

<?php
if (isset($_REQUEST['identifiant'], $_REQUEST['texte'])) {
    $data = parse_ini_file('Configuration/db.config.ini');
    $server = $data['host'];
    $user = $data['username'];
    $pwd = $data['password'];
    $database = $data['database'];
    $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
    $req = $conn->prepare('SELECT * from User where id = ?');
    $req->execute(array($_REQUEST['identifiant']));
    $row = $req->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        ?>
        <section>
            <h2 class="titre-page">Ajout du commentaire échoué</h2>
            <div class="container">
                <div class="row">
                    <div class="texte"> Votre identifiant est incorrect.
                    </div>
                    <form name="x" action="commentary.php" method="post">
                        <input type="submit" value="réessayer">
                    </form>
                </div>
            </div>
        </section>
        <?php
    } else {
        $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
        $req = $conn->prepare('INSERT INTO Commentary(id_user, texte) VALUE (?,?)');
        $req->execute(array($_REQUEST['identifiant'], $_REQUEST['texte']));
        ?>
        <section>
            <h2 class="titre-page"> Ajout du commentaire réussit </h2>
            <div class="container">
                <div class="row">
                    <div class="texte">
                        On vous remercie pour votre commentaire.
                    </div>
                    <form name="x" action="homeConnected.html" method="post">
                        <input type="submit" value="retour à l'accueil">
                    </form>
                </div>
            </div>
        </section>
        <?php
    }
} else {
    ?>
    <section>
        <h2 class="titre-page">Ajout d'un commentaire</h2>
        <div class="container">
            <form action="commentary.php">
                <div class="row">
                    <div class="titre-champ-inscription">
                        <label for="nom-inscription">Identifiant</label>
                    </div>
                    <div class="valeur-champ-inscription">
                        <input type="text" id="nom-inscription" name="identifiant" placeholder="Votre identifiant.."
                               required>
                    </div>
                </div>
                <div class="row">
                    <div class="titre-champ-inscription">
                        <label for="prenom-inscription">Commentaire</label>
                    </div>
                    <div class="valeur-champ-inscription">
                        <textarea id="prenom-inscription" name="texte" placeholder="Votre commentaire..."
                                  rows="5" cols="33" required></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Valider">
                </div>
            </form>
        </div>
    </section>
<?php } ?>
<footer class="bas-page">
</footer>
</body>
</html>