<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>画像登録</title>
        <link rel="stylesheet" href="newcss.css">
    </head>
    <body>
         <nav>
            <div class='title'>小説の日記</div>
            <a>
                <a href="index.php">日記表示へもどる</a>
            </a>
         </nav>
         <div class="container">
         <div class="top-title">日記を登録</div>

    <form action="upload.php" method="POST" enctype="multipart/form-data" >

      <input type="file" name="pFile" />

      <input type="text" name="pTitle" />
      
      <input type="text" name="pMemo" />

      <input type="submit" value="日記登録" />

    </form>
         </div>
    <?php
        
     include 'cl.php' ; 
     
     if( isset($_FILES['pFile'])){

       $cl = new mlDB() ;

       $cl->InsData($_FILES['pFile']['tmp_name'], $_POST['pTitle'], $_POST['pMemo'] ) ;

     }

    ?>

    </body>
</html>
