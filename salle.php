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
    <?php
    if(!isset($_check["ajout"])){
      
    }
    ?>
    <div class="content">
      <div class="titre">
        <h1>Liste des salles</h1>
      </div>
      <div class="btm">
        <button class="button button1" onclick="document.getElementById('id01').style.display='block'">Ajouter</button>
        <button class="button button1" onclick="document.getElementById('id02').style.display='block'">Modifier</button>
        <button class="button button1" onclick="document.getElementById('id03').style.display='block'">Supprimer</button>
      </div>

      <div>
        <?php
        include("connexion.php");
        $sql = "SELECT Nom_salle, Capacite FROM salle";
        $stmt = $conn->query($sql);
   
      if($stmt === false){
        die("Erreur");
      }
        ?> 
      <table id="tableaux">
   <thead>
     <tr>
       <th>Salle</th>
       <th>Capacité</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['Nom_salle']); ?></td>
       <td><?php echo htmlspecialchars($row['Capacite']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
      </div>
      <div id="id01" class="modal">
        <form class="modal-content animate" action="salle-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
            <label for="Nom_salle"><b>Salle</b></label>
            <input type="text"  name="Nom_salle" required maxlength="10">
            <label for="Capacite"><b>Capacité</b></label>
            <input type="text" name="Capacite" required>

          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="ajouter">Ajouter</button>
          </div>
        </form>
      </div>
      <div id="id02" class="modal">
        <form class="modal-content animate" action="salle-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql4 = "SELECT Nom_salle, ID_salle FROM salle ";
        $stmt4 = $conn->query($sql4);
        
   
      if($stmt4 === false){
        die("Erreur");
      }
        ?> 
            <label for="ID_salle"><b>Salle</b></label>
            <select name="ID_salle" required>
            <option value="0">Veuillez choisir la salle</option>
            <?php while($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row4['ID_salle'])?>" >
                <?php echo($row4['Nom_salle']) ?>
                </option>
              <?php endwhile; ?>
            </select>
            <label for="Nom_salle"><b>Salle</b></label>
            <input type="text"  name="Nom_salle" required maxlength="10">
            <label for="Capacite"><b>Capacité</b></label>
            <input type="text" name="Capacite" required>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button class="button button1 b1" type="submit" name="modifier">Modifier</button>
          </div>
        </form>
      </div>
      <div id="id03" class="modal">
        <form class="modal-content animate" action="salle-mod.php" method="post">
          <div class="fermer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Fermer">&times;</span>
          </div>
          <div class="container">
          <?php
        include("connexion.php");
        $sql3 = "SELECT Nom_salle, ID_salle FROM salle ";
        $stmt3 = $conn->query($sql3);
        
   
      if($stmt3 === false){
        die("Erreur");
      }
        ?> 
            <label for="ID_salle"><b>Salle</b></label>
            <select name="ID_salle" required>
            <option value="0">Veuillez choisir la salle</option>
            <?php while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value = "<?php echo($row3['ID_salle'])?>" >
                <?php echo($row3['Nom_salle']) ?>
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