
<?php include 'view/header.php'; ?>

<main>
    <h1>Selected Product List</h1>
    <ul>
    <?php foreach ($products as $product) : ?>
        <li><?php echo htmlspecialchars($product['productName']); ?></li>
    <?php endforeach; ?>
    </ul>

    <h1>Delete Message</h1>
    <p><?php echo htmlspecialchars($delete_message); ?></p>

    <form method="post" action="index.php">
        <input type="hidden" name="action" value="delete">
        <button type="submit">Delete Fender Telecaster</button>
    </form>

    <h1>Insert Message</h1>
    <p><?php echo htmlspecialchars($insert_message); ?></p>

    <form method="post" action="index.php">
        <input type="hidden" name="action" value="insert">
        <button type="submit">Add Fender Telecaster</button>
    </form>
</main>

<?php include 'view/footer.php'; ?>
