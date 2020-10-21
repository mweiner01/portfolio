<?php

require('mysql.php');


class blog {


    public $blogpost_id;
    public $blogpost_title;
    public $blogpost_subtitle;
    public $blogpost_content;
    public $blogpost_author;
    public $blogpost_date;



    public function __construct($id)
    {
        // set id, mostly take it from _GET
        $this->blogpost_id = $id;

        global $pdo;

        $sql = "SELECT * FROM blogposts WHERE id=$id";

        try {
            $statement = $pdo->prepare($sql);
            $statement->execute();
            while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
                $this->blogpost_title = $result['blogpost_title'];
                $this->blogpost_subtitle = $result['blogpost_subtitle'];
                $this->blogpost_content = $result['blogpost_content'];
                $this->blogpost_author = $result['blogpost_author'];
                $this->blogpost_date = $result['blogpost_date'];
            }
        }catch (PDOException $e) {
            print($e);
        }
    }

    public function createBlogPost() {
        global $pdo;

        try {
            $statement = $pdo->prepare("INSERT INTO blogposts (`title`, `subtitle`, 'content') VALUES (?, ?, ?)");
            $statement->execute(array($this->blogpost_title, $this->blogpost_subtitle, $this->blogpost_content));
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}