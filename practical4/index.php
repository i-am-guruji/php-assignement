<?php
 include("connect.php");
?>

<html>
    <head>
        <title>Question - 4</title>
    </head>
<body>
    <center>
        <h1> Question - 4</h1>
        <form name="form" method="POST" action="">
            <table>
                <tr>
                    <td> Enter Book Code :- </td>
                    <td> <input type="number" name="bookcode" placeholder="Book Code"></td>
                </tr>
                <tr>
                    <td> Enter Book Name :- </td>
                    <td> <input type="text" name="bookname" placeholder="Book Name"></td>
                </tr>
                <tr>
                    <td> Enter Author Name :- </td>
                    <td> <input type="text" name="authorname" placeholder="Author Name"></td>
                </tr>
                <tr>
                    <td> Enter Cost :- </td>
                    <td> <input type="number" name="cost" placeholder="Cost"></td>
                </tr>
                <tr>
                    <td> Enter Isbn No :- </td>
                    <td> <input type="number" name="isbnno" placeholder="Isbn No"></td>
                </tr>
            </table>
            <table>
                <tr>
                <br><td> <input type="submit" name="insert" value="Insert">
                    <input type="submit" name="update" value="Update">
                    <input type="submit" name="search" value="Search">
                    </td>
                </tr>
            </table>
    </form>
        <br>
        <table border="3">
            <tr>
                <th>Book Code</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Cost</th>
                <th>Isbn No</th>
            </tr>
        <?php
            if(isset($_POST['search']))
            {
                $bookcode=$_POST['bookcode'];
                $bookname=$_POST['bookname'];
                $authorname=$_POST['authorname'];
                $cost=$_POST['cost'];
                $isbnno=$_POST['isbnno'];
            $res= mysqli_query($connect,"select * from practical_fourth where bookcode=
            '$bookcode' || authorname='$authorname'");

            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["bookcode"]; echo "</td>";
                echo "<td>"; echo $row["bookname"]; echo "</td>";
                echo "<td>"; echo $row["authorname"]; echo "</td>";
                echo "<td>"; echo $row["cost"]; echo "</td>";
                echo "<td>"; echo $row["isbnno"]; echo "</td>";
                echo "</tr>";
            }
            }else
            {
            $res= mysqli_query($connect,"select * from practical_fourth");
            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["bookcode"]; echo "</td>";
                echo "<td>"; echo $row["bookname"]; echo "</td>";
                echo "<td>"; echo $row["authorname"]; echo "</td>";
                echo "<td>"; echo $row["cost"]; echo "</td>";
                echo "<td>"; echo $row["isbnno"]; echo "</td>";
                echo "</tr>";
            }
            }
            if(isset($_POST['insert']))
            {
                $bookcode=$_POST['bookcode'];
                $bookname=$_POST['bookname'];
                $authorname=$_POST['authorname'];
                $cost=$_POST['cost'];
                $isbnno=$_POST['isbnno'];

            if($bookcode!="" && $bookname!="" && $authorname!="" && $cost!="" && $isbnno!="")
            {
                $querry = "insert into practical_fourth values('$bookcode','$bookname','$authorname','$cost','$isbnno')";
                mysqli_query($connect,$querry);
            }
            }
            if(isset($_POST['update']))
            {
                $bookcode=$_POST['bookcode'];
                $bookname=$_POST['bookname'];
                $authorname=$_POST['authorname'];
                $cost=$_POST['cost'];
                $isbnno=$_POST['isbnno'];
            if($bookcode!="" && $bookname!="" && $authorname!="" && $cost!="" && $isbnno!="")
            {
                $querry = "update practical_fourth set bookcode='$bookcode' , bookname='$bookname',
                authorname='$authorname',cost='$cost',isbnno='$isbnno' where bookcode='$bookcode'";
                mysqli_query($connect,$querry);
            }
            }
        ?>
        </table>
    </center>
</body>
</html>