<?php
include("connect.php");
?>

<html>
<head>
    <title>
        Question - 2
    </title>
</head>

<body>
    <center>
        <h1> Question - 2</h1>
        <form name="form" method="POST" action="">
    <table>
        <tr>
            <td> Enter Id :- </td>
            <td> <input type="number" name="id" placeholder="Id"></td>
        </tr>
        <tr>
            <td> Enter Client Name :- </td>
            <td> <input type="text" name="clientname" placeholder="Client Name"></td>
        </tr>

        <tr>
            <td> Enter Source :- </td>
            <td> <input type="text" name="source" placeholder="Source"></td>
        </tr>
        <tr>
            <td> Enter Destination :- </td>
            <td> <input type="text" name="destination" placeholder="Destination"></td>
        </tr>
        <tr>
            <td> Enter Address :- </td>
            <td> <textarea name="address" placeholder="Enter Address" rows="5" cols="
            15"> </textarea> </td>
        
        </tr>
        <tr>
            <td> Enter No of Passenger Travelling :- </td>
            <td> <input type="number" name="noofpassenger" placeholder="Enter No of Passenger"></td>
        </tr>
        <tr>
            <td> Enter Travelling Date :- </td>
            <td> <input type="date" name="travellingdate" placeholder="travelling date"></td>
        </tr>
        <tr>
            <td> Enter Train Number :- </td>
            <td> <input type="number" name="trainnumber" placeholder="train number"> </td>
        </tr>
        </table>

        <table>
            <tr>
                <br><td> <input type="submit" name="insert" value="Insert">  </td>
            </tr>
        </table>
        </form>
        <br>
        <table border="3">
            <tr>
                <th>Id</th>
                <th>Client Name</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Address</th>
                <th>No of Passenger</th>
                <th>Travelling Date</th>
                <th>Train Number</th>
            </tr>


<?php
    $select="select * from practical_second";
    $res= mysqli_query($connect,$select);

    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["id"]; echo "</td>";
        echo "<td>"; echo $row["clientname"]; echo "</td>";
        echo "<td>"; echo $row["source"]; echo "</td>";
        echo "<td>"; echo $row["destination"]; echo "</td>";
        echo "<td>"; echo $row["address"]; echo "</td>";
        echo "<td>"; echo $row["noofpassenger"]; echo "</td>";
        echo "<td>"; echo $row["travellingdate"]; echo "</td>";
        echo "<td>"; echo $row["trainnumber"]; echo "</td>";
        echo "</tr>";
    }

    if(isset($_POST['insert']))
    {
        $id=$_POST['id'];
        $clientname=$_POST['clientname'];
        $source=$_POST['source'];
        $destination=$_POST['destination'];
        $address=$_POST['address'];
        $noofpassenger=$_POST['noofpassenger'];
        $travellingdate=$_POST['travellingdate'];
        $trainnumber=$_POST['trainnumber'];

        if($id!="" && $clientname!="" && $source!="" && $destination!="" && $address
        !="" && $noofpassenger!="" && $travellingdate!="" && $trainnumber!="")
        {
            $querry = "insert into practical_second values('$id','$clientname','$source','$destination'
            ,'$address','$noofpassenger','$travellingdate','$trainnumber')";

            mysqli_query($connect,$querry) or die(mysqli_error());

        }
}
?>
</table>
</center>
</body>

</html>