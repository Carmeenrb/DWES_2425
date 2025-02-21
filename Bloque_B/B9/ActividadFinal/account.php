<?php 
    include 'includes/sessions.php';
    require_login($logged_in);
?>
<?php include 'includes/header-member.php'; ?>
    <h1>My Account</h1>
    <p>Bienvenido <?= $email?></p>

<?php include 'includes/footer.php'; ?>
