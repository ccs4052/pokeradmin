<?php

?>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php"><?php echo PROJECT_NAME?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li <?php if(basename($_SERVER['PHP_SELF']) == 'pictures.php') {echo 'class="active"';}?>><a href="./pictures.php">Pictures</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'colors.php') {echo 'class="active"';}?>><a href="./colors.php">Colors</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'values.php') {echo 'class="active"';}?>><a href="./values.php">Values</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'cards.php') {echo 'class="active"';}?>><a href="./cards.php">Cards</a></li>
                <!--                <li><a href="#about">About</a></li>-->
                <!--                <li><a href="#contact">Contact</a></li>-->
            </ul>
            <p class="navbar-text"><a href='logout.php'>Logout <?php echo $_SESSION['user']['username']?></a></p> 
        </div><!--/.nav-collapse -->

    </div>
</div>
