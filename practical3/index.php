<?php

    include("connect.php");

    if(isset($_POST['btninsert']))
    {
        $rollno=$_POST['txtrollno'];
        $name=$_POST['txtname'];
        $age=$_POST['txtage'];
        $city=$_POST['selcity'];
        $phoneno=$_POST['txtphoneno'];

        $insert="insert into practical_third(rollno,name,age,city,phoneno)values('$rollno',
        '$name','$age','$city','$phoneno')";

        mysqli_query($connect,$insert) or die(mysqli_error());
        echo "record inserted Successfully";

    }

    if(isset($_POST['btnupdate']))
    {
        $rollno=$_POST['txtrollno'];
        $name=$_POST['txtname'];
        $age=$_POST['txtage'];
        $city=$_POST['selcity'];
        $phoneno=$_POST['txtphoneno'];

        $upadet="update practical_third set name='$name',age='$age',city='$city',phoneno='$phoneno'
        where rollno=$rollno";

        mysqli_query($connect,$upadet) or die(mysqli_error());
        echo "record update Successfully";

    }
?>

<html>
    <head>
        <title>Studdent Information</title>
    </head>
    <body>
        <center>
            <h2>Student Infromation</h2>
            <form name="form1" method="POST" action="">
            <table>
                    <tr>
                        <td>Enter Roll No:</td>
                        <td><input type="number" name="txtrollno"></td>
                    </tr>
                    <tr>
                        <td>Enter Name</td>
                        <td><input type="text" name="txtname"></td>
                    </tr>
                    <tr>
                        <td>Enter Age</td>
                        <td><input type="number" name="txtage"></td>
                    </tr>
                    <tr>
                        <td>Select City</td>
                        <td>
                            <select name="selcity">
                                <option value="">--select city--</option>
                                <option value="surat">surat</option>
                                <option value="rajkot">rajkot</option>
                                <option value="gandhinagar">gandhinagar</option>
                                <option value="ahemedabad">ahemedabad</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Enter Phone No:</td>
                        <td><input type="number" name="txtphoneno"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btninsert" value="Insert"></td>
                        <td><input type="submit" name="btnupdate" value="Update"></td>
                    </tr>
                </table>
                <br/>

                <table border=3>
                    
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>Phone No</th>
                    </tr>

                    <?php

                        $select="select * from practical_third order by rollno";
                        $result=mysqli_query($connect,$select);
                        $cnt=mysqli_num_rows($result);
                        echo "Total Order".$cnt;

                        while($row=mysqli_fetch_array($result))
                        {

                    ?>

                    <tr>
                        <td><?php echo $row['rollno'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['age'];?></td>
                        <td><?php echo $row['city'];?></td>
                        <td><?php echo $row['phoneno'];?></td>
                    </tr>

                    <?php
                        }
                    ?>


                </table>
            </form>
        </center>
    </body>
</html>