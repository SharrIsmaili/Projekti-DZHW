<?php

class Users {
    private $conn;
    private $table_name = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $lastname, $number, $email, $password) {
        $query = "INSERT INTO {$this->table_name} (Name, Lastname, Phone_Number, Email, Password) VALUES (:name, :lastname, :number, :email, :password)";

        $stmt = $this->conn->prepare($query);

        $hashedPass = password_hash($password, PASSWORD_DEFAULT); // Hashing the password

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPass);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password) {
        $query = "SELECT User_ID, Name, Lastname, Phone_Number, Email, Password, isAdmin FROM {$this->table_name} WHERE Email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['Password'])) {
                return[
                    'id' => $row['User_ID'],
                    'name' => $row['Name'],
                    'lastname' => $row['Lastname'],
                    'email' => $row['Email'],
                    'phone' => $row['Phone_Number'],
                    'isAdmin' => isset($row['isAdmin']) ? (bool)$row['isAdmin'] : false
                ];
            }
        }
        return false;
    }
<<<<<<< Updated upstream
<<<<<<< Updated upstream

    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT User_ID, Name, Lastname, Phone_Number, Email, isAdmin FROM {$this->table_name}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id){
        $query = "SELECT * FROM {$this->table_name} WHERE User_ID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($name, $lastname, $email, $phone, $password, $isAdmin) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table_name} (Name, Lastname, Email, Phone_Number, Password, isAdmin) VALUES (?, ?, ?, ?, ?, ?)");
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        return $stmt->execute([$name, $lastname, $email, $phone, $hashed, $isAdmin]);
    }

    public function updateUser($id, $name, $lastname, $email, $phone, $password, $isAdmin) {
        if ($password) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("UPDATE {$this->table_name} SET Name=?, Lastname=?, Email=?, Phone_Number=?, Password=?, isAdmin=? WHERE User_ID=?");
            return $stmt->execute([$name, $lastname, $phone, $email, $hashed, $isAdmin, $id]);
        } else {
            $stmt = $this->conn->prepare("UPDATE {$this->table_name} SET Name=?, Lastname=?, Email=?, Phone_Number=?, isAdmin=? WHERE User_ID=?");
            return $stmt->execute([$name, $lastname, $email, $phone, $isAdmin, $id]);
        }
    }

    public function deleteUser($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table_name} WHERE User_ID=?");
        return $stmt->execute([$id]);
    }
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
}
?>