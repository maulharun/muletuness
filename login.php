<?php
session_start();
include 'db.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <title>Login</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #1b1b1b;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #4d4d4d;
}

.login-container {
    background-color: rgba(255, 255, 255, 0.85);
    padding: 30px;
    border-radius: 20px 20px 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    width: 450px;
    backdrop-filter: blur(10px);
    border: 1px solid #ffe066;
}

.login-container h2 {
    margin-top: 0;
    margin-bottom: 20px;
    text-align: center;
    color: #4d4d4d;
    font-weight: 600;
}

.login-container input[type="text"],
.login-container input[type="password"] {
    width: 100%;
    padding: 12px 15px 12px 15px;
    margin: 10px 0 10px 0px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    color: #4d4d4d;
    background-color: #fff5cc;
    box-sizing: border-box;
}

.login-container input[type="text"]:focus,
.login-container input[type="password"]:focus {
    outline: none;
    border-color: #ffd700;
    box-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
    background-color: #fffae6;
}

.login-container button {
    width: 100%;
    margin : 10px 0px 10px 0px;
    padding: 12px;
    background: linear-gradient(135deg, #ffcc33, #ffb833);
    border: none;
    border-radius: 5px;
    color: #4d4d4d;
    font-size: 18px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.login-container button:hover {
    background: linear-gradient(135deg, #ffb833, #ffcc33);
    transform: scale(1.02);
}

.login-container .error {
    color: #d9534f;
    text-align: center;
    margin-top: 15px;
}

#passwordStrenght {
        margin-top: 10px;
        font-weight: bold;
    }
.error {
    padding: 15px;
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    margin-top: 10px;
    font-size: 14px;
    text-align: left;
}

.sukses {
    padding: 15px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    margin-top: 10px;
    font-size: 14px;
    text-align: left;
}
    </style>
<?php
$id       = '';  
$username = '';
$password = '';
$err      = '';
$sukses   = '';

if (isset($_POST['btn_login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    if ($username == '' || $password == '') {
        $err .= "<li>Silakan isi terlebih dahulu username dan password.</li>";
    } else {
        // Periksa tabel users terlebih dahulu
        $sql1 = "SELECT * FROM users WHERE username = '$username'";
        $q1   = mysqli_query($conn, $sql1);
        $n1   = mysqli_num_rows($q1);
        $r1   = mysqli_fetch_array($q1);

        if ($n1 > 0) { // Jika ditemukan di tabel users
            if ($r1['password'] != md5($password)) {
                $err .= "<li>Password tidak sesuai.</li>";
            }

            if (preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/", $password)) {
                if (strlen($password) >= 6 && strlen($password) <= 20) {
                    $sukses .= "Password valid";
                }
            } else {
                $err .= "<li>Password tidak valid harus mengandung huruf, angka, dan tanpa simbol</li>";
            }

            if (empty($err)) {
                $_SESSION['id'] = $r1['id']; // Simpan ID dari tabel users
                $_SESSION['username'] = $username;

                echo '<script>setTimeout(function() {
                    window.location.href = "admin.php"; }, 1000); 
                </script>';
                
                exit();
            }
        } else {
            // Jika tidak ditemukan di tabel users, periksa tabel pelanggan
            $sql2 = "SELECT * FROM pelanggan WHERE username = '$username'";
            $q2   = mysqli_query($conn, $sql2);
            $n2   = mysqli_num_rows($q2);
            $r2   = mysqli_fetch_assoc($q2); // Gunakan fetch_assoc untuk mengambil data sebagai array asosiatif
        
            if ($n2 > 0) { // Jika ditemukan di tabel pelanggan
                if ($r2['password'] != md5($password)) {
                    $err .= "<li>Password tidak sesuai.</li>";
                }
        
                if (empty($err)) {
                    // Simpan seluruh data pelanggan dalam session
                    $_SESSION['pelanggan'] = $r2;
        
                    echo '<script>setTimeout(function() {
                        window.location.href = "index.php"; }, 1000); 
                    </script>';
                    
                    exit();
                }
            } else {
                $err .= "<li>Akun tidak ditemukan.</li>";
            }
        }
    }
}       

?>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" id="usernamelower" placeholder="Username" class="form-control mb-2" name="username" oninput="toLowerCaseInput()" pattern="^[a-z]+$" value="<?= $username ?>" required><br>
            <input id="password" type="password" placeholder="Password" class="form-control mb-2" name="password" required><br>
            <button type="submit" name="btn_login">Login</button>
        </form>
        <a href="daftar.php"><button>Register</button></a>
    <?php if ($err) { ?>
        <div class="error">
            <ul><?= $err ; ?></ul>
        </div>
    <?php } ?>
    <?php if ($sukses) { ?>
        <div class="sukses">
            <ul><?= $sukses ; ?></ul>
        </div>
    <?php } ?>
    </div>
</body>
</html>
