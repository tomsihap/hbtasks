<?php

require_once 'database.php';

/**
 * On récupère la tâche qu'on souhaite modifier
 * On utilise fetch pour 1 élément, fetchAll pour plusieurs éléments à selectionner
 */
$response = $bdd->query('SELECT state FROM tasks WHERE id = ' . $_GET['task_id']);
$task = $response->fetch(PDO::FETCH_ASSOC);

/**
 * On teste le "state" de la tâche à modifier : si elle est à 0 on la passe
 * sur 1, si elle est sur 1 on la passe sur 0 !
 */
$newState = ($task['state']) ? 0 : 1;

/**
 * On exécute la requête et on concatène :
 * - le "newState" testé en ligne 17
 * - le $_GET['task_id'] qui a été passé dans l'URL depuis le bouton de la tâche
 */
$bdd->query('   UPDATE tasks
                SET state = '. $newState .'
                WHERE tasks.id = '. $_GET['task_id']
            );

/**
 * Redirection vers la page d'accueil
 */
Header('Location: index.php');