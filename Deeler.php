<?php
class Deeler extends Player{
  public function isDraw(){
    if($this->point >= 17){
      return false;
    }
    return true;
  }

}
?>