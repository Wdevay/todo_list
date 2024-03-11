<?php

namespace App\Todolist\Repository;

use App\Todolist\Service\Database;



class TaskRepository 
{
    public function index()
    {
        // se connecter à la base de donnée
        $pdo = new Database(
            "127.0.0.1",
            "todolist",
            "3306",
            "root",
            ""
        );
        // récupérer les datas
        $tasks = $pdo->selectAll(
            "SELECT * FROM task"
        );

        return $tasks;
    }

    public function add()
    {
         // se connecter à la base de donnée
         $pdo = new Database(
            "127.0.0.1",
            "todolist",
            "3306",
            "root",
            ""
        );
        // récupérer les datas
        $pdo->query(
            "INSERT INTO task (title, status) VALUES (?,?)",
            [$_POST['title'], $_POST['status']]
        );
    }

    public function find(int $id)
    {
          // se connecter à la base de donnée
        $pdo = new Database(
            "127.0.0.1",
            "todolist",
            "3306",
            "root",
            ""
        );
        // récupérer les datas
        $task = $pdo->select(
            "SELECT * FROM task WHERE id = " . $id
        );

        return $task;
    }

    public function delete(int $id)
    {
          // se connecter à la base de donnée
          $pdo = new Database(
            "127.0.0.1",
            "todolist",
            "3306",
            "root",
            ""
        );
        // récupérer les datas
        $pdo->query(
            "DELETE FROM task WHERE id=" . $id
        );

    }

    public function update(int $id)
    {
          // se connecter à la base de donnée
          $pdo = new Database(
            "127.0.0.1",
            "todolist",
            "3306",
            "root",
            ""
        );

        $title = $_POST['title'];
        $status = $_POST['status'];

        // récupérer les datas
        $pdo->query(
            "UPDATE task SET title = '$title',status = '$status' WHERE id = $id"
            
        );

    }

}