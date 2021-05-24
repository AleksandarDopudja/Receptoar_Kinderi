<!--Autor: Andjela Dubak 18/0658-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptoar</title>
    <link type="image/png" href="<?php echo base_url(); ?>/img/logo.png" rel="icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/dodatni.css">
</head>
<body>
    <div class="background">
        <h1></h1>
    </div>
    <div id="login">
        <div class="login-form-container" id="login-form">
            <div class="login-form-content">
               <div class="login-form-header">
                    <div class="logo">
                        <a title = 'Kliknite za nocni rezim' href="<?php echo base_url();?>/index.php/User_Authentication/registracija_noc"><img src="<?php echo base_url(); ?>/img/logo.png" height="80" width="100"></a>
                    </div>
                    <h3 id="pr">Registracija</h3>
               </div>
                <font color='red'>
                <?php
                 if (isset($usernameExist)) {
                     echo $usernameExist;
                     unset($usernameExist);
                 }
                 if (isset($message)) {
                     echo $message;
                     unset($message);
                 }
                 if (isset($name)) {
                     echo "<br>-";
                     echo $name;
                     unset($name);
                 }
                 if (isset($surname)) {
                     echo "<br>-";
                     echo $surname;
                     unset($surname);
                 }
                 if (isset($email)) {
                     echo "<br>-";
                     echo $email;
                     unset($email);
                 }
                 if (isset($username)) {
                     echo "<br>-";
                     echo $username;
                     unset($username);
                 }
                 if (isset($password)) {
                     echo "<br>-";
                     echo $password;
                     unset($password);
                 }
                 if (isset($passwordLen)) {
                     echo "<br>";
                     echo $passwordLen;
                     unset($passwordLen);
                 }
                 if (isset($passwordcheck)) {
                     echo "<br>-";
                     echo $passwordcheck;
                     unset($passwordcheck);
                 }
                 if (isset($passwordcheckLen)) {
                     echo "<br>";
                     echo $passwordcheckLen;
                     unset($passwordcheckLen);
                 }
                 if (isset($passwordDifferent)) {
                     echo "<br>";
                     echo $passwordDifferent;
                     unset($passwordDifferent);
                 }
                 ?>
               </font>
                <form method="POST" action="<?php echo base_url(); ?>/index.php/user_authentication/new_user_registration" class="login-form" id=forma>
                    <div class="input-container" id="ime">
                        <input type="text" class="input"  name="name" placeholder="Ime">
                    </div>
                    <div class="input-container" id="prezime">
                        <input type="text" class="input"  name="surname" placeholder="Prezime">
                    </div>
                    <div class="input-container" id="email">
                        <input type="email" class="input"  name="email" placeholder="Email">
                    </div>
                    <div class="input-container" id="kor_ime">
                        <input type="text" class="input"  name="username" placeholder="Korisničko ime">
                    </div>
                    <div class="input-container" id="sifra">
                        <input type="password" class="input" id="login-password"  name="password" placeholder="Lozinka">
                    </div>
                    <div class="input-container" id="potvrdaSifre">
                        <input type="password" class="input" id="login-password1"  name="passwordcheck" placeholder="Potvrda lozinke">
                    </div>
                    <input type="submit" class="button" name="login" value = "Registruj se">
                </form>
            </div>
        </div>
    </div>
</body>
</html>