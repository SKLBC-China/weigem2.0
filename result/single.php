<?php
$fromusername=$_GET['fromusername'];
$part_name=$_GET['partname'];

$part_id=getDataFromDB('part_id',$part_name);
$part_short_desc=getDataFromDB('short_desc',$part_name);
$sequences=getDataFromDB('sequence',$part_name);
$part_type=getDataFromDB('part_type',$part_name);
$seq_data=getDataFromDB('sequence',$part_name);


function getDataFromDB($dataName,$partname){
	$con = mysql_connect('localhost','root','root');
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	
	$db_selected = mysql_select_db("parts_bbdb", $con);
	$sql = "SELECT $dataName 
			FROM  `haowanbu` 
			WHERE  part_name = 
			'".$partname."'";
			
	$result = mysql_query($sql,$con);
	
	if($result === FALSE) { 
		die(mysql_error()); // TODO: better error handling
	}
	else{
		return mysql_result($result,0);
	}
	mysql_close($con);
}

function collect($fromUserName){
	$con = mysql_connect('localhost','root','root');
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	
	$db_selected = mysql_select_db("parts_bbdb", $con);
	$sql = "SELECT $dataName 
			FROM  `haowanbu` 
			WHERE  part_name = 
			'".$partname."'";
			
	$result = mysql_query($sql,$con);
	
	if($result === FALSE) { 
		die(mysql_error()); // TODO: better error handling
	}
	else{
		return mysql_result($result,0);
	}
	mysql_close($con);
}


$create_date=getDataFromDB('creation_date',$part_name);
$author = getDataFromDB('author',$part_name);
$description=getDataFromDB('description',$part_name);
$results = getDataFromDB('results',$part_name);


include "top.html";
echo "
	
	<script type=\"text/javascript\" language=\"javascript\"> 
	
	
		function jsCopy(){ 
			var e=document.getElementById(\"seqdata\");//对象是content 
			e.select(); //选择对象 
			document.execCommand(\"Copy\"); //执行浏览器复制命令
			alert(\"Sequence data have already been copied.\"); 
		}
	
		 function surandpre(){
		  var select = document.getElementById(\"sel\").value;
		  var beforeseq = document.getElementById(\"hiddenseq\").value;
			if(select==0){
				document.getElementById(\"seqdata\").value=document.getElementById(\"hiddenseq\").value;;
			
			}
			if(select==1){
				var seq=document.getElementById(\"hiddenseq\").value;
				seq =\"GAATTC GCGGCCGC T TCTAGA G\"+beforeseq+\"T ACTAGT A GCGGCCG CTGCAG\";
				
				document.getElementById(\"seqdata\").value=seq;
				//alert(\"you are using RFC10, prefix and surfix have already been added\");
			}
			if(select==2){
				var seq=document.getElementById(\"hiddenseq\").value;
				seq =\"GAATTC GCGGCCGC ACTAGT\"+beforeseq+\"GCTAGC GCGGCCG CTGCAG\";
				
				document.getElementById(\"seqdata\").value=seq;
				//alert(\"you are using RFC12, prefix and surfix have already been added\");
			}
			if(select==3){
				var seq=document.getElementById(\"hiddenseq\").value;
				seq =\"GAATTC atg AGATCT\"+beforeseq+\"GGATCC taa CTCGAG\";
				
				document.getElementById(\"seqdata\").value=seq;
				//alert(\"you are using RFC21, prefix and surfix have already been added\");
			}
			if(select==4){
				var seq=document.getElementById(\"hiddenseq\").value;
				seq =\"GAATTC GCGGCCGC T TCTAGA\"+beforeseq+\"ACTAGT A GCGGCCG CTGCAG\";
				
				document.getElementById(\"seqdata\").value=seq;
				//alert(\"you are using RFC23, prefix and surfix have already been added\");
			}
			if(select==5){
				var seq=document.getElementById(\"hiddenseq\").value;
				seq =\"GAATTC GCGGCCGC T TCTAGA TG GCCGGC\"+beforeseq+\"ACCGGT TAAT ACTAGT A GCGGCCG CTGCAG\";
				
				document.getElementById(\"seqdata\").value=seq;
				//alert(\"you are using RFC25, prefix and surfix have already been added\");
			}
	   }
	   </script>
	   
	 <div class=\"page-container\">
                        <div class=\"container\">
                                <div class=\"row\">
                                        <!-- start of page content -->
                                        <div class=\"span8 page-content\">
																
										<a href=\"../index/index.php?fromusername=$fromusername\" style=\"text-align:right;text-decoration:underline\">BACK to search engine</a>
                                                <article class=\" type-post format-standard hentry clearfix\">

                                                        <h1 class=\"post-title\"><a href=\"#\">$part_name</a></h1>
                                                        <div class=\"post-meta clearfix\">
                                                                <span class=\"date\">$create_date</span>
                                                                <span class=\"category\"><a  title=\"View all posts in Server &amp; Database\">$author</a></span>

                                                                
                                                               
																	<form action = 'test.php' method='post'>
																		<input type=\"hidden\" value=$fromusername name=\"fromusername\">
																		<input type=\"hidden\" value=$part_name name=\"partname\">
																		<input type=\"submit\" value=\"Collect\">
																	</form>
																
                                                        </div>
										
														<h3>Part ID : <span>$part_id</span></h3>
														<h3>Dsecription : <span>$part_short_desc</span>
														<h3>Part Type : <span>$part_type</span></h3>
														<h3>Dsecription : <span>$description</span></h3>
														<h3>Results: <span>$results</span></h3>
														
														
														<h3>Get Sequence(assembly)</h3>
														 
															<input type=hidden id=\"hiddenseq\" value=\"$seq_data\">
															<input type=hidden id=\"before1\" value=\"AA\" style=\"color:#127821\">
															<select id=\"sel\" onchange=\"surandpre()\">
																<option value = 0>NONE</option>
																<option value = 1>RFC 10</option>
																<option value = 2>RFC 12</option>
																<option value = 3>RFC 21</option>
																<option value = 4>RFC 23</option>
																<option value = 5>RFC 25</option>
															</select >
                                                                        <p class=\"comment-notes\">choosing a codding type<span class=\"required\">*</span></p>
                                                                        <div>
                                                                                <input class=\"span4\" type=\"text\" name=\"email\" id=\"seqdata\" value=\"$seq_data\" size=\"22\" >
                                                                        </div>
                                                                        <div>
                                                                                <input class=\"btn\" name=\"submit\" type=\"submit\" id=\"submit\"  value=\"copy sequence\" onClick=\"jsCopy()\">
                                                                        </div>
													
                                                         
														 
														";

?>