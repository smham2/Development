<p>Customer's Receipt</p>
<ul>
<?php 
	// List of menu items 
	$appetizer = "Buffalo Wings";
	$drink = "20oz Beer";
	$entree = "Cheeseburger with fries";
	$dessert = "NY Cherry Cheesecake";

	// Corresponding menu item prices
	$appetizer_price = "7.99";
	$drink_price = "3.99";
	$entree_price = "12.99";
	$dessert_price = "3.99";

	// Declared variables for sales tax at 8% and tip at 15%
	$sales_tax = ".08";
	$customer_tip = ".15";

	// Calculate the just the cost of the menu items
	$sub_total = $appetizer_price + $drink_price + $entree_price + $dessert_price;
	// Determine the sales tax based on the subtotal
	$tax = $sub_total * $sales_tax;
	// Determine the tip based on the subtotal
	$tip = $sub_total * $customer_tip;
	// Add up the subtotal, sales tax and tip to determine the grand total of meal
	$grand_total = $sub_total + $tax + $tip;

	// Display the menu items ordered along with their prices in a table
	echo "<table>";
	echo "<tr><td>$appetizer:</td><td>$appetizer_price</td></tr>";
	echo "<tr><td>$drink:</td><td>$drink_price</td></tr>";
	echo "<tr><td>$entree:</td><td>$entree_price</td></tr>";
	echo "<tr><td>$dessert:</td><td>$dessert_price</td></tr>";
	echo "</table>";
	// Display an itemized list of the menu items ordered along with their prices
	//echo "<li>$appetizer: $appetizer_price</li>";
	//echo "<li>$drink: $drink_price</li>";
	//echo "<li>$entree: $entree_price</li>";
	//echo "<li>$dessert: $dessert_price</li>";
	
	// Display the subtotal, sales tax, tip and grand total
	echo "<br/><li>Meal Total: $sub_total</li>";
	echo "<ul><li>Sales tax (8%): " . round($tax, 2) . "</li>";	
	echo "<li>Tip: " . round($tip, 2) . "</li></ul>";
	echo "<li>Grand Total: " . round($grand_total, 2) . "</li>";

?>
</ul>
