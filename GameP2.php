<?php
    session_start();
    if(empty($_SESSION['nom']) || empty($_SESSION['difficulte']))
    {
        header('location: GameP1.php');
    }
    if (empty($_SESSION['historique'])){
        $_SESSION['historique'] = array();
    }
    if(isset($_POST['essayer']))
    {
        $_SESSION['essayer']=$_POST['essayer'];
        $_SESSION['tentative']--;
        $_SESSION['devinette']=$_POST['devinette'];
        $_SESSION['historique'][] = $_SESSION['devinette'] ;
        function calcul_mort($x)
        {
            $nbrmort=0;
            for($i=0;$i<4;$i++)
            {
                if((str_split($x[$i]))==(str_split($_SESSION['nbradevine'][$i])))
                {
                    $nbrmort++;
                }
            }
            return $nbrmort;
        }
        function calcul_blesse($x)
        {
            $nbrblesse=0;
            for($i=0;$i<4;$i++)
            {
                if(in_array(str_split($x)[$i], str_split($_SESSION['nbradevine'])) && (str_split($x)[$i])!=(str_split($_SESSION['nbradevine'])[$i]))
                {
                    $nbrblesse++;
                }
            }
            return $nbrblesse;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAR NUMBER</title>
</head>
<body style="display: block;
    margin-left: 20px;
    padding: 20px;
    display: block;">
    <p>
        <h1 style="text-align:center">WAR NUMBER</h1>
    </p>
    <?php
    echo "<h1>Bonjour, ". $_SESSION['nom']." !</h1>"."<br>";
    echo "Tentatives restantes: ".$_SESSION['tentative'];
    ?> 
    <form method="post" action="GameP2.php" style="text-align:center">
        <p>Entrez votre devinette: </p>
        <p>
        <input  type="text" name="devinette" value="<?php echo isset($_SESSION['devinette']) ? $_SESSION['devinette'] : ''; ?>" required pattern="[0-9]{4}"><br>
        </p>
        <p>
            <input type="submit" name="essayer" value="Essayer">
        </p>
    </form>
    <p>
        
        <h1>Historique des tentatives</h1>
        <ul>
        <?php 
        if(isset($_SESSION['essayer']))
        {
            foreach($_SESSION['historique'] as $nbr)
            {

                echo "<li>".$nbr."-".calcul_mort($nbr)."morts,".calcul_blesse($nbr)." blessés</li>";

            }
        }
        ?>
        </ul>
    </p>
    <?php 
    if(isset($_SESSION['essayer']))
    {
        if($_SESSION['tentative']<=0 || $_SESSION['devinette']==$_SESSION['nbradevine'])
        {
            header('location: GameP3.php');
        }
    }

    ?>
</body>
</html> 
