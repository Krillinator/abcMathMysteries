<?php

/**
 *
 */
class MysteryGame
{
  protected $mystery;

  public function generateMystery()
  {
    $this->mystery = "test";
  }

  public function check($id, $answer)
  {
    $content = file_get_contents("./db/mysteries.json");
    $json = json_decode($content);

    for ($i=0; $i < count($json); $i++) {
      if ($i == $id) {
        return $json[$i]->answer == $answer;
      }
    }

    return false;
  }

  public function printMystery()
  {
    echo $this->mystery["mystery"];
  }

  public function saveMystery()
  {
    $content = file_get_contents("./db/mysteries.json");
    $json = json_decode($content);
    $id = $json ? count($json) : 0;
    $json[] = $this->mystery;
    file_put_contents("./db/mysteries.json", json_encode($json));
    return $id;
  }

  public function dropMysteries()
  {
    file_put_contents("./db/mysteries.json", json_encode([]));
  }
}


?>
