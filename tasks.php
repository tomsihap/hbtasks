<?php
require_once 'database.php';

/**
 * Queries avec PDO :
 * 1. On se connecte à PDO ($bdd dans database.php)
 * 2. On execute une requête sur $bdd :
 *      $response = $bdd->query('SELECT * FROM USERS');
 *
 * 3. On lit les données de la réponse :
 *      $users = $response->fetchAll();
 *
 * 4. On veut que les données soient retournées en array associatif,
 *      on rajoute "PDO::FETCH_ASSOC" au fetchAll().
 * (ex: $user['name'] = 'Thomas')
 *
 *      $users = $response->fetchAll(PDO::FETCH_ASSOC);
 */


$res = $bdd->query("SELECT
                        tasks.id as taskId,
                        tasks.title as taskTitle,
                        tasks.description as description,
                        tasks.due_date as due_date,
                        tasks.state as state,
                        categories.id as catId,
                        categories.title as catTitle
                    FROM tasks
                    LEFT JOIN categories
                        ON tasks.category_id = categories.id");

$tasks = $res->fetchAll(PDO::FETCH_ASSOC);

$res2 = $bdd->query('SELECT * FROM categories');
$categories = $res2->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include 'partials/_header.php'; ?>

                <?php foreach ($tasks as $task) : ?>
                <div class="card mt-2">
                    <div class="card-body <?= $task['state'] ?'bg-dark text-white' : '' ?>">
                        <h5 class="card-title">
                            <a href="task.php?task_id=<?= $task['taskId'] ?>">
                                <?= $task['taskTitle']?>
                            </a>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <a href="category.php?id=<?= $task['catId']?>">
                                <?= $task['catTitle'] ?>
                            </a>
                        </h6>
                        <p class="card-text"><?= $task['description'] ?></p>

                        <a href="switchState.php?task_id=<?= $task['taskId'] ?>" class="btn btn-primary float-right">

                            <?php if (!$task['state']) :

                                if ($task['due_date'] !== null) :

                                    $date = new DateTime($task['due_date']);
                                    $dateFr = $date->format('l d F');

                                    echo "À faire avant le " . $dateFr;

                                else :
                                    echo "À faire";
                                endif;

                            else :
                                echo "Terminé";
                            endif;
                            ?>

                        </a>
                    </div>
                </div>
                <?php endforeach; ?>


<hr>

<h2>Ajouter une tâche :</h2>

<form action="create-task.php" method="POST" class="form">

    <div class="form-group">
        <label for="titleTask">Titre *</label>
        <input type="text" id="titleTask" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="descTask">Description</label>
        <input type="text" id="descTask" class="form-control" name="description">
    </div>

    <div class="form-group">
        <label for="duedateTask">À faire avant le :</label>
        <input type="date" id="duedateTask" class="form-control" name="due_date">
    </div>

    <div class="form-group">
        <label for="catTask">Catégorie</label>
        <select name="category_id" id="catTask" class="form-control">
            <?php foreach($categories as $c): ?>
                <option value="<?= $c['id'] ?>"><?= $c['title'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-success float-right">Créer</button>

</form>



<?php include 'partials/_footer.php'; ?>