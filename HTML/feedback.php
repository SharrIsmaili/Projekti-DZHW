<?php
class Feedback {
    private $conn;
    private $table_name = 'feedback';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllFeedback() {
        $stmt = $this->conn->prepare(
            "SELECT f.Feedback_ID, f.Message, 
                    CONCAT(u.Name, ' ', u.Lastname) AS user_fullname
             FROM {$this->table_name} f
             INNER JOIN users u ON f.User_ID = u.User_ID
             ORDER BY f.Feedback_ID DESC"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFeedbackById($id) {
        $stmt = $this->conn->prepare(
            "SELECT f.Feedback_ID, f.Message, 
                    CONCAT(u.Name, ' ', u.Lastname) AS user_fullname
             FROM {$this->table_name} f
             INNER JOIN users u ON f.User_ID = u.User_ID
             WHERE f.Feedback_ID = :id"
        );
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addFeedback($userId, $message) {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO {$this->table_name} (User_ID, Message) VALUES (?, ?)"
            );
            return $stmt->execute([$userId, trim($message)]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteFeedback($id) {
        try {
            $stmt = $this->conn->prepare(
                "DELETE FROM {$this->table_name} WHERE Feedback_ID = ?"
            );
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>