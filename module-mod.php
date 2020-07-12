<?php
include("connexion.php");
if(isset($_POST['ajouter'])){
  
  // récupérer les valeurs 
  $Nom_mdl = $_POST['Nom_mdl'];
  $Nbr_etd = $_POST['Nbr_etd'];
  $filiere = $_POST['filiere'];
  $ID_prof = $_POST['ID_prof'];
  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `module`(`Nom_mdl`, `Nbr_etd`, `filiere`, `ID_prof`) VALUES (:Nom_mdl,:Nbr_etd,:filiere,:ID_prof)";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_mdl"=>$Nom_mdl,":Nbr_etd"=>$Nbr_etd,":filiere"=>$filiere,":ID_prof"=>$ID_prof));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: module.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: module.php');
    echo "Échec de l'opération d'insertion";
  }
}



if(isset($_POST['modifier'])){
  
  $ID_mdl = $_POST['ID_mdl'];
  $Nom_mdl = $_POST['Nom_mdl'];
  $Nbr_etd = $_POST['Nbr_etd'];
  $filiere = $_POST['filiere'];
  $ID_prof = $_POST['ID_prof'];
 
  $sql = "UPDATE module SET Nom_mdl = :Nom_mdl, Nbr_etd = :Nbr_etd, filiere = :filiere, ID_prof = :ID_prof WHERE ID_mdl = :ID_mdl";
  $res = $conn->prepare($sql);
  $exec = $res->execute(array(":Nom_mdl"=>$Nom_mdl,":Nbr_etd"=>$Nbr_etd,":filiere"=>$filiere,":ID_prof"=>$ID_prof,":ID_mdl"=>$ID_mdl));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    
    header('Location: module.php');
    echo 'Données insérées';
    
    
  }else{
    
    header('Location: module.php');
    echo "Échec de l'opération d'insertion";
  }
}


if(isset($_POST['supprimer'])){
  
   
  $ID_mdl = $_POST['ID_mdl'];
  
  // Requête mysql pour insérer des données
  $sql = "DELETE FROM `module` WHERE `ID_mdl` = :ID_mdl";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':ID_mdl', $ID_mdl);
  $res = $stmt->execute();


    header('Location: module.php');

}
?>
