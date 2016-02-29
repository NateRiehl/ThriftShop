<?php
/*
$base: url to current page
$op: operation/command
*/
if(!isset($base)){
	$base = $_SERVER['PHP_SELF'];	
}

printf("<p> base = %s</p>\n", $base);
//Initially, no option is specified
if(EMPTY($_GET['op'])){
	$op = "home"; //default option
}
else{
	$op = $_GET['op'];
}

printf("<p>op = %s</p>\n", $op);
?>
<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE>div example 5 (styled, include)</TITLE></HEAD>

<BODY>

<DIV id="divMain" style="border:1px solid black;">

    <DIV id="divSub1" 
		style="border:1px ridge red;
		 background:yellow;
		color=blue;
		font: Arial, bold, 40px;">
    <H2> <A HREF="<?php echo $base; ?>?op=home"> HELLO SUB1 </A></H2>
	HELLO WORLD
    </DIV>

    <BR>

    <DIV id="divSub2" style="border:2px dashed blue; background:lilac;">
    <H2><A HREF="<?php echo $base; ?>?op=form"> HELLO SUB2 </A></H2>

    <?php
       if(strcmp($op, "home") == 0){
		include("test.php");	
	}
	else if (strcmp($op, "form") == 0){
		include("formExample.html");	
	}
    ?>

    </DIV>

    <BR>

    <DIV id="divSub3" style="border:thick groove green; background:lemon;">
    <H2>HELLO SUB3</H2>

    </DIV>

</DIV>
</BODY>
</HTML>

