
<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$cat_id = 1;

// Get the products
$products = get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';

// Delete message (Question 7 will implement deletion)
$delete_message = "No rows were deleted.";

/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'tele';
$name = 'Fender Telecaster';
$description = 'NA';
$price = '949.99';
$discount_percent = 0;

// Insert the data
try {
    $product_id = add_product(
        $category_id,
        $code,
        $name,
        $description,
        $price,
        $discount_percent
    );

    $insert_message = "Product was added successfully. Product ID: " . $product_id;
} catch (PDOException $e) {
    $insert_message = "Product could not be added. The product code may already exist.";
}

// Display the page
include 'home.php';
?>
