<?php
// Retrieve JSON data from the request body
$receiptData = json_decode(file_get_contents('php://input'));

// Retrieve data from the receiptData object
$customerName = $receiptData->customerName;
$items = $receiptData->items;
$totalAmount = 0;

// Calculate the total amount
foreach ($items as $item) {
    $totalAmount += floatval($item->price);
}

// Generate the receipt HTML
$receipt = "
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        /* Add your desired CSS styles for the receipt */
    </style>
</head>
<body>
    <h1>Receipt</h1>
    <p>Customer: $customerName</p>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>";

foreach ($items as $item) {
    $itemName = $item->name;
    $itemPrice = $item->price;
    $receipt .= "<tr><td>$itemName</td><td>$itemPrice</td></tr>";
}

$receipt .= "
        </tbody>
    </table>
    <p>Total: $" . number_format($totalAmount, 2) . "</p>
</body>
</html>
";

// Save the receipt to a file
file_put_contents('receipt.html', $receipt);
?>
