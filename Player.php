<?php
class Player{
  protected $point;

  public function __construct(){
    $this->point = mt_rand(1, 30);
  }


  public function isDraw(){
    if($this->isBurst()){
      return false;
    }
    print "1か0を入力してください。\n";
    $choice = trim(fgets(STDIN));
    if($choice == 1){
      return true;
    }
    return false;
  }

  protected function isBurst(){
    if ($this->point > 21){
      return true;
    }
    return false;
  }

  private function whatBurst(){
    if($this->isBurst()){
      return "バーストしました!";
    }
    return "バーストしてません!";
  }

  public function showResult(){
    print "点数は{$this->point}です、{$this->whatBurst()}";
  }

  public function draw(){
    $this->point += mt_rand(1, 11);
  }
}
?>