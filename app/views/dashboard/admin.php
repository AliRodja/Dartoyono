<h1>Welcome, Admin <?= $_SESSION['user']['full_name'] ?>!</h1>
<img src="<?= $_SESSION['user']['profile_photo'] ?>" width="100">
<a href="/logout">Logout</a>
