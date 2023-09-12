<?php
date_default_timezone_set("Asia/Calcutta"); 
$activeURL = "https://sfr.gettechupdate.com/saci/";

function data_exist($sql)
{
    $pdo = Database::connect();
    $get_data = [];
    try {
        $query = $pdo->prepare($sql);
        $query->execute();
        $get_data = $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    }
    Database::disconnect();
    return $get_data;
}

function checkDataExists($sql) {
    $pdo = Database::connect();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rowCount = $stmt->fetchColumn();
    Database::disconnect();
    return $rowCount > 0;
}

function getHomeData() {
   $announcementsList = get_data("");
   $newsList = get_data("");
   $speakList = get_data("");
   $thrustList = get_data("");
}

function insert_update_data($sql)
{
    $pdo = Database::connect();
    $get_data = [];
    try {
        $insert_query = $pdo->prepare($sql);
        $insert_query->execute();
    } catch (PDOException $e) {
        
    }
    Database::disconnect();
    return $insert_query;
}

function get_single_data($sql)
{
    $pdo = Database::connect();
    $get_data = [];
    try {
        $query = $pdo->prepare($sql);
        $query->execute();
        $get_data = $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    }
    Database::disconnect();
    return $get_data;
}

function get_data($sql)
{
    $pdo = Database::connect();
    $get_data = [];
    try {
        $query = $pdo->prepare($sql);
        $query->execute();
        $get_data = $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        
    }
    Database::disconnect();
    return $get_data;
}

function update_data($sql)
{
    $pdo = Database::connect();
    $get_data = [];
    try {
        $query = $pdo->prepare($sql);
        $query->execute();
        // $get_data = $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    }
    Database::disconnect();
    return $query;
}

function insert_get_data($sql, $tableName)
{
    $pdo = Database::connect();
    $get_data = [];
    try {
        $query = $pdo->prepare($sql);
        $query->execute();
        $last_insert_id = $pdo->lastInsertId();
        $stmt = $pdo->prepare("SELECT * FROM `$tableName` WHERE campaignID = :last_insert_id");
        $stmt->bindParam(':last_insert_id', $last_insert_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
    }
    Database::disconnect();
    return $result;
}

function insert_get_data_brand($sql, $tableName)
{
    $pdo = Database::connect();
    $get_data = [];
    try {
        $query = $pdo->prepare($sql);
        $query->execute();
        $last_insert_id = $pdo->lastInsertId();
        $stmt = $pdo->prepare("SELECT * FROM `$tableName` WHERE brand_id = :last_insert_id");
        $stmt->bindParam(':last_insert_id', $last_insert_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
    }
    Database::disconnect();
    return $result;
}

function insert_get_id_product($sql, $tableName)
{
    $pdo = Database::connect();
    $get_data = [];
    try {
        $query = $pdo->prepare($sql);
        $query->execute();
        $last_insert_id = $pdo->lastInsertId();
        $stmt = $pdo->prepare("SELECT * FROM `$tableName` WHERE id = :last_insert_id");
        $stmt->bindParam(':last_insert_id', $last_insert_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
    }
    Database::disconnect();
    return $result;
}

function get_all_user_list()
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM product";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $all_user_info = $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $all_user_info;
}

function get_single_user_info($id)
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM product where id = {$id} ";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $user_info = $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $user_info;
}