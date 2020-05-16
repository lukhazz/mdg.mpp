<link rel='stylesheet' href='cal/calendar.css' />

<?php //require_once("cal/functions.php") ?>

<?php 

	

	if (!empty($_GET['project'])) {
		$project = $_GET['project'];
	}
	else {
		$project = "0";
	}

	setlocale(LC_ALL, 'cs_CZ.utf8');
	/* date settings */
	if (!empty($_GET['month'])) { $month = (int) ($_GET['month'] ? $_GET['month'] : date('m')); } else {  $month = date('m'); }
	if (!empty($_GET['year'])) { $year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));} else {  $year = date('Y'); }

	/* select month control */
	$select_month_control = '<select class="per33" name="month" id="month">';
	for($x = 1; $x <= 12; $x++) {
		$select_month_control.= '<option value="'.$x.'"'.($x != $month ? '' : ' selected="selected"').'>'.cesky_mesic($x).'</option>';
	}
	$select_month_control.= '</select>';

	/* select year control */
	$year_range = 5;
	$select_year_control = '<select class="per33" name="year" id="year">';
	for($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
		$select_year_control.= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
	}
	$select_year_control.= '</select>';

	$select_id = '<select name="id" id="id" class="display-none">';
	$select_id.= "<option value=".$id." selected></option>";
	$select_id.= '</select>';

	$projectTemp = '<select name="project" id="project" class="display-none">';
	$projectTemp.= "<option value=".$project." selected></option>";
	$projectTemp.= '</select>';

	/* "next month" control */
	$next_month_link = '<a href="?id=' . $id .'&project='.$project. '&month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control">Následující měsíc >></a>';

	/* "today */
	$today_link = '<a href="?id=' . $id .'&project='.$project. '&month='.date('m').'&year='.date('Y').'" class="control"> < Dnes ></a>';

	/* "previous month" control */
	$previous_month_link = '<a href="?id=' . $id .'&project='.$project.  '&month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control"><< Předchozí měsíc</a>';

	/* bringing the controls together */
	$controls = '<form method="get">'.$select_id.$projectTemp.$select_month_control.$select_year_control.' <input class="per33" type="submit" name="submit" value="Přejít" /><div class="pager">      '.$previous_month_link.'     '.$today_link.'     '.$next_month_link.' </div></form>';

 ?> 

<?php 
	if ($id==0) {
		$chainName = "Všechny - ";
	}
	else if (!empty($chainName)) {
		$chainName .= " - ";
	}
	else {
		$chainName = "";
	}
	echo "<h2>".$chainName.cesky_mesic($month)." $year</h2>";
	echo $controls;
	//echo build_html_calendar($year, $month);
 ?>



<?php 

/* draws a calendar */
function draw_calendar($month,$year,$events = array()){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	//$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$headings = ['Pondělí', 'Úterý', 'Středa', 'Čtvrtek', 'Pátek', 'Sobota', 'Neděle'];

	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	//$running_day = date('w',mktime(0,0,0,$month,1,$year));
	//$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$running_day = date('N', mktime(0, 0, 0, $month, 1, $year));
  	$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));

	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 1; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	//print_r($events);

	if (!empty($_GET['id'])) {
			$id = $_GET['id'];
		}
		else {
			$id = "0";
	}


	if (!empty($_GET['project'])) {
		$project = $_GET['project'];
	}
	else {
		$project = "0";
	}

	$day_formatted = "";

	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day"><div style="position:relative;height:110px;">';
			/* add in the day number */
			$calendar.= '<div class="column-header"><div class="day-number day">'.$list_day.'</div>';
			//if ($project > 0 && is_numeric($project) && $id > 0 && is_numeric($id) ) {
				$calendar.= '<div class="day-number add"><a href="event-registration.php?id='.$id.'&project='.$project.'&day='.$list_day.'&month='.$month.'&year='.$year.'" title="Přidat událost">+</a></div></div>';
			//}
			
			
			$monthFormated = $month;
			if ($month<10) {
				(int)$monthFormated = "0".$month;
			}

			if ($list_day<10) {
				(int)$day_formatted = "0".$list_day;
			}
			else {
				(int)$day_formatted = $list_day;
			}

			$event_day = $year.'-'.$monthFormated.'-'.$day_formatted;
			//echo "<br>$event_day";

			if(isset($events[$event_day])) {
			//if($event_day==$events[]) {
				//echo " - dnes je akce";
				$idUser = $_SESSION['id_user'];
				foreach($events[$event_day] as $event) {
					$title = $link = $color = "";
					if ($event['id_user'] == "1") { $color = "grey-bg"; $link = "event-edit.php?id=".$event['id_mdg_event']; $title="Upravit akci"; }
					else if ( ( ($event['id_user'] != $idUser)  && ($event['id_user_koo'] != $idUser) )) { $color = "display-none"; }
					else if ($event['schvaleno'] == "ano") { $color = "green-bg"; $link = "event-show.php?id=".$event['id_mdg_event']; $title="Zobrazit akci"; }
					else if ($event['splneno'] == "ano") { $color = "orange-bg"; $link = "event-revision.php?id=".$event['id_mdg_event']; $title="Zkontrolovat akci"; }
					else { $color = "red-bg"; $link = "event-fill.php?id=".$event['id_mdg_event']; $title="Vyplnit akci"; }



					$calendar.= '<a href="'.$link.'" title="'.$title.'"><div class="event '.$color.'">'.$event['nadpis'].'</div></a>';
				}
			}
			else {
				$calendar.= str_repeat('<p>&nbsp;</p>',2);
			}
		$calendar.= '</div></td>';
    	// New row
		//if($running_day == 6):
		if($running_day == 7):
			$calendar.= '</tr>';
			if(($day_counter+1) < $days_in_month):
				$calendar.= '<tr class="calendar-row"> ';
				//$calendar.=  "<td>day counter je $day_counter </td>";
			endif;
			//$running_day = -1;
			$running_day = 0;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8 && $days_in_this_week != 1):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';
	

	/* end the table */
	$calendar.= '</table>';

	/** DEBUG **/
	$calendar = str_replace('</td>','</td>'."\n",$calendar);
	$calendar = str_replace('</tr>','</tr>'."\n",$calendar);
	
	/* all done, return result */
	return $calendar;
}

function random_number() {
	srand(time());
	return (rand() % 7);
}

/* date settings */
//$month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
//$year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));

if (!empty($_GET['month'])) { $month = (int) ($_GET['month'] ? $_GET['month'] : date('m')); } else {  $month = date('m'); }
if (!empty($_GET['year'])) { $year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));} else {  $year = date('Y'); }

/* select month control */
$select_month_control = '<select name="month" id="month">';
for($x = 1; $x <= 12; $x++) {
	$select_month_control.= '<option value="'.$x.'"'.($x != $month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$x,1,$year)).'</option>';
}
$select_month_control.= '</select>';

/* select year control */
$year_range = 7;
$select_year_control = '<select name="year" id="year">';
for($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
	$select_year_control.= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
}
$select_year_control.= '</select>';

/* "next month" control */
$next_month_link = '<a href="?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'&project='.$project.'" class="control">Next Month &gt;&gt;</a>';

/* "previous month" control */
$previous_month_link = '<a href="?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'&project='.$project.'" class="control">&lt;&lt; 	Previous Month</a>';


/* bringing the controls together */
/*$controls = '<form method="get">'.$select_month_control.$select_year_control.'&nbsp;<input type="submit" name="submit" value="Go" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$previous_month_link.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$next_month_link.' </form>';
*/
/* get all events for the given month */


$conn = dbConnect(); // Připojíme se k databázi
mysqli_query($conn, "SET NAMES utf8");
$events = array();
$monthFormated = $month;
if ($month<10) {
	(int)$monthFormated = "0".$month;
}
//echo "$monthFormated <br>";

$sql = "SELECT nadpis, DATE_FORMAT(datum,'%Y-%m-%d') AS datum, splneno, schvaleno, id_user, id_user_koo, id_mdg_event FROM mdg_events WHERE datum LIKE '$year-$monthFormated%' AND id_mdg_company = '$id'";
if ($id==0) {
	$sql = "SELECT nadpis, DATE_FORMAT(datum,'%Y-%m-%d') AS datum, splneno, schvaleno, id_user, id_user_koo, id_mdg_event FROM mdg_events WHERE datum LIKE '$year-$monthFormated%' AND id_mdg_company >= '$id'";
}


if ( $project==0 && $id == 0 ) {
	$sql = "SELECT nadpis, DATE_FORMAT(datum,'%Y-%m-%d') AS datum, splneno, schvaleno, id_user, id_user_koo, id_mdg_event FROM mdg_events WHERE datum LIKE '$year-$monthFormated%' AND id_mdg_company > '$id' AND id_mdg_project > '$project'";
}
else if ($project==0 && $id > 0) {
	$sql = "SELECT nadpis, DATE_FORMAT(datum,'%Y-%m-%d') AS datum, splneno, schvaleno, id_user, id_user_koo, id_mdg_event FROM mdg_events WHERE datum LIKE '$year-$monthFormated%' AND id_mdg_company = '$id' AND id_mdg_project > '$project'";
}
else if ($project > 0 && $id > 0) {
	$sql = "SELECT nadpis, DATE_FORMAT(datum,'%Y-%m-%d') AS datum, splneno, schvaleno, id_user, id_user_koo, id_mdg_event FROM mdg_events WHERE datum LIKE '$year-$monthFormated%' AND id_mdg_company = '$id' AND id_mdg_project = '$project'";
}
else {
	$sql = "SELECT nadpis, DATE_FORMAT(datum,'%Y-%m-%d') AS datum, splneno, schvaleno, id_user, id_user_koo, id_mdg_event FROM mdg_events WHERE datum LIKE '$year-$monthFormated%' AND id_mdg_company > '$id' AND id_mdg_project = '$project'";
} 

//echo "$sql<br>";

$result = mysqli_query($conn,$sql) or die('cannot get results!');
//$i = 0;
while($row = mysqli_fetch_assoc($result)) {
	$events[$row['datum']][] = $row;
}

//echo '<h2 style="float:left; padding-right:30px;">'.date('F',mktime(0,0,0,$month,1,$year)).' '.$year.'</h2>';
//echo '<div style="float:left;">'.$controls.'</div>';
echo '<div style="clear:both;"></div>';
echo draw_calendar($month,$year,$events);
echo '<br /><br />';

 ?>
