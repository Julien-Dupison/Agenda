<?php

	class categoriesClass implements DatabaseClass {

		public static function selectAll(){
			global $db;

			$sql = "SELECT * FROM categories WHERE categorie_visibilite = 1";
			return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		}

		public static function select($id){
			global $db;

			$sql = "SELECT * FROM categories WHERE categorie_id = $id";
			return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		}

		/*
			array($titre,$couleur);
		*/
		public static function add($param){
			global $db;

			$sql = "INSERT INTO categories (categorie_titre, categorie_couleur) VALUES (?,?)";
		    $req = $db->prepare($sql)->execute($param);
		}

		/*
			array($id,$titre,$couleur);
		*/
		public static function edit($param){
			global $db;

			$sql = "UPDATE categories SET categorie_titre = '$param[1]', categorie_couleur = '$param[2]' WHERE categorie_id = $param[0]";
			$req = $db->prepare($sql)->execute();
		}

		/*
			$id
		*/
		public static function delete($id){
			global $db;

			$sql = "UPDATE categories SET categorie_visibilite = '0' WHERE categorie_id = $id";
			$req = $db->prepare($sql)->execute();
		}

		/*
			$id
		*/
		public static function deleteReal($id){
			global $db;

			$sql = "DELETE FROM categories WHERE categorie_id = $id";
			$ordos = $db->prepare($sql);
			$ordos->execute();
		}

	}
?>
