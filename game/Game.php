<?php

include_once("./library/MysteryGame.php");

/**
 * Game
 */
class Game extends MysteryGame
{
  public function generateMystery()
  {
    // Change this expression
    $this->mystery = [
      "mystery" => "test",
      "answer" => "test"
    ];
  }
}


?>
