<?php
$username = "Ivy";
$user_array = [
    'name' => 'Ivy',
    'age' => 24,
    'active' => true,
];
class User
{
    public $name;
    public $age;
    public $active;
    public function __construct($name, $age, $active)
    {
        $this->name = $name;
        $this->age = $age;
        $this->active = $active;
    }
}
$user_object = new User('Ivy', 24, true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduccion</title>
</head>

<body>
    <pre>Scalar: <?php var_dump($username) ?></pre>
    <pre>Array: <?php var_dump($username) ?></pre>
    <pre>Objet: <?php var_dump($username) ?></pre>
</body>

</html>