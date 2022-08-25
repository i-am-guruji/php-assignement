<?php

    include("connect.php");

    if(isset($_POST['btnorder']))
    {
        $itemname=$_POST['txtitemname'];
        $itemtype=$_POST['txtitemtype'];
        $quantity=$_POST['txtitemquentity'];

        $insert="insert into practical_first(itemname,itemtype,quantity)values('$itemname',
        '$itemtype','$quantity')";

        mysqli_query($connect,$insert) or die(mysqli_error());
        echo "Order Successfully";

    }
?>

<html>
    <head>
        <title>Customer placing Order</title>
    </head>
    <body>
        <center>
            <h2>Customer place Order</h2>
            <form name="form1" method="POST" action="">
            <table>
                    <tr>
                        <td>Enter Item Name:</td>
                        <td><input type="text" name="txtitemname"></td>
                    </tr>
                    <tr>
                        <td>Enter Item Type:</td>
                        <td><input type="text" name="txtitemtype"></td>
                    </tr>
                    <tr>
                        <td>Enter Item Quentity:</td>
                        <td><input type="number" name="txtitemquentity"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnorder" value="Order Now"></td>
                    </tr>
                </table>
                <br/>

                <table border=3>
                    
                    <tr>
                        <th>Order No</th>
                        <th>Item Name</th>
                        <th>Item Type</th>
                        <th>Item Quentity</th>
                    </tr>

                    <?php

                        $select="select * from practical_first order by orderno	desc";
                        $result=mysqli_query($connect,$select);
                        $cnt=mysqli_num_rows($result);
                        echo "Total Order".$cnt;

                        while($row=mysqli_fetch_array($result))
                        {

                    ?>

                    <tr>
                        <td><?php echo $row['orderno'];?></td>
                        <td><?php echo $row['itemname'];?></td>
                        <td><?php echo $row['itemtype'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                    </tr>

                    <?php
                        }
                    ?>


                </table>
            </form>
        </center>
    </body>
</html>