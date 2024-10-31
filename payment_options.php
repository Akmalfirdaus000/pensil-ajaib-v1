<?php

include("includes/db.php");

// Periksa apakah sesi sudah ada dan ambil informasi pelanggan
$session_email = $_SESSION['customer_email'];
$select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";
$run_cust = mysqli_query($con, $select_customer);
$row_customer = mysqli_fetch_array($run_cust);
$customer_id = $row_customer['customer_id'];

// Jika "Validasi Orderan" diklik, setel sesi
if (isset($_GET['c_id'])) {
	$_SESSION['order_validated'] = true; // Set sesi order_validated
}
?>
<div class="box">
	<h1 class="text-center">Validasi Orderan</h1>
	<p class="lead text-center">
		<a href="order.php?c_id=<?php echo $customer_id ?>"><span>Validasi Orderan</span></a>
	</p>
</div>