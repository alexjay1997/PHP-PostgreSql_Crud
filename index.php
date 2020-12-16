<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php with postgresql</title>
</head>
<body>
    <h1>PHP PostgreSql</h1>
        <form method="POST" action="">
            
            <input type="text" name="fname" placeholder="firstname"><br><br>
            <input type="text" name="lname" placeholder="lastname"><br><br>
            <input type="text" name="username" placeholder="username"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="submit" name="btn-reg" value="submit"><br><br>
        </form>
</body>
</html>

<?php
$db = pg_connect("host=localhost port=5432 dbname=my_postgreDb1 user=postgres password=123");

if(isset($_POST['btn-reg'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['username'];
$pass=$_POST['password'];

$query="INSERT INTO tbl_users (fname,lname,username,password) values ('$fname','$lname','$uname','$pass')";
$result= pg_query($query);

if($result==true){

echo"successfully inserted new data!";


}
else{

    echo "error insert!!!!";
}
}

$query_select_all = "SELECT * from tbl_users";
$result=pg_query($query_select_all);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php_porstgresql_crud</title>
</head>
<body>
    <table>
        <tr>
            <th>Firstname</th> 
             <th>Laststname</th>
             <th>Username</th>
             <th>Password</th>
        </tr>
        <?php
        while($row= pg_fetch_array($result)){
            ?>
        <tr>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['password'];?></td>
        </tr>
       <?php }?>
    </table>
</body>
</html>