<?php

//require('Serializer.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PictureControl
 *
 * @author krajcovic
 */
class PictureService {

    var $db;

    public function PictureService($db) {
        $this->db = $db;
    }

    public function insertNewPicture($newPlace) {
        $query = "INSERT INTO pictures (path) VALUES (:path)";
        $query_params = array(':path' => $newPlace);

        try {
            // Execute the query to create the user 
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage());
        }
    }

    private function select() {
        $query = 'select * from pictures';
        $query_params = array();
        try {
            // Execute the query to create the user 
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage());
        }

        return $stmt;
    }

    public function printTable() {
        $stmt = $this->select();

        echo '<table class="table table-bordered table-responsive">';
        echo '<tr><th>#</th><th>Path</th><th>Picture</th></tr>';
        while ($record = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $record['id'] . "</td>";
            echo "<td>" . $record['path'] . "</td>";
            echo "<td>" . '<img src="' . $record['path'] . '" alt="preview" widht="64" height="64" class="img-rounded">' . "</td>";
            echo "</tr>";
        };
        echo '</table>';
        
    }

    public function printXml() {
        $stmt = $this->select();
        while ($record = $stmt->fetch()) {
            $xml = array('id' => $record['id'], 'path' => $record['path']);
        }
        
        // Serializace
        $options = array("addDecl" => true, "defaultTagName" => "pictures", "linebreak"=>"", "encoding" => "UTF-8", "rootName"=>"pictures");
        $serializer = new XML_Serializer($options);
        $serializer->serialize($xml);
        
        echo $serializer->getSerializedData();
    }

}
