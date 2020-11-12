<?php
//connect to database
$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninja_pizza');
//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

//write a query for all pizza
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at'; //we added order by to arrange the array according to when its created

//make a query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting row as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free it after the query from memory
mysqli_free_result($result);

//closing connection
mysqli_close($conn);

//deleted the "print_r($pizzas);" because we dont need it anymore. We just run it for test if our query $pizzas worked 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

    <?php include('header.php'); ?>

    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
    <div class="row">
        <?php foreach($pizzas as $pizza){ ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing){ ?>
                            <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="card-action right align">
                        <a href="#" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    </div>

    <?php include('footer.php'); ?>

</html>