<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if (isset($_GET['c_id'])) {
    $customer_id = intval($_GET['c_id']); // Pastikan customer_id adalah integer
} else {
    die("Customer ID not found."); // Jika c_id tidak ada, hentikan eksekusi atau tangani kesalahan
}

$ip_add = getUserIp();
$status = "pending";
$invoice_no = mt_rand(); // Generate invoice number

// Mulai transaksi database
mysqli_begin_transaction($con);

try {
    // Ambil data keranjang berdasarkan IP pengguna
    $select_cart = "SELECT * FROM cart WHERE ip_add = ?";
    $stmt_cart = $con->prepare($select_cart);
    $stmt_cart->bind_param('s', $ip_add);
    $stmt_cart->execute();
    $result_cart = $stmt_cart->get_result();

    // Periksa apakah keranjang kosong
    if ($result_cart->num_rows === 0) {
        throw new Exception("Keranjang kosong. Tidak ada produk untuk diproses.");
    }

    // Loop melalui setiap item di keranjang
    while ($row_cart = $result_cart->fetch_assoc()) {
        $pro_id = $row_cart['p_id'];
        $size = $row_cart['size'];
        $qty = $row_cart['qty'];

        // Ambil detail produk berdasarkan product_id
        $select_product = "SELECT * FROM products WHERE product_id = ?";
        $stmt_product = $con->prepare($select_product);
        $stmt_product->bind_param('i', $pro_id);
        $stmt_product->execute();
        $result_product = $stmt_product->get_result();

        if ($result_product->num_rows === 0) {
            throw new Exception("Produk dengan ID $pro_id tidak ditemukan.");
        }

        while ($row_product = $result_product->fetch_assoc()) {
            $sub_total = $row_product['product_price'] * $qty;

            // Masukkan pesanan ke tabel customer_order
            $insert_customer_order = "INSERT INTO customer_order (customer_id, product_id, due_amount, invoice_no, qty, size, order_date, order_status) 
                                      VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)";
            $stmt_order = $con->prepare($insert_customer_order);
            $stmt_order->bind_param('iidsiss', $customer_id, $pro_id, $sub_total, $invoice_no, $qty, $size, $status);

            if (!$stmt_order->execute()) {
                throw new Exception("Gagal memasukkan pesanan untuk produk dengan ID $pro_id.");
            }
        }
    }

    // Hapus item dari keranjang setelah pesanan dibuat
    $delete_cart = "DELETE FROM cart WHERE ip_add = ?";
    $stmt_delete = $con->prepare($delete_cart);
    $stmt_delete->bind_param('s', $ip_add);

    if (!$stmt_delete->execute()) {
        throw new Exception("Gagal menghapus item dari keranjang.");
    }

    // Jika semuanya berhasil, commit transaksi
    mysqli_commit($con);

    // Notifikasi ke pengguna dan arahkan ke halaman "my_account"
    echo "<script>alert('Your order has been submitted, Thank you!')</script>";
    echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";

} catch (Exception $e) {
    // Rollback transaksi jika terjadi kesalahan
    mysqli_rollback($con);

    // Tampilkan pesan kesalahan
    echo "<script>alert('Error: ".$e->getMessage()."')</script>";
    echo "<script>window.open('cart.php','_self')</script>";
}
?>
