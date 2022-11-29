<?php
session_start();
include __DIR__ . '/functions/functions.php';
$elements = [
    'alphabet' => 'ABCDEFGHIJKLMNOPQRSTUVWYZabcdefghijklmnopqrstuvwyz',
    'numbers' => '0123456789',
    'symbols' => '\|!"$%&/()=?^*.;,-_#@][><'
];
$password = '';
if (isset($_GET['numcar']) && !empty($_GET['numcar'])) {
    $length = $_GET['numcar'];
    $summ = $elements['alphabet'] . $elements['numbers'] . $elements['symbols'];
    $summ = str_shuffle($summ);
    while (strlen($password) < $length) {
        $password .= getRandomPsw($summ);
    }
    $password = str_shuffle($password);
    $_SESSION['password'] = $password;
    header('Location: ./passwordpage.php');
};
var_dump($password)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <title>PHP Strong Password Generator</title>
</head>

<body>
    <form action="index.php" method="GET">
        <div class="mt-5 container d-flex justify-content-center">
            <label for="" class="form-label text-uppercase fs-1 fw-bold me-3">Password Generator:</label>
            <input type="number" class="text-center border rounded" name="numcar" placeholder="Choose the length...">
            <button type="submit" class="btn btn-dark ms-3">Send</button>
        </div>
    </form>
</body>

</html>