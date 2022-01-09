<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>ICN E-Sport | Tournoi</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <link href="css/styles_home.css" rel="stylesheet"/>
</head>
<body>
<nav class="navigation">
    <div>
        <a class="navigation-element" href="homeConnected.html">ICN E-Sport</a>
    </div>
</nav>

<?php
if (isset($_REQUEST['identifiant'], $_REQUEST['pseudo'], $_REQUEST['jeu'])) {
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
            <h2 class="titre-page">Inscription échouée</h2>
            <div class="container">
                <div class="row">
                    <div class="texte"> Votre identifiant est incorrect.
                    </div>
                    <form name="x" action="tournament.php" method="post">
                        <input type="submit" value="réessayer">
                    </form>
                </div>
            </div>
        </section>
        <?php
    } else {
        $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
        $req = $conn->prepare('SELECT COUNT(*) as nb from tournament where pseudo = ? and id = ?');
        $req->execute(array($_REQUEST['pseudo'], $_REQUEST['jeu']));
        $row = $req->fetch(PDO::FETCH_OBJ);
        if ($row->nb == 1) {
            ?>
            <section>
                <h2 class="titre-page">Inscription échouée</h2>
                <div class="container">
                    <div class="row">
                        <div class="texte"> Votre pseudo est déjà utilisé.
                        </div>
                        <form name="x" action="tournament.php" method="post">
                            <input type="submit" value="réessayer">
                        </form>
                    </div>
                </div>
            </section>
            <?php
        } else {
            $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
            $req = $conn->prepare('SELECT COUNT(*) as nb from tournament where id = ?');
            $req->execute(array($_REQUEST['jeu']));
            $row = $req->fetch(PDO::FETCH_OBJ);
            if ($row->nb == 16) {
                ?>
                <section>
                    <h2 class="titre-page">Inscription échouée</h2>
                    <div class="container">
                        <div class="row">
                            <div class="texte"> Il n'y a plus de place dans ce tournoi.
                            </div>
                            <form name="x" action="tournament.php" method="post">
                                <input type="submit" value="réessayer">
                            </form>
                        </div>
                    </div>
                </section>
                <?php
            } else {
                $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
                $req = $conn->prepare('INSERT INTO tournament VALUE (?,?,?)');
                $req->execute(array($_REQUEST['jeu'], $_REQUEST['identifiant'], $_REQUEST['pseudo']));
                ?>
                <section>
                    <h2 class="titre-page">Inscription réussite</h2>
                    <div class="container">
                        <div class="row">
                            <div class="texte">
                                On vous remercie pour votre inscription, vous participez désormais au tournoi.
                            </div>
                            <form name="x" action="homeConnected.html" method="post">
                                <input type="submit" value="retour à l'accueil">
                            </form>
                        </div>
                    </div>
                </section>
                <?php
            }
        }
    }
} else {
    ?>
    <section>
        <h2 class="titre-page">Inscription</h2>
        <div class="container">
            <form action="tournament.php">
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
                        <label for="prenom-inscription">Pseudo</label>
                    </div>
                    <div class="valeur-champ-inscription">
                        <input type="text" id="prenom-inscription" name="pseudo" placeholder="Votre pseudo.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="titre-champ-inscription">
                        <label for="id-inscription">Tournoi</label>
                    </div>
                    <div class="valeur-champ-inscription">
                        <label>
                            <select name="jeu" required>
                                <option value="">Choississez un tournoi</option>
                                <option value="lol">League of Legend</option>
                                <option value="csgo">Counter-Strike</option>
                                <option value="rl">Rocket League</option>
                                <option value="sc2">StarCraft 2</option>
                                <option value="d2">Dota 2</option>
                            </select>
                        </label>
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