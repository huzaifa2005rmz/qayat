// Add item row when the "Add Item" button is clicked
document.getElementById('addItemButton').addEventListener('click', function() {
    var itemRowsContainer = document.getElementById('itemRowsContainer');
    var newRow = document.createElement('tr');
    newRow.innerHTML = '<td><input type="text" name="items[][name]" required></td>' +
                       '<td><input type="number" name="items[][price]" step="0.01" required></td>';
    itemRowsContainer.appendChild(newRow);
});

// Update total amount when item prices change
document.getElementById('itemRowsContainer').addEventListener('input', function(event) {
    var totalAmount = 0;
    var priceInputs = document.querySelectorAll('input[name="items[][price]"]');
    for (var i = 0; i < priceInputs.length; i++) {
        var price = parseFloat(priceInputs[i].value);
        if (!isNaN(price)) {
            totalAmount += price;
        }
    }
    document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);
});

// Generate receipt when the "Generate Receipt" button is clicked
document.getElementById('generateReceiptButton').addEventListener('click', function() {
    var customerName = document.getElementById('customerName').value;
    var itemRows = document.querySelectorAll('input[name="items[][name]"]');
    var itemPrices = document.querySelectorAll('input[name="items[][price]"]');

    var receiptOutput = document.getElementById('receiptOutput');

    // Clear existing receipt content
    receiptOutput.innerHTML = '';

    // Generate the receipt HTML
    var receipt = '<h1>Receipt</h1>' +
                  '<p>Customer: ' + customerName + '</p>' +
                  '<table>' +
                  '<thead><tr><th>Item</th><th>Price</th></tr></thead>' +
                  '<tbody>';

    for (var i = 0; i < itemRows.length; i++) {
        var itemName = itemRows[i].value;
        var itemPrice = itemPrices[i].value;
        receipt += '<tr><td>' + itemName + '</td><td>' + itemPrice + '</td></tr>';
    }

    var totalAmount = document.getElementById('totalAmount').textContent;
    receipt += '</tbody></table><p>Total: $' + totalAmount + '</p>';

    // Output the generated receipt HTML
    receiptOutput.innerHTML = receipt;
});
