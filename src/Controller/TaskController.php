<?php

namespace App\Todolist\Controller;

use App\Todolist\Repository\TaskRepository;
use App\Todolist\Service\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TaskController
{
    public function index()
    {
        // echo "page d'accueil";
        // determiner le dossier qui va contenir les fichiers twig
        $loader = new FilesystemLoader("../templates");
        // inintialiser twig
        $twig = new Environment($loader);

        $manager = new TaskRepository;
        $tasks= $manager->index();

        // rendre une vue
        echo $twig->render('taskpage.twig', [
            'tasks' => $tasks
        ]);
    }

    public function new()
    {
        // determiner le dossier qui va contenir les fichiers twig
        $loader = new FilesystemLoader("../templates");
        // inintialiser twig
        $twig = new Environment($loader);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
           
        $manager = new TaskRepository;
        $manager->add();

            // rediriger vers la liste des tâches
            header("Location: http://localhost/todo_list/public/task/");
        }

        echo $twig->render('taskNewPage.twig', []);
    }

    public function show(int $id)
    {
        // determiner le dossier qui va contenir les fichiers twig
        $loader = new FilesystemLoader("../templates");
        // inintialiser twig
        $twig = new Environment($loader);
        // rendre une vue

        $manager = new TaskRepository;
        $task= $manager->find($id);

        echo $twig->render('taskDetailPage.twig', [
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
        // determiner le dossier qui va contenir les fichiers twig
        $loader = new FilesystemLoader("../templates");
        // inintialiser twig
        $twig = new Environment($loader);

        $manager = new TaskRepository;
        $task = $manager->find($id);
        

         if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $manager->update($id);

            // rediriger vers la liste des tâches
            header("Location: http://localhost/todo_list/public/task/");
        }

        echo $twig->render('taskUpdatePage.twig', ['task' => $task]);
    }
}
