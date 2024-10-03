<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>小説の日記</title>
        <link rel="stylesheet" href="newcss.css">
    </head>
    <body>
        
        <nav>
            <div class='title'>小説の日記</div>
            <a>
            <a href="upload.php" >日記を登録</a>
            </a>
        </nav>
        <div class="container">
         <div class="top-title">日記を表示</div>
         <form action="index.php" method="POST">  
         <input type="submit" value="日記を表示"/>
         <select name="pSel">
        </div>
        <?php
        include 'cl.php';

         $cl = new mlDB() ;
        
         $r = $cl->GetAllID() ;
         foreach ($r as $sLine){
           echo '<option value = '. $sLine['ID']. '>'. $sLine['Title']. '</option>' ;
         }
        
        echo '</select>';
        
        if(isset($_POST['pSel'])) {
           $r = $cl->GetImg($_POST['pSel']);
            $result = $cl->GetID($_POST['pSel']);
            echo'</br>';
            echo'<div class="img">';
            echo '<img src="data:image/jpeg;base64,'. base64_encode($r) .'" alt="Selected Image" style="width:200px">';
            echo'</br>';
            echo'</div>';
            echo'<div class="text">';
            echo '<h2> '.$result[0]['Title'].'</h2>';
            echo'</br>';
            echo'<div class="text2">';
            echo '<p>'.$result[0]['Memo'].'</p>';
            echo'</br>';
            echo '<p>'.$result[0]['Date'].'</p>';
            echo'</div>';
            echo'</div>';
        }
         
        ?>
    </div>
     <div class="container1">すべての小説</div>
        <div class ="pin_container">
        <?php
        $r = $cl->GetAllID() ;
        foreach ($r as $sLine){
        ?>
        <div class="card card_large">
        <?php
            echo '<img src="data:image/jpeg;base64,'. base64_encode($sLine['Img']) .'" alt="Selected Image" style="width:200px">' ;
            echo '<div class="text">';
            echo  '<p>'.$sLine['Title'].'</p>' ;
            echo '</div>'; 
            echo '</div>'; 
            }
        ?>
        </div>
        </select>
        </form>
        <hr />
    </body>
</html>
