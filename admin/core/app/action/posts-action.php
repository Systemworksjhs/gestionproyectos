<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$post = new PostData();
		$post->title = $_POST["title"];
		$post->brief = $_POST["brief"];
		$post->content = $_POST["content"];
		$post->urlpost = $_POST["posturl"];
		$post->registrationForm = $_POST["formUrl"];
		$image = "";
        $image = $_FILES['image']['name'];
		$post->dateRegistrer = $_POST["dateRegistrer"];
		
        $rout = "uploads/news/".$image;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
		$post->image = $image;
		$post->category_id = $_POST["category_id"];
		$post->add();
		Core::redir("./?view=posts");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$post = PostData::getById($_POST["user_id"]);
		$post->title = $_POST["title"];
		$post->brief = $_POST["brief"];
		$post->content = $_POST["content"];
		$post->urlpost = $_POST["posturl"];
		$post->registrationForm = $_POST["formUrl"];
		$image = $_FILES['image']['name'];
		if($image==""){
			$post->image = $_POST["slide_img_aux"];
		}
		else {
			$image = $_FILES['image']['name'];
			$rout = "uploads/news/".$image;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $rout);
			$post->image = $image;
		}
		if($_POST["dateRegistrer"]=="")
		{
			$post->dateRegistrer=$_POST["dateaux"];
		}else{
			$post->dateRegistrer = $_POST["dateRegistrer"];
		}
		$post->category_id = $_POST["category_id"];
		$post->status = isset($_POST["status"])?1:0;
		$post->update();
		Core::redir("./?view=posts");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$post = PostData::getById($_GET["id"]);
		$post->del();
		Core::redir("./?view=posts");
	}

?>