<?php 
	include_once('model/Home.php');
	include_once('model/Post.php');

	class HomeController{
		public $homeModel;
		public $postModel;

		public function __construct(){
			$this->homeModel = new Home();
			$this->postModel = new Post();
		}

		public function index(){
			$condition = "where type < 8 ORDER BY post_id DESC";
			$condition2 = "where type < 8 ORDER BY views DESC";
			$datas = $this->postModel->getAll($condition);
			$newEst = array();
			$datas2 = $this->postModel->getAll($condition2);
			$noiBat = array();
			if(count($datas) >= 5){
				for($i = 0; $i < 5; $i++){
					$newEst[] = $datas[$i];
				}
			}
			else
				$newEst = $datas;
			if(count($datas2) >= 10){
				for($i = 0; $i < 10; $i++){
					$noiBat[] = $datas2[$i];
				}
			}
			else
				$noiBat = $datas2;

			$condition3 = "where type = 8 OR type = 9 ORDER BY post_id DESC";
			$data_image = $this->postModel->getAll($condition3);
			$image = array();
			if(count($data_image) >= 5){
				for($i = 0; $i < 5; $i++){
					$image[] = $data_image[$i];
				}
			}
			else
				$image = $data_image;

			require_once('view/home/index.php');
		}
	}
?>