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
if (isset($_REQUEST['identifiant'], $_REQUEST['mdp'])) {
    $data = parse_ini_file('Configuration/db.config.ini');
    $server = $data['host'];
    $user = $data['username'];
    $pwd = $data['password'];
    $database = $data['database'];
    $conn = new PDO("mysql:dbname=$database;host=$server", $user, $pwd);
    $req = $conn->prepare('SELECT * from User where id = ? and pwd = ?');
    $req->execute(array($_REQUEST['identifiant'], $_REQUEST['mdp']));
    $row = $req->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        ?>
        <section>
            <h2 class="titre-page">Connexion réussie</h2>
            <div class="container">
                <div class="row">
                    <div class="texte"> On vous remercie pour votre connexion, vous pouvez retourner sur la page
                        principale.
                    </div>
                    <form name="x" action="homeConnected.html" method="post">
                        <input type="submit" value="retour à l'accueil">
                    </form>
                </div>
            </div>
        </section>
        <?php
    } else {
        ?>
        <section>
            <h2 class="titre-page">Connexion échouée</h2>
            <div class="container">
                <div class="row">
                    <div class="texte"> Votre identifiant ou votre mot de passe est incorrect
                    </div>
                    <form name="x" action="signin.php" method="post">
                        <input type="submit" value="réessayer">
                    </form>
                </div>
            </div>
        </section>
        <?php
    }
} else {
    ?>
    <section>
        <h2 class="titre-page">Connexion</h2>
        <div class="container">
            <form action="signin.php">
                <div class="row">
                    <div class="titre-champ-inscription">
                        <label for="id-inscription">Identifiant</label>
                    </div>
                    <div class="valeur-champ-inscription">
                        <input type="text" id="id-inscription" minlength="4" name="identifiant"
                               placeholder="Votre identifiant.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="titre-champ-inscription">
                        <label for="mdp-inscription">Mot de passe</label>
                    </div>
                    <div class="valeur-champ-inscription">
                        <input type="password" id="mdp-inscription" minlength="8" name="mdp"
                               placeholder="Votre mot de passe.." required>
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