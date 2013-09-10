<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

require ($CFG->dirroot.'/mod/rscorm/datamodels/scormlib.php');

function rscorm_seq_evaluate($scoid,$usertracks) {
    return true;
}

function rscorm_seq_overall ($scoid,$userid,$request,$attempt) {
    $seq = rscorm_seq_navigation($scoid,$userid,$request,$attempt);
    if ($seq->navigation) {
        if ($seq->termination != null) {
            $seq = rscorm_seq_termination($scoid,$userid,$seq);
        }
        if ($seq->sequencing != null) {
            $seq = rscorm_seq_sequencing($scoid,$userid,$seq);
            if($seq->sequencing == 'exit'){//return the control to the LTS
                return 'true';
            }
        }
        if ($seq->delivery != null) {
            $seq = rscorm_sequencing_delivery($scoid,$userid,$seq);
            $seq = rscorm_content_delivery_environment ($seq,$userid);
        }
    }
    if ($seq->exception != null) {
        $seq = rscorm_sequencing_exception($seq);
    }
    return 'true';
}


function rscorm_seq_navigation ($scoid,$userid,$request,$attempt=0) {
    global $DB;

    /// Sequencing structure
    $seq = new stdClass();
    $seq->currentactivity = rscorm_get_sco($scoid);
    $seq->traversaldir = null;
    $seq->nextactivity = null;
    $seq->deliveryvalid = null;
    $seq->attempt = $attempt;

    $seq->identifiedactivity = null;
    $seq->delivery = null;
    $seq->deliverable = false;
    $seq->active = rscorm_seq_is('active',$scoid,$userid);
    $seq->suspended = rscorm_seq_is('suspended',$scoid,$userid);
    $seq->navigation = null;
    $seq->termination = null;
    $seq->sequencing = null;
    $seq->target = null;
    $seq->endsession = null;
    $seq->exception = null;
    $seq->reachable = true;
    $seq->prevact = true;

    switch ($request) {
        case 'start_':
            if (empty($seq->currentactivity)) {
                $seq->navigation = true;
                $seq->sequencing = 'start';
            } else {
                $seq->exception = 'NB.2.1-1'; /// Sequencing session already begun
            }
        break;
        case 'resumeall_':
            if (empty($seq->currentactivity)) {
                if ($track = $DB->get_record('rscorm_scoes_track', array('scoid'=>$scoid,'userid'=>$userid,'element'=>'suspendedactivity'))) {//I think it's suspend instead of suspendedactivity
                    $seq->navigation = true;
                    $seq->sequencing = 'resumeall';
                } else {
                    $seq->exception = 'NB.2.1-3'; /// No suspended activity found
                }
            } else {
                $seq->exception = 'NB.2.1-1'; /// Sequencing session already begun
            }
        break;
        case 'continue_':
        case 'previous_':
            if (!empty($seq->currentactivity)) {
                $sco = $seq->currentactivity;
                if ($sco->parent != '/') {
                    if ($parentsco = rscorm_get_parent($sco)) {

                         if (isset($parentsco->flow) && ($parentsco->flow == true)) {//I think it's parentsco
                            // Current activity is active !
                            if (rscorm_seq_is('active',$sco->id,$userid)) {
                                if ($request == 'continue_') {
                                    $seq->navigation = true;
                                    $seq->termination = 'exit';
                                    $seq->sequencing = 'continue';
                                } else {
                                    if (!isset($parentsco->forwardonly) || ($parentsco->forwardonly == false)) {
                                        $seq->navigation = true;
                                        $seq->termination = 'exit';
                                        $seq->sequencing = 'previous';
                                    } else {
                                        $seq->exception = 'NB.2.1-5'; /// Violates control mode
                                    }
                                }
                            }
                        }

                    }
                }
            } else {
                $seq->exception = 'NB.2.1-2'; /// Current activity not defined
            }
        break;
        case 'forward_':
        case 'backward_':
            $seq->exception = 'NB.2.1-7' ; /// None to be done, behavior not defined
        break;
        case 'exit_':
        case 'abandon_':
            if (!empty($seq->currentactivity)) {
                // Current activity is active !
                $seq->navigation = true;
                $seq->termination = substr($request,0,-1);
                $seq->sequencing = 'exit';
            } else {
                $seq->exception = 'NB.2.1-2'; /// Current activity not defined
            }
        case 'exitall_':
        case 'abandonall_':
        case 'suspendall_':
            if (!empty($seq->currentactivity)) {
                $seq->navigation = true;
                $seq->termination = substr($request,0,-1);
                $seq->sequencing = 'exit';
            } else {
                $seq->exception = 'NB.2.1-2'; /// Current activity not defined
            }
        break;
        default: /// {target=<STRING>}choice
            if ($targetsco = $DB->get_record('rscorm_scoes', array('scorm'=>$sco->scorm,'identifier'=>$request))) {
                if ($targetsco->parent != '/') {
                    $seq->target = $request;
                } else {
                    if ($parentsco = rscorm_get_parent($targetsco)) {
                        if (!isset($parentsco->choice) || ($parentsco->choice == true)) {
                            $seq->target = $request;
                        }
                    }
                }
                if ($seq->target != null) {
                    if (empty($seq->currentactivity)) {
                        $seq->navigation = true;
                        $seq->sequencing = 'choice';
                    } else {
                        if (!$sco = rscorm_get_sco($scoid)) {
                            return $seq;
                        }
                        if ($sco->parent != $targetsco->parent) {
                            $ancestors = rscorm_get_ancestors($sco);
                            $commonpos = rscorm_find_common_ancestor($ancestors,$targetsco);
                            if ($commonpos !== false) {
                                if ($activitypath = array_slice($ancestors,0,$commonpos)) {
                                    foreach ($activitypath as $activity) {
                                        if (rscorm_seq_is('active',$activity->id,$userid) && (isset($activity->choiceexit) && ($activity->choiceexit == false))) {
                                            $seq->navigation = false;
                                            $seq->termination = null;
                                            $seq->sequencing = null;
                                            $seq->target = null;
                                            $seq->exception = 'NB.2.1-8'; /// Violates control mode
                                            return $seq;
                                        }
                                    }
                                } else {
                                    $seq->navigation = false;
                                    $seq->termination = null;
                                    $seq->sequencing = null;
                                    $seq->target = null;
                                    $seq->exception = 'NB.2.1-9';
                                }
                            }
                        }
                        // Current activity is active !
                        $seq->navigation = true;
                        $seq->sequencing = 'choice';
                    }
                } else {
                    $seq->exception = 'NB.2.1-10';  /// Violates control mode
                }
            } else {
                $seq->exception = 'NB.2.1-11';  /// Target activity does not exists
            }
        break;
    }
    return $seq;
}

function rscorm_seq_termination ($seq,$userid) {
    if (empty($seq->currentactivity)) {
        $seq->termination = false;
        $seq->exception = 'TB.2.3-1';
        return $seq;
    }

    $sco = $seq->currentactivity;

    if ((($seq->termination == 'exit') || ($seq->termination == 'abandon')) && !$seq->active) {
        $seq->termination = false;
        $seq->exception = 'TB.2.3-2';
        return $seq;
    }
    switch ($seq->termination) {
        case 'exit':
            rscorm_seq_end_attempt($sco,$userid,$seq);
            $seq = rscorm_seq_exit_action_rules($seq,$userid);
            do {
                $exit = false;// I think this is false. Originally this was true
                $seq = rscorm_seq_post_cond_rules($seq,$userid);
                if ($seq->termination == 'exitparent') {
                    if ($sco->parent != '/') {
                        $sco = rscorm_get_parent($sco);
                        $seq->currentactivity = $sco;
                        $seq->active = rscorm_seq_is('active',$sco->id,$userid);
                        rscorm_seq_end_attempt($sco,$userid,$seq);
                        $exit = true;//I think it's true. Originally this was false
                    } else {
                        $seq->termination = false;
                        $seq->exception = 'TB.2.3-4';
                        return $seq;
                    }
                }
            } while (($exit == false) && ($seq->termination == 'exit'));
            if ($seq->termination == 'exit') {
                $seq->termination = true;
                return $seq;
            }
        case 'exitall':
            if ($seq->active) {
                rscorm_seq_end_attempt($sco,$userid,$seq);
            }
            /// Terminate Descendent Attempts Process


            if ($ancestors = rscorm_get_ancestors($sco)) {
                foreach ($ancestors as $ancestor) {
                    rscorm_seq_end_attempt($ancestor,$userid,$seq);
                    $seq->currentactivity = $ancestor;
                }
            }

            $seq->active = rscorm_seq_is('active',$seq->currentactivity->id,$userid);
            $seq->termination = true;
            $seq->sequencing = exit;
        break;
        case 'suspendall':
            if (($seq->active) || ($seq->suspended)) {
                rscorm_seq_set('suspended',$sco->id,$userid);
            } else {
                if ($sco->parent != '/') {
                    $parentsco = rscorm_get_parent($sco);
                    rscorm_seq_set('suspended',$parentsco->id,$userid);
                } else {
                    $seq->termination = false;
                    $seq->exception = 'TB.2.3-3';
                    // return $seq;
                }
            }
            if ($ancestors = rscorm_get_ancestors($sco)) {
                foreach ($ancestors as $ancestor) {
                    rscorm_seq_set('active',$ancestor->id,$userid,false);
                    rscorm_seq_set('suspended',$ancestor->id,$userid);
                    $seq->currentactivity = $ancestor;
                }
                $seq->termination = true;
                $seq->sequencing = 'exit';
            } else {
                $seq->termination = false;
                $seq->exception = 'TB.2.3-5';
            }
        break;
        case 'abandon':
            rscorm_seq_set('active',$sco->id,$userid,false);
            $seq->active = null;
            $seq->termination = true;
        break;
        case 'abandonall':
            if ($ancestors = rscorm_get_ancestors($sco)) {
                foreach ($ancestors as $ancestor) {
                    rscorm_seq_set('active',$ancestor->id,$userid,false);
                    $seq->currentactivity = $ancestor;
                }
                $seq->termination = true;
                $seq->sequencing = 'exit';
            } else {
                $seq->termination = false;
                $seq->exception = 'TB.2.3-6';
            }
        break;
        default:
            $seq->termination = false;
            $seq->exception = 'TB.2.3-7';
        break;
    }
    return $seq;
}

function rscorm_seq_end_attempt($sco,$userid,$seq) {
    global $DB;

    if (rscorm_is_leaf($sco)) {
        if (!isset($sco->tracked) || ($sco->tracked == 1)) {
            if (!rscorm_seq_is('suspended',$sco->id,$userid)) {
                if (!isset($sco->completionsetbycontent) || ($sco->completionsetbycontent == 0)) {
                    if (!rscorm_seq_is('attemptprogressstatus',$sco->id,$userid,$seq->attempt)) {
                  // if (!scorm_seq_is('attemptprogressstatus',$sco->id,$userid)) {
                        rscorm_seq_set('attemptprogressstatus',$sco->id,$userid);
                        rscorm_seq_set('attemptcompletionstatus',$sco->id,$userid);
                    }
                }
                if (!isset($sco->objectivesetbycontent) || ($sco->objectivesetbycontent == 0)) {
                    if ($objectives = $DB->get_records('rscorm_seq_objective', array('scoid'=>$sco->id))) {
                        foreach ($objectives as $objective) {
                            if ($objective->primaryobj) {
                                //if (!scorm_seq_objective_progress_status($sco,$userid,$objective)) {
                                if (!rscorm_seq_is('objectiveprogressstatus',$sco->id,$userid)) {
                                    rscorm_seq_set('objectiveprogressstatus',$sco->id,$userid);
                                    rscorm_seq_set('objectivesatisfiedstatus',$sco->id,$userid);
                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        if ($children = rscorm_get_children($sco)) {
            $suspended = false;
            foreach ($children as $child) {
                if (rscorm_seq_is('suspended',$child,$userid)) {
                    $suspended = true;
                    break;
                }
            }
            if ($suspended) {
                rscorm_seq_set('suspended',$sco,$userid);
            } else {
                rscorm_seq_set('suspended',$sco,$userid,false);
            }
        }
    }
    rscorm_seq_set('active',$sco,$userid,0,false);
    rscorm_seq_overall_rollup($sco,$userid, $seq);
}

function rscorm_seq_is($what, $scoid, $userid, $attempt=0) {
    global $DB;

    /// Check if passed activity $what is active
    $active = false;
    if ($track = $DB->get_record('rscorm_scoes_track', array('scoid'=>$scoid,'userid'=>$userid,'attempt'=>$attempt,'element'=>$what))) {
        $active = true;
    }
    return $active;
}

function rscorm_seq_set($what, $scoid, $userid, $attempt=0, $value='true') {
    global $DB;

    $sco = rscorm_get_sco($scoid);

    /// set passed activity to active or not
    if ($value == false) {
        $DB->delete_record('rscorm_scoes_track', array('scoid'=>$scoid,'userid'=>$userid,'attempt'=>$attempt,'element'=>$what));
    } else {
        rscorm_insert_track($userid, $sco->scorm, $sco->id, 0, $what, $value);
    }

    // update grades in gradebook
    $scorm = $DB->get_record('rscorm', array('id'=>$sco->scorm));
    rscorm_update_grades($scorm, $userid, true);
}

function rscorm_seq_exit_action_rules($seq,$userid) {
    $sco = $seq->currentactivity;
    $ancestors = rscorm_get_ancestors($sco);
    $exittarget = null;
    foreach (array_reverse($ancestors) as $ancestor) {
        if (rscorm_seq_rules_check($ancestor,'exit') != null) {
            $exittarget = $ancestor;
            break;
        }
    }
    if ($exittarget != null) {
        $commons = array_slice($ancestors,0,rscorm_find_common_ancestor($ancestors,$exittarget));

        /// Terminate Descendent Attempts Process
        if ($commons) {
            foreach ($commons as $ancestor) {

                rscorm_seq_end_attempt($ancestor,$userid,$seq->attempt);
                $seq->currentactivity = $ancestor;
            }
        }
    }
    return $seq;
}

function rscorm_seq_post_cond_rules($seq,$userid) {
    $sco = $seq->currentactivity;
    if (!$seq->suspended) {
        if ($action = rscorm_seq_rules_check($sco,'post') != null) {
            switch($action) {
                case 'retry':
                case 'continue':
                case 'previous':
                    $seq->sequencing = $action;
                break;
                case 'exitparent':
                case 'exitall':
                    $seq->termination = $action;
                break;
                case 'retryall':
                    $seq->termination = 'exitall';
                    $seq->sequencing = 'retry';
                break;
            }
        }
    }
    return $seq;
}

function rscorm_seq_rules_check ($sco, $action){
    global $DB;

    $act = null;
    if($rules = $DB->get_records('rscorm_seq_ruleconds', array('scoid'=>$sco->id,'action'=>$action))) {
        foreach ($rules as $rule){
            if($act = rscorm_seq_rule_check($sco,$rule)){
                return $act;
            }
        }
    }
    return $act;

}

function rscorm_seq_rule_check ($sco, $rule){
    global $DB;

    $bag = Array();
    $cond = '';
    $ruleconds = $DB->get_records('rscorm_seq_rulecond', array('scoid'=>$sco->id,'ruleconditionsid'=>$rule->id));
    foreach ($ruleconds as $rulecond){
         if ($rulecond->operator = 'not') {
             if ($rulecond->cond != 'unknown' ){
                $rulecond->cond = 'not'.$rulecond;
             }
         }
         $bag [$rule->id] = $rulecond->cond;

    }
    if (empty($bag)){
        $cond = 'unknown';
        return $cond;
    }

    $size= sizeof($bag);
    $i=0;

    if ($rule->conditioncombination = 'all'){
        foreach ($bag as $con){
                $cond = $cond.' and '.$con;

        }
    }
    else{
        foreach ($bag as $con){
            $cond = $cond.' or '.$con;
        }
    }
    return $cond;
}


function rscorm_seq_overall_rollup($sco,$userid, $seq){//Carlos

     if ($ancestors = rscorm_get_ancestors($sco)) {
            foreach ($ancestors as $ancestor) {
                if(!rscorm_is_leaf($ancestor)){
                    rscorm_seq_measure_rollup($sco,$userid);
                }
                rscorm_seq_objective_rollup($sco,$userid);
                rscorm_seq_activity_progress_rollup($sco,$userid, $seq);

            }

     }
}

/* For this next function I have defined measure weight and measure status as records with the attempt = 0 on the scorm_scoes_track table. According to the page 89 of the SeqNav.pdf those datas give us some information about the progress of the objective*/

function rscorm_seq_measure_rollup($sco,$userid){
    global $DB;

    $totalmeasure = 0; //Check if there is something similar in the database
    $valid = false;//Same as in the last line
    $countedmeasures = 0;//Same too
    $targetobjective = null;
    $readable = true;//to check if status and measure weight are readable
    $objectives = $DB->get_records('rscorm_seq_objective', array('scoid'=>$sco->id));

    foreach ($objectives as $objective){

        if ($objective->primaryobj == true){//Objective contributes to rollup I'm using primaryobj field, but not
            $targetobjective = $objective;
            break;
        }

    }

    if ($targetobjective != null){
        $children = rscorm_get_children($sco);
        foreach ($children as $child){
            $child = rscorm_get_sco ($child);
            if (!isset($child->tracked) || ($child->tracked == 1)){

                $rolledupobjective = null;// we set the rolled up activity to undefined
                $objectives = $DB->get_records('rscorm_seq_objective', array('scoid'=>$child->id));
                foreach ($objectives as $objective){
                    if ($objective->primaryobj == true){//Objective contributes to rollup I'm using primaryobj field, but not
                        $rolledupobjective = $objective;
                        break;
                    }
                }
                if ($rolledupobjective != null){
                    $child = rscorm_get_sco($child->id);

                    $countedmeasures = $countedmeasures + ($child->measureweight);
                    if (!rscorm_seq_is('objectivemeasurestatus',$sco->id,$userid)) {
                        $normalizedmeasure = $DB->get_record('rscorm_scoes_track', array('scoid'=>$child->id,'userid'=>$userid,'element'=>'objectivenormalizedmeasure'));
                        $totalmeasure = $totalmeasure + (($normalizedmeasure->value) * ($child->measureweight));
                        $valid = true;
                    }



                }
            }
        }


        if(!$valid){

            rscorm_seq_set('objectivemeasurestatus',$sco->id,$userid,false);

        }
        else{
            if($countedmeasures>0){
                rscorm_seq_set('objectivemeasurestatus',$sco->id,$userid);
                $val=$totalmeasure/$countedmeasures;
                rscorm_seq_set('objectivenormalizedmeasure',$sco->id,$userid,$val);

            }
            else{
                rscorm_seq_set('objectivemeasurestatus',$sco->id,$userid,false);

            }
        }

    }

}

function rscorm_seq_objective_rollup($sco,$userid){
    global $DB;

    rscorm_seq_objective_rollup_measure($sco,$userid);
    rscorm_seq_objective_rollup_rules($sco,$userid);
    rscorm_seq_objective_rollup_default($sco,$userid);

/*
    if($targetobjective->satisfiedbymeasure){
        scorm_seq_objective_rollup_measure($sco,$userid);
    }
    else{
        if ((scorm_seq_rollup_rule_check($sco,$userid,'incomplete'))|| (scorm_seq_rollup_rule_check($sco,$userid,'completed'))){
            scorm_seq_objective_rollup_rules($sco,$userid);
        }
        else{

            $rolluprules = $DB->get_record('scorm_seq_rolluprule', array('scoid'=>$sco->id,'userid'=>$userid));
            foreach($rolluprules as $rolluprule){
                $rollupruleconds = $DB->get_records('scorm_seq_rolluprulecond', array('rollupruleid'=>$rolluprule->id));
                foreach($rollupruleconds as $rolluprulecond){

                    switch ($rolluprulecond->cond!='satisfied' && $rolluprulecond->cond!='completed' && $rolluprulecond->cond!='attempted'){

                           scorm_seq_set('objectivesatisfiedstatus',$sco->id,$userid, false);

                        break;
                    }
                }


        }
    }
*/
}

function rscorm_seq_objective_rollup_measure($sco,$userid){
    global $DB;

    $targetobjective = null;


    $objectives = $DB->get_records('rscorm_seq_objective', array('scoid'=>$sco->id));
    foreach ($objectives as $objective){
        if ($objective->primaryobj == true){
            $targetobjective = $objective;
            break;
        }
    }
    if ($targetobjective != null){

        if($targetobjective->satisfiedbymeasure){


            if (!rscorm_seq_is('objectiveprogressstatus',$sco->id,$userid)) {

                rscorm_seq_set('objectiveprogressstatus',$sco->id,$userid,false);

            }

            else{
                if (rscorm_seq_is('active',$sco->id,$userid)) {
                    $isactive = true;
                }
                else{
                    $isactive = false;
                }

                $normalizedmeasure = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'objectivenormalizedmeasure'));

                $sco = rscorm_get_sco ($sco->id);

                if (!$isactive || ($isactive && (!isset($sco->measuresatisfactionifactive) || $sco->measuresatisfactionifactive == true))){
                    if($normalizedmeasure->value >= $targetobjective->minnormalizedmeasure){
                        rscorm_seq_set('objectiveprogressstatus',$sco->id,$userid);
                        rscorm_seq_set('objectivesatisfiedstatus',$sco->id,$userid);
                    }
                    else{
                        rscorm_seq_set('objectiveprogressstatus',$sco->id,$userid);
                        rscorm_seq_set('objectivesatisfiedstatus',$sco->id,$userid,false);
                    }
                }
                else{

                    rscorm_seq_set('objectiveprogressstatus',$sco->id,$userid,false);

                }
            }
        }
    }

}

function rscorm_seq_objective_rollup_default($sco,$userid){
    global $DB;

    if (!(rscorm_seq_rollup_rule_check($sco,$userid,'incomplete')) && !(rscorm_seq_rollup_rule_check($sco,$userid,'completed'))){

            $rolluprules = $DB->get_record('rscorm_seq_rolluprule', array('scoid'=>$sco->id,'userid'=>$userid));
            foreach($rolluprules as $rolluprule){
                $rollupruleconds = $DB->get_records('rscorm_seq_rolluprulecond', array('rollupruleid'=>$rolluprule->id));
                foreach($rollupruleconds as $rolluprulecond){

                    if ($rolluprulecond->cond!='satisfied' && $rolluprulecond->cond!='completed' && $rolluprulecond->cond!='attempted'){

                           rscorm_seq_set('objectivesatisfiedstatus',$sco->id,$userid, false);

                        break;
                    }
                }


            }
    }

}


function rscorm_seq_objective_rollup_rules($sco,$userid){
    global $DB;

    $targetobjective = null;

    $objectives = $DB->get_records('rscorm_seq_objective', array('scoid'=>$sco->id));
    foreach ($objectives as $objective){
        if ($objective->primaryobj == true){//Objective contributes to rollup I'm using primaryobj field, but not
            $targetobjective = $objective;
            break;
        }
    }
    if ($targetobjective != null){



        if(rscorm_seq_rollup_rule_check($sco,$userid,'notsatisfied')){//with not satisfied rollup for the activity


            rscorm_seq_set('objectiveprogressstatus',$sco->id,$userid);
            rscorm_seq_set('objectivesatisfiedstatus',$sco->id,$userid,false);
        }
        if(rscorm_seq_rollup_rule_check($sco,$userid,'satisfied')){//with satisfied rollup for the activity
            rscorm_seq_set('objectiveprogressstatus',$sco->id,$userid);
            rscorm_seq_set('objectivesatisfiedstatus',$sco->id,$userid);
        }

    }

}

function rscorm_seq_activity_progress_rollup ($sco, $userid, $seq){

    if(rscorm_seq_rollup_rule_check($sco,$userid,'incomplete')){
        //incomplete rollup action
        rscorm_seq_set('attemptcompletionstatus',$sco->id,$userid,false,$seq->attempt);
        rscorm_seq_set('attemptprogressstatus',$sco->id,$userid,true,$seq->attempt);

    }
    if(rscorm_seq_rollup_rule_check($sco,$userid,'completed')){
        //incomplete rollup action
        rscorm_seq_set('attemptcompletionstatus',$sco->id,true,$userid);
        rscorm_seq_set('attemptprogressstatus',$sco->id,true,$userid);
    }

}

function rscorm_seq_rollup_rule_check ($sco,$userid,$action){
    global $DB;

     if($rolluprules = $DB->get_record('rscorm_seq_rolluprule', array('scoid'=>$sco->id,'userid'=>$userid,'action'=>$action))) {

        $childrenbag = Array ();
        $children = rscorm_get_children ($sco);

        foreach($rolluprules as $rolluprule){

            foreach ($children as $child){

                /*$tracked = $DB->get_records('scorm_scoes_track', array('scoid'=>$child->id,'userid'=>$userid));
                if($tracked && $tracked->attemp != 0){*/
                 $child = rscorm_get_sco ($child);
            if (!isset($child->tracked) || ($child->tracked == 1)){

                    if(rscorm_seq_check_child ($child,$action,$userid)){

                        $rollupruleconds = $DB->get_records('rscorm_seq_rolluprulecond', array('rollupruleid'=>$rolluprule->id));
                        $evaluate = rscorm_seq_evaluate_rollupcond($child,$rolluprule->conditioncombination,$rollupruleconds,$userid);
                        if ($evaluate=='unknown'){
                            array_push($childrenbag,'unknown');
                        }
                        else{
                            if($evaluate == true){
                                array_push($childrenbag,true);
                            }
                            else{
                                array_push($childrenbag,false);
                            }
                        }
                    }
                }

            }
            $change = false;

            switch ($rolluprule->childactivityset){

                case 'all':
                    if((array_search(false,$childrenbag)===false)&&(array_search('unknown',$childrenbag)===false)){//I think I can use this condition instead equivalent to OR
                        $change = true;
                    }
                break;

                case 'any':
                    if(array_search(true,$childrenbag)!==false){//I think I can use this condition instead equivalent to OR
                        $change = true;
                    }
                break;

                case 'none':
                    if((array_search(true,$childrenbag)===false)&&(array_search('unknown',$childrenbag)===false)){//I think I can use this condition instead equivalent to OR
                        $change = true;
                    }
                break;

                case 'atleastcount':
                    foreach ($childrenbag as $itm){//I think I can use this condition instead equivalent to OR
                        $cont = 0;
                        if($itm === true){
                            $cont++;
                        }
                        if($cont >= $rolluprule->minimumcount){
                            $change = true;
                        }
                    }
                break;

                case 'atleastcount':
                    foreach ($childrenbag as $itm){//I think I can use this condition instead equivalent to OR
                        $cont = 0;
                        if($itm === true){
                            $cont++;
                        }
                        if($cont >= $rolluprule->minimumcount){
                            $change = true;
                        }
                    }
                break;

                case 'atleastpercent':
                    foreach ($childrenbag as $itm){//I think I can use this condition instead equivalent to OR
                        $cont = 0;
                        if($itm === true){
                            $cont++;
                        }
                        if(($cont/sizeof($childrenbag)) >= $rolluprule->minimumcount){
                            $change = true;
                        }
                    }
                break;
            }
            if ($change==true){
                return true;
            }
        }
     }
     return false;
}


function rscorm_seq_evaluate_rollupcond($sco,$conditioncombination,$rollupruleconds,$userid){
    $bag = Array();
    $con = "";
    $val = false;
    $unk = false;
    foreach($rollupruleconds as $rolluprulecond){

        $condit = rscorm_evaluate_condition($rolluprulecond,$sco,$userid);

        if($rolluprulecond->operator=='not'){// If operator is not, negate the condition
            if ($rolluprulecond->cond != 'unknown'){
                if ($condit){
                    $condit = false;
                }
                else{
                    $condit = true;
                }
            }
            else{
                $condit = 'unknown';
            }
            array_push($childrenbag,$condit);
        }

    }
    if (empty($bag)){
        return 'unknown';
    }
    else{
        $i = 0;
        foreach ($bag as $b){

             if ($rolluprulecond->conditioncombination == 'all'){

                 $val = true;
                 if($b == 'unknown'){
                     $unk = true;
                 }
                 if($b === false){
                     return false;
                 }
             }

             else{

                $val = false;

                if($b == 'unknown'){
                     $unk = true;
                }
                if($b === true){
                    return true;
                }
             }


        }
    }
    if ($unk){
        return 'unknown';
    }
    return $val;

}

function rscorm_evaluate_condition ($rolluprulecond,$sco,$userid){
    global $DB;

            $res = false;

            switch ($rolluprulecond->cond){

                case 'satisfied':
                     if($r=$DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'objectivesatisfiedstatus'))) {
                        if($r->value == true){
                            if ($r=$DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'objectiveprogressstatus'))) {
                                if($r->value == true){
                                   $res= true;
                                }
                            }
                        }
                    }
                break;

                case 'objectiveStatusKnown':
                    if ($r=$DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'objectiveprogressstatus'))) {
                        if($r->value == true){
                            $res= true;
                        }
                    }
                break;

                case 'objectiveMeasureKnown':
                    if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'objectivemeasurestatus'))) {
                        if($r->value == true){
                            $res = true;
                        }

                    }

                break;

                case 'completed':
                    if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'attemptcompletionstatus'))) {
                        if($r->value){
                            if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'attemptprogressstatus'))) {
                               if($r->value){
                                  $res = true;
                               }

                            }
                        }

                    }
                break;

                case 'attempted':
                    if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'activityprogressstatus'))) {
                        if($r->value){
                            if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'activityattemptcount'))) {
                                if($r->value > 0){
                                    $res = true;
                                }

                            }
                        }

                    }
                break;


                case 'attemptLimitExceeded':
                    if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'activityprogressstatus'))) {
                        if($r->value){
                            if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'limitconditionattemptlimitcontrol'))) {
                                if($r->value){
                                   if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'activityattemptcount')) && $r2 = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'limitconditionattemptlimit')) ){
                                       if($r->value >= $r2->value){
                                           $res = true;
                                       }

                                   }

                                }

                            }

                        }

                    }

                break;

                case 'activityProgressKnown':

                    if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'activityprogressstatus'))) {
                        if($r->value){
                            if ($r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'attemptprogressstatus'))) {
                                if($r->value){
                                    $res = true;
                                }

                            }

                        }

                    }

                break;
            }
            return $res;

}

function rscorm_seq_check_child ($sco, $action, $userid){
    global $DB;

    $included = false;
    $sco=rscorm_get_sco($sco->id);
    $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$sco->id,'userid'=>$userid,'element'=>'activityattemptcount'));
    if ($action == 'satisfied' || $action == 'notsatisfied'){
      if (!$sco->rollupobjectivesatisfied){
        $included = true;
        if (($action == 'satisfied' && $sco->requiredforsatisfied == 'ifnotsuspended') || ($action == 'notsatisfied' && $sco->requiredfornotsatisfied == 'ifnotsuspended')){

            if (!rscorm_seq_is('activityprogressstatus',$sco->id,$userid) || ((($r->value)>0)&& !rscorm_seq_is('suspended',$sco->id,$userid))){
                $included = false;
            }

        }
        else{
            if (($action == 'satisfied' && $sco->requiredforsatisfied == 'ifattempted') || ($action == 'notsatisfied' && $sco->requiredfornotsatisfied == 'ifattempted')){
                if (!rscorm_seq_is('activityprogressstatus',$sco->id,$userid) || (($r->value) == 0)){
                    $included = false;
                }
            }
            else{
                if (($action == 'satisfied' && $sco->requiredforsatisfied == 'ifnotskipped') || ($action == 'notsatisfied' && $sco->requiredfornotsatisfied == 'ifnotskipped')){
                    $rulch = rscorm_seq_rules_check($sco, 'skip');
                    if ($rulch != null){
                        $included = false;
                    }
                }
            }
        }
      }
    }
    if ($action == 'completed' || $action == 'incomplete'){
        if (!$sco->rollupprogresscompletion){
            $included = true;

            if (($action == 'completed' && $sco->requiredforcompleted == 'ifnotsuspended') || ($action == 'incomplete' && $sco->requiredforincomplete == 'ifnotsuspended')){

                if (!rscorm_seq_is('activityprogressstatus',$sco->id,$userid) || ( (($r->value)>0)&& !rscorm_seq_is('suspended',$sco->id,$userid))){
                    $included = false;
                }

            }
            else{

                if (($action == 'completed' && $sco->requiredforcompleted == 'ifattempted') || ($action == 'incomplete' && $sco->requiredforincomplete == 'ifattempted')){
                    if (!rscorm_seq_is('activityprogressstatus',$sco->id,$userid) || (($r->value)==0)){
                        $included = false;
                    }

                }
                else{
                    if (($action == 'completed' && $sco->requiredforsatisfied == 'ifnotskipped') || ($action == 'incomplete' && $sco->requiredfornotsatisfied == 'ifnotskipped')){
                        $rulch = rscorm_seq_rules_check($sco, 'skip');
                        if ($rulch != null){
                            $included = false;
                        }
                    }
                }


            }

        }
    }
    return $included;


}
function rscorm_seq_sequencing ($scoid,$userid,$seq) {

    switch ($seq->sequencing) {

        case 'start':
            $seq = rscorm_seq_start_sequencing($scoid,$userid,$seq); //We'll see the parameters we have to send, this should update delivery and end
            $seq->sequencing = true;


            break;

        case 'resumeall':
            $seq = rscorm_seq_resume_all_sequencing($scoid,$userid,$seq); //We'll see the parameters we have to send, this should update delivery and end
            $seq->sequencing = true;



            break;

        case 'exit':
             $seq = rscorm_seq_exit_sequencing($scoid,$userid,$seq); //We'll see the parameters we have to send, this should update delivery and end
            $seq->sequencing = true;



            break;

        case 'retry':
            $seq = rscorm_seq_retry_sequencing($scoid,$userid,$seq); //We'll see the parameters we have to send, this should update delivery and end
            $seq->sequencing = true;


            break;

        case 'previous':
            $seq = rscorm_seq_previous_sequencing($scoid,$userid,$seq);// We'll see the parameters we have to send, this should update delivery and end
            $seq->sequencing = true;


            break;

        case 'choice':
            $seq = rscorm_seq_choice_sequencing($scoid,$userid,$seq);// We'll see the parameters we have to send, this should update delivery and end
             $seq->sequencing = true;


            break;

    }

    if ($seq->exception != null){
        $seq->sequencing = false;
        return $seq;
    }

    $seq->sequencing= true;
    return $seq;
}


function rscorm_seq_start_sequencing($scoid,$userid,$seq){
    global $DB;

    if (!empty($seq->currentactivity)) {
        $seq->delivery = null;
        $seq->exception = 'SB.2.5-1';
        return $seq;
    }
    $sco = $DB->get_record('rscorm_scoes', array('scoid'=>$scoid,'userid'=>$userid));
    if (($sco->parent == '/') && rscorm_is_leaf($sco)) {//if the activity is the root and is leaf
        $seq->delivery = $sco;
    }
    else{
        $ancestors = rscorm_get_ancestors($sco);
        $ancestorsroot = array_reverse($ancestors);
        $res = rscorm_seq_flow($ancestorsroot[0],'forward',$seq,true,$userid);
        if($res){
            return $res;
        }
        else{
            //return end and exception
        }
    }
}

function rscorm_seq_resume_all_sequencing($scoid,$userid,$seq){
    global $DB;

    if (!empty($seq->currentactivity)){
        $seq->delivery = null;
        $seq->exception = 'SB.2.6-1';
        return $seq;
    }
    $track = $DB->get_record('rscorm_scoes_track', array('scoid'=>$scoid,'userid'=>$userid,'element'=>'suspendedactivity'));
    if (!$track) {
        $seq->delivery = null;
        $seq->exception = 'SB.2.6-2';
        return $seq;
    }
    $seq->delivery = $DB->get_record('rscorm_scoes', array('scoid'=>$scoid,'userid'=>$userid));//we assign the sco to the delivery

}

function rscorm_seq_continue_sequencing($scoid,$userid,$seq){
    if (empty($seq->currentactivity)) {
        $seq->delivery = null;
        $seq->exception = 'SB.2.7-1';
        return $seq;
    }
    $currentact= $seq->currentactivity;
    if ($currentact->parent != '/') {//if the activity is the root and is leaf
        $parent = rscorm_get_parent ($currentact);

         if (!isset($parent->flow) || ($parent->flow == false)) {
            $seq->delivery = null;
            $seq->exception = 'SB.2.7-2';
            return $seq;
        }

        $res = rscorm_seq_flow($currentact,'forward',$seq,false,$userid);
        if($res){
            return $res;
        }
        else{
            //return end and exception
        }

    }
}

function rscorm_seq_previous_sequencing($scoid,$userid,$seq){
    if (empty($seq->currentactivity)) {
        $seq->delivery = null;
        $seq->exception = 'SB.2.8-1';
        return $seq;
    }

    $currentact= $seq->currentactivity;
    if ($currentact->parent != '/') {//if the activity is the root and is leaf
        $parent = rscorm_get_parent ($currentact);
        if (!isset($parent->flow) || ($parent->flow == false)) {
            $seq->delivery = null;
            $seq->exception = 'SB.2.8-2';
            return $seq;
        }

        $res = rscorm_seq_flow($currentact,'backward',$seq,false,$userid);
        if($res){
            return $res;
        }
        else{
            //return end and exception
        }

    }

}

function rscorm_seq_exit_sequencing($scoid,$userid,$seq){
    if (empty($seq->currentactivity)) {
        $seq->delivery = null;
        $seq->exception = 'SB.2.11-1';
        return $seq;
    }

     if ($seq->active){
         $seq->endsession = false;
         $seq->exception = 'SB.2.11-2';
         return $seq;
     }
     $currentact= $seq->currentactivity;
     if ($currentact->parent == '/'){
         $seq->endsession = true;
         return $seq;
     }

    $seq->endsession = false;
    return $seq;
}


function rscorm_seq_retry_sequencing($scoid,$userid,$seq){
    if (empty($seq->currentactivity)) {
        $seq->delivery = null;
        $seq->exception = 'SB.2.10-1';
        return $seq;
    }
    if ($seq->active || $seq->suspended){
        $seq->delivery = null;
        $seq->exception = 'SB.2.10-2';
        return $seq;
    }

    if (!rscorm_is_leaf($seq->currentactivity)){
        $res = rscorm_seq_flow($seq->currentactivity,'forward',$seq,true,$userid);
        if($res != null){
            return $res;
            //return deliver
        }
        else{
            $seq->delivery = null;
            $seq->exception = 'SB.2.10-3';
            return $seq;
        }
    }
    else{
        $seq->delivery = $seq->currentactivity;
        return $seq;
    }

}

function rscorm_seq_flow ($candidate,$direction,$seq,$childrenflag,$userid){
    //TODO: $PREVDIRECTION NOT DEFINED YET

    $activity=$candidate;
    $prevdirection = null;
    $seq = rscorm_seq_flow_tree_traversal ($activity,$direction,$childrenflag,$prevdirection,$seq,$userid);
    if($seq->identifiedactivity == null){//if identifies
        $seq->identifiedactivity = $candidate;
        $seq->deliverable = false;
        return $seq;
    }
    else{
        $activity = $seq->identifiedactivity;
        $seq = rscorm_seq_flow_activity_traversal($activity,$userid,$direction,$childrenflag,$prevdirection,$seq,$userid);//
        return $seq;

    }
}

function rscorm_seq_flow_activity_traversal ($activity, $userid, $direction, $childrenflag, $prevdirection, $seq,$userid){//returns the next activity on the tree, traversal direction, control returned to the LTS, (may) exception
    $activity = rscorm_get_sco ($activity);
    $parent = rscorm_get_parent ($activity);
   if (!isset($parent->flow) || ($parent->flow == false)) {
        $seq->deliverable = false;
        $seq->exception = 'SB.2.2-1';
        $seq->nextactivity = $activity;
        return $seq;
    }

    $rulch = rscorm_seq_rules_check($sco, 'skipped'); // TODO: undefined
    if ($rulch != null){
        $seq = rscorm_seq_flow_tree_traversal ($activity, $direction, false, $prevdirection, $seq,$userid);//endsession and exception
        if ($seq->identifiedactivity == null){
            $seq->deliverable = false;
            $seq->nextactivity = $activity;
            return $seq;
        }
        else{

            if ($prevdirection = 'backward' && $seq->traversaldir == 'backward'){
                $seq = rscorm_seq_flow_tree_traversal ($activity,$direction,false,null,$seq,$userid);
                $seq = rscorm_seq_flow_activity_traversal($seq->identifiedactivity, $userid, $direction, $childrenflag, $prevdirection, $seq,$userid);
            }
            else{
                $seq = rscorm_seq_flow_tree_traversal ($activity,$direction,false,null,$seq,$userid);
                $seq = rscorm_seq_flow_activity_traversal($seq->identifiedactivity, $userid, $direction, $childrenflag, $prevdirection, $seq,$userid);
            }
            return $seq;
        }
    }

    $ch=rscorm_check_activity ($activity,$userid);

    if ($ch){

        $seq->deliverable = false;
        $seq->exception = 'SB.2.2-2';
        $seq->nextactivity = $activity;
        return $seq;

    }

    if (!rscorm_is_leaf($activity)){

        $seq = rscorm_seq_flow_tree_traversal ($activity,$direction,true,null,$seq,$userid);

        if ($seq->identifiedactivity == null){
            $seq->deliverable = false;
            $seq->nextactivity = $activity;
            return $seq;
        }

        else{
            if($direction == 'backward' && $seq->traversaldir == 'forward'){
                $seq = rscorm_seq_flow_activity_traversal($seq->identifiedactivity, $userid, 'forward', $childrenflag, 'backward', $seq,$userid);
            }
            else{
                rscorm_seq_flow_activity_traversal($seq->identifiedactivity, $userid, $direction, $childrenflag, null, $seq,$userid);
            }
            return $seq;
        }

    }

    $seq->deliverable = true;
    $seq->nextactivity = $activity;
    return $seq;

}
function rscorm_seq_flow_tree_traversal ($activity,$direction,$childrenflag,$prevdirection,$seq,$userid){

    $revdirection = false;
    $parent = rscorm_get_parent ($activity);
    $children = rscorm_get_available_children ($parent);
    $siz = sizeof ($children);

    if (($prevdirection != null && $prevdirection == 'backward') && ($children[$siz-1]->id == $activity->id)){
        $direction = 'backward';
        $children[0] = $activity;
        $revdirection = true;
    }

    if($direction = 'forward'){
        $ancestors = rscorm_get_ancestors($activity);
        $ancestorsroot = array_reverse($ancestors);
        $preorder = rscorm_get_preorder ($ancestorsroot);
        $siz= sizeof ($preorder);
        if (($activity->id == $preorder[$siz-1]->id) || (($activity->parent == '/') && !($childrenflag))){
            rscorm_seq_terminate_descent($ancestorsroot,$userid);
            $seq->endsession = true;
            $seq->nextactivity = null;
            return $seq;
        }
        if (rscorm_is_leaf ($activity) || !$childrenflag){
            if ($children[$siz-1]->id == $activity->id){

                $seq = rscorm_seq_flow_tree_traversal ($parent, $direction, false, null, $seq,$userid);
                // I think it's not necessary to do a return in here
            }
            else{
                $parent = rscorm_get_parent($activity);
                $children = rscorm_get_available_children($parent);
                $seq->traversaldir = $direction;
                $sib = rscorm_get_siblings($activity);
                $pos = array_search($sib, $activity);
                if ($pos !== false) {
                    if ($pos != sizeof ($sib)){
                        $seq->nextactivity = $sib [$pos+1];
                        return $seq;
                    }
                    else{
                        $ch = rscorm_get_children($sib[0]);
                        $seq->nextactivity = $ch[0];
                        return $seq;
                    }
                }
            }
        }
        else{
            if (!empty ($children)){
                $seq->traversaldir = $direction;
                $seq->nextactivity = $children[0];
                return $seq;
            }
            else{
                $seq->traversaldir = null;
                $seq->nextactivity = $children[0];
                $seq->exception = 'SB.2.1-2';
                return $seq;
            }
        }

    }
    if($direction = 'backward'){

         if ($activity->parent == '/'){
            $seq->traversaldir = null;
            $seq->nextactivity = null;
            $seq->exception = 'SB.2.1-3';
            return $seq;
         }
         if (rscorm_is_leaf ($activity) || !$childrenflag){
             if (!$revdirection){
                 if (isset($parent->forwardonly) && ($parent->forwardonly == true)) {
                     $seq->traversaldir = null;
                     $seq->nextactivity = null;
                     $seq->exception = 'SB.2.1-4';
                     return $seq;
                 }
             }
             if ($children[0]->id == $activity->id){
                $seq = rscorm_seq_flow_tree_traversal ($parent, 'backward', false, null, $seq, $userid);
                return $seq;
             }
             else{
                $ancestors = rscorm_get_ancestors($activity);
                $ancestorsroot = array_reverse ($ancestors);
                $preorder = rscorm_get_preorder ($ancestorsroot);
                $pos = array_search($preorder, $children[$siz]);
                $preord = array_slice($preorder, 0, $pos-1);
                $revpreorder = array_reverse($preord);
                $position = array_search($revpreorder, $activity);
                $seq->nextactivity = $revpreorder[$pos+1];
                $seq->traversaldir = $direction;
                return $seq;
             }
         }
         else{
             if (!empty($children)){
                 $activity = rscorm_get_sco($activity->id);
                 if (isset($parent->flow) && ($parent->flow == true)) {
                     $children = rscorm_get_children ($activity);
                     $seq->traversaldir = 'forward';
                     $seq->nextactivity = $children[0];
                     return $seq;

                 }
                 else{
                     $children = rscorm_get_children ($activity);
                     $seq->traversaldir = 'backward';
                     $seq->nextactivity = $children[sizeof($children)-1];
                     return $seq;
                 }

             }
             else{

                     $seq->traversaldir = null;
                     $seq->nextactivity = null;
                     $seq->exception = 'SB.2.1-2';
                     return $seq;
             }
         }

    }


}
function rscorm_check_activity ($activity,$userid){
    $act = rscorm_seq_rules_check($activity,'disabled');
    if ($act != null){
        return true;
    }
    if(rscorm_limit_cond_check ($activity,$userid)){
        return true;
    }
    return false;


}

function rscorm_limit_cond_check ($activity,$userid){
    global $DB;

    if (isset($activity->tracked) && ($activity->tracked == 0)){

        return false;
    }

    if (rscorm_seq_is('active',$activity->id,$userid) || rscorm_seq_is('suspended',$activity->id,$userid)){
        return false;
    }

    if (!isset($activity->limitcontrol) || ($activity->limitcontrol == 1)){
        $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'activityattemptcount'));
        if (rscorm_seq_is('activityprogressstatus',$activity->id,$userid) && ($r->value >=$activity->limitattempt)){
            return true;
        }
    }

     if (!isset($activity->limitabsdurcontrol) || ($activity->limitabsdurcontrol == 1)){
        $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'activityabsoluteduration'));
        if (rscorm_seq_is('activityprogressstatus',$activity->id,$userid) && ($r->value >=$activity->limitabsduration)){
            return true;
        }
    }

    if (!isset($activity->limitexpdurcontrol) || ($activity->limitexpdurcontrol == 1)){
        $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'activityexperiencedduration'));
        if (rscorm_seq_is('activityprogressstatus',$activity->id,$userid) && ($r->value >=$activity->limitexpduration)){
            return true;
        }
    }

     if (!isset($activity->limitattabsdurcontrol) || ($activity->limitattabsdurcontrol == 1)){
        $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'attemptabsoluteduration'));
        if (rscorm_seq_is('activityprogressstatus',$activity->id,$userid) && ($r->value >=$activity->limitattabsduration)){
            return true;
        }
    }

    if (!isset($activity->limitattexpdurcontrol) || ($activity->limitattexpdurcontrol == 1)){
        $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'attemptexperiencedduration'));
        if (rscorm_seq_is('activityprogressstatus',$activity->id,$userid) && ($r->value >=$activity->limitattexpduration)){
            return true;
        }
    }

    if (!isset($activity->limitbegincontrol) || ($activity->limitbegincontrol == 1)){
        $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'begintime'));
        if (time()>=$activity->limitbegintime){
            return true;
        }
    }

    if (!isset($activity->limitbegincontrol) || ($activity->limitbegincontrol == 1)){
        if (time()<$activity->limitbegintime){
            return true;
        }
    }

    if (!isset($activity->limitendcontrol) || ($activity->limitendcontrol == 1)){

        if (time()>$activity->limitendtime){
            return true;
        }
    }
    return false;


}


function rscorm_seq_choice_sequencing($sco,$userid,$seq){

    $avchildren = Array ();
    $comancestor = null;
    $traverse = null;

    if ($sco == null){
        $seq->delivery = null;
        $seq->exception = 'SB.2.9-1';
        return $seq;
    }

    $ancestors = rscorm_get_ancestors($sco);
    $arrpath = array_reverse($ancestors);
    array_push ($arrpath,$sco);//path from the root to the target

    foreach ($arrpath as $activity){

        if ($activity->parent != '/') {
            $avchildren = rscorm_get_available_children (rscorm_get_parent($activity));
            $position = array_search($avchildren, $activity);
            if ($position !== false){
                $seq->delivery = null;
                $seq->exception = 'SB.2.9-2';
                return $seq;
            }
        }

        if (rscorm_seq_rules_check($activity,'hidefromchoice' != null)){

            $seq->delivery = null;
            $seq->exception = 'SB.2.9-3';
            return $seq;

        }

    }

    if ($sco->parent != '/') {
        $parent = rscorm_sco_get_parent ($sco);
        if ( isset($parent->choice) && ($parent->choice == false)){
            $seq->delivery = null;
            $seq->exception = 'SB.2.9-4';
            return $seq;
        }
    }

    if ($seq->currentactivity != null){
        $commonpos = rscorm_find_common_ancestor($ancestors,$seq->currentactivity);
        $comancestor = $arrpath [$commonpos];
    }
    else{
        $comancestor = $arrpath [0];
    }

    if($seq->currentactivity === $sco) {
        break;
    }

    $sib = rscorm_get_siblings($seq->currentactivity);
    $pos = array_search($sib, $sco);

    if ($pos !== false){

        $siblings = array_slice($sib, 0, $pos-1);

        if (empty($siblings)){

            $seq->delivery = null;
            $seq->exception = 'SB.2.9-5';
            return $seq;

        }

        $children = rscorm_get_children (rscorm_get_parent ($sco));
        $pos1 = array_search($children, $sco);
        $pos2 = array_search($seq->currentactivity, $sco);
        if ($pos1>$pos2){
            $traverse = 'forward';
        }
        else{
            $traverse = 'backward';
        }

        foreach ($siblings as $sibling){
            $seq = rscorm_seq_choice_activity_traversal($sibling,$userid,$seq,$traverse);
            if(!$seq->reachable){
                $seq->delivery = null;
                return $seq;
            }
        }
        break;

    }

    if($seq->currentactivity == null || $seq->currentactivity == $comancestor){
        $commonpos = rscorm_find_common_ancestor($ancestors,$seq->currentactivity);
        $comtarget = array_slice($ancestors, 1,$commonpos-1);//path from the common ancestor to the target activity
        $comtarget = array_reverse($comtarget);

        if (empty($comtarget)){
            $seq->delivery = null;
            $seq->exception = 'SB.2.9-5';
            return $seq;
        }
        foreach ($comtarget as $act){
            $seq = rscorm_seq_choice_activity_traversal($act,$userid,$seq,'forward');
            if(!$seq->reachable){
                $seq->delivery = null;
                return $seq;
            }
            $act = rscorm_get_sco ($acti->id);
            if(rscorm_seq_is('active',$act->id,$userid) && ($act->id != $comancestor->id && $act->preventactivation)){//adlseq:can i write it like another property for the $seq object?
                $seq->delivery = null;
                $seq->exception = 'SB.2.9-6';
                return $seq;
            }
        }
        break;

    }

    if ($comancestor->id == $sco->id){

        $ancestorscurrent = rscorm_get_ancestors($seq->currentactivity);
        $possco = array_search ($ancestorscurrent, $sco);
        $curtarget = array_slice($ancestorscurrent,0,$possco);//path from the current activity to the target

        if (empty($curtarget)){
            $seq->delivery = null;
            $seq->exception = 'SB.2.9-5';
            return $seq;
        }
        $i=0;
        foreach ($curtarget as $activ){
            $i++;
            if ($i != sizeof($curtarget)){
                if ( isset($activ->choiceexit) && ($activ->choiceexit == false)){
                    $seq->delivery = null;
                    $seq->exception = 'SB.2.9-7';
                    return $seq;
                }
            }
        }
        break;
    }

    if (array_search ($ancestors, $comancestor)!== false){
        $ancestorscurrent = rscorm_get_ancestors($seq->currentactivity);
        $commonpos = rscorm_find_common_ancestor($ancestors,$sco);
        $curcommon = array_slice($ancestorscurrent,0,$commonpos-1);
        if(empty($curcommon)){
            $seq->delivery = null;
            $seq->exception = 'SB.2.9-5';
            return $seq;
        }

        $constrained = null;
        foreach ($curcommon as $acti){
            $acti = rscorm_get_sco($acti->id);
            if ( isset($acti->choiceexit) && ($acti->choiceexit == false)){
                    $seq->delivery = null;
                    $seq->exception = 'SB.2.9-7';
                    return $seq;
            }
            if ($constrained == null){
                if($acti->constrainchoice == true){
                    $constrained = $acti;
                }
            }
        }
        if ($constrained != null){
            $fwdir = rscorm_get_preorder($constrained);

            if(array_search ($fwdir, $sco)!== false){
                $traverse = 'forward';
            }
            else{
                $traverse = 'backward';
            }
            $seq = rscorm_seq_choice_flow ($constrained, $traverse, $seq);
            $actconsider = $seq->identifiedactivity;
            $avdescendents = Array();
            $avdescendents= rscorm_get_available_descendents ($actconsider);
            if (array_search ($avdescendents, $sco) !== false && $sco->id != $actconsider->id && $constrained->id != $sco->id ){
                $seq->delivery = null;
                $seq->exception = 'SB.2.9-8';
                return $seq;
            }

//CONTINUE 11.5.5
        }

        $commonpos = rscorm_find_common_ancestor($ancestors,$seq->currentactivity);
        $comtarget = array_slice($ancestors, 1,$commonpos-1);//path from the common ancestor to the target activity
        $comtarget = array_reverse($comtarget);

        if (empty($comtarget)){
            $seq->delivery = null;
            $seq->exception = 'SB.2.9-5';
            return $seq;
        }

        $fwdir = rscorm_get_preorder($seq->currentactivity);

        if(array_search ($fwdir, $sco)!== false){

            foreach ($comtarget as $act){
                $seq = rscorm_seq_choice_activity_traversal($act,$userid,$seq,'forward');
                if(!$seq->reachable){
                    $seq->delivery = null;
                    return $seq;
                }
                $act = rscorm_get_sco($act->id);
                if(rscorm_seq_is('active',$act->id,$userid) && ($act->id != $comancestor->id && ($act->preventactivation == true))){
                    $seq->delivery = null;
                    $seq->exception = 'SB.2.9-6';
                    return $seq;
                }
            }

        }
        else{
            foreach ($comtarget as $act){
                $act = rscorm_get_sco($act->id);
                if(rscorm_seq_is('active',$act->id,$userid) && ($act->id != $comancestor->id && ($act->preventactivation==true))){
                    $seq->delivery = null;
                    $seq->exception = 'SB.2.9-6';
                    return $seq;
                }
            }
        }
        break;
    }

    if(rscorm_is_leaf ($sco)){
        $seq->delivery = $sco;
        $seq->exception = 'SB.2.9-6';
        return $seq;
    }

    $seq = rscorm_seq_flow ($sco,'forward',$seq,true,$userid);
    if ($seq->deliverable == false){
        rscorm_terminate_descendent_attempts($comancestor,$userid,$seq);
        rscorm_seq_end_attempt($comancestor,$userid,$seq->attempt);
        $seq->currentactivity = $sco;
        $seq->delivery = null;
        $seq->exception = 'SB.2.9-9';
        return $seq;

    }
    else{
        return $seq;
    }

}

function rscorm_seq_choice_flow ($constrained, $traverse, $seq){
    $seq = rscorm_seq_choice_flow_tree ($constrained, $traverse, $seq);
    if ($seq->identifiedactivity == null){
        $seq->identifiedactivity = $constrained;
        return $seq;
    }
    else{
        return $seq;
    }
}

function rscorm_seq_choice_flow_tree ($constrained, $traverse, $seq){
    $islast = false;
    $parent = rscorm_get_parent ($constrained);
    if ($traverse== 'forward'){
        $preord = rscorm_get_preorder ($constrained);
        if (sizeof($preorder) == 0 || (sizeof($preorder) == 0 && $preorder[0]->id = $constrained->id)){ // TODO: undefined
            $islast = true;//the function is the last activity available
        }
        if ($constrained->parent == '/' || $islast){
            $seq->nextactivity = null;
            return $seq;
        }
        $avchildren = rscorm_get_available_children ($parent);//available children
        if ($avchildren [sizeof($avchildren)-1]->id == $constrained->id){
            $seq = rscorm_seq_choice_flow_tree ($parent, 'forward', $seq);
            return $seq;
        }
        else{
            $i=0;
            while($i < sizeof($avchildren)){
                if ($avchildren [$i]->id == $constrained->id){
                    $seq->nextactivity = $avchildren [$i+1];
                    return $seq;
                }
                else{
                    $i++;
                }
            }
        }

    }

    if ($traverse== 'backward'){
        if($constrained->parent == '/' ){
            $seq->nextactivity = null;
            return $seq;
        }

        $avchildren = rscorm_get_available_children ($parent);//available children
        if ($avchildren [0]->id == $constrained->id){
            $seq = rscorm_seq_choice_flow_tree ($parent, 'backward', $seq);
            return $seq;
        }
        else{
            $i=sizeof($avchildren)-1;
            while($i >=0){
                if ($avchildren [$i]->id == $constrained->id){
                    $seq->nextactivity = $avchildren [$i-1];
                    return $seq;
                }
                else{
                    $i--;
                }
            }
        }
    }
}
function rscorm_seq_choice_activity_traversal($activity,$userid,$seq,$direction){

    if($direction == 'forward'){

        $act = rscorm_seq_rules_check($activity,'stopforwardtraversal');

        if($act != null){
            $seq->reachable = false;
            $seq->exception = 'SB.2.4-1';
            return $seq;
        }
        $seq->reachable = false;
        return $seq;
    }

    if($direction == 'backward'){
        $parentsco = rscorm_get_parent($activity);
        if($parentsco!= null){
             if (isset($parentsco->forwardonly) && ($parentsco->forwardonly == true)){
                 $seq->reachable = false;
                 $seq->exception = 'SB.2.4-2';
                 return $seq;
             }
             else{
                $seq->reachable = false;
                $seq->exception = 'SB.2.4-3';
                return $seq;
             }
        }
    }
    $seq->reachable = true;
    return $seq;

}

//Delivery Request Process

function rscorm_sequencing_delivery($scoid,$userid,$seq){

    if(!rscorm_is_leaf ($seq->delivery)){
        $seq->deliveryvalid = false;
        $seq->exception = 'DB.1.1-1';
        return $seq;
    }
    $ancestors = rscorm_get_ancestors($seq->delivery);
    $arrpath = array_reverse($ancestors);
    array_push ($arrpath,$seq->delivery);//path from the root to the target

    if (empty($arrpath)){
        $seq->deliveryvalid = false;
        $seq->exception = 'DB.1.1-2';
        return $seq;
    }

    foreach ($arrpath as $activity){
        if(rscorm_check_activity ($activity,$userid)){
            $seq->deliveryvalid = false;
            $seq->exception = 'DB.1.1-3';
            return $seq;
        }
    }

    $seq->deliveryvalid = true;
    return $seq;

}

function rscorm_content_delivery_environment ($seq,$userid){
    global $DB;

    $act = $seq->currentactivity;
    if(rscorm_seq_is('active',$act->id,$userid)){
        $seq->exception = 'DB.2-1';
        return $seq;
    }
    $track = $DB->get_record('rscorm_scoes_track', array('scoid'=>$act->id,'userid'=>$userid,'element'=>'suspendedactivity'));
    if ($track != null){
        $seq = rscorm_clear_suspended_activity($seq->delivery, $seq, $userid);

    }
    $seq = rscorm_terminate_descendent_attempts ($seq->delivery,$userid,$seq);
    $ancestors = rscorm_get_ancestors($seq->delivery);
    $arrpath = array_reverse($ancestors);
    array_push ($arrpath,$seq->delivery);
    foreach ($arrpath as $activity){
        if(!rscorm_seq_is('active',$activity->id,$userid)){
            if(!isset($activity->tracked) || ($activity->tracked == 1)){
                if(!rscorm_seq_is('suspended',$activity->id,$userid)){
                    $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'activityattemptcount'));
                    $r->value = ($r->value)+1;
                    $DB->update_record ('rscorm_scoes_track',$r);
                    if ($r->value == 1){
                        rscorm_seq_set('activityprogressstatus', $activity->id, $userid, 'true');
                    }
                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'objectiveprogressstatus', 'false');
                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'objectivesatisfiedstatus', 'false');
                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'objectivemeasurestatus', 'false');
                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'objectivenormalizedmeasure', 0.0);

                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'attemptprogressstatus', 'false');
                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'attemptcompletionstatus', 'false');
                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'attemptabsoluteduration', 0.0);
                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'attemptexperiencedduration', 0.0);
                    rscorm_insert_track($userid, $activity->scorm, $activity->id, 0, 'attemptcompletionamount', 0.0);
                }
            }
            rscorm_seq_set('active', $activity->id, $userid, 'true');
        }
    }
    $seq->delivery = $seq->currentactivity;
    rscorm_seq_set('suspendedactivity', $activity->id, $userid, 'false');

    //ONCE THE DELIVERY BEGINS (How should I check that?)

    if(isset($activity->tracked) || ($activity->tracked == 0)){
        //How should I track the info and what should I do to not record the information for the activity during delivery?
        $atabsdur = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'attemptabsoluteduration'));
        $atexpdur = $DB->get_record('rscorm_scoes_track', array('scoid'=>$activity->id,'userid'=>$userid,'element'=>'attemptexperiencedduration'));
    }
    return $seq;


}
function rscorm_clear_suspended_activity($act,$seq, $userid){
    global $DB;
    $currentact= $seq->currentactivity;
    $track = $DB->get_record('rscorm_scoes_track', array('scoid'=>$currentact->id,'userid'=>$userid,'element'=>'suspendedactivity')); // TODO: undefined
    if ($track != null){
        $ancestors = rscorm_get_ancestors($act);
        $commonpos = rscorm_find_common_ancestor($ancestors,$currentact);
        if ($commonpos !== false) {
            if ($activitypath = array_slice($ancestors,0,$commonpos)) {
                if (!empty ($activitypath)){

                    foreach ($activitypath as $activity) {
                        if (rscorm_is_leaf($activity)){
                            rscorm_seq_set('suspended',$activity->id,$userid,false);
                        }
                        else{
                            $children = rscorm_get_children($activity);
                            $bool= false;
                            foreach ($children as $child){
                                if(rscorm_seq_is('suspended',$child->id,$userid)){
                                    $bool= true;
                                }
                            }
                             if(!$bool){
                                rscorm_seq_set('suspended',$activity->id,$userid,false);
                             }
                        }
                    }
                }
            }
        }
        rscorm_seq_set('suspendedactivity',$act->id,$userid,false);

    }
}

function rscorm_select_children_process($scoid,$userid){
    global $DB;

    $sco = rscorm_get_sco($scoid);
    if (!rscorm_is_leaf($sco)){
        if(!rscorm_seq_is('suspended',$scoid,$userid) && !rscorm_seq_is('active',$scoid,$userid)){
            $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$scoid,'userid'=>$userid,'element'=>'selectiontiming'));

             switch($r->value) {

                case 'oneachnewattempt':
                case 'never':
                break;

                case 'once':
                    if(!rscorm_seq_is('activityprogressstatus',$scoid,$userid)){
                        if(rscorm_seq_is('selectioncountsstatus',$scoid,$userid)){
                            $childlist = '';
                            $res = $DB->get_record('rscorm_scoes_track', array('scoid'=>$scoid,'userid'=>$userid,'element'=>'selectioncount'));
                            $i = ($res->value)-1;
                            $children = rscorm_get_children ($sco);

                            while ($i>=0){
                                $pos = array_rand($children);
                                array_push($childlist,$children [$pos]);
                                array_splice($children,$pos,1);
                                $i--;
                            }
                            sort ($childlist);
                            $clist = serialize ($childlist);
                            rscorm_seq_set('availablechildren', $scoid, $userid, false);
                            rscorm_seq_set('availablechildren', $scoid, $userid, $clist);


                        }
                    }
                break;

            }

        }
    }
}

function rscorm_randomize_children_process($scoid,$userid){
    global $DB;

    $sco = rscorm_get_sco($scoid);
    if (!rscorm_is_leaf($sco)){
        if(!rscorm_seq_is('suspended',$scoid,$userid) && !rscorm_seq_is('active',$scoid,$userid)){
            $r = $DB->get_record('rscorm_scoes_track', array('scoid'=>$scoid,'userid'=>$userid,'element'=>'randomizationtiming'));

             switch($r->value) {


                case 'never':
                break;

                case 'oneachnewattempt':
                case 'once':
                    if(!rscorm_seq_is('activityprogressstatus',$scoid,$userid)){
                        if(rscorm_seq_is('randomizechildren',$scoid,$userid)){
                            $childlist = array();
                            $res = rscorm_get_available_children($sco);
                            $i = sizeof($res)-1;
                            $children = $res->value;

                            while ($i>=0){
                                $pos = array_rand($children);
                                array_push($childlist,$children [$pos]);
                                array_splice($children,$pos,1);
                                $i--;
                            }

                            $clist = serialize ($childlist);
                            rscorm_seq_set('availablechildren', $scoid, $userid, false);
                            rscorm_seq_set('availablechildren', $scoid, $userid, $clist);


                        }
                    }
                break;



            }

        }
    }
}

function rscorm_terminate_descendent_attempts ($activity,$userid,$seq){
    $ancestors = rscorm_get_ancestors($seq->currentactivity);
    $commonpos = rscorm_find_common_ancestor($ancestors,$activity);
        if ($commonpos !== false) {
            if ($activitypath = array_slice($ancestors,1,$commonpos-2)) {
                if (!empty ($activitypath)){

                    foreach ($activitypath as $sco) {
                        rscorm_seq_end_attempt($sco,$userid,$seq->attempt);

                    }
                }
            }
        }
}

function rscorm_sequencing_exception($seq){
    global $OUTPUT;
    if($seq->exception != null){
        switch($seq->exception){

            case 'NB.2.1-1':
                echo $OUTPUT->notification("Sequencing session has already begun");
            break;
            case 'NB.2.1-2':
                echo $OUTPUT->notification("Sequencing session has not begun");
            break;
            case 'NB.2.1-3':
                echo $OUTPUT->notification("Suspended activity is not defined");
            break;
            case 'NB.2.1-4':
                echo $OUTPUT->notification("Flow Sequencing Control Model Violation");
            break;
            case 'NB.2.1-5':
                echo $OUTPUT->notification("Flow or Forward only Sequencing Control Model Violation");
            break;
            case 'NB.2.1-6':
                echo $OUTPUT->notification("No activity is previous to the root");
            break;
            case 'NB.2.1-7':
                echo $OUTPUT->notification("Unsupported Navigation Request");
            break;
            case 'NB.2.1-8':
                echo $OUTPUT->notification("Choice Exit Sequencing Control Model Violation");
            break;
            case 'NB.2.1-9':
                echo $OUTPUT->notification("No activities to consider");
            break;
            case 'NB.2.1-10':
                echo $OUTPUT->notification("Choice Sequencing Control Model Violation");
            break;
            case 'NB.2.1-11':
                echo $OUTPUT->notification("Target Activity does not exist");
            break;
            case 'NB.2.1-12':
                echo $OUTPUT->notification("Current Activity already terminated");
            break;
            case 'NB.2.1-13':
                echo $OUTPUT->notification("Undefined Navigation Request");
            break;

            case 'TB.2.3-1':
                echo $OUTPUT->notification("Current Activity already terminated");
            break;
            case 'TB.2.3-2':
                echo $OUTPUT->notification("Current Activity already terminated");
            break;
            case 'TB.2.3-4':
                echo $OUTPUT->notification("Current Activity already terminated");
            break;
            case 'TB.2.3-5':
                echo $OUTPUT->notification("Nothing to suspend; No active activities");
            break;
            case 'TB.2.3-6':
                echo $OUTPUT->notification("Nothing to abandon; No active activities");
            break;

            case 'SB.2.1-1':
                echo $OUTPUT->notification("Last activity in the tree");
            break;
            case 'SB.2.1-2':
                echo $OUTPUT->notification("Cluster has no available children");
            break;
            case 'SB.2.1-3':
                echo $OUTPUT->notification("No activity is previous to the root");
            break;
            case 'SB.2.1-4':
                echo $OUTPUT->notification("Forward Only Sequencing Control Model Violation");
            break;

            case 'SB.2.2-1':
                echo $OUTPUT->notification("Flow Sequencing Control Model Violation");
            break;
            case 'SB.2.2-2':
                echo $OUTPUT->notification("Activity unavailable");
            break;

            case 'SB.2.3-1':
                echo $OUTPUT->notification("Forward Traversal Blocked");
            break;
            case 'SB.2.3-2':
                echo $OUTPUT->notification("Forward Only Sequencing Control Model Violation");
            break;
            case 'SB.2.3-3':
                echo $OUTPUT->notification("No activity is previous to the root");
            break;

            case 'SB.2.5-1':
                echo $OUTPUT->notification("Sequencing session has already begun");
            break;

            case 'SB.2.6-1':
                echo $OUTPUT->notification("Sequencing session has already begun");
            break;
            case 'SB.2.6-2':
                echo $OUTPUT->notification("No Suspended activity is defined");
            break;

            case 'SB.2.7-1':
                echo $OUTPUT->notification("Sequencing session has not begun");
            break;
            case 'SB.2.7-2':
                echo $OUTPUT->notification("Flow Sequencing Control Model Violation");
            break;

            case 'SB.2.8-1':
                echo $OUTPUT->notification("Sequencing session has not begun");
            break;
            case 'SB.2.8-2':
                echo $OUTPUT->notification("Flow Sequencing Control Model Violation");
            break;

            case 'SB.2.9-1':
                echo $OUTPUT->notification("No target for Choice");
            break;
            case 'SB.2.9-2':
                echo $OUTPUT->notification("Target Activity does not exist or is unavailable");
            break;
            case 'SB.2.9-3':
                echo $OUTPUT->notification("Target Activity hidden from choice");
            break;
            case 'SB.2.9-4':
                echo $OUTPUT->notification("Choice Sequencing Control Model Violation");
            break;
            case 'SB.2.9-5':
                echo $OUTPUT->notification("No activities to consider");
            break;
            case 'SB.2.9-6':
                echo $OUTPUT->notification("Unable to activate target; target is not a child of the Current Activity");
            break;
            case 'SB.2.9-7':
                echo $OUTPUT->notification("Choice Exit Sequencing Control Model Violation");
            break;
            case 'SB.2.9-8':
                echo $OUTPUT->notification("Unable to choose target activity - constrained choice");
            break;
            case 'SB.2.9-9':
                echo $OUTPUT->notification("Choice Request Prevented by Flow-only Activity");
            break;

            case 'SB.2.10-1':
                echo $OUTPUT->notification("Sequencing session has not begun");
            break;
            case 'SB.2.10-2':
                echo $OUTPUT->notification("Current Activity is active or suspended");
            break;
            case 'SB.2.10-3':
                echo $OUTPUT->notification("Flow Sequencing Control Model Violation");
            break;

            case 'SB.2.11-1':
                echo $OUTPUT->notification("Sequencing session has not begun");
            break;
            case 'SB.2.11-2':
                echo $OUTPUT->notification("Current Activity has not been terminated");
            break;

            case 'SB.2.12-2':
                echo $OUTPUT->notification("Undefined Sequencing Request");
            break;

            case 'DB.1.1-1':
                echo $OUTPUT->notification("Cannot deliver a non-leaf activity");
            break;
            case 'DB.1.1-2':
                echo $OUTPUT->notification("Nothing to deliver");
            break;
            case 'DB.1.1-3':
                echo $OUTPUT->notification("Activity unavailable");
            break;

            case 'DB.2-1':
                echo $OUTPUT->notification("Identified activity is already active");
            break;

        }

    }
}





