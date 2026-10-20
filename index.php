
<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Select products in the Guitars category
$cat_id = 1;

// Get the products
$products = get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';

// Delete the product and display an appropriate message
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

    $insert_message = "Product was added successfully.";
} catch (PDOException $e) {
    $insert_message = "Product could not be added. The product code may already exist.";
}

include 'home.php';
?>
