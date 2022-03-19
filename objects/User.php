<?php

class User {
    // Databse connection and table name
    private $conn;
    private $table_name = "users";

    // Object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $address;
    public $password;
    public $access_level;
    public $access_code;
    public $status;
    public $created;
    public $modified;

    // Constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    // check if given email exists in the databse
    function emailExists() {
        $query = "SELECT id, firstname, lastname, access_level, password, status FROM " .$this->table_name ." WHERE email = ? LIMIT 0,1";

        //prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->email = htmlspecialchars(strip_tags($this->email));

        // bind given email value
        $stmt->bindParam(1, $this->email);

        // execute the query
        $stmt->execute();

        // get the number of rows
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php session
        if($num > 0){
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->id = $row['id'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->access_level = $row['access_level'];
            $this->password = $row['password'];
            $this->status = $row['status'];

            // return true because the email exists
            return true;
        }

        return false;
    }

    // create new user record
    function create(){
        // to get timestamp for created field
        $this->created = date('Y-m-d H:i:s');

        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                  SET 
                    firstname = :firstname,
                    lastname = :lastname,
                    email = :email,
                    contact_number = :contact_number,
                    address = :address,
                    password = :password,
                    access_level = :access_level,
                    status = :status,
                    created = :created";

        // Prepare the query
        $stmt = $this->conn->prepare($query);

        // Sanitize the submitted data
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->contact_number = htmlspecialchars(strip_tags($this->contact_number));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->access_level = htmlspecialchars(strip_tags($this->access_level));
        $this->status = htmlspecialchars(strip_tags($this->status));

        // bind the values
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contact_number', $this->contact_number);
        $stmt->bindParam(':address', $this->address);
        // Hash the password before saving it to the database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        $stmt->bindParam(':access_level', $this->access_level);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':created', $this->created);

        // execute the query and also check if the query was successful
        if($stmt->execute()){
            return true;
        }
        else{
            $this->showError($stmt);
            return false;
        }
    }

    // The purpose of this function is to show additional details about an error
    public function showError($stmt){
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
    }

    // read all users records
    function readAll($from_record_num, $records_per_page){
        $query = "SELECT id, firstname, lastname, email, contact_number, access_level, created FROM ".$this->table_name . " ORDER BY id DESC LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind limit clause variables
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values
        return $stmt;
    }

    // used for paging users
    public function countAll(){
 
        // query to select all user records
        $query = "SELECT id FROM " . $this->table_name . "";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        // get number of rows
        $num = $stmt->rowCount();
     
        // return row count
        return $num;
    }
}