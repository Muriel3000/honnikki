<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
         <meta charset="UTF-8">
        <title>Display</title>
    </head>
    <body>
        <h1>Display</h1>

 
        
    <?php
        
     include 'cl.php' ; 
     
    if(isset($_GET['ID'])) {
        
       $cl = new mlDB() ;
         
        $itemId = $_GET['ID'];
       // $itemId = $_REQUEST['ID'];
         $itemDetails = $cl->GetBook($itemId) ;
         
    if($itemDetails) {
        echo "<h2>Item Details</h2>";
        echo "<p>Title: " . $itemDetails['Title'] . "</p>";
        echo "<p>日記: " . $itemDetails['Memo'] . "</p>";
        echo '<img src="data:image/jpeg;base64,'. base64_encode($itemDetails['Img']) .'" alt="Selected Image" style="width:200px">' ;
    } else {
        echo "<p>Item not found!</p>"; // Add error handling if item not found
    }
    }
    ?>


    <a href="index.php">画像表示へもどる</a>
    </body>
</html>
