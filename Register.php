<html>
<head>
    <title>Inserting data into registration table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/74f8d9aebc.js" crossorigin="anonymous"></script>
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
    ?>

    <p>Your data have been inserted as
        <?php

       


        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=localhost;dbname=university", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $course_code=$_POST['course_code'];
        $course_name= $_POST['course_name'];
        $course_credits=$_POST['course_credits'];



        $conn->query("insert into courses values ('$course_code','$course_name','$course_credits')");


        ?>
    </p>

    <p>Go <a href="/Register.php">back</a> to the form</p>
<?php }
else { ?>
    <h2>Course registration form</h2>

    <form action="Register.php" method="post">

     
        <div class="row g-3">
    <label>Course code</label>
    <input type="text" style="width:400px" class="form-control" placeholder="EE123" required  name="course_code" >
    
  </div>
        <br>
        <label>Course name</label>
        <input type="text" style="width:400px" class="form-control" placeholder="DATABASE" required  name="course_name" >
        <br>

        <label>Course credit</label>
        <input type="text" style="width:400px" class="form-control" placeholder="3" required  name="course_credits" >
        <br>

        <input type="hidden" name="form_submitted" value="1" />
        <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
<?php } ?>
</body>
</html>

