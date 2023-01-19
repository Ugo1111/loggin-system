<?php
// Start the session
session_start();
include('db.php'); 
?>


<?php
if(!isset($_SESSION['UName'])){
    header("location: login.php");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
">
<!-- data table css -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<!-- <script src="js/main.js"></script> -->
</head>
<body>
<?php
 
 // Set session variables
 echo "welcome " . $_SESSION["UName"];
 
  "Session variables are set.";
 ?><div><a href="logout.php">logout</a>
 

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="staffaddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ADD COMPLETED SHIFT</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <!-- form -->
       <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
     
      <!-- INPUT -->
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input type="file" name="fileToUpload" class="form-control" id="fileToUpload" aria-describedby="emailHelp">
    <div id="imageHelp" class="form-text">Properly scanned image of your timesheet .</div>
  </div>
  <!-- BR -->

<!-- INPUT -->
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Carehome</label>
    <input type="text" class="form-control" name="Carehome" id="Carehome" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Name of carehome worked</div>
  </div>
  <!-- BR -->
  <!-- input -->
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Date worked</label>
    <input type="date" class="form-control" name="dateworked" id="dateworked" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Enter the date you worked</div>
  </div>
  <!-- br -->
<!-- input -->
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Hours worked</label>
    <input type="number" class="form-control" name="hours" id="hours" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Enter the number of Hours you worked</div>
  </div>
  <!-- br -->
 <!-- submit button -->
  <!-- <button type="submit" value="Upload Image" name="submit" class="btn btn-primary">Submit</button> -->
  <!-- br -->
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="Upload Image" name="submit" class="btn btn-primary">Submit</button>
      </div></form>
    </div>
  </div>
</div>


<div class="container">
  <div class="jumbotron">
    <div class="card">
<h2>ROTA</h2>
    </div>
    <div class="card">
  <div class="card-body">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staffaddModal">
ADD DATA
</button> </div>
  </div>
</div></div>

<?php
    $sql = "SELECT users.id, images.picture, images.carehome, images.dateworked, images.hours
    FROM images
    INNER JOIN users ON
     images.users_id = users.id WHERE 
     users.UName ='" . $_SESSION['UName'] . "'";
$result = $conn->query($sql);

  // echo "invalid credentials";
  echo "Error: " . $sql . "<br>" . $conn->error;

?>
<!-- DATA TABLE       DATA TABLE         DATA TABLE -->
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                
              <th>id</th>
              <th>Carehome</th>
              <th>dateworked</th>
              <th>hours</th>
              <th>picture</th>
              <th>action</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
while($row = $result->fetch_assoc()): ?>
            <tr>
              <td> <?php echo  $row['id']; ?>  </td>
              <td> <?php echo  $row['carehome']; ?>  </td>
              <td> <?php echo  $row['dateworked']; ?>  </td>
              <td> <?php echo  $row['hours']; ?>  </td>
              <td> <?php echo  $row['picture']; ?>  hhh</td>
              <td> 
              
<a href="upload.php?delete=<?php echo $row['id']; ?>"
    class="btn btn-danger" >Delete</a>

              </td>
  
              
            
            
            
            
            
              </tr>
       
              <?php endwhile;
?>
        </tbody>
        <tfoot>
            <tr>
            <th>id</th>
            <th>Carehome</th>
              <th>dateworked</th>
              <th>hours</th>
              <th>picture</th>
              <th>action</th>
                
              
            </tr>
            </tr>

        </tfoot>
    </table>









    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  

    <script>
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>

<!-- close only this -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<!-- verry important for the modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>
</body>
</html>