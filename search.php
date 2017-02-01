<?php
include 'connection.php';

$arr = array();

if (!empty($_POST['keywords'])) {
	$keywords =  mysqli_real_escape_string($link, $_POST['keywords']);
	$keyword = '%'.$keywords.'%';
	$sql = mysqli_query($link, "SELECT c2c.name_heading, c2c.link, c2c.content, g2c.category_name FROM category_to_content c2c INNER JOIN genre_to_category g2c ON c2c.category_id=g2c.id WHERE c2c.name_heading LIKE '$keyword' OR g2c.category_name LIKE '$keyword' OR c2c.content LIKE '$keyword' ") or die(mysqli_error($link));
	$row= mysqli_fetch_array($sql, MYSQLI_BOTH);
	$no_rows = mysqli_num_rows($sql);
	if ($no_rows > 0) {
		while ($row = mysqli_fetch_array($sql, MYSQLI_BOTH)) {
			
			$arr[] = array('name_heading' => $row['name_heading'], 'link' => $row['link'], 'content' => $row['content'], 'category' => $row['category_name'], 'results_no' => $no_rows );
		}
	}
}
echo json_encode($arr);
