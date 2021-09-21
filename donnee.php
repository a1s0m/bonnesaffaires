<?php
$dsn = 'mysql:dbname=affaire;host=localhost';
$user = 'root';
$password = '';
$bdh = new PDO($dsn,$user,$password);
if(isset($_POST['submit'])){
   $email = htmlspecialchars($_POST['email']);
  $password= htmlspecialchars($_POST['password']);
  $nom= htmlspecialchars($_POST['nom']);
  $prenom= htmlspecialchars($_POST['prenom']);
 

  if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom'])){ 
   /* $sql=$bdh->prepare("INSERT INTO user(email,password,nom,prenom) VALUE(?,?,?,?");
    $sql->execute(array($email,$password,$nom,$prenom));*/
    $insert = $bdh->prepare('INSERT INTO user(nom, email, password, prenom) VALUES(:nom, :email, :password, :prenom)');
    $insert->execute(array(
      'nom' => $nom,
      'email' => $email,
      'password' => $password,
      'prenom' => $prenom,
    )); 
  }else{
     echo 'veuiller remplire tout les champs';

  }
 
}
  ?>
 <!DOCTYPE  html>
<html lang="fr">
<head>
   <meta charset="utf_8"/>
   <meta http-equiv="X-UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>INSERER</title>
   </head>
   <body>
     <form action="" method="POST">
       <input type="text" name="email"placeholder="votre email">
       <br><br>
       <input type="password" name="password" placeholder="votre password">
       <br><br>
       <input type="text" name="nom" placeholder="votre nom">
       <br><br> 
       <input type="text" name="prenom" placeholder="votre prenom">
       <br><br> 
       <input type="submit" name="submit" value="INCLURE">
</form>
</body>
</html>
