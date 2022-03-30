<?php

class Migration
{
	public $db;
	function __construct($db){
		$this->db = $db;
	}

	public function migrate(){
		$this->create_st_admin();
		$this->create_st_datas_1();
		$this->create_st_datas_2();
		$this->create_st_pages();
		$this->create_st_block();
		$this->create_st_champ_block();
		$this->create_st_operateur();
		$this->create_st_page_active();
		$this->create_st_params_stock();
		$this->create_st_recherche();
		$this->create_st_themes();
		$this->create_st_type_block();
		$this->insert_st_type_block();
		$this->create_st_type_liste();
		$this->insert_st_type_liste();
		$this->create_st_code_html();
		$this->create_st_liste();
		$this->create_st_liste_evalue();
		$this->create_st_liste_liste();
	}

	public function create_st_admin(){
		$sQl = 'DROP TABLE IF EXISTS `st_admin`;
				CREATE TABLE `st_admin` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `slug` varchar(255) DEFAULT NULL,
				  `nom` varchar(255) DEFAULT NULL,
				  `mail` varchar(255) DEFAULT NULL,
				  `mdpss` varchar(255) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_datas_1(){
		$sQl = 'DROP TABLE IF EXISTS `st_datas_1s`;
				CREATE TABLE `st_datas_1s` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_liste` int(11) DEFAULT NULL,
				  `quest` varchar(255) DEFAULT NULL,
				  `user_save` int(11) DEFAULT NULL,
				  `user_update` int(11) DEFAULT NULL,
				  `created_at` datetime DEFAULT NULL,
				  `updated_at` datetime DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_datas_2(){
		$sQl = 'DROP TABLE IF EXISTS `st_datas_2s`;
				CREATE TABLE `st_datas_2s` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_liste` int(11) DEFAULT NULL,
				  `quest` varchar(255) DEFAULT NULL,
				  `user_save` int(11) DEFAULT NULL,
				  `user_update` int(11) DEFAULT NULL,
				  `created_at` datetime DEFAULT NULL,
				  `updated_at` datetime DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_pages(){
		$sQl = 'DROP TABLE IF EXISTS `st_pages`;
				CREATE TABLE `st_pages` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `slug` varchar(255) NOT NULL,
				  `nom_page` varchar(255) NOT NULL,
				  `etat` int(11) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_block(){
		$sQl = 'DROP TABLE IF EXISTS `st_blocks`;
				CREATE TABLE `st_blocks` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_page` int(11) NOT NULL,
				  `nom_block` varchar(255) DEFAULT NULL,
				  `type_block` int(11) DEFAULT NULL,
				  `ligne` int(11) DEFAULT NULL,
				  `etat` int(11) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_champ_block(){
		$sQl = 'DROP TABLE IF EXISTS `st_champs_block`;
				CREATE TABLE `st_champs_block` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `nom_champ` varchar(255) DEFAULT NULL,
				  `degre` int(11) DEFAULT NULL,
				  `etat` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_operateur(){
		$sQl = 'DROP TABLE IF EXISTS `st_operateur`;
				CREATE TABLE `st_operateur` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `slug` varchar(255) DEFAULT NULL,
				  `nom` varchar(255) DEFAULT NULL,
				  `saisie` varchar(255) DEFAULT NULL,
				  `mail` varchar(255) DEFAULT NULL,
				  `mdpss` varchar(255) DEFAULT NULL,
				  `sasie` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_page_active(){
		$sQl = 'DROP TABLE IF EXISTS `st_page_actives`;
				CREATE TABLE `st_page_actives` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_liste` int(11) DEFAULT NULL,
				  `page` int(11) DEFAULT NULL,
				  `etat_active_uns` int(11) DEFAULT NULL,
				  `etat_active_deuxs` int(11) DEFAULT NULL,
				  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
				  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_params_stock(){
		$sQl = 'DROP TABLE IF EXISTS `st_params_stock`;
				CREATE TABLE `st_params_stock` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `champ` varchar(255) DEFAULT NULL,
				  `value` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8';

		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_recherche(){
		$sQl = 'DROP TABLE IF EXISTS `st_recherche`;
				CREATE TABLE `st_recherche` (
				  `id_cle` int(11) NOT NULL AUTO_INCREMENT,
				  `colonne` varchar(255) DEFAULT NULL,
				  PRIMARY KEY (`id_cle`)
				) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8';

		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_themes(){
		$sQl = 'DROP TABLE IF EXISTS `st_themes`;
				CREATE TABLE `st_themes` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `nom_params` varchar(255) DEFAULT NULL,
				  `valeurs` varchar(255) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_type_block(){
		$sQl = 'DROP TABLE IF EXISTS `st_type_block`;
				CREATE TABLE `st_type_block` (
				  `id_type_block` int(11) NOT NULL AUTO_INCREMENT,
				  `type_block` varchar(255) NOT NULL,
				  PRIMARY KEY (`id_type_block`)
				) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function insert_st_type_block(){
		$sQl = "INSERT INTO `st_type_block` VALUES ('1', 'Tableau');
				INSERT INTO `st_type_block` VALUES ('2', 'Titre');
				INSERT INTO `st_type_block` VALUES ('3', 'Sous Titre')";

		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_type_liste(){
		$sQl = 'DROP TABLE IF EXISTS `st_type_liste`;
				CREATE TABLE `st_type_liste` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `libelle` varchar(255) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8';

		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function insert_st_type_liste(){
		$sQl = "INSERT INTO `st_type_liste` VALUES ('1', 'Ligne de tableau');
				INSERT INTO `st_type_liste` VALUES ('2', 'Degré d\'evaluation')";

		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_code_html(){
		$sQl = 'DROP TABLE IF EXISTS `st_code_html`;
				CREATE TABLE `st_code_html` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_page` int(11) DEFAULT NULL,
				  `id_block` int(11) DEFAULT NULL,
				  `html` text,
				  `ordre` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_liste(){
		$sQl = 'DROP TABLE IF EXISTS `st_liste`;
				CREATE TABLE `st_liste` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `type_liste` int(11) NOT NULL,
				  `nom_liste` varchar(255) NOT NULL,
				  `libelle` varchar(255) NOT NULL,
				  `etat` int(11) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_liste_evalue(){
		$sQl = 'DROP TABLE IF EXISTS `st_liste_evalue`;
				CREATE TABLE `st_liste_evalue` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `slug` varchar(255) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8';
		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}

	public function create_st_liste_liste(){
		$sQl = 'DROP TABLE IF EXISTS `st_liste_liste`;
				CREATE TABLE `st_liste_liste` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `id_liste` int(11) DEFAULT NULL,
				  `libelle` varchar(255) DEFAULT NULL,
				  `etat` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8';

		$exec = $this->db->prepare($sQl);
		$exec->execute();
	}
}