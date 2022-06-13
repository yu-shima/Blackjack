<?php
//タイトル
print "☆★☆★☆★☆★☆★ ブラックジャックへようこそ！ ☆★☆★☆★☆★☆★\n";
print "ゲームを開始します。\n";
require_once "BPlayer.php";
require_once "BDeeler.php";
require_once "Playingcards.php";

/**
 * カード５２枚を生成
 */
$playingcards = new Playingcards();
/**
 * プレイヤー生成
 */
$player = new Player($playingcards);
//2枚ドロー
$player->draw();
$player->draw();
/**
 * ディーラー生成
 */
$deeler = new Deeler($playingcards);
//2枚ドロー
$deeler->draw();
$deeler->draw();
/**
 * 手札を見せる
 */
$player->openCard();
$deeler->openCard();
/**
 * プレイヤーの得点を表示
 */
$player->showPoint();
/**
 * プレイヤーのターン
 */
//バーストするか、Y以外を入力するまでドローする
while($player->isDraw()){
  //プレイヤーのドロー
    $player->draw();
  //プレイヤーの引いたカードを見せる
    $player->showCard();
  //プレイヤーの現在点表示
    $player->showPoint();
}
/**
 * プレイヤーがバーストしていなければディーラーのターンにすすむ
 */
if(!$player->isBurst()){
  /**
   * ディーラーのターン
   */
  //バーストするか、17点になるまでドローする
  while($deeler->isDraw()){
    //ディーラーのドロー
      $deeler->draw();
    //ディーラーの引いたカードを見せる
      $deeler->showCard();
    //ディーラーの現在点表示
      $deeler->showPoint();
  }
  /**
   * 勝敗決定
   */
  //得点
  $player->showResult();
  $deeler->showResult();
  //勝者
  if($player->isBurst()){
    print "ディーラーの勝ちです！\n";
  }else{
    if($deeler->isBurst()){
      print "あなたの勝ちです！\n";
    }else if($player->getPoint() > $deeler->getPoint()){
      print "あなたの勝ちです！\n";
    }else if($player->getPoint() < $deeler->getPoint()){
      print "ディーラーの勝ちです！\n";
    }else{
      print "引き分けです。";
    }
  }
}else{
  print "バーストしました。ディーラーの勝ちです！\n";
}
print "ブラックジャック終了！また遊んでね★\n";

