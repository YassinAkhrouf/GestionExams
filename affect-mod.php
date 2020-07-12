<?php
include("connexion.php");
if(isset($_POST['ajouter'])){
  
  // récupérer les valeurs 
 
  $ID_exam = $_POST['ID_exam'];
  $ID_salle = $_POST['ID_salle'];
  $ID_prof = $_POST['ID_prof'];
  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `salle_exam`(`ID_exam`, `ID_salle`, `ID_prof`) VALUES (:ID_exam,:ID_salle,:ID_prof)";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":ID_exam"=>$ID_exam,":ID_salle"=>$ID_salle,":ID_prof"=>$ID_prof));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: affectation.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: affectation.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['modifier'])){
  
  $ID_affect = $_POST['ID_affect'];
  $ID_exam = $_POST['ID_exam'];
  $ID_salle = $_POST['ID_salle'];
  $ID_prof = $_POST['ID_prof'];
  
  $sql = "UPDATE salle_exam SET ID_exam = :ID_exam, ID_salle = :ID_salle, ID_prof = :ID_prof WHERE ID_affect = :ID_affect";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":ID_exam"=>$ID_exam,":ID_salle"=>$ID_salle,":ID_prof"=>$ID_prof,":ID_affect"=>$ID_affect));
  
  if($exec){
    
    header('Location: affectation.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: affectation.php');
    echo "Échec de l'opération d'insertion";
  }
}

if(isset($_POST['supprimer'])){
  
  
  $ID_affect = $_POST['ID_affect'];
  
  $sql = "DELETE FROM `salle_exam` WHERE `ID_affect` = :ID_affect";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":ID_affect"=>$ID_affect));
  
 
    
    header('Location: affectation.php');
}
?>