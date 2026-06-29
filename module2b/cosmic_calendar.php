<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cosmic Calendar</title>
    <!-- All styling for the final output page is included below -->
    <style>
        body { font-family: sans-serif; background-color: #1a202c; color: #e2e8f0; }
        .container { max-width: 800px; margin: 2rem auto; padding: 2rem; background-color: #2d3748; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        h1 { text-align: center; color: #9f7aea; }
        .calendar-grid { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
        .day-box { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 5px; background-color: #4a5568; font-size: 1.2rem; }
        .cosmic-name { background-color: #9f7aea; color: #fff; transform: scale(1.1); box-shadow: 0 0 15px #9f7aea; }
        .cosmic-month { border: 2px solid #f6e05e; }
        .cosmic-both { background-color: #ed8936; color: #fff; border: 2px solid #f6e05e; transform: scale(1.1); box-shadow: 0 0 15px #ed8936; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cosmic Calendar</h1>
        <div class="calendar-grid">
            <?php
    // Set up my name
    $myName = 'Ariana';
    echo strlen($myName);

    // Fetch the raw JSON string from the URL
    $jsonString = file_get_contents('https://timeapi.io/api/time/current/zone?timeZone=America%2FLos_Angeles');

    // Decode the JSON string into a PHP object
    $data = json_decode($jsonString);

    // Extract the date data from the response and determine $dayOfYear
    $dateTimeString = $data->dateTime;
    $date = new DateTime($dateTimeString);
    $dayOfYear = (int)$date->format('z') + 1;
    $month = $data->month;

    for ($i = strlen($myName); $i < $dayOfYear; $i++) {
        $cssClass = 'day-box';
        if (strlen($myName) > 0 && $month > 0 && $dayOfYear / strlen($myName) === 0 && $dayOfYear / $month === 0) {
            $cssClass .= 'cosmic-both';
        } else if (strlen($myName) > 0 && $dayOfYear / strlen($myName) === 0) {
            $cssClass .= 'cosmic-name';
        } else if ($month > 0 && $dayOfYear / $month === 0) {
            $cssClass .= 'cosmic-month';
        }
        echo "<div class='$cssClass'>$i</div>";
    }

echo "Today is day number: " . $dayOfYear; echo "<br>"; echo "The current month is: " . $month; 

/*
MY DEBUGGING LOG:
Problem: After creating my for loop, I kept getting an error on the equations
that were supposed to create the calendar box. I thought it didn't recognize
the operands for whatever reason and was very confused. I then realized I was
seeing an error because I only inputted $myName and the console obviously
didn't recognize this as an integer like the $month and $dayOfYear variables.
Solution: I made sure to input $myName as strlen($myName), so the console
could recognize it as an integer in order to complete the equations.
*/
            ?>
        </div>
    </div>
</body>
</html>