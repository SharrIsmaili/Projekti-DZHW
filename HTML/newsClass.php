<?php
    class NewsClass{
        private $conn;
        private $table_name = 'news';

        public function __construct($db){
            $this->conn = $db;
        }

        public function getAllNews(){
            $stmt = $this->conn->prepare("SELECT n.News_ID, n.Date_Time, n.Title, n.Content, n.Image, CONCAT(u.Name, ' ', u.Lastname) AS Author
                                          FROM {$this->table_name} n INNER JOIN users u 
                                          ON n.User_ID = u.User_ID
                                          ORDER BY n.Date_Time DESC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getNewsById($id){
            $query = "SELECT * FROM {$this->table_name} WHERE News_ID = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function addNews($title, $content, $image, $userId) {
            $stmt = $this->conn->prepare("INSERT INTO {$this->table_name} (Title, Content, Image, User_ID) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$title, $content, $image, $userId]);
        }

        public function updateNews($id, $title, $content, $image) {
            $stmt = $this->conn->prepare("UPDATE {$this->table_name} SET Title = ?, Content = ?, Image = ? WHERE News_ID = ?");
            return $stmt->execute([$title, $content, $image, $id]);
        }

        public function deleteNews($id) {
            $stmt = $this->conn->prepare("DELETE FROM {$this->table_name} WHERE News_ID=?");
            return $stmt->execute([$id]);
        }
    }
?>