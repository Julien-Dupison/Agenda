<?php

interface DatabaseClass
{
    /**
     * Fonction permettant de récupérer tous les éléments de la table
     * @return bool|mixed
     *      Retourne Faux si une erreur a eu lieu durant la récupération
     */
    public static function selectAll();

    /**
     * Focntion permettant de récupérer un élément en fonction de son ID
     *
     * @param int|string $id
     *      Identifiant de l'élément
     * @return bool|mixed
     *      Retourne Faux si une erreur a eu lieu durant la récupération
     */
    public static function select($id);

    /**
     * Fonction permettant d'ajouter un élément dans la table
     * @param array|mixed $params
     *      Données à insérer dans la table
     * @return bool|mixed
     *      Retourne faux si une erreur a eu lieu durant la récupération
     */
    public static function add($params);

    /**
     * Fonction peremttant de modifier certaines valeurs dans la table
     * @param array|mixed $params
     *      Données à modifier dans la table
     * @return bool|mixed
     *      Retourne faux si une erreur a eu lieu durant la récupération
     */
    public static function edit($params);

    /**
     *  Fonction permettant de supprimer l'élément dans la table </br>
     *  Une désactivation est préférable à une suppression.
     * @param int|string $id
     *      Identifiant de l'élément
     * @return bool|mixed
     *      Retourne faux si une erreur a eu lieu surant la récupération
     */
    public static function delete($id);
}