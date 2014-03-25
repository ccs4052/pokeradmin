<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        require 'head.php';
        ?>
    </head>
    <body>
        <?php
        include 'navbar.php';
        ?>
        <!-- Show existing pictures.-->
        <div class="container" >

            <!-- Insert to picture table uploaded file-->
            <?php
            if ($_POST["insert"]) {
                if ($_FILES["selectNewImportPicture"]["error"] > 0) {
                    //echo "Error: " . $_FILES["selectNewImportPicture"]["error"] . "<br>";
                    echo '<div class="alert alert-danger"><strong>Oh snap!</strong> ' . $_FILES["selectNewImportPicture"]["error"] . '</div>';
                } else {
                    //echo "Upload: " . $_FILES["selectNewImportPicture"]["name"] . "<br>";
                    //echo "Type: " . $_FILES["selectNewImportPicture"]["type"] . "<br>";
                    //echo "Size: " . ($_FILES["selectNewImportPicture"]["size"] / 1024) . " kB<br>";
                    //echo "Stored in: " . $_FILES["selectNewImportPicture"]["tmp_name"];

                    $newPlace = PATH_INSERTED_IMGS . $_FILES["selectNewImportPicture"]["name"];
                    move_uploaded_file($_FILES["selectNewImportPicture"]["tmp_name"], $newPlace);
                    //$connection->insertPicture($newPlace);
                    $query = "INSERT INTO pictures (path) VALUES (:path)";
                    $query_params = array(':path' => $newPlace);

                    try {
                        // Execute the query to create the user 
                        $stmt = $db->prepare($query);
                        $result = $stmt->execute($query_params);
                    } catch (PDOException $ex) {
                        // Note: On a production website, you should not output $ex->getMessage(). 
                        // It may provide an attacker with helpful information about your code.  
                        die("Failed to run query: " . $ex->getMessage());
                    }
                }
            }
            ?>

            <table class="table-bordered">
                <?php
                $query = 'select * from pictures';
                $query_params = array();
                try {
                    // Execute the query to create the user 
                    $stmt = $db->prepare($query);
                    $result = $stmt->execute($query_params);
                } catch (PDOException $ex) {
                    // Note: On a production website, you should not output $ex->getMessage(). 
                    // It may provide an attacker with helpful information about your code.  
                    die("Failed to run query: " . $ex->getMessage());
                }

                echo '<tr><th>id</th><th>path</th><th>picture</th></tr>';
                while ($record = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $record['id'] . "</td>";
                    echo "<td>" . $record['path'] . "</td>";
                    echo "<td>" . '<img src="' . $record['path'] . '" alt="preview" widht="64" height="64" class="img-rounded">' . "</td>";
                    echo "</tr>";
                };
                ?>
            </table>
            <form class="form-inline" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="selectNewImportPicture">Select picture:</label>
                    <input type="hidden" name="insert" value="true">
                    <input type="file" id="selectNewImportPicture" name="selectNewImportPicture">
                    <p class="help-block">Select new picture *.jpg</p>
                </div>
                <button type="submit" class="btn btn-default">Insert</button>
            </form>
        </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
