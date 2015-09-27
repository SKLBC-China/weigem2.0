<?php
	$fromusername = $_POST['fromusername'];
	$partname = $_POST['partname'];
	$fromusername = "213";
	$partname = "test";
	include "top.html";
	if($fromusername){
		$con = mysql_connect('localhost','root','root');
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
	
		$sql = "SELECT *
			FROM   `parts_bbdb`.`collection` 
			WHERE  `fromusername` ='".$fromusername."'";
		$result=mysql_query($sql,$con);
		$row = mysql_fetch_array($result);
		$data = $row['partname'];
		
		if($data){
			$exist = "SELECT * 
					FROM  `parts_bbdb`.`collection` 
					WHERE (
					
					  `partname` LIKE  '%\"".$partname."\"%'
					)
					LIMIT 0 , 30";
			$resultexist = mysql_query($exist,$con);
			$rowexist = mysql_fetch_array($resultexist);
			if($rowexist){
			echo "already added";	//已经添加果
			}
			else{   //如果该用户已经添加了表但没有收藏该砖
				$partdata = json_decode($data);
				$partdata[] =  $partname;
				$partdata = json_encode($partdata);
				echo $partdata;
				$sql = "UPDATE  `parts_bbdb`.`collection` SET  `partname` =  '".$partdata."' WHERE  `fromusername` =  '".$fromusername."'";
				$result = mysql_query($sql,$con);
			}
		}
		else{
			$partdata[] = $partname;
			$partdata = json_encode($partdata);
			echo $partdata;
			$sql = "INSERT INTO  `parts_bbdb`.`collection` (
				`fromusername` ,
				`partname`
				)
				VALUES (
				'".$fromusername."',  '".$partdata."'
				);";
			mysql_query($sql,$con);
		}
		
		
	}
// some code

?>