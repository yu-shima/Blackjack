<?php
class Playingcards{

  /**
   * カードの数字
   */
  private $cardNum = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
  /**
   * カードのマーク
   */
  private $tipe = ["ダイヤ", "ハート", "クローバー", "スペード"];

  private $playingCards = [];

  public function __construct(){
    $this->initialize();
  }

  /**
   * 山札52枚を生成(シャッフル済)
   */
  public function initialize(){
    require_once "Card.php";
    foreach($this->tipe as $mark){
      foreach($this->cardNum as $no){
        $card = new Card($mark, $no);
        // Playingcards::$playingCards[] = $card;
        $this->playingCards[] = $card;
      }
    }
    //$playingCards（山札）をシャッフル
    // shuffle(Playingcards::$playingCards);
    shuffle($this->playingCards);
  }

  /**
   * 山札を引く
   */
   public function draw(){
    // $drawCard = array_shift(Playingcards::$playingCards);
    $drawCard = array_shift($this->playingCards);
    return $drawCard;
   }
}