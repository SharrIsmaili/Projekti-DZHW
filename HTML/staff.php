<?php
    class Staff{
        private $conn;
        private $table_name = 'staff';

        public function __construct($db){
            $this->conn = $db;
        }

        public function getAllStaff(){
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table_name}");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getStaffById($id){
            $query = "SELECT * FROM {$this->table_name} WHERE Staff_ID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getByProfession($profession){
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table_name} WHERE Profession = ? ORDER BY Name");
            $stmt->execute([$profession]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getByLocationAndProfession($location, $profession){
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table_name} WHERE Location = ? AND Profession = ? ORDER BY Name");
            $stmt->execute([$location, $profession]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addStaff($name, $lastname, $email, $phone, $location, $profession, $image = null) {
            $stmt = $this->conn->prepare("INSERT INTO {$this->table_name} (Name, Lastname, Email, Phone_Number, Location, Profession, Image) VALUES (?, ?, ?, ?, ?, ?, ?)");
            return $stmt->execute([$name, $lastname, $email, $phone, $location, $profession, $image]);
        }

        public function updateStaff($id, $name, $lastname, $email, $phone, $location, $profession, $image = null) {
            $stmt = $this->conn->prepare("UPDATE {$this->table_name}
                                          SET Name = ?, Lastname = ?, Email = ?, Phone_Number = ?, Location = ?, Profession = ?, Image = ?
                                          WHERE Staff_ID = ?");
            return $stmt->execute([$name, $lastname, $email, $phone, $location, $profession, $image, $id]);
        }

        public function deleteStaff($id) {
            $stmt = $this->conn->prepare("DELETE FROM {$this->table_name} WHERE Staff_ID=?");
            return $stmt->execute([$id]);
        }
    }
?>