<div class="panel panel-default sidebar-menu">
    <div class="panel-heading d-flex align-items-center">
        <?php
        $session_customer = $_SESSION['customer_email'];
        $get_cust = "SELECT * FROM customers WHERE customer_email='$session_customer'";
        $run_cust = mysqli_query($con, $get_cust);
        $row_customers = mysqli_fetch_array($run_cust);
        $customer_image = $row_customers['customer_image'];
        $customer_name = $row_customers['customer_name'];
        if (!isset($_SESSION['customer_email'])) {
            // Jika belum login, tampilkan pesan atau biarkan kosong
        } else {
            echo "
        <div class='d-flex align-items-center'>
		<img src='customer_images/$customer_image' class='img-fluid rounded-circle' style='width: 60px; height: 60px;' alt='Profil'>
			<h4 class='panel-title mb-0 ms-3' style='white-space: nowrap;'> $customer_name</h4>
        </div>";
        }
        ?>
    </div>

    <div class="panel-bdy">
        <ul class="nav nav-pills nav-staked">
            <li class="">
                <a href="my_account.php?my_order"><i class="fa fa-list-al"> My Order</a>
            </li>
            <!-- <li style="color: red;">
                <a href="my_account.php?pay_offline"><i class="fa fa-money"></i> Pay Offline</a>
            </li> -->

            <li>
                <a href="my_account.php?edit_act"><i class="fa fa-pencil-square"></i> Edit Account </a>
            </li>
            <li>
                <a href="my_account.php?change_pass"><i class="fa fa-key"></i> Change Password</a>
            </li>

            <!-- <li>
                <a href="my_account.php?delete_ac"><i class="fa fa-trash"></i> Delete Account</a>
            </li> -->
            <!-- <li>
                <a href="my_account.php?pay_offline"><i class="fa fa-user-plus"></i> Logout</a>
            </li> -->
        </ul>

    </div>
</div>