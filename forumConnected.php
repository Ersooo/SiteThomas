<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>ICN E-Sport | Forum</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <link href="css/styles_home.css" rel="stylesheet"/>
</head>
<body class="body-jeux">
<nav class="navigation">
    <div>
        <a class="navigation-element" href="homeConnected.html">ICN E-Sport</a>
        <a class="navigation-element redirection" href="commentary.php">Écrire un message</a>
        <a class="navigation-element redirection" href="tournament.php">Inscription tournoi</a>
        <a class="navigation-element redirection" href="home.html">Déconnexion</a>
    </div>
</nav>

<section>
    <h2 class="titre-page-jeux">Forum</h2>
    <?php
    $data = parse_ini_file('Configuration/db.config.ini');
    $server = $data['host'];
    $user = $data['username'];
    $pwd = $data['password'];
    $database = $data['database'];
    $conn = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);
    $req = $conn->prepare('SELECT * from commentary');
    $req->execute();
    $row = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $value) {
        ?>
        <div class="container-forum">
            <h2 class="pseudo-forum"> <?php echo $value['id_user'] ?></h2>
            <h3 class="msg-forum"><?php echo $value['texte'] ?></h3>
            <h5 class="msg-forum"><?php echo $value['date'] ?></h5>
        </div>
        <?php
    } ?>
</section>
</body>
<footer class="bas-page">
</footer>
</html>