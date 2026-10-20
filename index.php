
<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

$cat_id = 1;
$delete_message = "No product deleted.";
$insert_message = "No product added.";

/*********************************************
 * Handle actions only when submitted
 **********************************************/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    /***************************************
     * Delete a product (Question 7)
     ****************************************/
    if ($action === 'delete') {
        $product_name = 'Fender Telecaster';
        $product = get_product_by_name($product_name);

        if ($product) {
            $product_id = $product['productID'];
            $deleted_rows = delete_product($product_id);

            if ($deleted_rows > 0) {
                $delete_message = "Product was deleted successfully.";
            } else {
                $delete_message = "No rows were deleted.";
            }
        } else {
            $delete_message = "Product was not found.";
        }
    }

    /***************************************
     * Insert a product (Question 5)
     ****************************************/
    if ($action === 'insert') {
        $category_id = 1;
        $code = 'tele';
        $name = 'Fender Telecaster';
        $description = 'NA';
        $price = 949.99;
        $discount_percent = 0;

        try {
            $product_id = add_product(
                $category_id,
                $code,
                $name,
                $description,
                $price,
                $discount_percent
            );

            $insert_message =
                "Product was added successfully. Product ID: " . $product_id;
        } catch (PDOException $e) {
            $insert_message =
                "Product could not be added. The product code may already exist.";
        }
    }
}

/*********************************************
 * Get products and display messages
 **********************************************/

$products = get_products_by_category($cat_id);

include 'home.php';
?>
