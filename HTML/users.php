<?php
class Users {
    private $conn;
    private $table_name = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $lastname, $email, $phone, $password) {
        try {
            $query = "INSERT INTO {$this->table_name} (Name, Lastname, Email, Phone_Number, Password) 
                      VALUES (:name, :lastname,:email, :phone,  :password)";
            $stmt = $this->conn->prepare($query);

            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $hashedPass);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
        return false;
    }

    public function login($email, $password) {
        try {
            $query = "SELECT User_ID, Name, Lastname, Email, Phone_Number,  Password, isAdmin 
                      FROM {$this->table_name} WHERE Email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row && password_verify($password, $row['Password'])) {
                return [
                    'id' => $row['User_ID'],
                    'name' => $row['Name'],
                    'lastname' => $row['Lastname'],
                    'email' => $row['Email'],
                    'phone' => $row['Phone_Number'],
                    'isAdmin' => isset($row['isAdmin']) ? (bool)$row['isAdmin'] : false
                ];
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
        return false;
    }

    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT User_ID, Name, Lastname, Email, Phone_Number, isAdmin FROM {$this->table_name}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM {$this->table_name} WHERE User_ID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($name, $lastname, $email, $phone, $password, $isAdmin = 0) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table_name} (Name, Lastname, Email, Phone_Number, Password, isAdmin) VALUES (?, ?, ?, ?, ?, ?)");
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        return $stmt->execute([$name, $lastname, $email, $phone, $hashed, $isAdmin]);
    }

    public function updateUser($id, $name, $lastname, $email, $phone, $password = null, $isAdmin = 0) {
        if ($password) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("UPDATE {$this->table_name} SET Name=?, Lastname=?, Email=?, Phone_Number=?, Password=?, isAdmin=? WHERE User_ID=?");
            return $stmt->execute([$name, $lastname, $email, $phone, $hashed, $isAdmin, $id]);
        } else {
            $stmt = $this->conn->prepare("UPDATE {$this->table_name} SET Name=?, Lastname=?, Email=?, Phone_Number=?, isAdmin=? WHERE User_ID=?");
            return $stmt->execute([$name, $lastname, $email, $phone, $isAdmin, $id]);
        }
    }

    public function deleteUser($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table_name} WHERE User_ID=?");
        return $stmt->execute([$id]);
    }
}
?>