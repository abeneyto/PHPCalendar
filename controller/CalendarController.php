<?php
    require("model/CalendarModel.php");
    $dataCalendar = new CalendarModel();
    $calendar = $dataCalendar->getCalendar();
    $numberOfTeamsData = $dataCalendar->getNumberOfTeams();
    require("view/CalendarView.php");
?>
