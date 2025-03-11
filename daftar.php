
<link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <title>Daftar</title>
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
    margin: 10px 0px 10px 0px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    text-align: justify;
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
        padding : 20px;
        background-color: #F44336;
        color: #ffff;
        margin-bottom: 15px;
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
</head>

<script>
    function toUpperCaseInput() {
            const input = document.getElementById("namaupper");
            input.value = input.value.toUpperCase();
        }
        function toLowerCaseInput() {
            const input = document.getElementById("usernamelower");
            input.value = input.value.toLowerCase();
        }
        const password = document.getElementById('password');
        const passwordStrengthText = document.getElementById('passwordStrenghth');

        passwordInput.addEventListener('input', function(){
            const password = passwordInput.value;
            const regex    = /^(?=.*[a-zA-Z])(?=.*\d) [a-zA-Z\d]+$/;

            if (regex.test(password)) {
                if(password.lenght >= 6 ) {
                    passwordStrengthText.textContent = 'Password Kuat';
                    passwordStrengthText.style.color = 'green';
                } else {
                    passwordStrengthText.textContent = 'Password lemah (minimal 6 karakter)';
                    passwordStrengthText.style.color = 'orange';
                }
                }else {
                    passwordStrengthText.textContent = 'Password harus terdiri dari huruf dan angka';
                    passwordStrengthText.style.color = 'red';
                }
            });
</script>
<?php
 include 'db.php';

        $email               = '';
        $username            = '';
        $err                 = '';
        $sukses              = '';
        $nama_lengkap        = '';
        $alamat              = '';

    if(isset($_POST['btn_submit'])) {
        $username            = strtolower($_POST['username']);
        $email               = $_POST['email'];
        $password            = $_POST['password'];
        $konfirmasi_password = $_POST['konfirmasi_password'];
        $alamat              = $_POST['alamat'];
        $nama_lengkap        = strtoupper($_POST['nama_lengkap']);
        

    if ($username == '' or $password == '' or $email == '' or $konfirmasi_password == '' or $nama_lengkap == '' or $alamat == '') {
        $err .= "<li>Silakan isi data yang masih kosong.</li>";
    }
    
    //cek panjang karakter penulisan nama_lengkap
    if(strlen($nama_lengkap) < 3 || strlen($nama_lengkap) > 50) {
        $err .= "<li>Panjang minimal nama lengkap 3 karakter dan maksimal 50 karakter</li>";
    }if(preg_match("/^[A-Z ]+$/",$nama_lengkap)){
        $sukses .= "<li>Nama user Valid: </li> " . $nama_lengkap;
    }else {
        $err .= "<li>Nama lengkap tidak valid </li>";
    }

    //cek panjang karakter penulisan username
    
    if(strlen($username) < 4 || strlen($username) >20) {
        $err .= "<li>Panjang minimal username 4 karakter dan maksimal 20 karakter </li>";
    }

    //cek penggunaan uppercase/lowercase serta pemakaian angka dan simbol
    if(preg_match("/^[a-z]+$/",$username)){
        $sukses .= "<li>Username Valid: </li>" . $username;
    }else {
        $err .= "<li>Username tidak valid! Gunakan huruf kecil semua tanpa nomor dan angka </li>";
    }

    //cek bila ada username yang sama
    if($username != '') {
        $sql1  = "select email from pelanggan where username = '$username'";
        $q1    = mysqli_query($conn,$sql1);
        $n1    = mysqli_num_rows($q1);
    if ($n1 >0) {
        $err .= "<li>Username yang kamu masukan sudah terdaftar </li>";
    }

    }
    //cek bila ada email yang sama
        if($email != '') {
            $sql1  = "select email from pelanggan where email = '$email'";
            $q1    = mysqli_query($conn, $sql1);
            $n1    = mysqli_num_rows($q1);
        if ($n1 >0) {
            $err .= "<li>Email yang kamu masukan sudah terdaftar </li>";
        }
    
    //validasi email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err .= "<li>Email yang kamu masukan tidak valid. </li>";
        }
    }

    //cek kesesuaian password & konfirmasi password
        if($password != $konfirmasi_password) {
            $err .="<li>Password dan konfirmasi password tidak sesuai. </li>";
        }
        if (preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/", $password)){
            if(strlen($password) >= 6 || strlen($password) >20) {
                $sukses .= " Password valid dan kuat";              
            } else {
                $err .= "<li>Panjang minimal password 6 karakter dan maksimal 20 karakter </li>";               
            } 
            } else {
                $err .= "<li>Password tidak valid harus mengandung huruf, angka dan tanpa simbol </li>";
            }

        if(empty($err)) {
            $sql1   = "insert into pelanggan (username, email, nama, password, alamat) values ('$username','$email','$nama_lengkap',md5('$password'),'$alamat')";
            $q1     = mysqli_query($conn,$sql1);
            if($q1){
                $sukses = "Proses Berhasil.";

            }
        }
    }   
?>
    <div class="login-container">
        <h2>Daftar</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method=post>
        <table>
            <tr>
                <td class="label" style="color:#000000;">Nama Lengkap</td>
                <td class=""><input type="text" id="namaupper" placeholder="Nama Lengkap" class="form-control mb-2" name="nama_lengkap" oninput="toUpperCaseInput()" pattern="^[A-Z ]+$" value="<?= $nama_lengkap ?>"></td>
            </tr> 
            <tr>
                <td class="label" style="color:#000000;">Username</td>
                <td class=""><input type="text" id="usernamelower" placeholder="Username" class="form-control mb-2" name="username" oninput="toLowerCaseInput()" pattern="^[a-z]+$" value="<?= $username ?>" required></td>
            </tr> 
            <tr>
                <td class="label" style="color:#000000;">Email</td>
                <td class=""><input type="text" placeholder="Email" class="form-control mb-2" name="email" value="<?= $email ?>"></td>
            </tr> 
            <tr>
                <td class="label" style="color:#000000;">Password</td>
                <td class=""><input id="password" type="password" placeholder="Password" class="form-control mb-2" name="password" required></td>
                <div id="passwordStrength"></div>
            </tr>
            <tr>
                <td class="label" style="color:#000000;">Konfirmasi Password</td>
                <td class=""><input type="password" placeholder="Password" class="form-control mb-2" name="konfirmasi_password" required ></td>
            </tr>
            <tr>
                <td class="label" style="color:#000000;">Alamat</td>
                <td class=""><input type="text" id="alamat" placeholder="Alamat" class="form-control mb-2" name="alamat" value="<?= $alamat ?>"></td>
            </tr> 
            <tr>
                <td><hr>Sudah punya akun ? <a href="login.php" style="color :#2196F3;">Login</a></td>
                
            </tr>
        </table>    
            <button class="btn btn-primary w-100" name="btn_submit">Submit</button>
        </form>
        <?php if ($err) { ?>
        <div class="error">
            <ul><?= $err; ?></ul>
        </div>
    <?php } ?>
    <?php if ($sukses) { ?>
        <div class="sukses">
            <ul><?= $sukses; ?></ul>
        </div>
    <?php } ?>
    </div>
