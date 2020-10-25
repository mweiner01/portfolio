<?php

require('mysql.php');


class blog {


    public $blogpost_title;
    public $blogpost_subtitle;
    public $blogpost_content;
    public $blogpost_author;
    public $blogpost_date;
    public $blogpost_featured;
    public $blogpost_url;



    public function __construct($title, $subtitle, $content, $author, $url, $featured)
    {
        $sTStamp = "1342333231";
        $this->blogpost_title = $title;
        $this->blogpost_subtitle = $subtitle;
        $this->blogpost_content = $content;
        $this->blogpost_author = $author;
        $this->blogpost_date = date("d.m.Y, H:i", $sTStamp);
        $this->blogpost_featured = $featured;
        $this->blogpost_url = $url;
    }

    public function createBlogPost() {
        global $pdo;

        try {
            $statement = $pdo->prepare("INSERT INTO blogposts (`blogpost_author`, `blogpost_title`, `blogpost_subtitle`, `blogpost_content`, `blogpost_date`, `blogpost_img_url`, `blogpost_featured`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($this->blogpost_author, $this->blogpost_title, $this->blogpost_subtitle, $this->blogpost_content, $this->blogpost_date, $this->blogpost_url, $this->blogpost_featured));
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getLikes($blogpost_id) {
        global $pdo;

        try {
            $sql = "SELECT blogpost_likes FROM blogposts WHERE blogpost_id=$blogpost_id";
            foreach ($pdo->query($sql) as $row) {
                return $row['blogpost_likes'];
            }
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function checkUserHasLikedPost($username, $blogpost_id): bool {

        global $pdo;

        try {
            $sqlAll= "SELECT COUNT(*) as num_rows FROM blogpost_likes WHERE username=? AND blogpost_id=?";
            $stmt = $pdo->prepare($sqlAll);
            $stmt->execute(array($username, $blogpost_id));
            $num_rows = $stmt->fetchColumn();

            return $num_rows != 0;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function addLike($blogpost_id) {
        global $pdo;

        $likes = blog::getLikes($blogpost_id) + 1;

        try {
            $statement = $pdo->prepare("UPDATE blogposts SET blogpost_likes = ? WHERE blogpost_id = ?");
            $statement->execute(array($likes, $blogpost_id));
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function addblogpost($username, $blogpost_id) {
        global $pdo;

        try {
            $statement = $pdo->prepare("INSERT INTO blogpost_likes (username, blogpost_id) VALUES (?, ?)");
            $statement->execute(array($username, $blogpost_id));
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}