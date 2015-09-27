<?php
$fromusername = $_GET['fromusername'];
$desc = $_GET['desc'];
$part_name=$_GET['partname'];
$creation_date=$_GET['creationdate'];
$part_type=$_GET['parttype'];
$results=$_GET['results'];
$status=$_GET['status'];
$author=$_GET['author'];

include "top.html";


$addtime=0;
function addfirst($sql,$add){
	$sql=$sql.$add;
	$addtime++;
	return $sql;
}

function addsql($sql,$add){
	$sql=$sql."AND".$add;
	return $sql;
}

if(1){    //search all
	$con = mysql_connect('localhost','root','root');
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	
	$sql = "SELECT * 
FROM  `parts_bbdb`.`haowanbu` 
WHERE (
CONVERT(  `part_name` USING utf8 ) LIKE  '%".$part_name."%' 
AND  CONVERT(`part_type` USING utf8) LIKE '%".$part_type."%' 
AND  CONVERT(`description` USING utf8) LIKE '%".$desc."%'
AND  CONVERT(`creation_date` USING utf8) LIKE '%".$creation_date."%'
AND  CONVERT(`results` USING utf8) LIKE '%".$results."%'
AND  CONVERT(`status` USING utf8) LIKE '%".$status."%'
AND  CONVERT(`author` USING utf8) LIKE '%".$author."%'

)";
	
	
	
	$result=mysql_query($sql,$con);
	if($result === FALSE) { 
		die(mysql_error()); // TODO: better error handling
	}
	
			echo "
<div class=\"page-container\">
	<div class=\"container\">
		<div class=\"row\">
			<div class=\"span8 page-content\">
                 <div class=\"row separator\">
					<h2>Search Result</h2>
					<a href='../index/index.php?fromusername=$fromusername'><span >BACK</span></a>
				 </div>
            </div>
										</div>
								</div>";
	while($row=mysql_fetch_array($result)){ 
		$partname=$row['part_name'];
		$shortdesc=$row['short_desc'];
		$parttype=$row['part_type'];
		
		echo "  
<a href=\"single.php?fromusername=$fromusername&partname=$partname\">		
		<section class=\"container\">
            <ul class=\"articles\">
                <li class=\"container article-entry standard\">
                 <h4>$partname</h4>
                 <span class=\"article-meta\"> <a title=\"View all posts in Server &amp; Database\">$shortdesc</a></span>
                 <span class=\"article-meta\"> <a title=\"View all posts in Server &amp; Database\">Part Type:$parttype</a></span>
                 
				 
                </li>
            </ul>
        </section>
		</a>";

	}
	
mysql_close($con);
}





/*
echo "
<div class=\"page-container\">
<div class=\"container\">
<div class=\"row\">
<div class=\"span8 page-content\">
                                                <div class=\"row separator\">
                                                        <section class=\"span4 articles-list\">
                                                                <h3>Featured Articles</h3>
                                                                <ul class=\"articles\">
                                                                        <li class=\"article-entry standard\">
                                                                                <h4><a href=\"single.html\">Integrating WordPress with Your Website</a></h4>
                                                                                <span class=\"article-meta\">25 Feb, 2013 in <a href=\"#\" title=\"View all posts in Server &amp; Database\">Server &amp; Database</a></span>
                                                                                <span class=\"like-count\">66</span>
                                                                        </li>
                                                                        <li class=\"article-entry standard\">
                                                                                <h4><a href=\"single.html\">WordPress Site Maintenance</a></h4>
                                                                                <span class=\"article-meta\">24 Feb, 2013 in <a href=\"#\" title=\"View all posts in Website Dev\">Website Dev</a></span>
                                                                                <span class=\"like-count\">15</span>
                                                                        </li>
                                                                        <li class=\"article-entry video\">
                                                                                <h4><a href=\"single.html\">Meta Tags in WordPress</a></h4>
                                                                                <span class=\"article-meta\">23 Feb, 2013 in <a href=\"#\" title=\"View all posts in Website Dev\">Website Dev</a></span>
                                                                                <span class=\"like-count\">8</span>
                                                                        </li>
                                                                        <li class=\"article-entry image\">
                                                                                <h4><a href=\"single.html\">WordPress in Your Language</a></h4>
                                                                                <span class=\"article-meta\">22 Feb, 2013 in <a href=\"#\" title=\"View all posts in Advanced Techniques\">Advanced Techniques</a></span>
                                                                                <span class=\"like-count\">6</span>
                                                                        </li>
                                                                        <li class=\"article-entry standard\">
                                                                                <h4><a href=\"single.html\">Know Your Sources</a></h4>
                                                                                <span class=\"article-meta\">22 Feb, 2013 in <a href=\"#\" title=\"View all posts in Website Dev\">Website Dev</a></span>
                                                                                <span class=\"like-count\">2</span>
                                                                        </li>
                                                                        <li class=\"article-entry standard\">
                                                                                <h4><a href=\"single.html\">Validating a Website</a></h4>
                                                                                <span class=\"article-meta\">21 Feb, 2013 in <a href=\"#\" title=\"View all posts in Website Dev\">Website Dev</a></span>
                                                                                <span class=\"like-count\">3</span>
                                                                        </li>
                                                                </ul>
                                                        </section>


                                                        <section class=\"span4 articles-list\">
                                                                <h3>Latest Articles</h3>
                                                                <ul class=\"articles\">
                                                                        <li class=\"article-entry standard\">
                                                                                <h4><a href=\"single.html\">Integrating WordPress with Your Website</a></h4>
                                                                                <span class=\"article-meta\">25 Feb, 2013 in <a href=\"#\" title=\"View all posts in Server &amp; Database\">Server &amp; Database</a></span>
                                                                                <span class=\"like-count\">66</span>
                                                                        </li>
                                                                        <li class=\"article-entry standard\">
                                                                                <h4><a href=\"single.html\">Using Javascript</a></h4>
                                                                                <span class=\"article-meta\">25 Feb, 2013 in <a href=\"#\" title=\"View all posts in Advanced Techniques\">Advanced Techniques</a></span>
                                                                                <span class=\"like-count\">18</span>
                                                                        </li>
                                                                        <li class=\"article-entry image\">
                                                                                <h4><a href=\"single.html\">Using Images</a></h4>
                                                                                <span class=\"article-meta\">25 Feb, 2013 in <a href=\"#\" title=\"View all posts in Designing in WordPress\">Designing in WordPress</a></span>
                                                                                <span class=\"like-count\">7</span>
                                                                        </li>
                                                                        <li class=\"article-entry video\">
                                                                                <h4><a href=\"single.html\">Using Video</a></h4>
                                                                                <span class=\"article-meta\">24 Feb, 2013 in <a href=\"#\" title=\"View all posts in WordPress Plugins\">WordPress Plugins</a></span>
                                                                                <span class=\"like-count\">7</span>
                                                                        </li>
                                                                        <li class=\"article-entry standard\">
                                                                                <h4><a href=\"single.html\">WordPress Site Maintenance</a></h4>
                                                                                <span class=\"article-meta\">24 Feb, 2013 in <a href=\"#\" title=\"View all posts in Website Dev\">Website Dev</a></span>
                                                                                <span class=\"like-count\">15</span>
                                                                        </li>
                                                                        <li class=\"article-entry standard\">
                                                                                <h4><a href=\"single.html\">WordPress CSS Information and Techniques</a></h4>
                                                                                <span class=\"article-meta\">24 Feb, 2013 in <a href=\"#\" title=\"View all posts in Theme Development\">Theme Development</a></span>
                                                                                <span class=\"like-count\">1</span>
                                                                        </li>
                                                                </ul>
                                                        </section>
                                                </div>
                                        </div>
										</div>
								</div>
'
*/
?>