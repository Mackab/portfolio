<?php

$data = '';
switch ($_GET['action']) {
    case 'save';
        save();
        break;
    case 'delete';
        delete($_GET['id']);
        break;
    case 'update';
        $data = update($_GET['id']);
        break;
    case 'list';
        break;
}

function delete($id){
    include "connect.php";
    try {
        $sql = "DELETE FROM posts WHERE id = $id";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    
    }
}

function save($id=null) {
    include "connection.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        
        if(empty($id)){
        $sql = "INSERT INTO posts (title, content, author) VALUES (:title, :content, :author)";
        } else {
            $sql = "UPDATE posts SET title = '$title' WHERE ";
        }

        
        try {
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':author', $author);
            
            $stmt->execute();
            
            echo "Record inserted successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

function update($id=null) {
    include "connect.php";
    $ret = '';
    try {
        $sql = "SELECT * FROM posts WHERE id = $id";
        $ret = $conn->exec($sql);
        $ret = $conn->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    return $ret;
}