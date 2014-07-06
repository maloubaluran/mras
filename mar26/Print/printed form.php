<?php
session_start();
require_once("../Java/Java.inc");
java_require("../Java/FAPRS.jar");

$prInfo = new Java("PurchaseRequestController");
$prDetails1 = $prInfo->showPRDetails($_GET['prno']);
$prDetails = split("/",$prDetails1);
$pr_item = new Java("PR_ItemController");
$items = $pr_item->getPRItems($_GET['prno']);

$mypdf = PDF_new();
		PDF_open_file($mypdf, "");
		PDF_begin_page($mypdf, 585, 820);
		
		
		$myfont = PDF_findfont($mypdf, "Times-Roman", "host", 0);
		PDF_setfont($mypdf, $myfont, 10);
		//PDF_show_xy($mypdf, "Patient Record", 228, 760);
		//PDF_show_xy($mypdf, "Andres Bonifacio Ave., 9200 Iligan City", 217, 745);
		
		$myfont = PDF_findfont($mypdf, "Times-Bold", "host", 0);
		PDF_setfont($mypdf, $myfont, 10);
		PDF_show_xy($mypdf, "Patient Record", 258, 700);
		PDF_setfont($mypdf, $myfont, 9);
		PDF_show_xy($mypdf, "Patient No.: ", 40,672);
		
		/*if($_SESSION['where']=='cost_center'){
			PDF_show_xy($mypdf, "Cost Center                :", 40,660);
			}else{
				PDF_show_xy($mypdf, "Department                :", 40,660);
				}
		*/
		PDF_show_xy($mypdf, "First Name                       : ", 40, 650);
		PDF_show_xy($mypdf, "Middle Name                       : ", 40, 650);
		PDF_show_xy($mypdf, "Last Name                       : ", 40, 650);
		PDF_show_xy($mypdf, "Birthday                 : ", 360, 672);
		PDF_show_xy($mypdf, "Age: ", 360, 660);
		PDF_show_xy($mypdf, "Height       : ", 360, 650);
		PDF_show_xy($mypdf, "Weight       : ", 360, 650);
		$myfont = PDF_findfont($mypdf, "Times-Roman", "host", 0);
		PDF_setfont($mypdf, $myfont, 9);
		pdf_set_parameter($mypdf, "underline", "true");
		PDF_show_xy($mypdf, $_SESSION['name'], 130,660);
		PDF_show_xy($mypdf, $prDetails[4], 130, 650);
		PDF_show_xy($mypdf, $_GET['prno'], 130, 672);
		PDF_show_xy($mypdf, $prDetails[1], 430, 672);
		PDF_show_xy($mypdf, $prDetails[2], 430, 660);
		PDF_show_xy($mypdf, $_GET['fiscalyr'], 430, 650);
		pdf_set_parameter($mypdf, "underline", "false");
		
		$myfont = PDF_findfont($mypdf, "Times-Bold", "host", 0);
		PDF_setfont($mypdf, $myfont, 9);
		PDF_show_xy($mypdf, "Item Description", 40,620);
		PDF_show_xy($mypdf, "Unit", 190, 620);
		PDF_show_xy($mypdf, "Quantity", 270, 620);
		PDF_show_xy($mypdf, "Estimated Price/Unit", 350, 620);
		PDF_show_xy($mypdf, "Total", 480, 620);

		
		$myfont = PDF_findfont($mypdf, "Times-Roman", "host", 0);
		PDF_setfont($mypdf, $myfont, 9);
		
		$y = 600;
		$longest = 0;
		$maxNumDigit = 0;
		
		for($l=0; $l<=sizeof($items); $l++){
			if($maxNumDigit<strlen(number_format(($show[2]*$show[3]),2))){
				$maxNumDigit = strlen(number_format(($show[2]*$show[3]),2));
				}
			}
		
			foreach($items as $value){
					
				$show = explode("/",$value);
				PDF_show_xy($mypdf, $show[0], 40, $y);
				PDF_show_xy($mypdf, $show[1], 190, $y);
				PDF_show_xy($mypdf, $show[2], 290, $y);
				PDF_show_xy($mypdf, number_format($show[3],2), (410+($maxNumDigit-strlen(number_format($show[3],2))*4)), $y);
				PDF_show_xy($mypdf, number_format(($show[2]*$show[3]),2), (500+($maxNumDigit-strlen(number_format(($show[2]*$show[3]),2))*4)), $y);
							
								
				$total = $total + ($show[2]*$show[3]);
				$y = $y-10;
							}
		$myfont = PDF_findfont($mypdf, "Times-Bold", "host", 0);
		PDF_setfont($mypdf, $myfont, 9);
		PDF_show_xy($mypdf, "Grand Total:", 360, $y-10);
		pdf_set_parameter($mypdf, "underline", "true");
		PDF_show_xy($mypdf, number_format($total,2),(500+($maxNumDigit-strlen(number_format($total,2))*4)), $y-10);
		$myfont = PDF_findfont($mypdf, "Times-Roman", "host", 0);
		PDF_setfont($mypdf, $myfont, 10);
		PDF_show_xy($mypdf, $_SESSION['staffname'], 400,60);
		pdf_set_parameter($mypdf, "underline", "false");
		PDF_show_xy($mypdf, "Assigned Staff", 400,45);
	
		
		PDF_end_page($mypdf);
		PDF_close($mypdf);
		
		$mybuf = PDF_get_buffer($mypdf);
		$mylen = strlen($mybuf);
		header("Content-type: application/pdf");
		header("Content-Length: $mylen");
		header("Content-Disposition: inline; filename=gen01.pdf");
		print $mybuf;

?>