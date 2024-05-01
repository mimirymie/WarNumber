<?php
    session_start();
    if(isset($_POST['nom']) && isset($_POST['difficulte']))
    {
        header('location: GameP2.php');
        $_SESSION['nom']=$_POST['nom'];
        $_SESSION['difficulte']=$_POST['difficulte'];
        $_SESSION['jouer']=$_POST['jouer'];
        $_SESSION['nbradevine']=$nbrdevine;
        $_SESSION['tentative']=$tentative;
        if($_SESSION['difficulte']=="facile")
        {
            $_SESSION['tentative']=20;
        }
        if($_SESSION['difficulte']=="moyen")
        {
            $_SESSION['tentative']=10;
        }
        if($_SESSION['difficulte']=="difficile")
        {
            $_SESSION['tentative']=5;
        }
        unset($_SESSION['historique']);
    }

    function nbradevine() {
        $nbrs = range(0, 9);
        shuffle($nbrs);
        $nbr = "";
        for ($i = 0; $i < 4; $i++) {
            $nbr .= $nbrs[$i];
        }
        return $nbr;
    }
    $_SESSION['nbradevine'] = nbradevine();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAR NUMBER</title>
</head>
<body style="background-color: #f4f4f4;">
    <div 
    style="width: 80%;
    margin: 100px;
    padding: 30px;
    background-color: white;
    box-shadow: -7px -7px 20px 0px rgb(0 0 0 / 87%);">
        <form action="GameP1.php" method="post" style="text-align:center">
            <h1 >WAR NUMBER</h1>
            <p>
                <b>Nom d'utilisateur:</b><br>
                <input  type="text" name="nom" value="<?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : ''; ?>"
                style="padding-block: 2px;
                line-height: normal;
                text-align: left;" required>
                <br>
            </p>
            <p>
                <b>Difficulté:</b><br>
                <input type="radio" name="difficulte" value="facile" <?php echo (isset($_SESSION['difficulte']) && $_SESSION['difficulte'] == 'facile') ? 'checked' : ''; ?> required><b> Facile (20 tentatives) </b><br>
                <input type="radio" name="difficulte" value="moyen" <?php echo (isset($_SESSION['difficulte']) && $_SESSION['difficulte'] == 'moyen') ? 'checked' : ''; ?> required><b> Moyen (10 tentatives) </b><br>
                <input type="radio" name="difficulte" value="difficile" <?php echo (isset($_SESSION['difficulte']) && $_SESSION['difficulte'] == 'difficile') ? 'checked' : ''; ?> required><b> Difficile (5 tentatives) </b><br>
            </p>
            <p>
                <input type="submit" name="jouer" value="Commencer le jeu">
            </p>
        </form>
    </div>
</body>
</html>
<?php 

?>