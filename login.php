<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
</head>
<body class="login">
    <div class="kotaklogin">   
    <form method="POST" class="loginform">
    <table class="loginform">
        <tr>
            <td>
                <p class=tulisanlogin">Silahkan Login</p>
            </td>
        </tr>

        <tr>
            <td>
             <input type="text" class="formlogin_name" required name="username" placeholder="Username">
            </td>
        </tr>
        <tr>
            <td> <input type="password" class="formlogin_pass" placeholder="Password" required name="userpass"></td>
        </tr>

        <tr>
            <td>
                <div class="btn"></div>
                <input type="submit" name="log" value="Login" id="log" class="tombollogin">
            </td>
        </tr>
    </table>
    </div>
</form>
</body>

<?php
require_once "app/user.php";
$kat = new user();
   if (isset($_POST['log'])) {
      $kat->login($_POST['username'],$_POST['userpass']);
    }
 ?>
