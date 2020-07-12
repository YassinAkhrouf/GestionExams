
<?php
session_start();
include("connexion.php");
if(isset($_POST['ajouter'])){
  
  // récupérer les valeurs 
  $Nom_prof = $_POST['Nom_prof'];

  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `professeur`(`Nom_prof`) VALUES (:Nom_prof)";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_prof"=>$Nom_prof));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: professeur.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: professeur.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['modifier'])){
  
  $ID_prof = $_POST['ID_prof'];
  $Nom_prof = $_POST['Nom_prof'];

 
  $sql = "UPDATE professeur SET Nom_prof = :Nom_prof WHERE ID_prof = :ID_prof";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_prof"=>$Nom_prof,":ID_prof"=>$ID_prof));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: professeur.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: professeur.php');
    echo "Échec de l'opération d'insertion";
  }
}


if(isset($_POST['supprimer'])){
  
   
  $ID_prof = $_POST['ID_prof'];
  
  // Requête mysql pour insérer des données
  $sql = "DELETE FROM `professeur` WHERE `ID_prof` = :ID_prof";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':ID_prof', $ID_prof);
  $res = $stmt->execute();


    header('Location: professeur.php');

}
?>


