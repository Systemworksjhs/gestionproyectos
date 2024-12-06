<?php

	if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
		$sliders = new SliderData();
        $sliders->title = $_POST["title"];
		$sliders->description = $_POST["description"];
		$sliders->text_botton = $_POST["text_botton"];
        $sliders->url_botton = $_POST["url_botton"];
        $sliders->style_botton = $_POST["style_botton"];
        $sliders->status = $_POST["status"];
        $sliders->order_slider = $_POST["order_slider"];
        $file = $_FILES['image']['name'];
        $sliders->url_image = $file;
        $route = "uploads/sliders/".$file;
        $outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $route);
		$sliders->add();
		Core::redir("./?view=sliderslist");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
		$sliders = SliderData::getById($_POST["user_id"]);
		$sliders->title = $_POST["title"];
		$sliders->description = $_POST["description"];
		$sliders->text_botton = $_POST["text_botton"];
        $sliders->url_botton = $_POST["url_botton"];
        $sliders->style_botton = $_POST["style_botton"];
        $sliders->status = $_POST["status"];
        $sliders->order_slider = $_POST["order_slider"];
		$file = $_FILES['image']['name'];
		if($file==""){
			$sliders->url_image = $_POST["slide_img_aux"];
		}
		else {
			$file = $_FILES['image']['name'];
			$sliders->url_image = $file;
			$route = "uploads/sliders/".$file;
			$outcome = @move_uploaded_file($_FILES["image"]["tmp_name"], $route);
		}
		$sliders->update();
		Core::redir("./?view=sliderslist");
	}
	else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
		$sliders = SliderData::getById($_GET["id"]);
		$sliders->del();
		Core::redir("./index.php?view=sliderslist");
	}

?>
