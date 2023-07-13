<?php
// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve order details from the form
    $customerName = $_POST['customer_name'];
    $contactDetails = $_POST['contact_details'];
    $productNames = $_POST['product_names'];
    $quantities = $_POST['quantities'];
    $instructions = $_POST['instructions'];

    // Perform any necessary calculations or validations

    // Store the order details in the database
    // Assuming you have already set up the database connection
    $sql = "INSERT INTO orders (customer_name, contact_details, product_names, quantities, instructions)
            VALUES ('$customerName', '$contactDetails', '$productNames', '$quantities', '$instructions')";
    $result = mysqli_query($connection, $sql);

    // Check if the order was successfully stored
    if ($result) {
        // Generate the order summary or receipt
        $orderSummary = "Customer: $customerName\n";
        $orderSummary .= "Contact Details: $contactDetails\n";
        $orderSummary .= "Products:\n";

        // Loop through the product names and quantities to add them to the order summary
        foreach ($productNames as $index => $productName) {
            $quantity = $quantities[$index];
            $orderSummary .= "- $productName: $quantity\n";
        }

        // Print the order summary
        $printer = printer_open('your_printer_name'); // Replace 'your_printer_name' with the actual name of your printer
        printer_set_option($printer, PRINTER_MODE, "RAW");
        printer_write($printer, $orderSummary);
        printer_close($printer);

        echo "Order printed successfully!";
    } else {
        echo "Failed to store the order.";
    }
}
?>

<!-- HTML form to collect order details -->
<form method="POST" action="">
    <label for="customer_name">Customer Name:</label>
    <input type="text" name="customer_name" id="customer_name" required>

    <label for="contact_details">Contact Details:</label>
    <input type="text" name="contact_details" id="contact_details" required>

    <label for="product_names">Product Names:</label>
    <input type="text" name="product_names[]" id="product_names" required>
    <!-- Allow users to add multiple product names and quantities -->
    <!-- You can use JavaScript to dynamically add more input fields -->

    <label for="quantities">Quantities:</label>
    <input type="text" name="quantities[]" id="quantities" required>

    <label for="instructions">Instructions:</label>
    <textarea name="instructions" id="instructions"></textarea>

    <button type="submit">Submit Order</button>
</form>
