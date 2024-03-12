<?php 
namespace App\Todolist\Controller;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Todolist\Controller\AbstractController;

class HomeController extends AbstractController{
    public function index()
    {
        // echo "page d'accueil";
        // determiner le dossier qui va contenir les fichiers twig
        $loader = new FilesystemLoader("../templates");
        // inintialiser twig
        $twig = new Environment($loader);
        // rendre une vue
        $tasks = [
            "faire les courses", "finir le projet", "aller au sport"
        ];
        echo $twig->render('homepage.twig', [
            'name' => "Assoumani",
            'tasks' => $tasks
        ]);
    }
}