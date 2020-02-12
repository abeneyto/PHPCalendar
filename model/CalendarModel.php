<?php

class CalendarModel{

  private $resultQuery;
  private $numberOfTeams;
  private $calendarMatches;
  private $teams;

  public function __construct(){
    require("model/Connection.php");
    $this->resultQuery=Connection::getConnection();
    $this->numberOfTeams = $this->resultQuery->num_rows;
    $this->teams = array();
    $this->calendarMatches = array();
  }

  public function getNumberOfTeams(){
    self::addRestIfNeeds();
    return $this->numberOfTeams;
  }

  public function getCalendar(){
    self::addRestIfNeeds();
    self::setArrayTeams();
    $journey = array();
    for ($i=0; $i < $this->numberOfTeams -1 ; $i+=2) {
      $match = array( $this->teams[$i],  $this->teams[$i+1]);
      array_push($journey, $match);
    }
    $secondRound = array();
    for($i=1; $i< ($this->numberOfTeams) ; $i++){
      array_push($this->calendarMatches, $journey);
      $journeyReturn = array();
      foreach ($journey as $match) {
        array_push($journeyReturn, array_reverse($match));
      }
      array_push($secondRound, $journeyReturn);
      if($i%2 == 0){
        $journey = self::firstRotation($journey);
      }else{
        $journey = self::secondRotation($journey);
      }
    }
    foreach ($secondRound as $round) {
      array_push($this->calendarMatches, $round);
    }
    return $this->calendarMatches;
  }


  public function addRestIfNeeds(){
    if (! ($this->numberOfTeams % 2 == 0)) {
      array_push($this->teams,"Descansa");
      $this->numberOfTeams +=1;
    }
  }

  public function setArrayTeams(){
    while ( $row = $this->resultQuery->fetch_assoc () ) {
      $teamName = $row["nombre"];
      array_push($this->teams, $teamName);
    }
  }

  public function secondRotation($journey){
    $countMatches = count($journey)-1;
    $aux1 = $journey[0][1];
    $aux2 = $journey[$countMatches][0];
    $journey[$countMatches][0] = $aux1;
    for($j = $countMatches; $j>=0; $j--){

      $aux1 = $journey[$j][1];
      $journey[$j][1] = $aux2;
      if($j>0){
        $aux2 = $journey[$j-1][0];
        $journey[$j-1][0] = $aux1;
      }
    }
    return  $journey;
  }

  public function firstRotation($journey){
    $countMatches = count($journey)-1;
    $aux1 = $journey[$countMatches][0];
    $aux2 = $journey[0][1];
    $journey[0][1] = $aux1;
    for($j = 0; $j<$countMatches; $j++){
      $aux1 = $journey[$j+1][0];
      $journey[$j+1][0] = $aux2;
      if($j<$countMatches-1){
        $aux2 = $journey[$j+1][1];
        $journey[$j+1][1] = $aux1;
      }
    }
    return $journey;
  }
}
?>
