<?php
class Users {
    private $conn;
    private $table_name = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $lastname, $phone, $email, $password) {
        try {
            $query = "INSERT INTO {$this->table_name} (name, lastname, phone_number, email, password) 
                      VALUES (:name, :lastname, :phone, :email, :password)";
            $stmt = $this->conn->prepare($query);

            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':lastname', $lastname);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $hashedPass);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function login($email, $password) {
        try {
            $query = "SELECT user_id, name, lastname, phone_number, email, password, is_admin 
                      FROM {$this->table_name} WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row && password_verify($password, $row['password'])) {
                return [
                    'id' => $row['user_id'],
                    'name' => $row['name'],
                    'lastname' => $row['lastname'],
                    'email' => $row['email'],
                    'phone' => $row['phone_number'],
                    'isAdmin' => !empty($row['is_admin'])
                ];
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllUsers() {
        try {
            $stmt = $this->conn->prepare(
                "SELECT user_id, name, lastname, phone_number, email, is_admin FROM {$this->table_name}"
            );
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getUserById($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table_name} WHERE user_id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function addUser($name, $lastname, $email, $phone, $password, $isAdmin = 0) {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO {$this->table_name} (name, lastname, email, phone_number, password, is_admin) 
                 VALUES (?, ?, ?, ?, ?, ?)"
            );
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            return $stmt->execute([$name, $lastname, $email, $phone, $hashedPass, $isAdmin]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateUser($id, $name, $lastname, $email, $phone, $password = null, $isAdmin = 0) {
        try {
            if ($password) {
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->conn->prepare(
                    "UPDATE {$this->table_name} 
                     SET name = ?, lastname = ?, email = ?, phone_number = ?, password = ?, is_admin = ? 
                     WHERE user_id = ?"
                );
                return $stmt->execute([$name, $lastname, $email, $phone, $hashedPass, $isAdmin, $id]);
            } else {
                $stmt = $this->conn->prepare(
                    "UPDATE {$this->table_name} 
                     SET name = ?, lastname = ?, email = ?, phone_number = ?, is_admin = ? 
                     WHERE user_id = ?"
                );
                return $stmt->execute([$name, $lastname, $email, $phone, $isAdmin, $id]);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteUser($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM {$this->table_name} WHERE user_id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>