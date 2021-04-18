<html>
<head>
    <title>Inserting data into Themepark table</title>
</head>
<body>
<?php if (isset($_GET['form_submitted'])){
//this code is executed when the form is submitted
    ?>
    <h2> <?php echo $_GET['park_name']; ?> has been submitted</h2>
    <p>Your data have been inserted as
        <?php
        echo $_GET['park_code'] . ' ' . $_GET['park_name']. '  '. $_GET['park_city'] .'  ' .$_GET['park_country'];

        //<?php

        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=localhost;dbname=themepark_online", $username, $password);
// set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $park_code= $_GET['park_code'];
        $park_name=$_GET['park_name'];
        $park_city=$_GET['park_city'];
        $park_country=$_GET['park_country'];


        $conn->query("insert into themepark values ('$park_code','$park_name','$park_city','$park_country')");




      ?>
    </p>

    <p>Go <a href="/q3.php">back</a> to the form</p>
<?php }
else { ?>
    <h2>Inserting Themepark table data</h2>
    <form action="q3.php" method="GET">

        <input type="text" placeholder="Park Code" name="park_code">
        <input type="text" placeholder="Park Name" name="park_name">
        <br>

        <input type="text" placeholder="Park City" name="park_city">
        <input type ="text" placeholder="Park Country" name="park_country">
        <br>
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" value="Submit">
    </form>
<?php } ?>
</body>
</html>

