<?php

namespace App\Todolist\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    protected function render(string $template,array $data){
         // determiner le dossier qui va contenir les fichiers twig
         $loader = new FilesystemLoader("../templates");
         // inintialiser twig
         $twig = new Environment($loader);
 
         // rendre une vue
        echo $twig->render($template, $data);
    }


}