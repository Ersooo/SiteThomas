<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Thomas</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <link href="css/styles_home.css" rel="stylesheet"/>
</head>
<body class="body-jeux">
<nav class="navigation">
    <div>
        <a class="navigation-element" href="home.html">Site Thomas</a>
    </div>
    <img src="assets/img/logo-site.png" class="image-logo-header"/>
</nav>

<section>
    <h2 class="titre-page">Jeux</h2>
    <div class="container-grid">
        <img src="assets/img/logo-lol.png" class="image-logo-jeux">
        <h3 class="desc-jeux">League of Legends (abrégé LoL) est un jeu vidéo sorti en 2009 de type arène de bataille en
            ligne, free-to-play, développé et édité par Riot Games sur Windows et Mac OS. Le mode principal du jeu voit
            s'affronter deux équipes de 5 joueurs en temps réel dans des parties d'une durée d'environ une demi-heure,
            chaque équipe occupant et défendant sa propre base sur la carte. Chacun des dix joueurs contrôle un
            personnage à part entière parmi les plus de 150 qui sont proposés.</h3>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/trophee.png"/>
            <?php
            $data = parse_ini_file('Configuration/db.config.ini');
            $server = $data['host'];
            $user = $data['username'];
            $pwd = $data['password'];
            $database = $data['database'];
            $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
            $req = $conn->prepare('SELECT COUNT(*) as nb from tournament where id = ?');
            $req->execute(array('lol'));
            $row = $req->fetch(PDO::FETCH_OBJ);
            ?>
            <h2 class="text-bouton"><?php echo $row->nb ?> / 16</h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/actu.png"/>
            <h2 class="text-bouton"><a href="https://www.leagueoflegends.com/fr-fr/news/">L'ACTU</a></h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/twitch.png"/>
            <h2 class="text-bouton"><a href="https://www.twitch.tv/directory/game/League%20of%20Legends">REGARDER UN
                    STREAM</a></h2>
        </div>
    </div>
    <br/>
    <div class="container-grid">
        <img src="assets/img/csgo.png" class="image-logo-jeux">
        <h3 class="desc-jeux">Counter-Strike: Global Offensive (abrégé CS:GO) est un jeu de tir à la première personne
            multijoueur en ligne basé sur le jeu d'équipe développé par Valve Corporation. Il est sorti le 21 août 2012
            sur PC et consoles (Xbox 360, PlayStation 3)1. En 2017, Microsoft annonce que le jeu sur Xbox 360 sera
            compatible avec la Xbox One. Depuis le 6 décembre 2018, le jeu est disponible partiellement gratuitement en
            free-to-play</h3>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/trophee.png"/>
            <?php
            $req = $conn->prepare('SELECT COUNT(*) as nb from tournament where id = ?');
            $req->execute(array('csgo'));
            $row = $req->fetch(PDO::FETCH_OBJ);
            ?>
            <h2 class="text-bouton"><?php echo $row->nb ?> / 16</h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/actu.png"/>
            <h2 class="text-bouton"><a
                        href="https://pley.gg/?gclid=Cj0KCQiAieWOBhCYARIsANcOw0wX8P0P3Mmtle-qq7UfAftidy6YuyEzwWqVJ6AU61Atf6vvqVdfk30aAmqHEALw_wcB">L'ACTU</a>
            </h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/twitch.png"/>
            <h2 class="text-bouton"><a
                        href="https://www.twitch.tv/directory/game/Counter-Strike%3A%20Global%20Offensive">REGARDER UN
                    STREAM</a></h2>
        </div>
    </div>
    <br/>
    <div class="container-grid">
        <img src="assets/img/rl.png" class="image-logo-jeux">
        <h3 class="desc-jeux">Rocket League est un jeu vidéo développé et édité par Psyonix et sort en juillet 2015 sur
            Windows et sur PlayStation 4. Deux équipes, composées de un à quatre joueurs conduisant des véhicules,
            s'affrontent au cours d'un match afin de frapper un ballon et de marquer dans le but adverse. Les voitures
            sont équipées de propulseurs (boost) et peuvent sauter, permettant de jouer le ballon dans les airs.</h3>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/trophee.png"/>
            <?php
            $req = $conn->prepare('SELECT COUNT(*) as nb from tournament where id = ?');
            $req->execute(array('rl'));
            $row = $req->fetch(PDO::FETCH_OBJ);
            ?>
            <h2 class="text-bouton"><?php echo $row->nb ?> / 16</h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/actu.png"/>
            <h2 class="text-bouton"><a href="https://www.rocketleague.com/fr/news/">L'ACTU</a></h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/twitch.png"/>
            <h2 class="text-bouton"><a href="https://www.twitch.tv/directory/game/Rocket%20League">REGARDER UN
                    STREAM</a></h2>
        </div>
    </div>
    <br/>
    <div class="container-grid">
        <img src="assets/img/st2.png" class="image-logo-jeux">
        <h3 class="desc-jeux">StarCraft 2: Wings of Liberty est un jeu vidéo de stratégie en temps réel (STR) développé
            par Blizzard Entertainment. Le jeu prend place au xxvie siècle et relate les affrontements entre trois
            espèces distinctes pour la domination d’une zone de la voie lactée connue sous le nom de Secteur Koprulu :
            les Terrans, constitués de descendants de bagnards terriens exilés loin de leur monde natal, les Zergs, une
            race de créatures modifiées génétiquement et obsédées par l’assimilation des autres espèces de la galaxie,
            et les Protoss, une race d’humanoïdes qui dispose de technologies et de pouvoirs psioniques très
            avancés.</h3>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/trophee.png"/>
            <?php
            $req = $conn->prepare('SELECT COUNT(*) as nb from tournament where id = ?');
            $req->execute(array('sc2'));
            $row = $req->fetch(PDO::FETCH_OBJ);
            ?>
            <h2 class="text-bouton"><?php echo $row->nb ?> / 16</h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/actu.png"/>
            <h2 class="text-bouton"><a href="https://news.blizzard.com/fr-fr/starcraft2">L'ACTU</a></h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/twitch.png"/>
            <h2 class="text-bouton"><a href="https://www.twitch.tv/directory/game/StarCraft%20II">REGARDER UN STREAM</a>
            </h2>
        </div>
    </div>
    <br/>
    <div class="container-grid">
        <img src="assets/img/dota.png" class="image-logo-jeux">
        <h3 class="desc-jeux">Dota 2 est un jeu vidéo de type arène de bataille en ligne multijoueur développé et édité
            par Valve Corporation. Dota 2 se joue en matches indépendants opposant deux équipes de cinq joueurs, chacune
            possédant une base située en coin de carte contenant un bâtiment appelé l'« Ancient », dont la destruction
            mène à la victoire de l'équipe ennemie. Chaque joueur contrôle un « Héros » et est amené à accumuler de
            l’expérience, gagner de l'or, s'équiper d'objets et combattre l'équipe ennemie pour parvenir à la
            victoire.</h3>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/trophee.png"/>
            <?php
            $req = $conn->prepare('SELECT COUNT(*) as nb from tournament where id = ?');
            $req->execute(array('d2'));
            $row = $req->fetch(PDO::FETCH_OBJ);
            ?>
            <h2 class="text-bouton"><?php echo $row->nb ?> / 16</h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/actu.png"/>
            <h2 class="text-bouton"><a href="https://www.dota2.com/news/updates?l=french">L'ACTU</a></h2>
        </div>
        <div class="jeux-bouton container-grid-bouton">
            <img class="img-bouton" src="assets/img/twitch.png"/>
            <h2 class="text-bouton"><a href="https://www.twitch.tv/directory/game/Dota%202">REGARDER UN STREAM</a></h2>
        </div>
    </div>
</section>
</body>
<footer class="bas-page">
</footer>
</html>