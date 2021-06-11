<!DOCTYPE html>
<html lang="en">

<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/74f8d9aebc.js" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="#" class="navbar-brand"><i class="fas fa-university"></i><b>MIT</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Courses.php">Studen Enrollment </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Register.php">Add Course</a>
      </li>
      
    </ul>
    
  </div>
</nav>

   

<?php if (isset($_POST['form_submitted'])){
//this code is executed when the form is submitted
    //  ?>


    <?php

    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=university", $username, $password);
// set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }




    $roll_no=$_POST['roll_no'];
    $query_1 = $conn->prepare("SELECT * FROM student WHERE roll_no = ? ");
    $query_1->execute([$roll_no]);
    $result=$query_1->fetchAll(PDO::FETCH_ASSOC);
  //  print_r($result);

    $query_2 = $conn->prepare('SELECT course_code,course_name,course_credits from courses where course_code not in (select course_code from register  where roll_no=?)');
    $query_2->execute([$roll_no]);
    $result1=$query_2->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result1);

    $Q3= $conn->prepare('SELECT register.course_code,course_name,course_credits from courses join register on Courses.course_code= register.course_code where register.roll_no = ?');
    $Q3->execute([$roll_no]);
    $result2=$Q3->fetchAll(PDO::FETCH_ASSOC);
   // print_r($result2);


    ?>

    <h1>Student Infomation</h1>

    <table class="table table-white  table-striped">
        <thead class="thead-dark ">
        <tr>
            <th scope="col">Roll No</th>
            <th scope="col">Name</th>
            <th scope="col">Father's Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Contact No</th>
            <th scope="col">Address</th>
        </tr>

        </thead>
        <?php  foreach($result as $key=>$row)


        { ?>
            <tbody>
            <tr>
                <th scope="row"><?php echo $row['roll_no'] ; ?></th>
                <td><?php echo $row['st_name'] ; ?></td>
                <td><?php echo $row['f_name'] ; ?></td>
                <td><?php echo $row['gender'] ; ?></td>
                <td><?php echo $row['contact'] ; ?></td>
                <td><?php echo $row['address'] ; ?></td>

            </tr>
            </tbody>
            <?php
        }?>
    </table>
   
    <h1>Avaiable Courses</h1>
 
    <table class="table table-white  table-striped">
        <thead class="thead-dark ">
        <tr>

            <th scope="col">Course Code</th>
            <th scope="col">Course Name</th>
            <th scope="col">Credits</th>
            <th scope="col">Register</th>

        </tr>

        </thead>
        
        <?php  foreach($result1 as $key=>$row1)
        { ?>
        
            <tbody>
            <tr>
            
            

            

                <td><?php echo $row1['course_code'] ; ?></td>
                <td><?php echo $row1['course_name'] ; ?></td>
                <td><?php echo $row1['course_credits'] ; ?></td>
                <td> <button value="submit" type='submit-course' class='btn btn-primary' name="button" roll_no="<?php echo $roll_no; ?>" code="<?php echo $row1['course_code'] ; ?>" name1="<?php echo $row1['course_name'] ; ?>" cr="<?php echo $row1['course_credits'] ; ?>" id="pop" >Register</button><td>
            </tr>
            
            </tbody>
            
            <?php
        }?>
           

   </table>
   <h1>Registered Courses</h1>

    <table class="table table-white  table-striped">
      <thead class="thead-dark ">
     <tr>

        <th scope="col">Course Code</th>
         <th scope="col">Course Name</th>
        <th scope="col">Credits</th>
        

       </tr>

        </thead>
       <?php  foreach($result2 as $key=>$row2)
    { ?>
         <tbody>
            <tr>

              <td><?php echo $row2['course_code'] ; ?></td>
            <td><?php echo $row2['course_name'] ; ?></td>
              <td><?php echo $row2['course_credits'] ; ?></td>


            </tr>
          </tbody>
            <?php
        }?>
   </table>


    <?php

}

else { ?>



<form action="Courses.php" method="POST">
    <h1>Search Student</h1>
    <form>
        <div class="form-group">
          

            <label>Roll no</label>
        <input type="text" style="width:400px" class="form-control" placeholder="P19-0036" required  name="roll_no" >
            <br>


        </div>
        <input type="hidden" name="form_submitted" value="1" />
        <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
    </form>

   




    <?php } ?>
    
    <script >

    $(document).on("click","#pop", function() {
     var code=$(this).attr("code");
     var name=$(this).attr("name1");
     var cr=$(this).attr("cr");
     var roll_no=$(this).attr("roll_no");
     var fdata={'code':code,'name':name,'credits':cr,'roll_no':roll_no};
        console.log(code+name+cr);
        $.ajax
    ({
        url:"link.php",
        method:"POST",
        data:fdata,
        success:function(data){
            console.log(data);
        }
    })
   
});
   

 
</script>

</body>
</html>