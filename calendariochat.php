<?php

// Get current year and month
$year = date('Y');
$month = date('m');

// Get the first day of the month
$firstDay = date('N', strtotime("$year-$month-01"));

// Get the number of days in the month
$numDays = date('t', strtotime("$year-$month-01"));

// Start the table and output the first row with the month and year
echo '<table>';
echo '<tr><th colspan="7">' . date('F', strtotime("$year-$month-01")) . ' ' . $year . '</th></tr>';

// Output the day names as the first row of the calendar
echo '<tr>';
echo '<td>Sun</td>';
echo '<td>Mon</td>';
echo '<td>Tue</td>';
echo '<td>Wed</td>';
echo '<td>Thu</td>';
echo '<td>Fri</td>';
echo '<td>Sat</td>';
echo '</tr>';

// Output the days of the month
$day = 1;
echo '<tr>';

// Output empty cells until we reach the first day of the month
for ($i = 1; $i < $firstDay; $i++) {
  echo '<td></td>';
  $day++;
}

// Output the days of the month
for ($i = 1; $i <= $numDays; $i++) {
  // If it's a new week, start a new row
  if ($day > 7) {
    echo '</tr><tr>';
    $day = 1;
  }

  // Output the day
  echo '<td>' . $i . '</td>';
  $day++;
}

// Output empty cells until the end of the calendar
while ($day <= 7) {
  echo '<td></td>';
  $day++;
}

echo '</tr>';
echo '</table>';

