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
            background-image: url("../Bank/image/1.jpg");
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
<h1 style="text-align:center; color:white">The Bank </h1><br>
    
    
<br><br><br>
    <form  method="post">
        <button style="width:100%; height:50px;  color:black; font-size:40px;" name="add">Add money</button><br>
        <button style="width:100%; height:50px;  color:black; font-size:40px;" name="goshow">Show an acount</button>
        <button style="width:100%; height:50px;  color:black; font-size:40px;" name="gopull">Withdraw money</button>
    
    </form>
    
    
    <?php
    if(isset($_POST['add']))
    {
        header("location: addma.php"); 
    
    }

    if(isset($_POST['goshow']))
    {
        header("location: show_anc.php");
    }

    if(isset($_POST['gopull']))
    {
        header("location: w.php");
    }





    ?>


</body>
</html>