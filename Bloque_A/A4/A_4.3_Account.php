<?php
class Account{
    public int $numero;
    public string $tipo;
    protected float $balance;
    // Agregar nuevas propiedades
    protected string $owner; //Nombre del propietario de la cuenta

    public function __construct(string $owner,int $numero,string $tipo,float $balance=0.00){
        $this->owner=$owner;
        $this->numero = $numero;
        $this->tipo= $tipo;
        $this->balance = $balance;
    }
    // Metodos publicos
    public function getBalance(): float{
        return $this->balance;
    }
    public function getOwner():string{
        return $this->owner;
    }
    public function setOwner(string $nombre):string{
        $this->owner = $nombre;
    }
    // Funciones de calculo
    public function deposit(float $amount): float{
        $this->balance += $amount;
        return $this->balance;
    }
    public function withdraw(float $amount): float{
        $this->balance -= $amount;
        return $this->balance;
    }
    
}
// Instanciaciones
$checking = new Account('Ana',43161176,'Cheking',32.00);
$saving = new Account('Paco',20148896,'Saving',756.00);
$account= new Account('Pepe',20154875,'Saving',80.00);
?>
<?php include 'includes/header.php'; ?>
<h2><?= $account->tipo?>Account</h2>
<!-- Llamamos al nombre -->
    <p>Nombre: <?= $account->getOwner()?></p>
    <p>Previous Balance $<?= $account->getBalance()?></p>
    <p>Previous Balance $<?= $account->deposit(35.00)?></p>
<?php include 'includes/footer.php'; ?>