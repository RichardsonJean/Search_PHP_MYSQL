<?php
$title="Search";
include("header.php");
?>
<form>
      <input type = "text" name ="search" placeholder="Search"/>
      <input type= "submit" value = ">>"/>


     </form>
    
    

<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $databaseName = 'mockdata';

    $connection = mysqli_connect($serverName, $userName, $password, 
    $databaseName);
    if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
    }
    //echo "Connected Successfully!! <br>";
    $output = '';
    if (isset($_GET['search'])) {
    $searchq = $_GET['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

    $query = "SELECT * from customers WHERE first_name LIKE '%$searchq%'OR "."last_name LIKE '%$searchq%'";
    
    $result = mysqli_query($connection, $query);

    if (!$result) { 
        die('failed: ' . mysqli_error($connection));
    } else {
        $count = mysqli_num_rows($result); // check the result count
        if ($count == 0) {
        echo 'No search results';
        } else {
    ?>
          <table>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>State</th>
                <?php
                    while ($row = mysqli_fetch_array($result)) { 
                        $firstname = $row['first_name'];
                        $lastname = $row['last_name'];
                        $id = $row['id'];
                        $city = $row['city'];
                        $state = $row['state'];
                       
                ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $firstname;?></td>
                                <td><?php echo $lastname;?></td>
                                <td><?php echo $city;?></td>
                                <td><?php echo $state;?></td>
                                
                            </tr>
                   
                <?php
                
            }
            ?>
            </tr>
                            
            </table>
             <?php  
            
        }

    }
    
} 
    include("footer.php");
?>
