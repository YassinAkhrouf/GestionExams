<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    
   include("connexion.php");

    $username = $_POST['username']; 
    $password = $_POST['password'];
    
    if($username !== "" && $password !== "")
    {
      $sel=$conn->prepare('SELECT * FROM utilisateur WHERE 
      nom_utilisateur = ? AND mot_de_passe = ? ');
        $sel->execute(array($username,$password));
        $tab=$sel->fetchAll();
        if(count($tab)!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
$conn=null; // fermer la connexion
?>