<?php 

        $getData = "SELECT * FROM cms_ppdb";
        $execData = Query($getData);

		$sql = "SELECT *  FROM cms_ppdb";
		$check = Query($sql);
		    if ($check){
					$post = mysqli_fetch_assoc($check);
					$link = $post['googleFormsEmbedLink'];
				}

?>