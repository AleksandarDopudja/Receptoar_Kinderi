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
    <div class="background1">
        <h1></h1>
    </div>
    <div id="login">
        <div class="login-form-container" id="login-form">
            <div class="login-form-content">
               <div class="login-form-header">
                    <div class="logo">
                        <a title = 'Kliknite za nocni rezim' href="<?php echo base_url();?>/index.php/User_Authentication/index_noc"><img src="<?php echo base_url(); ?>/img/logo.png" height="80" width="100"></a>
                    </div>
                    <h3>DOBRODOŠLI!</h3>
               </div>
                <form method="post" action="<?php echo base_url(); ?>/index.php/User_Authentication/prijava">
                   <div class="login-form">
                        <input type="submit" class="button" value="Prijavi se">
                   </div>
               </form>
                <form method="post" action="<?php echo base_url(); ?>/index.php/User_Authentication/registracija">
                <div class="login-form">
                     <input type="submit" class="button" value="Registruj se">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>