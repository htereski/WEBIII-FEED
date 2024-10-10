<?php
require '../database/Database.php';
require '../models/Post.php';

class PostController
{
    private Database $db;
    private PDO $connection;

    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }

    public function index(): void
    {
        $post = new Post($this->connection);
        $stmt = $post->getAll($this->connection);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '../views/posts_view.php';
    }

    public function create(): void
    {
        include '../views/create_post_view.php';
    }

    public function store(): void
    {
        if (isset($_POST['title'], $_POST['content'], $_POST['subject'])) {
            $post = new Post($this->connection);
            $post->setTitle($_POST['title']);
            $post->setContent($_POST['content']);
            $post->setSubject($_POST['subject']);

            if ($post->create()) {
                header("Location: index.php");
            } else {
                echo "Error: Unable to create post.";
            }
        }
    }

    public function edit(): void
    {
        if (isset($_GET['id'])) {
            $data = new Post($this->connection);
            $data->setId($_GET['id']);

            $stmt = $data->getById();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            if (isset($post)) {
                include '../views/edit_post_view.php';
            } else {
                echo "Error: Unable to edit post.";
                header("Refresh:3;url=index.php");
            }
        }
    }

    public function update(): void
    {
        if (isset($_POST['id'])) {
            $post = new Post($this->connection);
            $post->setId($_POST['id']);
            $post->setTitle($_POST['title']);
            $post->setContent($_POST['content']);
            $post->setSubject($_POST['subject']);

            if ($post->update()) {
                header("Location: index.php");
            } else {
                echo "Error: Unable to update post.";
            }
        }
    }

    public function destroy(): void
    {
        if (isset($_GET['id'])) {
            $post = new Post($this->connection);
            $post->setId($_GET['id']);

            if ($post->delete()) {
                header("Location: index.php");
            } else {
                echo "Error: Unable to delete post.";
            }
        }
    }
}
