<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <script>
        async function fetchProducts() {
            let response = await fetch("api.php");
            let products = await response.json();

            let output = "<h2>Products List</h2><ul>";
            products.forEach(product => {
                output += `<li>${product.category_name}</li>`;
            });
            output += "</ul>";

            document.getElementById("products").innerHTML = output;
        }
    </script>
</head>
<body onload="fetchProducts()">
    <div id="products"></div>
</body>
</html>
