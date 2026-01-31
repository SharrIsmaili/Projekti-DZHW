<?php
    class Feedback{
        private $conn;
        private $table_name = 'feedback';

        public function __construct($db){
            $this->conn = $db;
        }

        public function getAllFeedback(){
            $stmt = $this->conn->prepare("SELECT f.Feedback_ID, f.Subject, f.Message, CONCAT(u.Name, ' ', u.Lastname) AS User
                                          FROM {$this->table_name} f INNER JOIN users u
                                          ON f.User_ID = u.User_ID
                                          ORDER BY f.Feedback_ID DESC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getFeedbackById($id){
            $query = "SELECT f.Feedback_ID, f.Subject, f.Message, CONCAT(u.Name, ' ', u.Lastname) AS User 
                      FROM feedback f INNER JOIN users u
                      ON f.User_ID = u.User_ID
                      WHERE f.Feedback_ID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function addFeedback($userId, $subject, $message){
            $stmt = $this->conn->prepare("INSERT INTO {$this->table_name} (User_ID, Subject, Message) VALUES (?, ?, ?)");
            return $stmt->execute([$userId, $subject, $message]);
        }

        public function deleteFeedback($id) {
            $stmt = $this->conn->prepare("DELETE FROM {$this->table_name} WHERE Feedback_ID=?");
            return $stmt->execute([$id]);
        }
    }
?>