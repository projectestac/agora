<?PHP // $Id: csv.php,v 1.1 2008/02/13 10:22:46 sarjona Exp $

/////////////////////////////////////////////////////////////////////////////////
///  QV Services to get CSV information
///  Author: Sara Arjona Téllez (sara.arjona@gmail.com)
/////////////////////////////////////////////////////////////////////////////////

  require_once("../../../config.php");
  require_once("../lib.php");

	$qvid = $_REQUEST['qvid'];
	if (isset($qvid)){
  	if ($qv=get_record('qv', 'id', $qvid)){
      header("Content-Type: text/csv; charset=UTF-8");
      header("Content-Disposition: attachment; filename=qv_report_".$qvid.".csv");
      $assignments=get_records('qv_assignments', 'qvid', $qvid);
      foreach ($assignments as $assignment) {
        $user=get_record('user','id',$assignment->userid);
        $assignment_summary=qv_get_assignment_summary($assignment->qvid, $assignment->userid);
        echo "'$user->lastname, $user->firstname';'$assignment_summary->score';'$assignment_summary->attempts' \n";
        if ($sections=get_records('qv_sections', 'assignmentid', $assignment->id)){
          foreach($sections as $section){
            $section_summary=qv_get_section_summary($section);
            echo "'    $section->sectionid';'$section_summary->score';'$section_summary->attempts' \n";
          }
        }
      }
    }else{
      echo "specified qvid doesn't exist: $qvid";
    }
  }else{
    echo "missing required parameter: qvid";
  }
	
?>
