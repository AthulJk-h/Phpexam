<?php
$conn= mysqli_connect('localhost', 'root', '', 'test2');
if (!$conn) {
    die('Connection error : ' . mysqli_connect_error());
}


if(isset($_POST['add1'])) {
    
    $sql="insert into grocery(pid,pname,brand,category,price) values ('$_POST[id]','$_POST[iname]','$_POST[brand]','$_POST[category]','$_POST[price]')";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    

}
?>
<html>
<head>
    <title>Grocery Management</title>
    <style type="text/css">
      th {
        text-align: left;
    }
    span {
        color:  red;
    }
    input[type="text"],input[type="number"],textarea {
        width: 220px;
        height: 25px;
        border-radius: 5px;
    }
    
    input[type="submit"],input[type="reset"] {
        width: 100px;
        height: 35px;
        border-radius: 5px;
    }
    .row {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 20px;
    }
    .col-md-5 {
        grid-column: span 5;
    }
    .col-md-7 {
        grid-column: span 7;
    }

</style>
<script type="text/javascript">
    function validate() {        
        if(!document.form1.iname.value.match(/^[a-zA-Z][A-Za-z\s]*[a-zA-Z]$/)) {
            alert("Name should contain alphabets only!");
            document.form1.iname.focus();
            return false;
        } 
        
    }
</script>
</head>
<body bgcolor=#c5d5cb>
    <div class="row">
        <div class="col-md-5" style="display: block;border-right: solid;border-width: 1px;">
            <form method="post" name="form1" action="" onsubmit="return(validate())">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">DETAILS</h1></th>
                    </tr>
                    <tr>
                        <th>PRODUCT ID</th>
                        <td><input type="number" name="id" required></td>
                    </tr>
                    <tr>
                        <th>PRODUCT NAME</th>
                        <td><input type="text" name="iname" required></td>
                    </tr>
                    <tr>
                        <th>CATEGORY</th>
                        <td><input type="text" name="category" required></td>
                    </tr>
                    <tr>
                        <th>BRAND</th>
                        <td><input type="text" name="brand" required></td>
                    </tr>
                     <th>PRICE</th>
                        <td><input type="number" name="price" required></td>
                    </tr>


                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Add" name="add1" style="background-color: ORANGE;">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-7" style="display: block;overflow-x: auto;">
            <table cellpadding="5px" cellspacing="5px"  align="center">
                <tr>
                    <th colspan="10"><h1 align="center">Item Details</h1></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from grocery";
                        $res= mysqli_query($conn, $sql);
                        ?> 
                                        
                    </th>
                </tr>
                <tr>
                    
                    <th>PRODUCT ID</th>
                    <th> PRODUCT NAME</th>
                    <th>CATEGORY</th>
                    <th>BRAND</th>
                    <th>PRICE</th>

                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $row['pid']?></td>
                        <td><?php echo $row['pname']?></td>
                        <td><?php echo $row['brand']?></td>
                        <td><?php echo $row['category']?></td>
                        <td><?php echo $row['price']?></td>

                        
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    
</body>
</html>