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
        $query = "SELECT User_ID, Name, Lastname, Phone_Number, Email, Password FROM {$this->table_name} WHERE Email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if a record exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['Password'])) {
                // Start the session and store user data
                session_start();
                $_SESSION['user_id'] = $row['User_ID'];
                $_SESSION['email'] = $row['Email'];
                return true;
            }
        }
        return false;
    }
}
?>