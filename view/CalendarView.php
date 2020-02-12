<?php
include 'view/top.php';
  ?>

  <header>
    	<div class='row p-3 d-flex justify-content-center' ><img id="logo" src="images/laliga.png" alt="LaLiga" ></div>
  </header>
  <div class="container-fluid pl-5 pr-5 pb-5">
    <div class='row'>

    <?php
    for ($i=0; $i < $numberOfTeamsData*2-2; $i++) {
      echo  '<div class="col-12 col-md-6 d-flex justify-content-center flex-wrap">';
      echo "<div class='row'>";
      echo "<h5 class= p-2 border-bottom>JORNADA ".  ($i+1) . ' </h5></div>';
      echo "<div class='row'>";
        $matches = $calendar[$i];
      for ($j=0; $j < $numberOfTeamsData/2; $j++) {
        $match = $matches[$j];
        echo   '<div
        class="col-12 d-flex justify-content-center align-content-center flex-wrap matches">';
        echo '<h6 class = "p-2">' . $match[0] . '<span id = "vs"> vs </span>' . $match[1] . '</h6>';
        echo "</div>";

      }
      echo "</div>";
      echo "</div>";
    }
    ?>
  </div>
</main>
<footer>
</footer>
<?php
include 'view/bottom.php';
?>
