<?php 
class LivresController{

    private $_db;

	public function __construct() {
        $this->_db = Db::getInstance();
	}
			
	public function run(){
        	# Notification qui sera affichée dans la vue
        	$notification='';
        	# Mot clé de recherche
        	$html_motcle='';

        
       
		var_dump("coucou");
        	$tablivres=$this->_db->select_livres();
		var_dump($tablivres);
        
		# Ecrire ici la vue livres.php
		# $tablivres contient un tableau de livres
		require_once(CHEMIN_VUES . 'livres.php');
	}
} 
?>
