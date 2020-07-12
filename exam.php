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
      <div class="titre">
        <h1>Liste des exams</h1>
      </div>
      <div class="btm">
        <button class="button button1" onclick="document.getElementById('id01').style.display='block'">Ajouter</button>
        <button class="button button1" onclick="document.getElementById('id02').style.display='block'">Modifier</button>
        <button class="button button1" onclick="document.getElementById('id03').style.display='block'">Supprimer</button>
      </div>
      <div>
        <?php
        include("connexion.php");
        $sql = "SELECT exam.Nom_exam, module.Nom_mdl, exam.date_debut, exam.date_fin FROM exam, module WHERE exam.ID_mdl = module.ID_mdl";
        $stmt = $conn->query($sql);
   
      if($stmt === false){
        die("Erreur");
      }
        ?> 
      <table id="tableaux">
   <thead>
     <tr>
      <th>exam</th>
      <th>Module</th>
       <th>Date de debut</th>
       <th>Date de fin</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['Nom_exam']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom_mdl']); ?></td>
       <td><?php echo htmlspecialchars($row['date_debut']); ?></td>
       <td><?php echo htmlspecialchars($row['date_fin']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
      </div>
      <div id="id01" class="modal">
        <form class="modal-content animate" action="exam-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
            <label for="Nom_exam"><b>Exam</b></label>
            <input type="text"  name="Nom_exam" required>
            <?php
        include("connexion.php");
        $sql2 = "SELECT Nom_mdl, ID_mdl FROM module ";
        $stmt2 = $conn->query($sql2);
        
   
      if($stmt2 === false){
        die("Erreur");
      }
        ?> 
            <label for="ID_mdl"><b>Module</b></label>
            <select name="ID_mdl" required>
            <option value="0">Veuillez choisir le module</option>
            <?php while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row2['ID_mdl'])?>" >
                <?php echo($row2['Nom_mdl']) ?>
                </option>
              <?php endwhile; ?>
            </select>

            
            <label for="date_debut"><b>Date de debut ( YYYY-MM-DDhh:mm:ss )</b></label>
            <input type="datetime-local" name="date_debut" required placeholder="2020-01-0100:00:00">
            <label for="date_fin"><b>Date de fin ( YYYY-MM-DDhh:mm:ss )</b></label>
            <input type="datetime-local" name="date_fin" required placeholder="2020-01-0100:00:00">
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="ajouter">Ajouter</button>
          </div>
        </form>
      </div>
      <div id="id02" class="modal">
        <form class="modal-content animate" action="exam-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql4 = "SELECT exam.ID_exam, exam.Nom_exam, exam.ID_mdl, module.Nom_mdl FROM exam, module WHERE exam.ID_mdl = module.ID_mdl ";
        $stmt4 = $conn->query($sql4);

      if($stmt4 === false){
        die("Erreur");
      }
        ?> 
            <label for="ID_exam"><b>Exam</b></label>
            <select name="ID_exam" required>
            <option value="0">Veuillez choisir l'exam</option>
            <?php while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row4['ID_exam'])?>" >
                <?php echo($row4['Nom_exam']) ?> <?php echo($row4['Nom_mdl']) ?>
                </option>
              <?php endwhile; ?>
            </select>
            <label for="Nom_exam"><b>Le nouveau nom d'exam</b></label>
            <input type="text"  name="Nom_exam" required>
            <?php
        include("connexion.php");
        $sql5 = "SELECT Nom_mdl, ID_mdl FROM module ";
        $stmt5 = $conn->query($sql5);
        
   
      if($stmt5 === false){
        die("Erreur");
      }
        ?> 
            <label for="ID_mdl"><b>Module</b></label>
            <select name="ID_mdl" required>
            <option value="0">Veuillez choisir le module</option>
            <?php while($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row5['ID_mdl'])?>" >
                <?php echo($row5['Nom_mdl']) ?>
                </option>
              <?php endwhile; ?>
            </select>

            
            <label for="date_debut"><b>Date de debut ( YYYY-MM-DDhh:mm:ss )</b></label>
            <input type="datetime-local" name="date_debut" required placeholder="2020-01-0100:00:00">
            <label for="date_fin"><b>Date de fin ( YYYY-MM-DDhh:mm:ss )</b></label>
            <input type="datetime-local" name="date_fin" required placeholder="2020-01-0100:00:00">
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="modifier">Modifier</button>
          </div>
        </form>
      </div>
      <div id="id03" class="modal">
        <form class="modal-content animate" action="exam-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql3 = "SELECT exam.ID_exam, exam.Nom_exam, exam.ID_mdl, module.Nom_mdl FROM exam, module WHERE exam.ID_mdl = module.ID_mdl ";
        $stmt3 = $conn->query($sql3);

      if($stmt3 === false){
        die("Erreur");
      }
        ?> 
            <label for="ID_exam"><b>Exam</b></label>
            <select name="ID_exam" required>
            <option value="0">Veuillez choisir le nom d'exam</option>
            <?php while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row3['ID_exam'])?>" >
                <?php echo($row3['Nom_exam']) ?> <?php echo($row3['Nom_mdl']) ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="supprimer">Supprimer</button>
          </div>
        </form>
      </div>
    </div>
    <script>
      // Get the modal
      var modal1 = document.getElementById('id01');
      var modal2 = document.getElementById('id02');
      var modal3 = document.getElementById('id03');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal1 ) {
          modal1.style.display = "none";
        }
        else if (event.target == modal2){
          modal2.style.display = "none";
        }
        else if (event.target == modal3){
          modal3.style.display = "none";
        }
      }
    </script>
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