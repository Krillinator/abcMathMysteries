<?php

include_once("./game/Game.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lekplats | Skattkammarspelet</title>
  </head>
  <body>
    <div style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);text-align:center;">
      <img src="/public/skattkammarspelet_logotype.png" width="100" height="100">
      <h1>Skattkammarspelet</h1>
      <p><?php

        $game = new Game();

        $game->generateMystery();
        $id = $game->saveMystery();
        $game->printMystery();

        if(isset($_GET["method"]) && $_GET["method"]=="drop") {
          $game->dropMysteries();
        }

      ?></p>
      <input type="text" id="answer" placeholder="svar">
      <button onclick="javascript:checkAnswer(<?php echo $id; ?>);">Knäck koden</button>
    </div>

    <script type="text/javascript">
      function checkAnswer(id) {
        let answer = document.getElementById('answer');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if (JSON.parse(this.responseText) == true) {
              alert("Grattis!");
            } else {
              alert("Fel, prova igen!");
            }
          }
        };
        xhttp.open("GET", "/api.php?id="+id+"&answer="+answer.value, true);
        xhttp.send();
      }
    </script>
  </body>
</html>
