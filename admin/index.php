<!DOCTYPE html>
<html>
<head>
	<title>Trang quản trị</title>
	<meta charset="utf-8"/>
</head>
<body>
		<?php 
			session_start();

			if(isset($_SESSION['admin'])){
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
			}
			else
			{
				$mode = "user";
				if(isset($_GET['act']) && $_GET['act'] == "loginSuccess")
					$act = $_GET['act'];
				else
					$act = "login";
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
						case 'profile':
						{
							$controller->profile();
							break;
						}
						case 'show':
						{
							$controller->show();
							break;
						}
						case 'update':
						{
							$controller->update();
							break;
						}
						case 'create':
						{
							$controller->create();
							break;
						}
						case 'edit':
						{
							$controller->edit();
							break;
						}
						case 'delete':
						{
							$controller->delete();
							break;
						}
						case 'upload':
						{
							$controller->upload();
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
				case 'post':
				{
					include_once('controller/PostController.php');
					$controller = new PostController();
					switch ($act) {
						case 'create':
						{
							$controller->create();
							break;
						}
						case 'show':
						{
							$controller->show();
							break;
						}
						case 'showCT':
						{
							$controller->showCT();
							break;
						}
						case 'update':
						{
							$controller->update();
							break;
						}
						case 'edit':
						{
							$controller->edit();
							break;
						}
						case 'delete':
						{
							$controller->delete();
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
				case 'tag':
				{
					/*include_once('controller/TagController.php');
					$controller = new TagController();
					switch ($act) {
						case 'show':
						{
							$controller->show();
							break;
						}
						case 'update':
						{
							$controller->update();
							break;
						}
						case 'create':
						{
							$controller->create();
							break;
						}
						case 'edit':
						{
							$controller->edit();
							break;
						}
						case 'delete':
						{
							$controller->delete();
							break;
						}
						case 'upload':
						{
							$controller->upload();
							break;
						}
						default:
						{
							$controller->index();
							break;
						}
					}*/
				}
				default:
				{
					include_once('controller/HomeController.php');
					$controller = new HomeController();
					switch ($act) {
						case 'value':
						{
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
			}
		?>
</body>
</html>