<nav>
    <div id="wrapper">
        <div class="menu-container">
            <div class="logo"><a href="">MuleTunes</a></div>
            <div class="Menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="profile.php">About Us</a></li>
                    <li><a href="store.php">Store</a></li>
                    <li>
                        <?php
                        // Cek apakah pengguna sudah login
                        if (isset($_SESSION['pelanggan'])) {
                            // Tampilkan tombol logout jika pengguna sudah login
                            echo "<a href='checkout.php'>Checkout</a>";
                            echo "<a href='logout.php' class='tbl-abu' onclick='return confirm(`Yakin mau log out?`)'>Logout</a>";
                        } else {
                            // Tampilkan tombol login jika pengguna belum login
                            echo "<a href='login.php' class='tbl-abu'>Login</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>