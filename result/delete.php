<?php
$deletepart = $_GET['part'];
$fromusername = $_GET['fromusername'];

$con = mysql_connect('localhost','root','root');
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		$sql="SELECT * 
				FROM  `parts_bbdb`.`collection` 
				WHERE `part_id` = $part_id";
		$result=mysql_query($sql,$con);
		$row=mysql_fetch_array($result);
		$content = $row['partname'];
		$part = json_decode($content);
		$newpart;
		$n=0;
		while($part[$n]){
			if($part[$n] != $deletepart){
				$newpart[]=$part[$n];
			}
			$n++;
		}
		$newpartseq = json_encode($newpart);
		
		$sql1 = "UPDATE `parts_bbdb`.`collection` SET `partname` = '$newpartseq' 
		WHERE `collection`.`fromusername` = '$fromusername';"
		
		