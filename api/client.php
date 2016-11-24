<?php

require_once 'config/db.php';

class TClient {

  public $client_id = "";
  public $name = "";
  public $email = "";
  public $address = "";
  public $phone = "";

  private $db;

  public function __construct($dbconnection){
    $this->db = $dbconnection;
  }


  public function createNew(){
    $insert = $this->db->prepare("INSERT INTO clients
                                  SET client_id=:client_id,
                                      name=:name,
                                      email=:email,
                                      adress=:address,
                                      phone=:phone");

    $insert->bindParam(":client_id", $this->client_id);
    $insert->bindParam(":name", $this->name);
    $insert->bindParam(":email", $this->email);
    $insert->bindParam(":address", $this->address);
    $insert->bindParam(":phone", $this->phone);

    $insert->execute();
  }



  public function deleteOne(){
    $delete = $this->db->prepare("DELETE FROM clients WHERE client_id=:id");
    $delete->bindParam(":id", $this->client_id);

    $delete->execute();
  }


  public function update(){
    $update = $this->db->prepare("UPDATE clients SET
                                  name=:name,
                                  email=:email,
                                  adress=:address,
                                  phone=:phone WHERE client_id=:id");

    $update->bindParam(":name", $this->name);
    $update->bindParam(":email", $this->email);
    $update->bindParam(":address", $this->address);
    $update->bindParam(":phone", $this->phone);
    $update->bindParam(":id", $this->client_id);

    $update->execute();
  }


  public function getAllFromDB(){
    $recordset = $this->db->prepare("SELECT * FROM clients");
    $recordset->execute();

    return $recordset;
  }


  public function getOneById(){
    $recordset = $this->db->prepare("SELECT * FROM clients WHERE client_id=:id");
    $recordset->bindParam(":id", $this->client_id);
    $recordset->execute();

    return $recordset->fetch();
  }
}
