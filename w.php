<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Withdraw money</title><br>
        <link rel="stylesheet" href="../AG4/layout/css/style.css">
        <style>
            body
            {
                background-image: url("../Bank/image/6.jpg");
                background-size: 80%;
                background-repeat: no-repeat;
                background-position:50% 5px ;
                background-color:#1ABC9C  ;
            }
            form
            {
                background-color:#0000;
                width: 30%;
                margin: 0px auto;
                padding: 20px 50px;
                border: 1px solid ;
                
                border-radius: 0px 0px 10px 10px;
            }

            button
            {
                background-color: Transparent;
                background-repeat:no-repeat;
                cursor:pointer;
                overflow: hidden;
            }

        </style>
    
    </head>
    <body>
    <?php
    
        include_once('../AG4/server.php');
        
        $username = $_SESSION['username'];
        $query_user  = "SELECT UserID FROM users WHERE username = '$username'";
        $result_user = mysqli_query($db, $query_user);  
        $row_user    = mysqli_fetch_assoc($result_user);
        $iduser      = $row_user['UserID'];
        $success     = array();
        
    
    ?>
    <?php
       
        if(isset($_POST['done']))
        {

            $query_anc = "SELECT * FROM users 
            JOIN anc ON anc.id_useracn = users.UserID
            WHERE users.UserID = '$iduser'";
    
            $result_anc = mysqli_query($db, $query_anc);
            $row = mysqli_fetch_assoc($result_anc);
            // ------------------------------------------------------------------
            $pull = "";
            $pull = $_POST['pull'];
            $query_anc  = "SELECT * FROM anc WHERE id_useracn = '$iduser'";
            
            $result_anc = mysqli_query($db, $query_anc);
            $row_anc    = mysqli_fetch_assoc($result_anc); 
            $old_total   =  $row_anc['total_user'];
            $new_total   = 0; 
            $new_total  += $old_total - $pull;
            if($old_total == 0)
            {
                array_push($errors, "Your balance is not enough");   
            }
            
            if(count($errors) == 0)
            {
                array_push($success, "operation accomplished successfully");
                $query      = "UPDATE anc SET anc.total_user = '$new_total' WHERE anc.id_useracn = '$iduser'";
                mysqli_query($db,$query); 
            }

            
        }

        if(isset($_POST['goho']))
        {
            header("location: index.php");
        }
       
    ?>
        
    <h1 style='text-align:center; color:white;'>Welcome To  Withdraw money Page</h1>
 
    <form  method="post">
        <label style="color:white;"><center>Withdraw money</center> </label><br>
        <?php include('../AG4/error.php'); ?>
        <?php include('success.php'); ?>
        <input  style="width:100%;height:30px; font-size:20px;" type="text" name="pull" ><br><br>
        <button style="width:100%; height:50px;  color:white;" name="done">Done</button><br> 
        <button style="width:100%; height:50px;  color:white;" name="goho">Home</button><br> 
        <button style="width:100%; height:50px;  color:white;" name="goho">Hide</button><br> 
    
    </form>

    </body>
    </html>

