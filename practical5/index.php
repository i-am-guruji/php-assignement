<?php
 include("connect.php");
?>
<html>
<head>
    <title>Question - 5</title>
</head>
<body>
    <center>
        <h1> Question - 5</h1>
    <form name="form" method="POST" action="">
    <table>
        <tr>
            <td> Enter No of Product :- :- </td>
            <td> <input type="number" name="productno" placeholder="No of Product"></td>
        </tr>
        <tr>
            <td> Enter Company Name :- :- </td>
            <td> <input type="text" name="companyname" placeholder="Company"></td>
        </tr>
        <tr>
            <td> Enter Model Name :- </td>
            <td> <input type="text" name="model" placeholder="Model"></td>
        </tr>
        <tr>
            <td> Enter price :- </td>
            <td> <input type="number" name="price" placeholder="Price"></td>
        </tr>
    </table>
    <table>
        <tr>
        <br><td> <input type="submit" name="insert" value="Insert">
            <input type="submit" name="delete" value="Delete">
            <input type="submit" name="search" value="Search">
        </td>
        </tr>
    </table>
    </form>
 <br>
    <table border="3">
        <tr>
            <th>No of Product</th>
            <th>Company Name</th>
            <th>Model Name</th>
            <th>Price</th>
        </tr>
    <?php
    if(isset($_POST['search']))
    {
        $price=$_POST['price'];
        $res= mysqli_query($connect,"select * from practical_fifth where price='$price'");
        while($row=mysqli_fetch_array($res))
        {
        echo "<tr>";
        echo "<td>"; echo $row["productno"]; echo "</td>";
        echo "<td>"; echo $row["companyname"]; echo "</td>";
        echo "<td>"; echo $row["model"]; echo "</td>";
        echo "<td>"; echo $row["price"]; echo "</td>";
        echo "</tr>";
        }
    }else
    {
        $res= mysqli_query($connect,"select * from practical_fifth");
        while($row=mysqli_fetch_array($res))
        {
        echo "<tr>";
        echo "<td>"; echo $row["productno"]; echo "</td>";
        echo "<td>"; echo $row["companyname"]; echo "</td>";
        echo "<td>"; echo $row["model"]; echo "</td>";
        echo "<td>"; echo $row["price"]; echo "</td>";
        echo "</tr>";
        }
    }
    if(isset($_POST['insert']))
    {
        $productNo=$_POST['productno'];
        $companyname=$_POST['companyname'];
        $model=$_POST['model'];
        $price=$_POST['price'];

        if($productNo!="" && $companyname!="" && $model!="" && $price!="")
        {
            $querry = "insert into practical_fifth values('$productNo','$companyname','$model','$price')";
            mysqli_query($connect,$querry);
        }
    }
    if(isset($_POST['delete']))
    {
        $productNo=$_POST['productno'];
        $companyname=$_POST['companyname'];
        $model=$_POST['model'];
        $price=$_POST['price'];

        $querry = "delete from practical_fifth where productno='$productNo'";
        mysqli_query($connect,$querry);
    }
    ?>
    </table>
</center>
</body>
</html>
