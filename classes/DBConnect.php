<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnect
 *
 * @author krajcovic
 */
class DBConnect {

    public function connect() {
        mysql_connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD) or die("Cannot connect to MySQL: " . mysql_error());
        mysql_select_db(SQL_DBNAME) or die("Not existing database: " . mysql_error());
        mysql_query("SET NAMES utf8");
    }
    
    public function query($query) {
        return mysql_query($query);
    }
    
    public function disconnect() {
        mysql_close();
    }
    
    // Pictures
    public function insertPicture($newPlace) {
        return mysql_query("insert into pictures (path) values ('".$newPlace."')");
    }
    
    public function selectPictures() {
        return mysql_query("select * from pictures");
    }
    
    public function insertNewAdmin($name, $password) {
        mysql_query("insert into admins (name, password) values ('".$name."','".md5($password)."')");
    }
    
    public function findAdmin($name, $password) {
        mysql_query("select * from admins where name='".$name."' and password='".md5($password)."'");
    }

}
