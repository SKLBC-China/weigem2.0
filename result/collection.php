<?php
$fromusername = $_GET['fromusername'];
include "top2.html";

	$con = mysql_connect('localhost','root','root');
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	
	$sql = "SELECT *
			FROM   `parts_bbdb`.`collection` 
			WHERE  `fromusername` ='".$fromusername."';";
		$result=mysql_query($sql,$con);
		$row = mysql_fetch_array($result);
		$data = $row['partname']; //set sql sentence
	$sequence = json_decode($data);
	
	if($sequence){
		echo "
		<div class=\"page-container\">
		<div class=\"container\">
			<div class=\"row\">
				<div class=\"span8 page-content\">
					<div class=\"row separator\">
					<h2>My collection</h2>
					<a href='../index/index.php?fromusername=$fromusername' style=\"text-align:right\">BACK</a>
				 </div>
            </div>
										</div>
								</div>";
								
	$n=0;
	while($sequence[$n]){
		$part = $sequence[$n];
		$sql2 = "SELECT *
			FROM   `parts_bbdb`.`haowanbu` 
			WHERE  `part_name` ='".$part."';";
		$result2 = mysql_query($sql2,$con);
		$row2 = mysql_fetch_array($result2);
	
		$partname=$row2['part_name'];
		$shortdesc=$row2['short_desc'];
		$parttype=$row2['part_type'];
		
		echo "  
		<script language=\"JavaScript\" type=\"text/JavaScript\">

		function HandleOnClose(para) {
			var close = confirm(\"确定删除？\");
			if ( close) {
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open(\"GET\",\"delete.php?part=para\");
				xmlhttp.send();
			alert('delete successfully');
			}
			else
			{
			window.event;
			}
			return message;
		}

	</script>
<a href=\"single.php?fromusername=$fromusername&partname=$partname\">		
		<section class=\"container\">
            <ul class=\"articles\">
                <li class=\"container article-entry standard\">
                 <h4>$partname</h4>
                 <span class=\"article-meta\"> <a title=\"View all posts in Server &amp; Database\">$shortdesc</a></span>
                 <span class=\"article-meta\"> <a title=\"View all posts in Server &amp; Database\">Part Type:$parttype</a></span>
                 <span class=\"article-meta\"> <a title=\"View all posts in Server &amp; Database\" onClick=\"HandleOnClose('$partname')\">DELETE</a></span>
                
                </li>
            </ul>
			
        </section>
		</a>";
$n++;
	}
	
mysql_close($con);
	}
else{
	echo "nothing in collection";
}


?>