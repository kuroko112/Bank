<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AG4/layout/css/style.css">
    <title>Bank</title>
    <style>
        body
        {
            background-image: url("../Bank/image/6.jpg");
            background-size: 80%;
            background-repeat: no-repeat;
            background-position:50% 5px ;
            background-color:#1ABC9C ;
        }
        form
        {
            background-color:#0000;
            width: 30%;
            margin: 0px auto;
            padding: 20px 50px;
            border: 1px solid ;
            
        }

        button
        {
            background-color: Transparent;
            background-repeat:no-repeat;
            cursor:pointer;
            overflow: hidden;
        }
        h1
        {
            
        }
    </style>
    
</head>
<body>
<h1 style="text-align:center; color:white">Add Money </h1><br>
    
    
<br><br><br><br>
    <form  method="post">
        <label style="color:black; font-size:40px; color:white"><center>put in the Money</center> </label>
        <input  style="width:100%;height:30px; font-size:20px;" type="text" name="an_acount" ><br><br>
        <button style="width:100%; height:50px;  color:black; font-size:40px;" name="save">Save</button><br>
        <button style="width:100%; height:50px;  color:black; font-size:40px;" name="gohome">Home</button>
    
    </form>
    
    
    <?php
    if(isset($_POST['save']))
    {
        // include the file server
        include_once('../AG4/server.php');
        $username = $_SESSION['username'];
        $query  = "SELECT * FROM users WHERE username ='$username'";
        $result    = mysqli_query($db, $query);
        $row_user  = mysqli_fetch_assoc($result);
        $id_user = $row_user['UserID'];
        $an_acount = $_POST['an_acount'];
        $query_anc  = "SELECT * FROm anc WHERE id_useracn = '$id_user'";
        $result_anc = mysqli_query($db, $query_anc);
        $row_anc    = mysqli_fetch_assoc($result_anc); 
        $old_total   =  $row_anc['total_user'];
        $new_total   = 0; 
        $new_total  += $old_total + $an_acount;
        $query      = "UPDATE anc SET anc.total_user = '$new_total' WHERE anc.id_useracn = '$id_user'";
        mysqli_query($db,$query); 
    
    }

    if(isset($_POST['gohome']))
    {
        header("location: index.php");
    }

?>


</body>
</html>