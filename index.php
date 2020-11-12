<?php
//connect to database
$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninja_pizza');
//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//write a query for all pizza
$sql = 'SELECT title, ingredients, id FROM pizzas';

//make a query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting row as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free it after the query from memory
mysqli_free_result($result);

//closing connection
mysqli_close($conn);
print_r($pizzas);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

    <?php include('header.php'); ?>
    <?php include('footer.php'); ?>

</html>