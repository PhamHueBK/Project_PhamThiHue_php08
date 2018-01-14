<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<meta charset="utf-8"/>
</head>
<body>
	<?php  
		session_start();
		if(isset($_GET['mode'])){
			$mode = $_GET['mode'];
			if(isset($_GET['act']))
				$act = $_GET['act'];
			else
				$act = "index";
		}
		else
		{
			$mode = "home";
			$act = "index";
		}

		switch ($mode) {
			case 'user':
			{
				include_once('controller/UserController.php');
				$controller = new UserController();
				switch ($act) {
					case 'login':
					{	
						$controller->login();
						break;
					}
					case 'loginSuccess':
					{
						$controller->loginSuccess();
						break;
					}
					case 'logout':
					{
						$controller->logout();
						break;
					}
					case 'signup':
					{
						$controller->signup();
						break;
					}
					case 'create':
					{
						$controller->create();
						break;
					}
					case 'profile':
					{
						if(isset($_SESSION['user'])){
							$controller->profile();
						}
						else
							$controller->login();
						break;
					}
					case 'trangCaNhan':
					{
						if(isset($_SESSION['user'])){
							$controller->trangCaNhan();
						}
						else
							$controller->login();
						break;
					}
					case 'update':
					{
						if(isset($_SESSION['user'])){
							$controller->update();
						}
						else
							$controller->login();
						break;
					}
					case 'changePass':
					{
						$controller->changePass();
						break;
					}
					case 'changePassSuccess':
					{
						$controller->changePassSuccess();
						break;
					}
					default:
					{
						
						break;
					}
				}
				break;
			}
			case 'post':
			{
				include_once('controller/PostController.php');
				$controller = new PostController();
				switch ($act) {
					case 'myPost':
					{
						if(isset($_SESSION['user']))
							$controller->myPost();
						else
							$controller->index();
						break;
					}
					case 'story':
					{
						$controller->story();
						break;
					}
					case 'image1':
					{
						$controller->image1();
						break;
					}
					case 'image2':
					{
						$controller->image2();
						break;
					}
					case 'show':
					{
						$controller->show();
						break;
					}
					case 'postDetail':
					{
						$controller->postDetail();
						break;
					}
					case 'newPost':
					{
						$controller->newPost();
						break;
					}
					case 'create':
					{
						$controller->create();
						break;
					}
					case 'upload':
					{
						$controller->upload();
						break;
					}
					case 'edit':
					{
						$controller->edit();
						break;
					}
					case 'update':
					{
						$controller->update();
						break;
					}
					default:
					{
						$controller->index();
						break;
					}
				}
				break;
			}
			default:
			{
				include_once('controller/HomeController.php');
				$controller = new HomeController();
				switch ($act) {
					case 'value':
						# code...
						break;
					
					default:
					{
						$controller->index();
						break;
					}
				}
				break;
			}
		}
	?>
</body>
</html>