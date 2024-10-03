<?php
 session_start() ;
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
if( isset($_SESSION['IMG'])){

   $img = $_SESSION['IMG'] ;

   header('Content-type:image/jpeg') ;

   echo $img;

   $img = $_SESSION['IMG'] = null ;

   ob_end_clean() ;

  }

?>
