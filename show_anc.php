
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>An Account</title>



    <?php 
        include_once('../AG4/server.php');
        
        $username = $_SESSION['username'];
        $query_user  = "SELECT UserID FROM users WHERE username = '$username'";
        $result_user = mysqli_query($db, $query_user);  
        $row_user    = mysqli_fetch_assoc($result_user);
        
        $iduser      = $row_user['UserID'];
        
        echo "<h1 style='text-align:center;'> Welcome To Page an acount </h1>";

        $query_anc = "SELECT * FROM users 
        JOIN anc ON anc.id_useracn = users.UserID
        WHERE users.UserID = '$iduser'";

        $result_anc = mysqli_query($db, $query_anc);
        $row = mysqli_fetch_assoc($result_anc);
    ?>

 
    <link rel="stylesheet" href="layout/css/bootstrap.min.css">
            <table class="table table-bordered">

                <tr style="background:deepskyblue; color:white;">
                <td>Name</td>
                <td>An acount</td>
            </tr>

            <tr>
                <td> <?php echo $row['username']?> </td>
                <td> <?php echo $row['total_user']?> </td>
            </tr>
            

        </table>



  
<form action="" method="post">
    <button style="width:20%; height:50px; background:deepskyblue; color:white" name="gohome"> Home </button>
</form>


<?php 

        if(isset($_POST['gohome']))
        {
            header("location: index.php");
        }

?>






