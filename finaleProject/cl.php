<?php
session_start();
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
class mlDB {
    
  private $sDBString ;
  private const DB_FILE = 'bookNikki.db' ;
  private const TABLE_NAME = 'T_BOOK' ;

  public function __construct() {

    $this->sDBString = 'sqlite:'. self::DB_FILE ;

  }

  
  public function GetImg($nID) {

    $db = new PDO($this->sDBString) ;

    $sSql = 'select Img from '. self::TABLE_NAME. ' where ID = :id' ;

    $stmt = $db->prepare($sSql) ;

    $stmt->bindParam(':id', $nID, PDO::PARAM_INT) ;

    $stmt->execute();

    $r = $stmt->fetchAll() ;

    $rImg = $r[0]['Img'] ;

    $db = null ;

    return $rImg ;

  }
 
  public function InsData($bFile, $sTitle, $sMemo) {

    $db = new PDO($this->sDBString) ;

    $date = new DateTime();
    $InsDate = $date->format("Y-m-d H:i:s");           

    $sSql = 'insert into '.self::TABLE_NAME. ' (Title, Memo, Img, Date) values( :title, :memo, :img, :date ) ';

    $stmt = $db->prepare($sSql) ;

    $fp = fopen($bFile, 'rb') ;
    
    $stmt->bindParam(':title', $sTitle, PDO::PARAM_STR) ;

    $stmt->bindParam(':memo', $sMemo, PDO::PARAM_STR) ;

    $stmt->bindParam(':img', $fp, PDO::PARAM_LOB) ;
    
    $stmt->bindParam(':date', $InsDate, PDO::PARAM_STR) ;

    $db->beginTransaction() ;

    $stmt->execute();

    $db->commit() ;

    $db = null ;

  }
  
   public function GetAllID() {

    $db = new PDO($this->sDBString) ;

    $sSql = 'select ID, Title, Img from '. self::TABLE_NAME ;

    $stmt = $db->prepare($sSql) ;

    $stmt->execute() ;

    $r = $stmt->fetchAll() ;

    $db = null ;

    return $r ;

  }

   public function GetID($nID) {
       
       try{

    $db = new PDO($this->sDBString) ;

    $sSql = 'select Title, Memo, Date from '. self::TABLE_NAME . ' where ID = :id';

    $stmt = $db->prepare($sSql) ;
    
    $stmt->bindParam(':id', $nID, PDO::PARAM_INT) ;

    $stmt->execute() ;

    $r = $stmt->fetchAll((PDO::FETCH_ASSOC)) ;

    $db = null ;

    return $r ;
   }catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false; 
    }

     
}
}
?>


