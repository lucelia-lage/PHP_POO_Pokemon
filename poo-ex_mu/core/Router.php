<?php
// OBSERVATION : Commentaires générées avec l'aide de Copilot // 

class Router // classe liée à la gestion des requêtes HTTP et à la redirection vers les contrôleurs appropriés
{
    public function start() // méthode publique : peut être appellée de l'extérieur de la classe 
    {
        try { // le bloc de code suivant est susceptible d'avoir une erreur ou une exception -> si exception : capturé et généré dans le bloc catch 
            $uri = $_SERVER['REQUEST_URI']; // récupère l'Uniform Resource Identifier de la requête HTTP entrante -> permet de connaître l'URL demandée par l'utilisateur. 
            if ($uri !== "/") { // vérification pour voir si l'URI n'est pas égale à "/" -> si l'URI est différente de la racine du site ("/"), cela signifie que l'utilisateur essaie d'accéder à une ressource spécifique.
                $controller = ucfirst(explode('/', $uri)[1]) . "Controller"; // on extrait le nom du contrôleur à partir de l'URI.
                if (class_exists($controller)) { // vérifie si la classe du contrôleur existe -> si elle existe, on crée une instance de ce contrôleur et on appelle sa méthode index().
                    $instance = new $controller(); // on crée une instance de la classe du contrôleur.
                    $instance->index(); // on appelle la méthode index() de l'instance du contrôleur.
                }else{ 
                    include_once(__DIR__ . '/../views/error.php'); // si la classe du contrôleur n'existe pas, on inclut une vue d'erreur.
                } 
            }else{
                $instance = new MainController();  // si l'URI est égale à "/", on crée une instance de MainController et on appelle sa méthode index().
                $instance->index();   // on appelle la méthode index() de l'instance du contrôleur principal.
            }
        } catch (\Throwable $th) { // si une exception est levée pendant l'exécution du code, on la capture ici.
            echo $th->getMessage(); // on affiche le message d'erreur de l'exception.
        }
}
}
// Une instance c'est un objet concret créé à partir d'une classe.
// Une classe c'est un modèle qui définit les propriétés et les méthodes d'un objet.
// Une méthode c'est une fonction définie à l'intérieur d'une classe qui peut être appelée sur une instance de cette classe.
// Une propriété c'est une variable définie à l'intérieur d'une classe qui stocke des données spécifiques à une instance de cette classe.
// Une exception c'est un événement qui se produit pendant l'exécution d'un programme et qui interrompt le flux normal du programme. Elle peut être capturée et gérée pour éviter que le programme ne plante.
// Une erreur c'est un problème qui se produit pendant l'exécution d'un programme et qui peut entraîner un comportement inattendu ou un plantage du programme. Les erreurs peuvent être causées par des fautes de syntaxe, des problèmes de logique ou d'autres problèmes dans le code. Les exceptions sont souvent utilisées pour gérer les erreurs de manière plus contrôlée et élégante.
// Une URI (Uniform Resource Identifier) c'est une chaîne de caractères qui identifie de manière unique une ressource sur Internet. Elle peut être utilisée pour localiser une ressource spécifique, comme une page web ou un fichier, et est souvent utilisée dans les requêtes HTTP pour accéder à des ressources sur un serveur web.
// Une requête HTTP c'est un message envoyé par un client (comme un navigateur web) à un serveur web pour demander une ressource spécifique, comme une page web ou un fichier. La requête contient des informations sur la ressource demandée, ainsi que des données supplémentaires, comme des paramètres de recherche ou des informations d'authentification. Le serveur traite la requête et renvoie une réponse au client, qui peut inclure la ressource demandée ou un message d'erreur si la ressource n'est pas trouvée.
?>
