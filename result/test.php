<?php
	$fromusername = $_POST['fromusername'];
	$partname = $_POST['partname'];
	
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
			echo " 
			   
	 <div class=\"page-container\">
                        <div class=\"container\">
                                <div class=\"row\">
                                        <!-- start of page content -->
                                        <div class=\"span8 page-content\">
											<div class=\"row\">
                                        <!-- start of page content -->
												<div class=\"span8 page-content\">
																
													<a href=\"../index/index.php?fromusername=$fromusername\" style=\"text-align:right;text-decoration:underline\">BACK to search engine</a>
													<article class=\" type-post format-standard hentry clearfix\">
														<h3> <span>You have already add bio-brick:</span>$partname</h3>
														<h3><span><a href=\"collection.php?fromusername=$fromusername&partname=$partname\" style = \"text-decoration:underline\">Check collection</a></span></h3>
														
													</article>
												</div>
											</div>
										</div>
								</div>
						</div>
	</div>
													
													";
												
			}
			else{   //如果该用户已经添加了表但没有收藏该砖
				$partdata = json_decode($data);
				$partdata[] =  $partname;
				$partdata = json_encode($partdata);
				$sql = "UPDATE  `parts_bbdb`.`collection` SET  `partname` =  '".$partdata."' WHERE  `fromusername` =  '".$fromusername."'";
				$result = mysql_query($sql,$con);
				echo "
				 <div class=\"page-container\">
                        <div class=\"container\">
                                <div class=\"row\">
                                        <!-- start of page content -->
                                        <div class=\"span8 page-content\">
											<div class=\"row\">
                                        <!-- start of page content -->
												<div class=\"span8 page-content\">
																
													<a href=\"../index/index.php?fromusername=$fromusername\" style=\"text-align:right;text-decoration:underline\">BACK to search engine</a>
													<article class=\" type-post format-standard hentry clearfix\">
														<h3> <span>Successfully appended </span></h3>
														<h3><span><a href=\"collection.php?fromusername=$fromusername&partname=$partname\" style = \"text-decoration:underline\">Check collection</a></span></h3>
														
													</article>
												</div>
											</div>
										</div>
								</div>
						</div>
	</div>";
			}
		}
		else{
			$partdata[] = $partname;
			$partdata = json_encode($partdata);
			
			$sql = "INSERT INTO  `parts_bbdb`.`collection` (
				`fromusername` ,
				`partname`
				)
				VALUES (
				'".$fromusername."',  '".$partdata."'
				);";
			mysql_query($sql,$con);
			echo " 
			   
	  <div class=\"page-container\">
                        <div class=\"container\">
                                <div class=\"row\">
                                        <!-- start of page content -->
                                        <div class=\"span8 page-content\">
											<div class=\"row\">
                                        <!-- start of page content -->
												<div class=\"span8 page-content\">
																
													<a href=\"../index/index.php?fromusername=$fromusername\" style=\"text-align:right;text-decoration:underline\">BACK to search engine</a>
													<article class=\" type-post format-standard hentry clearfix\">
														<h3> <span>Successfully appended </span></h3>
														<h3><span><a href=\"\" style = \"text-decoration:underline\">Check collection</a></span></h3>
														
													</article>
												</div>
											</div>
										</div>
								</div>
						</div>
	</div>								
													";
		}
		
		
	}
// some code

?>