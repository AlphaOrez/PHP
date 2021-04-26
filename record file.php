<html>
<head>
    <title> </title>
</head>
<body>
<?php if (isset($_POST['form_submitted'])){
//this code is executed when the form is submitted
  //  ?>


        <?php

        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=localhost;dbname=nutec", $username, $password);
// set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $type=$_POST['type'];
        $data=$_POST['data'];


    $query_1 = $conn->prepare("select * from registrations where $type=?");
    $query_1->execute([$data]);
    $result=$query_1->fetchAll(PDO::FETCH_ASSOC);



        ?>
    </p>
    <h1>Nutec 21 Event record</h1>
<table border="10" style="border-radius: 10px; background-color: aquamarine; border-color: #FF0099 ">
    <thead>
    <tr>
        <th>Roll No &emsp;&emsp; </th>
        <th>Name&emsp;&emsp;  </th>
        <th>Email ID &emsp;&emsp; </th>
        <th>Department &emsp;&emsp; </th>
        <th>Event &emsp;&emsp;  </th>
    </tr>

    </thead>


    <tbody>
    <?php
    foreach($result as $key=>$value)
    {
        echo '<tr>
       <td>'.$value["roll_no"].'</td>
       <td>'.$value["name"].'</td>
       <td>'.$value["email"].'</td>
       <td>'.$value["department"].'</td>
       <td>'.$value["choose_event"].'</td>



       </tr>';
    }


    ?>

    </tbody>
    </table>

<?php

}

else { ?>
    <h2>Nutec 21 Event record</h2>

    <form action="nutec2.php" method="post">


        <label style="font-family:Calibr " for="Type">Type&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
        <select name="type" id="type" required  style="padding: 10px; width: 612px;border-radius: 10px; background-color: aliceblue ">

            <option value="Select">Select</option>}
            <option value="roll_no">Roll no</option>
            <option value="email">Email</option>
            <option value="name">Name</option>
            <option value="choose_event">Event</option>
            <option value="department">Department</option>
        </select>
        <br>
        <br>
        <label style="font-family:Calibri" for="Search data">Search&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</label>
        <input type="text" name="data" required  size="80"  style="padding: 10px ;border-radius: 10px; background-color: whitesmoke "" >

        <br>
        <br>
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" value="Submit" required style="font-family: Calibri; background-color: #1883ba; padding: 10px 20px;
         border-radius: 10px ">
    </form>
<?php } ?>
</body>
</html>

