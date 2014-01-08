<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author Yasha
 */
class newPHPClass {

    private $p_id;
    private $size;
    
   public function newPHPClass($p_id, $size)
   {
       $this->p_id=$p_id;
   $this->size=$size;
}
 public function getP_id()
 {
     return $this->p_id();
 }
  public function getsize()
 {
     return $this->size();
 }

    
}

?>
