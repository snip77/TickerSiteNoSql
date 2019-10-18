<?php
if (
	(!isset($_POST['start_date']))||
	(!isset($_POST['end_date']))||
	(!isset($_POST['company_id']))
) {
	header('location:search.php');
}
require '../vendor/autoload.php';
require '../helpers/dateRange.php';
use Redis\Redis;
$counter=0;
$redis=Redis::connect();
$endDate=explode('-', $_POST["end_date"]);
$startDate=explode('-', $_POST['start_date']);
$endDateCompare=str_replace('-', '', $_POST['end_date']);
$startDateCompare=str_replace('-', '', $_POST['start_date']);
$times=date_range($startDate[0].'-'.$startDate[1].'-01', $endDate[0].'-'.$endDate[1].'-'.$endDate[2]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Result</title>
    <link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../style/searcherByTimePerioudAndComany.css">
</head>
<body>
    <br><br><br>
    <?php
    foreach ($times as $time):
        $timer=explode('/', $time);
        $year=$timer[2];
        $month=$timer[1];
        $page=Redis::getArray($redis, $_POST['company_id'].'-'.$year.'-'.$month);
        foreach ($page as $travel_id => $travel):
            $dateCompare=str_replace('-', '', $travel['date']);
            if ($startDateCompare<=$dateCompare && $dateCompare<=$endDateCompare):
            $counter++;?>
            <div class="card w-75">
                <div class="card-body">
                    <div class="travel-info">
                    <h5 class="card-title">
                        <img src="../images/train.svg">
                        <?= $travel['from'].' - '.$travel['to'] ?>
                    </h5>
                    <data class="card-text">
                        <img src="../images/time.svg">
                        <?= $travel['time'] ?>
                    </data>
                    <data class="card-text date">
                        <img src="../images/date.svg">
                        <?= $travel['date'] ?>
                    </data>
                    <data class="card-text date">
                        <img src="../images/money.svg">
                        <?= $travel['price'].' Tooman' ?>
                    </data>
                    </div>
                </div>
            </div>
            <br>
    <?php
    endif;
    endforeach;
    endforeach;
    if ($counter==0): ?>
        <div class="empty-title">
            <h2>N</h2>
            <div class="empty-little-title">
                o
            </div>
            <h2 class="big-title">T</h2>
            <div class="empty-little-title">
                ravels
            </div>
            <h2 class="big-title">F</h2>
            <div class="empty-little-title">
                ound
            </div>
        </div>
    <?php endif ?>

</body>
</html>