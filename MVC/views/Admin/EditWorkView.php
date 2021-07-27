<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Public/Admin/css/EditWork.css">

</head>
<body>
    <?php
        include "MVC/controllers/Admin/Master.php";
        $mt=new Master();
        $mt->index();
        $id="";
        $name="";
        $price="";
        $time="";
        $img="";
        $note="";
        $idDe="";
        if(isset($data['data'])){
            $r=mysqli_fetch_array($data['data']);
            $id=$r[0];
            $img=$r[1];
            $name=$r[2];
            $note=$r[3];
            $price=$r[4];
            $time=$r[5];
            $idDe=$r[6];
        }
    ?>

</body>
</html>
