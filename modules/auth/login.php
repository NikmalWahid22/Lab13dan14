\<div class="login-wrapper">
    <div class="login-card">
        <h2>Login</h2>

        <form method="post">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" name="login">Masuk</button>
        </form>

        <p>Masukkan username & password dengan benar</p>
    </div>
</div>

<?php

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "admin") {

        // set session login
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        echo "<script>alert('Login berhasil'); window.location='index.php?page=dashboard';</script>";
        exit;

    } else {
        echo "<script>alert('Username/Password salah');</script>";
    }
}
?>
