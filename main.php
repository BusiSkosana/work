<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Record suspect</title>
  </head>
  <body>
      
    <form action="" method="post">
      <table>
        <h1>record suspect</h1>
        <tr>
          <td>Suspect ID</td>
          <td> <input type="text" name="id_num" placeholder="ID Number" required></td>
        </tr>
        <tr>
          <td>First name</td>
          <td><input type="text" name="F_name" placeholder="First name" required></td>
        </tr>
        <tr>
          <td>Last name</td>
          <td><input type="text" name="L_name" placeholder="Last name" required></td>
        </tr>
        <tr>
          <td><input type="submit" name="record" value="Submit"></td>
        </tr>
      </table>
    </form>
  </body>

<?php
include './connection.php';
if (isset($_POST['record'])) {
  $id_num = $_POST['id_num'];
  $name = $_POST['F_name'];
  $last = $_POST['L_name'];
 

  
  $match = preg_match("/^[0-9]{2}[0-1][0-9][0-3][0-9]/", $id_num);
  if(!$match)
  {
      echo 'incorrect format';
  }
  else 
  {
  //insert records to table
  $insert = "INSERT INTO `add_record`(`Suspect ID`, `First name`, `Last name`) VALUES ('$id_num' ,'$name', '$last')";
  $sqli = mysqli_query($conn, $insert);
  if($sqli)
  {
     echo "Adding new record is successful.";
  
      ?>
<form action="search.php" method="POST">
<br/><input type="submit" name="button" value="Search record by ID">
</form>
<?php
//Search using ID

if(isset($_POST['button']))
{
    header('Location:search.php');
?>

    <h1>Search record using ID</h1>


    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <input type="text" name="search" placeholder="Search by ID">  
                </td>
                <td>
                    <input type="submit" name="submit" value="Search">
                </td>
            </tr>
        </table>
    </form>
    <?php
}?>
<?php 

}
  
  }
//create search platform
if (isset($_POST['submit']))
{
    $id_num = $_POST['id_num'];
  $name = $_POST['F_name'];
  $last = $_POST['L_name'];
    $search = $_POST['search'];
    
$select = "SELECT * FROM `add_record` WHERE Suspect ID = '$id_num' && First name = '$name' && Last name = '$last'";
$query = mysqli_query($conn,$select);
if ($query)
{
    echo 'success';
}
else 
{
    echo 'failed to select';
}
?>



<?php
}
}
  

 ?>
