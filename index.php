<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include './head.php'; ?>
    </head>
    <body>
        <?php include 'navbar.html'; ?>

        <div class="container">
            <div class="pokeradmin-template">
                <h1>Administracni cast pro aplikaci <?php echo PROJECT_NAME ?></h1>
                <p>Under development</p>
            </div> <!-- /.pokeradmin-template-->
        </div> <!-- /.container-->

        <div class="container" >
            <div class="form-control-static">
                <form action="auth.php" method="post">
                    Login: <input type="text" name="name"><br>
                    Password: <input type="password" name="password"><br>
                    <input type="submit">
                </form>
            </div>
            <?php
            // put your code here
            ?>
        </div>

        <?include 'footer.html';?>
    </body>
</html>
