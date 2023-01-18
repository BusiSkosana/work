<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include './connection.php';

?>


<h1>Search record using ID</h1>
<link rel="main" href="main.php" >

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
    
if (isset($_POST['submit']))
{
    $search = $_POST['search'];
    
    
$select = "SELECT * FROM `add_record` WHERE Suspect ID = '$id_num' && First name = '$name' && Last name = '$last' ";
$query = mysqli_query($conn, $select);
if ($query)
{
    $row = mysqli_num_rows($query);
    $count = mysqli_fetch_assoc($row);
            
    if($count == 1)
    {
        
    }
    
    
}
else 
{
    echo 'failed';
}
}
?>