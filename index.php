<?php
# Prise du temps actuel au début du script
$time_start = microtime(true);

# travis dgdf test 2

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

# Définition des variables globales du script
define('CHEMIN_VUES','views/');
define('CHEMIN_CONTROLEURS','controllers/');
define('EMAIL','jeanluc.collinet@vinci.be');
define('DATEDUJOUR',date("j/m/Y"));

# Automatisation de l'inclusion des classes de la couche modèle
function chargerClasse($classe) {
    require_once('models/' . $classe . '.class.php');
}
spl_autoload_register('chargerClasse');

### welcome travis 22222222222222222

# Connexion à la db;
#$db=Db::getInstance();

# Ecriture du header de toutes pages HTML
require_once(CHEMIN_VUES . 'header.php');

# S'il n'y a pas de variable GET 'action' dans l'URL, elle est créée ici à la valeur 'accueil'
if (empty($_GET['action'])) {
    $_GET['action'] = 'accueil';
}
# Switch case sur l'action demandée par la variable GET 'action' précisée dans l'URL
# index.php?action=...
switch ($_GET['action']) {
    case 'genese': # action=genese
        require_once(CHEMIN_CONTROLEURS.'GeneseController.php');
        $controller = new GeneseController();
        break;
    case 'livres':
        require_once(CHEMIN_CONTROLEURS.'LivresController.php');
        $controller = new LivresController();
        break;
    case 'contact': # action=contact
        require_once(CHEMIN_CONTROLEURS.'ContactController.php');
        $controller = new ContactController();
        break;
    default: # Par défaut, le contrôleur de l'accueil est sélectionné
        require_once(CHEMIN_CONTROLEURS.'AccueilController.php');
        $controller = new AccueilController();
        break;
}
# Exécution du contrôleur défini dans le switch précédent
$controller->run();

$time_end = microtime(true);
$time = round(($time_end - $time_start)*1000,3);

# Ecrire ici le footer de toutes pages HTML
require_once(CHEMIN_VUES . 'footer.php');
?>
