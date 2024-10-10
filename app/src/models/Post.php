<?php

class Post
{
    private int $id;
    private string $title;
    private string $content;
    private string $subject;

    private PDO $connection;

    public function __construct(PDO $db)
    {
        $this->connection = $db;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function create(): bool
    {
        $query = "INSERT INTO posts SET title=:title, content=:content, subject=:subject";
        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':subject', $this->subject);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll(): PDOStatement
    {
        $query = "SELECT * FROM posts";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function getById(): PDOStatement
    {
        $query = "SELECT * FROM posts WHERE id=:id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function update(): bool
    {
        $query =
            "UPDATE posts SET 
                title=:title, 
                content=:content, 
                subject=:subject 
                WHERE id=:id";

        $stmt = $this->connection->prepare($query);
        
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':subject', $this->subject);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete(): bool
    {
        $query = "DELETE FROM posts WHERE id=:id";
        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
