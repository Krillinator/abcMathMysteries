<?php

include_once("./library/MysteryGame.php");

/**
 * Game
 */
class Game extends MysteryGame
{
  public function generateMystery()
  {

    $lettersTest =
      [
        "letters" => range("A", "Z"),
        "value" => range("1", "26")
      ];

    $fusedletters = [];

    for ($i = 0; $i < 25; $i++) {
      $fusedletters[] = $lettersTest["letters"][$i] . $lettersTest["value"][$i];
    }

    shuffle($fusedletters);

    // GET VALUE
    $x = (int)substr($fusedletters[0], 1, 2);
    $y = (int)substr($fusedletters[1], 1, 2);
    $answer = $x + $y;

    // MYSTERY 
    $mystery =
      substr($fusedletters[0], 0, 1) . ' + ' .
      substr($fusedletters[1], 0, 1) . ' = ?';

    $this->mystery = [
      "mystery" => $mystery,
      "answer" => $answer
    ];
  }

  // HOW TO USE: findValue($fusedletters, "B")
  // RETURNS: 2 (A = 1, B = 2, C = 3 etc..)
  public function findValue($array, $letter)
  {
    for ($i = 0; $i < count($array); $i++) {
      if ($letter == substr($array[$i], 0, 1)) { // 0 = letter .pos
        return substr($array[$i], 1, 2); // Return value of letter
      }
    }
  }
}
