<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->

    <title>Residents</title>
    <link rel="stylesheet" href="Residents.css">
    <script src="https://kit.fontawesome.com/1ff714dd73.js" crossorigin="anonymous"></script>
    <style>
        /*.table table-bordered table-striped {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          background-color: rgba(255, 254, 254, 0.26);
          margin-left: auto;
          margin-right: auto;
        }
        td, th {
          border: 1px solid #2e2e2e;
          text-align: left;
          padding: 8px;
          font-size: large;
          text-align: center;
          
        }*/
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          background-color: rgba(255, 254, 254, 0.5);
        }

        table, th, td {    
            border: 1px solid black;  
            margin-left: auto;  
            margin-right: auto;  
            border-collapse: collapse;    
            width: 1500px;  
            text-align: center;  
            font-size: 20px;  
            
        }    
        .card-header {
            text-align: cenetr;
        }
        
        .button {
            background-color: green;
            border: none;
            color: white;
            padding: 9px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            cursor: pointer;
        }
        .button1 {
            background-color: blue;
            border: none;
            color: white;
            padding: 9px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            cursor: pointer;
        }
        .button2 {
            background-color: red;
            border: none;
            color: white;
            padding: 9px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            cursor: pointer;
        }
        .resident {
            background-color: orange;
            border: none;
            color: white;
            padding: 9px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            cursor: pointer;
        }
       
    </style>
</head>
<body>
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
<nav>
      <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
        <div class="logo">
            <p>community</p>
        </div>
        <ul>
            <li><a href="First.html">Home</a></li>
            <li><a href="http://localhost/login%20system/Apartment_Website/index.php">Residents</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="http://localhost/login%20system/Apartment_Website/register_form.php" target="_blank">Sign up</a></li>
        </ul>
    </nav>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <br>
                <br><br>
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resident Details    
                            <a href="residents-create.php" class="resident">Add Residents</a>
                        </h2>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                        <colgroup>
    
                            <col span="1" style="visibility: collapse">
                        </colgroup>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>RESIDENT FLAT</th>
                                    <th>RESIDENT NAME</th>
                                    <th>PHONE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM resident";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $resident)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $resident['id']; ?></td>
                                                <td><?= $resident['flat']; ?></td>
                                                <td><?= $resident['name']; ?></td>
                                                <td><?= $resident['phone']; ?></td>
                                                
                                                <td>
                                                    <a href="resident-view.php?id=<?= $resident['id']; ?>" class="button">View</a>
                                                    <a href="resident-edit.php?id=<?= $resident['id']; ?>" class="button1">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_resident" value="<?=$resident['id'];?>" class="button2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>