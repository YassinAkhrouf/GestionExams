<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/img/icon.png"/>
    <link rel="stylesheet" type="text/css" href="assets/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/button.css">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css">
    <link rel="stylesheet" type="text/css" href="assets/css/tableaux.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  </head>
  <body>
    <div class="sidebar">
      <a class="active" href="principale.php">Accueil</a>
      <div id="myLinks">
            <a href="affectation.php">Affectations</a>
            <a href="exam.php">Exams</a>
            <a href="module.php">Modules</a>
            <a href="professeur.php">Professeurs</a>
            <a href="salle.php">Salles</a>
            <a href="logout.php">Déconnexion</a>
      </div> 
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <span class="bar"></span>
      </a>
    </div> 
    <div class="content">
    <div class="logo">
    <img src="assets/img/ensa-logo.png" alt="ENSA TETOUAN" width="70" height="90" style="vertical-align:middle">
        <p>École Nationale des Sciences Appliquées de Tétouan</p>
    </div>
    <div class="sucess">
            <h2>Bienvenue <?php echo $_SESSION['username']; ?>!</h2>
            <p>
            <a href="affectation.php">Cliquez pour voir les détails des affectations</a>
            </p>
        </div>
      
      <div>
        <?php
        include("connexion.php");
        $sql = "SELECT exam.Nom_exam, module.Nom_mdl, exam.date_debut, exam.date_fin, COUNT(DISTINCT salle.Nom_salle), COUNT(DISTINCT professeur.Nom_prof) FROM exam, module, salle, professeur, salle_exam 
        WHERE salle.ID_salle = salle_exam.ID_salle AND professeur.ID_prof = salle_exam.ID_prof AND exam.ID_exam = salle_exam.ID_exam AND exam.ID_mdl = module.ID_mdl
       GROUP BY exam.Nom_exam, module.Nom_mdl";
        $stmt = $conn->query($sql);
   
      if($stmt === false){
        die("Erreur");
      }
        ?> 
      <table id="tableaux">
   <thead>
     <tr>
       <th>Exam</th>
       <th>Module</th>
       <th>Date de début</th>
       <th>Date de fin</th>
       <th>Nombre des salles</th>
       <th>Nombre des surveillants</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['Nom_exam']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom_mdl']); ?></td>
       <td><?php echo htmlspecialchars($row['date_debut']); ?></td>
       <td><?php echo htmlspecialchars($row['date_fin']); ?></td>
       <td><?php echo htmlspecialchars($row['COUNT(DISTINCT salle.Nom_salle)']); ?></td>
       <td><?php echo htmlspecialchars($row['COUNT(DISTINCT professeur.Nom_prof)']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
      </div>
      
    <script>
      function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
          x.style.display = "none";
        } else {
          x.style.display = "block";
          }
        }
    </script>
  </body>
</html>