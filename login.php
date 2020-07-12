<!DOCTYPE html>
<html>
<head>
  <title>S'identifier</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="assets/img/icon-login.png"/>
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
<div class="full-height">
  <form action="/verification.php" method="post">
    <div class="welcome">
    <img src="assets/img/ensa-logo.png" alt="ENSA TETOUAN" width="70" height="90"> 
      <h2>ENSA DE TETOUAN</h2>
      <h3>Gestion des exams</h3>
      <?php 
        if(isset($_GET['erreur'])){
          $err = $_GET['erreur'];
        if($err==1 || $err==2)
          echo "<span style='color:red;text-align:center;font-size:14px;' >Utilisateur ou mot de passe incorrect</span>";
        }
        ?>
    </div>
    
    <div class="container">
    
      <label for="username"><b>Nom d'utilisateur</b></label>
      <input type="text"  name="username" required>
      <label for="password"><b>Mot de passe</b></label>
      <input type="password"  name="password" required>
      <button type="submit" >S'identifier</button>
      
    </div>
    
  </form>
</div>
</body>
</html>