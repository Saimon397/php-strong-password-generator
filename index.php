<?php
session_start();
include __DIR__ . '/functions/functions.php';
$elements = [
    'alphabet' => 'ABCDEFGHIJKLMNOPQRSTUVWYZabcdefghijklmnopqrstuvwyz',
    'numbers' => '0123456789',
    'symbols' => '\|!"$%&/()=?^*.;,-_#@][><'
];
$password = '';
if (isset($_POST['numcar']) && !empty($_POST['numcar'])) {
    $length = $_POST['numcar'];
    $summ = $elements['alphabet'] . $elements['numbers'] . $elements['symbols'];
    $summ = str_shuffle($summ);
    while (strlen($password) < $length) {
        $password .= getRandomPsw($summ);
    }
    $password = str_shuffle($password);
    $_SESSION['password'] = $password;
    header('Location: ./passwordpage.php');
};
//var_dump($password)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;700&display=swap" rel="stylesheet">
    <title>PHP Strong Password Generator</title>
</head>

<body>
    <form action="index.php" method="POST">
        <div class="container d-flex justify-content-center card">
            <label for="" class="form-label text-uppercase text-white fs-1 fw-bold">Password Generator:</label>
            <input type="number" class="text-center border rounded mt-2" name="numcar" placeholder="Choose the length...">
            <button type="submit" class="btn btn-light mt-4 mb-4"><i class="fa-brands fa-php fa-flip" style="--fa-animation-duration: 3s;"></i></button>
        </div>
    </form>
</body>

</html>