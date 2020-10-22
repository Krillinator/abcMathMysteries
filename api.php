<?php

include_once("./game/Game.php");

$game = new Game();
$response = $game->check($_GET["id"], $_GET["answer"]);
echo json_encode($response);

?>
