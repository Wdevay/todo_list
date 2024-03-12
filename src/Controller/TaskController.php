<?php

namespace App\Todolist\Controller;


use App\Todolist\Repository\TaskRepository;
use App\Todolist\Controller\AbstractController;

class TaskController extends AbstractController
{


    public function index()
    {

        $manager = new TaskRepository;
        $tasks = $manager->index();



        $this->render('taskpage.twig', [
            'tasks' => $tasks
        ]);
    }

    public function new()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $manager = new TaskRepository;
            $manager->add();

            // rediriger vers la liste des tâches
            header("Location: http://localhost/todo_list/public/task/");
        }

        $this->render('taskNewPage.twig', []);
    }

    public function show(int $id)
    {

        $manager = new TaskRepository;
        $task = $manager->find($id);

        $this->render('taskDetailPage.twig', [
            'task' => $task
        ]);
    }

    public function delete(int $id)
    {
        $manager = new TaskRepository;
        $manager->delete($id);

        // rediriger vers la liste des tâches
        header("Location: http://localhost/todo_list/public/task/");
    }

    public function update(int $id)
    {

        $manager = new TaskRepository;
        $task = $manager->find($id);


        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $manager->update($id);

            // rediriger vers la liste des tâches
            header("Location: http://localhost/todo_list/public/task/");
        }

        $this->render('taskUpdatePage.twig', ['task' => $task]);
    }
}
