<?php

require('mysql.php');


class Account {

    public $username;
    public $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }


    public function createAccount() {

        $hashed_password = md5($this->password . "makkusanstinkt");

        global $pdo;

        try {
            $statement = $pdo->prepare("INSERT INTO accounts (`username`, `password`) VALUES (?, ?)");
            $statement->execute(array($this->username, $hashed_password));
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    // Function to check if account exist with given username and password
    public function checkLoginCredentials(): bool {
        $hashed_password = md5($this->password . "makkusanstinkt");

        global $pdo;

        try {
            $sqlAll= "SELECT COUNT(*) as num_rows FROM accounts WHERE username=? AND password=?";
            $stmt = $pdo->prepare($sqlAll);
            $stmt->execute(array($this->username, $hashed_password));
            $num_rows = $stmt->fetchColumn();

            return $num_rows != 0;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getPasswordFromUsername(): string {
        global $pdo;

        try {
            $stmt = $pdo->query("SELECT password FROM accounts WHERE username='. $this->username . '")->fetch();
            if(!$stmt == null) {
                return $stmt;
            }
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function checkAccountExist($username) {
        return false;
    }

}