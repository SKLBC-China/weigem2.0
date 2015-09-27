<?php
$fromusername = $_GET['fromusername'];
$keyword = $_GET['keyword'];
include "top.html";

if($keyword){    //search all
	$con = mysql_connect('localhost','root','root');
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	
	$sql = "SELECT *  FROM `parts_bbdb`.`haowanbu` WHERE (
	CONVERT(`part_id` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`ok` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`part_name` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`short_desc` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`description` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`part_type` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`author` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`owning_group_id` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`status` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`dominant` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`discontinued` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`part_status` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`sample_status` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`p_status_cache` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`s_status_cache` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`creation_date` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`m_datetime` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`m_user_id` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`in_stock` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`uses` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`results` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`favorite` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`specified_u_list` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`deep_u_list` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`deep_count` USING utf8) LIKE '%".$keyword."%'
	OR CONVERT(`owner_id` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`group_u_list` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`barcode` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`notes` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`source` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`nickname` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`premium` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`categories` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`sequence` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`sequence_sha1` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`sequence_update` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`field` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`review_result` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`review_count` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`review_total` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`interest` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`flag` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`sequence_length` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`temp_1` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`temp_2` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`temp_3` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`temp4` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`rating` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`description` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`m_datetime` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`review_result` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`review_count` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`review_total` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`notes` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`flag` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`temp_2` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`temp_3` USING utf8) LIKE '%".$keyword."%' 
	OR CONVERT(`temp4` USING utf8) LIKE '%".$keyword."%')"; //set sql sentence
	
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
					<h3>Keyword : $keyword</h3>
					<a href='../index/index.php?fromusername=$fromusername' style=\"text-align:right\">BACK</a>
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
                 
				 <span class=\"like-count\"></span>
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