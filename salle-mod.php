<?php
include("connexion.php");
if(isset($_POST['ajouter'])){
  
  // récupérer les valeurs 
  $Nom_salle = $_POST['Nom_salle'];
  $Capacite = $_POST['Capacite'];
  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `salle`(`Nom_salle`, `Capacite`) VALUES (:Nom_salle,:Capacite)";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_salle"=>$Nom_salle,":Capacite"=>$Capacite));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: salle.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: salle.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['modifier'])){
  
  $ID_salle = $_POST['ID_salle'];
  $Nom_salle = $_POST['Nom_salle'];
  $Capacite = $_POST['Capacite'];
  
 
  $sql = "UPDATE salle SET Nom_salle = :Nom_salle, Capacite = :Capacite WHERE ID_salle = :ID_salle";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_salle"=>$Nom_salle,":Capacite"=>$Capacite,":ID_salle"=>$ID_salle));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: salle.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: salle.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['supprimer'])){
  
   
  $ID_salle = $_POST['ID_salle'];
  
  // Requête mysql pour insérer des données
  $sql = "DELETE FROM `salle` WHERE `ID_salle` = :ID_salle";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':ID_salle', $ID_salle);
  $res = $stmt->execute();


    header('Location: salle.php');

}
?>