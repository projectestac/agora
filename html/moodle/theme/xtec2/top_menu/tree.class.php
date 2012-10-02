<?php

class Tree
{
var $nodes;
var $fathers1 ;
var $fathers2 ;
var $ant ;


/***  Add a node   ***/
function AddNode($node, $owner){
$insert="yes";
$insert=$this->isUnique($node);
if ($insert=="no"){
echo "Node name must be unique. Node " . $node . " belonging to  ".$owner . " will not be inserted. " ;

}
else
$this->nodes[$node]=$owner;
}


/***  Check if the node name is unique  ***/

function isUnique($nodename){

$UNIQUE="yes";
if (is_Array($this->nodes)) {
while (list($key14,$value14 )=each($this->nodes)){



if (trim($key14)==trim($nodename))
$UNIQUE="no";
return $UNIQUE ;

}
$d=reset($this->nodes);
}
}

/*** Return Children of a node ***/

function GetChild($owner){
$d=reset($this->nodes);
$child_array = array();

while (list($key,$value )=each($this->nodes)){

if (trim($value)==trim($owner))
$child_array[] = $key;
}
return $child_array;
}


/***  Return nodes which are parents of other nodes ***/

function Parents(){

$result=array_count_values($this->nodes);
return $result;  
}

/*** Determine wheather a node is First Level (that is , it has no parent) or not ***/

function isFirstLevel($nodename){

$PL="si";
$d=reset($this->nodes);

while (list($key2,$value2 )=each($this->nodes)){



if (trim($key2)==trim($nodename))
$PL="no";


}


return $PL;

}



/*** Draw the tree ***/

function drawTree(){


/* Get the nodes which are parents */
$fathers=$this->Parents();


$d=reset($fathers);
$codice="0000";
$flag=0;
$x=1;

/* Determine parents of First Level */
while (list($key3,$value3 )=each($fathers)){
$ILiv=$this->isFirstLevel($key3) ; 
if ($ILiv=="si"){
$flag=$flag+1;
if ($flag > 9)
{
$x=2;
}
if ($flag > 99)
{
$x=3;
}
if ($flag > 999)
{
$x=4;
}

/* Give a unique code to Parents of First Level */
$cod=substr($codice,1,(4-$x));

$this->fathers1[$key3]=$cod.$flag;




}
else {
$this->fathers2[$key3]=$value3;

}
} 


$arrpos=0;
$d=reset($this->fathers1);
$d=reset($this->fathers2);

$flag=0;

/* Find parents for nodes which are not First Level */
while(count($this->fathers2)>0){



while (list($key7,$value7 )=each($this->fathers2)){

$flag=$flag+1;
if ($flag > 9)
{
$x=2;
}
if ($flag > 99)
{
$x=3;
}
if ($flag > 999)
{
$x=4;
}

$cod=substr($codice,1,(4-$x));

/* Get Father for nodes which are not First Level */

$ant=$this->getFather($key7) ;

$d=reset($this->fathers1);
while (list($key5,$value5 )=each($this->fathers1)){

if($ant==$key5) {

/* Give them a unique code made by parent's code and a counter */
 
$this->fathers1[$key7]=$value5 . $cod . $flag;
array_splice($this->fathers2,$arrpos,1);
$d=reset($this->fathers2);
}


}

}


}


$d=reset($this->fathers1);
$d=reset($this->nodes);

$trans=array_flip($this->fathers1);


/* Determine nodes which are not parents at all */

while (list($key12,$value12 )=each($this->nodes)){

if(in_array($key12,$trans)){
}
else {

$nofather[$key12]=$value12 ;

}
$d=reset($trans);

}

$d=reset($nofather);


$arrpos=0;
$d=reset($this->fathers1);

/* Assign parent to these node */

while(count($nofather)>0){



while (list($key9,$value9 )=each($nofather)){

$flag=$flag+1;
if ($flag > 9)
{
$x=2;
}
if ($flag > 99)
{
$x=3;
}
if ($flag > 999)
{
$x=4;
}

$cod=substr($codice,1,(4-$x));


$d=reset($this->fathers1);
while (list($key10,$value10 )=each($this->fathers1)){

if($value9==$key10) {
/* Give a unique code made by parent's code and a counter */

$this->fathers1[$key9]=$value10 . $cod . $flag;
array_splice($nofather,$arrpos,1);
$d=reset($nofather);
}


}

}


}

/* Determine maximum level detail of the tree and font size */

$maxlen=0;
$d=reset($this->fathers1);
while (list($key13,$value13 )=each($this->fathers1)){
$pad=strlen($value13)/4;
if ($pad > $maxlen){
$maxlen=$pad;

}
}

$maxlen=$maxlen+3;



/* Draw the tree */

$d=reset($this->fathers1);
asort($this->fathers1,SORT_STRING );



while (list($key6,$value6 )=each($this->fathers1)){
$pad=strlen($value6);
$liv=($pad/4);
$fontsize=$maxlen-($liv);
echo "</BR>" . str_repeat("&nbsp;",$pad) . "<FONT SIZE =" . $fontsize . ">". "..." . $key6 ."</FONT>"  ;
} 

}


/***  Return the parent of a node ***/

function getFather($node) {
$d=reset($this->nodes);
while (list($key4,$value4 )=each($this->nodes)){

if ($key4==$node){
return $value4;

}
}

}

/*** Delete a node ***/
function DelNode($node) {
	$node_array = $this->nodes;
	unset($node_array[$node]);
	$this->nodes = $node_array;
}
}

?>

