<?php

function get_category_name($category_id) {
    global $conn;
    $query = 'SELECT * FROM account
              WHERE id = :category_id';

    $statement = $conn->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $category_name = $category['categoryName'];
    return $category_name;
}
?>