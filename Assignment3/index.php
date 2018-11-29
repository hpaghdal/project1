<?php
require('model/database.php');
//require('model/edit.php');
//require('model/log.php');
//require('model/QPage.php');
//require('model/ques.php');
//require('model/registration.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'showlog';
    }
}
if ($action == 'showlog') {
    echo "pagal";
    include ('view/logForm.php');

}
else if ($action=="signin"){
    echo "double pagal";
    include ('model/log.php');

}
else if ($action == 'showreg') {
    echo "register";
    include ('view/registrationForm.php');
}

//else if ($action == 'delete_product') {
//    $product_id = filter_input(INPUT_POST, 'product_id',
//        FILTER_VALIDATE_INT);
//    $category_id = filter_input(INPUT_POST, 'category_id',
//        FILTER_VALIDATE_INT);
//    if ($category_id == NULL || $category_id == FALSE ||
//        $product_id == NULL || $product_id == FALSE) {
//        $error = "Missing or incorrect product id or category id.";
//        include('../errors/error.php');
//    } else {
//        delete_product($product_id);
//        header("Location: .?category_id=$category_id");
//    }
//} else if ($action == 'show_add_form') {
//    $categories = get_categories();
//    include('product_add.php');
//} else if ($action == 'add_product') {
//    $category_id = filter_input(INPUT_POST, 'category_id',
//        FILTER_VALIDATE_INT);
//    $code = filter_input(INPUT_POST, 'code');
//    $name = filter_input(INPUT_POST, 'name');
//    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
//    if ($category_id == NULL || $category_id == FALSE || $code == NULL ||
//        $name == NULL || $price == NULL || $price == FALSE) {
//        $error = "Invalid product data. Check all fields and try again.";
//        include('../errors/error.php');
//    } else {
//        add_product($category_id, $code, $name, $price);
//        header("Location: .?category_id=$category_id");
//    }
//}
?>