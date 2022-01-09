<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>ICN E-Sport | Inscription</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <link href="css/styles_home.css" rel="stylesheet"/>
</head>
<body>
<nav class="navigation">
    <div>
        <a class="navigation-element" href="home.html">ICN E-Sport</a>
    </div>
</nav>

<?php
if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['identifiant'], $_REQUEST['mdp'])) {
    $data = parse_ini_file('Configuration/db.config.ini');
    $server = $data['host'];
    $user = $data['username'];
    $pwd = $data['password'];
    $database = $data['database'];
    $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
    $req = $conn->prepare('SELECT * from User where id = ?');
    $req->execute(array($_REQUEST['identifiant']));
    $row = $req->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        ?>
        <section>
            <h2 class="titre-page">Inscription échouée</h2>
            <div class="container">
                <div class="row">
                    <div class="texte"> Votre identifiant est déjà utilisé.
                    </div>
                    <form name="x" action="commentary.php" method="post">
                        <input type="submit" value="réessayer">
                    </form>
                </div>
            </div>
        </section>
        <?php
    } else {
        $req = $conn->prepare('INSERT INTO User VALUE (?,?,?,?)');
        $req->execute(array($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['identifiant'], $_REQUEST['mdp']));
        ?>
        <section>
            <h2 class="titre-page">Inscription réussite</h2>
            <div class="container">
                <div class="row">
                    <div class="texte">
                        On vous remercie pour votre inscription, vous pouvez désormais vous connecter.
                    </div>
                    <form name="x" action="signin.php" method="post">
                        <input type="submit" value="se connecter">
                    </form>
                </div>
            </div>
        </section>
        <?php
    }
} else {
    ?>
    <section>
        <h2 class="titre-page">Inscription</h2>
        <div class="container">
            <form action="register.php">
                <div class="row">
                    <div class="titre-champ-inscription">
                        <label for="nom-inscription">Nom de famille</label>
                    </div>
                    <div class="valeur-champ-inscription">
                        <input type="text" id="nom-inscription" name="nom" placeholder="Votre nom.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="titre-champ-inscription">
                        <label for="prenom-inscription">Prénom</label>
                    </div>
                    <div class="valeur-champ-inscription">
                        <input type="text" id="prenom-inscription" name="prenom" placeholder="Votre prénom.." required>
                    </div>
                </div>
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