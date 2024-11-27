<?php
class Customer
{
    public string $forename;
    public string $surname;
    public string $email;
    public string $password;
}

class Account
{
    public int    $number;
    public string $type;
    public float  $balance;
}

$customer = new Customer();
$account  = new Account();
$customer->email  = 'ivy@eg.link';
$account->balance = 1000.00;
// Establecer el nombre y el apellido
$customer ->forename = 'Jesus';
$customer ->surename = 'Pavon Perez';

?>
<?php include 'includes/header.php'; ?>
<!-- Mostrar el nombre y los apellidos -->
    <p>Nombre: <?= $customer->forename ?></p>
    <p>Apellidos: <?= $customer->surname?></p>
    <p>Email: <?= $customer->email ?></p>
    <p>Balance: $<?= $account->balance ?></p>
<?php include 'includes/footer.php'; ?>
