<?php

require_once('../../config.php');

include($CFG->dirroot . '/local/agora/jpgraph/src/jpgraph.php');
include($CFG->dirroot . '/local/agora/jpgraph/src/jpgraph_pie.php');
include($CFG->dirroot . '/local/agora/jpgraph/src/jpgraph_pie3d.php');

// Get diskSpace and diskConsume 
$diskSpace = $_GET['diskSpace'];
$diskConsume = $_GET['diskConsume'];
$diskFree = $diskSpace - $diskConsume;

// Protect the graph against data errors
if ($diskFree < 0) {
    $diskFree = 0;
}

$data = array($diskConsume, $diskFree);

$graph = new PieGraph(500, 300);
$graph->SetShadow();

$legends = array(get_string('disk_used', 'report_coursequotas'), get_string('disk_free', 'report_coursequotas'));

$p1 = new PiePlot3D($data);
$p1->SetLegends($legends);
$p1->ExplodeSlice(1);
$p1->SetAngle(45);
$p1->SetTheme("sand");

$graph->legend->SetShadow();
$graph->legend->Pos(0.5, 0.99, 'center', 'bottom');
$graph->legend->SetLayout(LEGEND_HOR);
$graph->SetColor('#ffffff');
$graph->Add($p1);
$graph->Stroke();
