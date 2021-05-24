<!--Autor: Andjela Dubak 18/0658-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptoar</title>
    <link type="image/png" href="<?php echo base_url(); ?>/img/logo.png" rel="shortcut icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/dodatni.css">
    <script src="<?php echo base_url(); ?>/js/jezik.js "></script>
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
                        <a title = 'Kliknite za nocni rezim' href="<?php echo base_url();?>/index.php/User_Authentication/prijava_noc"><img src="<?php echo base_url(); ?>/img/logo.png" height="80" width="100"></a>
                    </div>
                    <font color='red'>
                    <?php
                        if (isset($message)) {
                            echo $message;
                            unset($message);
                        }
                     ?>
                    </font>
                    <h3 id="pr">Prijava</h3>
                </div>
                <font color='red'>
                    <?php
                        if (isset($messagess)) {
                            echo $messagess;
                            echo "<br>";
                            unset($messagess);
                        }
                        if (isset($messag)) {
                            echo $messag;
                            unset($messag);
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
                     ?>
                </font>
                <form method="post" action='<?php echo base_url(); ?>/index.php/user_authentication/user_login_process'class="login-form" id="forma">
                    <div id="ime" class="input-container">
                        <input type="text" class="input" name="username1" placeholder="Korisničko ime">
                    </div>
                    <div id="sifra" class="input-container">
                        <input type="password" class="input"  name="password1" placeholder="Lozinka">
                    </div>
                    <input type="submit" class="button" name="login" value = "Prijavi se">
                </form>
            </div>
        </div>
    </div>
</body>
</html>