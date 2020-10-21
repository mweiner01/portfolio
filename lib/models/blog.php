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
        $this->blogpost_title = $title;
        $this->blogpost_subtitle = $subtitle;
        $this->blogpost_content = $content;
        $this->blogpost_author = $author;
        $this->blogpost_date = $title;
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

}