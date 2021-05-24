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
</head>
<body>
    <div class="backgroundNocc">
        <h1></h1>
    </div>
    <div id="login">
            <div class="login-form-container" id="login-form">
            <div class="login-form-contentNoc">
                    <div class="login-form-header">
                            <div class="logo">
                                <a title = 'Kliknite za dnevni rezim' href="<?php echo base_url();?>/index.php/User/promena_lozinke"><img src="<?php echo base_url(); ?>/img/logo.png" height="80" width="100"></a>
                            </div>
                            <h3 id="pl">Promena lozinke</h3>
                    </div>
                <font color='red'>
                    <?php
                            if (isset($messageOld)) {
                                    echo $messageOld;
                                    echo "<br>";
                                    unset($messageOld);
                            }
                            if (isset($message)) {
                                    echo $message;
                                    unset($message);
                            }
                            if (isset($old_pass)) {
                                    echo "<br>-";
                                    echo $old_pass;
                                    unset($old_pass);
                            }
                            if (isset($new_pass)) {
                                    echo "<br>-";
                                    echo $new_pass;
                                    unset($new_pass);
                            }
                            if (isset($new_pass_check)) {
                                    echo "<br>-";
                                    echo $new_pass_check;
                                    unset($new_pass_check);
                            }
                            if (isset($passLen)) {
                                    echo "<br>";
                                    echo $passLen;
                                    unset($passLen);
                            }
                            if (isset($newpasscheckLen)) {
                                    echo "<br>";
                                    echo $newpasscheckLen;
                                    unset($newpasscheckLen);
                            }
                            if (isset($newpasswordDifferent)) {
                                    echo "<br>";
                                    echo $newpasswordDifferent;
                                    unset($newpasswordDifferent);
                            }
                    ?>
                    </font>
                    <form method="post" action="<?php echo base_url(); ?>/index.php/User/change_password" class="login-form" id="forma">
                            <div id="StaraSif" class="input-container">
                                    <input type="password" class="input" name="oldpassword" placeholder="Stara lozinka">
                            </div>
                            <div id="NovaSif" class="input-container">
                                    <input type="password"  class="input" name="newpassword" placeholder="Nova lozinka">
                            </div>
                            <div class="input-container" id="sifrapotvrda">
                                    <input type="password" class="input" id="login-password1"  name="newpasswordcheck" placeholder="Potvrda lozinke">
                            </div>    
            <input type="submit" class="button" name="login" value = "Promeni lozinku">
                    </form>
            </div>
        </div>
    </div>
</body>
</html>