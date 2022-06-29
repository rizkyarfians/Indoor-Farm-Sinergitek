<div class="container">
    <h1>Sign Up</h1>
    <?php Flasher::flash(); ?>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Sign Up</button>
        <p><a href="<?= URLBASE;?>/login"><strong>Login Disini</strong></a></p>
    </form>
</div>