<?php 
	include_once('Model/Post.php');
	include_once('controller/Controller.php');

	class PostController extends Controller{
		public $postModel;

		public function __construct(){
			$this->postModel = new Post();
		}

		public function index(){
			$typpe = 8;
			$condition = "join users on posts.user_id = users.user_id";
			if(!isset($_GET['type'])){
				$data = $this->postModel->getAll($condition);
				if(count($data) > 0){
					switch ($data['type']) {
						case '0':
						{
							$data['type'] = 'Truyện ngắn';
							break;
						}
						case '1':
						{
							$data['type'] = "Truyện blog";
							break;
						}
						case '2':
						{
							$data['type'] = "Tâm sự";
							break;
						}
						case '3':
						{
							$data['type'] = "Tiểu thuyết";
							break;
						}
						case '4':
						{
							$data['type'] = "Yêu";
							break;
						}
						case '5':
						{
							$data['type'] = "Sống";
							break;
						}
						case '6':
						{
							$data['type'] = "Bạn bè";
							break;
						}
						case '7':
						{
							$data['type'] = "Gia đình";
							break;
						}
					}
				}
				
				require_once('view/post/index.php');
			}
			else{
				$type = $_GET['type'];
				if($type == 1|| $type == 0){
					$condition .= " where type = ".$permission;
					$data = $this->postModel->getAll($condition);
					if(count($data) > 0){
						switch ($data['type']) {
							case '0':
							{
								$data['type'] = 'Truyện ngắn';
								break;
							}
							case '1':
							{
								$data['type'] = "Truyện blog";
								break;
							}
							case '2':
							{
								$data['type'] = "Tâm sự";
								break;
							}
							case '3':
							{
								$data['type'] = "Tiểu thuyết";
								break;
							}
							case '4':
							{
								$data['type'] = "Yêu";
								break;
							}
							case '5':
							{
								$data['type'] = "Sống";
								break;
							}
							case '6':
							{
								$data['type'] = "Bạn bè";
								break;
							}
							case '7':
							{
								$data['type'] = "Gia đình";
								break;
							}
						}
					}
				}
				else
					$data = $this->postModel->getAll($condition);
					if(count($data) > 0){
						switch ($data['type']) {
							case '0':
							{
								$data['type'] = 'Truyện ngắn';
								break;
							}
							case '1':
							{
								$data['type'] = "Truyện blog";
								break;
							}
							case '2':
							{
								$data['type'] = "Tâm sự";
								break;
							}
							case '3':
							{
								$data['type'] = "Tiểu thuyết";
								break;
							}
							case '4':
							{
								$data['type'] = "Yêu";
								break;
							}
							case '5':
							{
								$data['type'] = "Sống";
								break;
							}
							case '6':
							{
								$data['type'] = "Bạn bè";
								break;
							}
							case '7':
							{
								$data['type'] = "Gia đình";
								break;
							}
						}
					}
					$jSonData = json_encode($data, false);
	     			echo $jSonData;
			}
			
		}

		public function show(){
			$key = $_GET['key'];
			require_once('view/post/show.php');
		}

		public function update(){
			$data = $_POST;
			$primary_key_value = $data['post_id'];
			$data['key_md5'] = "'".md5($primary_key_value)."'";
			$data['title'] = "N'".$data['title']."'";
			$data['desciption'] = "N'".$data['description']."'";
			$data['content'] = "'".$data['content']."'";
			$data['created_at'] = "'".$data['created_at']."'";
			if($data['thumbnail'] != "")
				$data['thumbnail'] = "'".$data['thumbnail']."'";
			else
				unset($data['thumbnail']);

			unset($data['post_id']);
			$data = $this->postModel->update($data, $primary_key_value);
			$jSonData = json_encode($data, false);
     		echo $jSonData;
		}

		public function create(){
			$datas = $_POST;

			$datas['title'] = "N'".$datas['title']."'";
			$datas['description'] = "'".$datas['description']."'";
			$datas['content'] = "N'".$datas['content']."'";
			if($datas['created_at'] != "")
				$datas['created_at'] = "'".$datas['created_at']."'";
			else
				$datas['created_at'] = "'0000-00-00'";
			$datas['views'] = 0;
			if($datas['thumbnail'] != "")
				$datas['thumbnail'] = "'".$datas['thumbnail']."'";
			else
				unset($datas['thumbnail']);
			
			$post = $this->postModel->insert($datas);
			$jSonData = json_encode($post, false);
     		echo $jSonData;
		}

		public function edit(){
			$post_id = $_POST['post_id'];
			$data = $this->postModel->find($post_id);
			$jSonData = json_encode($data, false);
     		echo $jSonData;
		}

		public function delete(){
			$post_id = $_POST['post_id'];
			$data = array();
     		$data['status'] = $this->postModel->delete($post_id);
     		$data['id'] = $post_id;
     		$jSonData = json_encode($data, false);
     		echo $jSonData;
		}
	}
?>