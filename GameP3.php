<?php
    session_start();
    if(empty($_SESSION['nom']) && empty($_SESSION['difficulte']) && ($_SESSION['tentative']>0 || $_SESSION['devinette']!=$_SESSION['nbradevine']))
    {
        header('location: GameP1.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAR NUMBER</title>
</head>
<body style="background-color: #f4f4f4;">
    <?php
        if($_SESSION['tentative']<=0)
        {
    ?>
    <div 
    style="width: 80%;
    margin: 100px;
    padding: 30px;
    background-color: white;
    box-shadow: -12px -12px 17px 7px rgb(180 3 3 / 87%);">
    <form method="post" action="GameP1.php" style="text-align:center;">
    <h1><b><p> Game Over </p>
        <p>Dommage! Vous avez perdu. <br>Le nombre était <?php echo $_SESSION['nbradevine']?>.</p>
        <p>
            <input type="submit" name="rejouer" value="Rejouer" style="font-size: large;">
        </p></b></h1>
    </form>
    </div>
    
    <?php
        }
        elseif ($_SESSION['devinette']==$_SESSION['nbradevine'])
        {
    ?>
    <div 
    style="width: 80%;
    margin: 100px;
    padding: 30px;
    background-color: white;
    box-shadow: -12px -12px 17px 7px rgb(0 160 12 / 87%);">
    <form method="post" action="GameP1.php" style="text-align:center;">
    <h1><b><p>Félicitations, <?php echo $_SESSION['nom'] ?>! <br>Vous avez trouvé le nombre!</p>
        <p>
            <input type="submit" name="rejouer" value="Rejouer" style="font-size: large;">
        </p></b></h1>
    </form>

    <?php
        }
    ?>
    </div>

</body>
</html>