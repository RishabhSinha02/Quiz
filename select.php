<?php
error_reporting(E_ERROR | E_PARSE);
if ($_POST['email']) {
    $email = $_POST['email'];
//    View Modal content


echo '
<div class="row">
            
            <table class="table table-hover table-primary table-striped" id="mytable">
      <thead>
        <tr class="table-secondary">
          <th width= "40%" scope="col">
            <center>Email.</center>
          </th>
          <th scope="col">'.$email.'</th>
        </tr>
      </thead>
      </table>

    <table class="table table-hover table-primary table-striped" id="mytable">
      <thead>
        <tr class="table-success">
          <th width= "15%">
            <center>Sr. No</center>
          </th>
          <th width= "25%" scope="col">Title</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody>
        ';

        include "Partial/dpconnect.php";
        $sql = "SELECT * FROM `notes` WHERE `notes`.`email` = '$email'";
        $result = mysqli_query($conn, $sql);
        $sno = 0;
        while($row = mysqli_fetch_assoc($result)){
            $sno+=1;
            echo "<tr>
            <th scope='row'><center>$sno</center></th>
            <td>" . $row['title'] . "</td>
            <td>" . $row['description'] . "</td>
              </tr>";
            }

        echo '
      </tbody>
    </table>


';
}
?>