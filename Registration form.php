<html>
<head>
    <title>Inserting data into registration table</title>
</head>
<body>
<?php if (isset($_POST['form_submitted'])){
//this code is executed when the form is submitted
    ?>
    <h2> <?php echo $_POST['roll_no']; ?> has been submitted</h2>
    <p>Your data have been inserted as
        <?php

        echo $_POST['name'];


        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=localhost;dbname=nutec", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $name= $_POST['name'];
        $roll_no=$_POST['roll_no'];
        $email=$_POST['email'];
        $department = $_POST['department'];
        $choose_event = $_POST['choose_event'];

        echo $department;
        echo $choose_event;


        $conn->query("insert into registrations values ('$roll_no','$name','$email','$department','$choose_event')");


        ?>
    </p>

    <p>Go <a href="/registration.php">back</a> to the form</p>
<?php }
else { ?>
    <h2>Nutec 21 registration form</h2>

    <form action="registration.php" method="post">

        Roll no:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;<input type="text" placeholder="P190036" required  name="roll_no" style="padding: 10px; width: 612px;border-radius: 10px ; background-color: whitesmoke" required >
        <br>
        <br>
        Name:&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;<input type="text" placeholder="ABDULLAH" required name="name" style="padding: 10px; width: 612px;border-radius: 10px ;background-color: whitesmoke" " required >
        <br>
        <br>

        Email:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;;<input type="text"  placeholder="P190036@NU.EDU.PK" required  name="email" style="padding: 10px; width: 612px;border-radius: 10px ;background-color: whitesmoke"" required >
        <br>
        <br>
        Department  :
        &emsp;&emsp;&emsp;&emsp;&nbsp;
        <select name="department"  style="padding: 10px; width: 612px;border-radius: 10px ; background-color: aqua" required >

            <option value="Select">Select</option>}
            <option value="computer science"> Computer science</option>
            <option value="arts">Arts</option>
            <option value="electrical">Electrical</option>
        </select>
        <br>
        <br>
        Choose Event:
        &emsp;&emsp;&emsp;&ensp;
        <select name="choose_event" style="padding: 10px; width: 612px;border-radius: 10px ; background-color: plum "   required>
            <option value="select">select</option>
            <option value="Speed programing">Speed Programing</option>
            <option value="Chess">Chess</option>
            <option value="music">music</option>

        </select>

        <br>
        <br>
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" value="Submit" required style="font-family: Calibri; background-color: #1883ba; padding: 10px 20px;
         border-radius: 10px ">
    </form>
<?php } ?>
</body>
</html>

