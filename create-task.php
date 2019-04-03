<?php

require_once 'database.php';

$request = 'INSERT INTO tasks(title, description, due_date, category_id)
            VALUES ("'.$_POST['title'].'",
                    "'.$_POST['description'].'",
                    "'.$_POST['due_date'].'",
                    "'.$_POST['category_id'].'")';

$response = $bdd->query($request);

Header('Location: tasks.php');