<?php
declare(strict_types = 1);

class Account{
    // Variables
    public int $number;
    public string $type;
    public float $balance;
// Constructor
    function _construct(int $number,string $type,float $balance=0.00){
        $this ->number = $number;
        $this ->type = $type;
        $this ->balance = $balance;

    }

    // Funciones de calculo
    // Funcion de ingresar
    public function deposit(float $amount):float{
        $this ->balance += $amount;
        return $this ->balance;
    }
    // Fincion de sacar
    public function withdraw(float $amount):float{
        $this ->balance -= $amount;
        return $this ->balance;
    }  
}
// Estancia
$checking = new Account(43161176,'Checking',32.00);
$checking = new Account(20148896,'Saving',756.00);
?>
<?php include 'includes/header.php'; ?>
<h2>Account Balances</h2>
<table>
    <tr>
        <th>Date</th>
        <th><?= $checking->type ?></th>
        <th><?= $savings->type  ?></th>
    </tr>
    <tr>
        <td>23 June</td>
        <td>$<?= $checking->balance ?></td>
        <td>$<?= $savings->balance  ?></td>
    </tr>
    <tr>
        <td>24 June</td>
        <td>$<?= $checking->deposit(12.00)  ?></td>
        <td>$<?= $savings->withdraw(100.00) ?></td>
    </tr>
    <tr>
        <td>25 June</td>
        <td>$<?= $checking->withdraw(5.00) ?></td>
        <td>$<?= $savings->deposit(300.00) ?></td>
    </tr>
</table>
<?php include 'includes/footer.php'; ?>