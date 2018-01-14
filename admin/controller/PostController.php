<?php 
	include_once('Model/Post.php');
	include_once('controller/Controller.php');
	include_once('Model/User.php');

	class PostController extends Controller{
		public $postModel;
		public $user;

		public function __construct(){
			$this->postModel = new Post();
			$this->userModel = new User();
		}

		public function index(){
			$condition = "join users on users.user_id = posts.user_id where status = 1";
			$data = $this->postModel->getAll($condition);
			
			if(count($data) > 0){
				foreach ($data as $key => $value) {
					switch ($value['type']) {
						case '0':
						{
							$data[$key]['type'] = "Truyện ngắn";
							break;
						}
						case '1':
						{
							$data[$key]['type'] = "Truyện blog";
							break;
						}
						case '2':
						{
							$data[$key]['type'] = "Tâm sự";
							break;

						}
						case '3':
						{
							$data[$key]['type'] = "Tiểu thuyết";
							break;
						}
						case '4':
						{
							$data[$key]['type'] = "Yêu";
							break;
						}
						case '5':
						{
							$data[$key]['type'] = "Sống";
							break;
						}
						case '6':
						{
							$data[$key]['type'] = "Bạn bè";
							break;
						}
						case '7':
						{
							$data[$key]['type'] = "Gia đình";
							break;
						}
						case '8':
						{
							$data[$key]['type'] = "Ảnh chủ đề";
							break;
						}
						case '9':
						{
							$data[$key]['type'] = "Ảnh nổi bật";
							break;
						}
					}
				}
			}

			require_once('view/post/index.php');
		}

		public function index2(){
			$condition = "join users on users.user_id = posts.user_id where type = 0";
			$data = $this->postModel->getAll($condition);
			
			if(count($data) > 0){
				foreach ($data as $key => $value) {
					switch ($value['type']) {
						case '0':
						{
							$data[$key]['type'] = "Truyện ngắn";
							break;
						}
						case '1':
						{
							$data[$key]['type'] = "Truyện blog";
							break;
						}
						case '2':
						{
							$data[$key]['type'] = "Tâm sự";
							break;

						}
						case '3':
						{
							$data[$key]['type'] = "Tiểu thuyết";
							break;
						}
						case '4':
						{
							$data[$key]['type'] = "Yêu";
							break;
						}
						case '5':
						{
							$data[$key]['type'] = "Sống";
							break;
						}
						case '6':
						{
							$data[$key]['type'] = "Bạn bè";
							break;
						}
						case '7':
						{
							$data[$key]['type'] = "Gia đình";
							break;
						}
						case '8':
						{
							$data[$key]['type'] = "Ảnh chủ đề";
							break;
						}
						case '9':
						{
							$data[$key]['type'] = "Ảnh nổi bật";
							break;
						}
					}
				}
			}

			require_once('view/post/index2.php');
		}
		public function show(){
			$key = $_GET['key'];
			$data = $this->postModel->findMd5($key);
			$primary_key_value = $data['post_id'];
			$data['views'] = $data['views'] + 1;

			unset($data['post_id']);
			$data = $this->postModel->update($data, $primary_key_value);
			require_once('view/post/show.php');
		}

		public function showCT(){
			$key = $_GET['key'];
			//echo "HELLO";
			$data = $this->postModel->findMd5($key);
			

			$jSonData = json_encode($data, false);
     		echo $jSonData;
		}

		public function update(){
			$data = $_POST;
			$primary_key_value = $data['post_id'];
			$data['key_md5'] = "'".md5($primary_key_value)."'";
			$data['title'] = "N'".$data['title']."'";
			$data['description'] = "N'".$data['description']."'";
			$data['content'] = "'".$data['content']."'";
			
			$data['status'] = 1;
			if($data['thumbnail'] != "")
				$data['thumbnail'] = "'".$data['thumbnail']."'";
			else
				unset($data['thumbnail']);

			unset($data['post_id']);
			$data = $this->postModel->update($data, $primary_key_value);

			$user = $this->userModel->find($data['user_id']);
			$data['name'] = $user['name'];
			$jSonData = json_encode($data, false);
     		echo $jSonData;
		}

		public function update_delete(){
			$post_id = $_GET['id'];

			$data = $this->postModel->findKey($post_id);

			$primary_key_value = $data['post_id'];
			$data['key_md5'] = "'".md5($primary_key_value)."'";
			$data['title'] = "N'".$data['title']."'";
			$data['description'] = "N'".$data['description']."'";
			$data['content'] = "'".$data['content']."'";
			
			$data['status'] = 2;
			if($data['thumbnail'] != "")
				$data['thumbnail'] = "'".$data['thumbnail']."'";
			else
				unset($data['thumbnail']);

			unset($data['post_id']);
			$data = $this->postModel->update($data, $primary_key_value);

			$user = $this->userModel->find($data['user_id']);
			$data['name'] = $user['name'];
			$jSonData = json_encode($data, false);
     		echo $jSonData;
		}

		public function create(){
			$datas = $_POST;

			$datas['title'] = "N'".$datas['title']."'";
			$datas['description'] = "'".$datas['description']."'";
			$datas['content'] = "N'".$datas['content']."'";
			$datas['created_at'] = date('Y-m-d');
			$datas['created_at'] = "'".$datas['created_at']."'";
			$datas['user_id'] = $_SESSION['admin']['user_id'];
			
			$datas['views'] = 0;
			if($datas['thumbnail'] != "")
				$datas['thumbnail'] = "'".$datas['thumbnail']."'";
			else
				unset($datas['thumbnail']);
			 
			$post = $this->postModel->insert($datas);
			$post['name'] = $_SESSION['admin']['name'];
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
		public function image(){
			if(isset($_GET['type']))
				$condition = "join users on users.user_id = posts.user_id where type = ".$_GET['type'];
			else
				$condition = "join users on users.user_id = posts.user_id where type = 8 OR type = 9";
			$data = $this->postModel->getAll($condition);
			foreach ($data as $key => $value) {
				switch ($value['type']) {
					case '8':
					{
						$data[$key]['type'] = "Ảnh chủ đề";
						break;
					}
					case '9':
					{
						$data[$key]['type'] = "Ảnh nổi bật";
						break;
					}
				}
			}
			
			require_once('view/post/image.php');
		}
	}
?>