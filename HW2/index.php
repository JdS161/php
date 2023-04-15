<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 300px;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            font-weight: bold;
        }

        .weekend {
            color: red;
        }
    </style>
</head>
<body>

    <h1> Calendar</h1>
    <form method="post">
        <label for="month"> Month:</label>
        <input type="number" id="month" name="month" min="1" max="12" required>
        <input type="submit" name="submit" value="Accept">
    </form>


    <?php

        if(isset($_POST['submit']))
        {
            $month = $_POST['month'];
            generateCalendar($month);
        }

        // One month print-out function
        function generateCalendar($month) 
        {
            if ($month < 1 || $month > 12) 
            {
                echo "Wrong month number. Available values from 1 to 12.";
                return;
            }
        
            $year = date('Y');
            $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $first_day_of_month = date('N', strtotime("$year-$month-1"));
            
            // calendar table creation
            echo '<h2>Calendar for ' . date('F Y', strtotime("$year-$month-1")) . '</h2>';
            echo '<table>';
            echo '<tr>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th class="weekend">Sa</th>
            <th class="weekend">Su</th>
            </tr>';
            
            $day = 1;
            for ($i = 1; $i <= 6; $i++) 
            {
                echo '<tr>';
                for ($j = 1; $j <= 7; $j++) 
                {
                    if ($i === 1 && $j < $first_day_of_month) 
                    {
                        echo '<td></td>';
                    } elseif ($day <= $days_in_month) 
                    {
                        $day_of_week = date('N', strtotime("$year-$month-$day"));
                        $cell_class = ($day_of_week == 6 || $day_of_week == 7) ? 'weekend' : '';
                        echo '<td class="' . $cell_class . '">' . $day . '</td>';
                        $day++;
                    } 
                    else 
                    {
                        echo '<td></td>';
                    }
                }
                echo '</tr>';
                if ($day > $days_in_month) 
                {
                    break;
                }
            }
            
            echo '</table>';
        }
        
    ?>

</body>
</html>
