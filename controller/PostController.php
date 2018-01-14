<?php 
	include_once('model/Post.php');
	include_once('model/User.php');
	include_once('controller/Controller.php');

	class PostController extends Controller{
		public $postModel;
		public $userModel;

		public function __construct(){
			parent::__construct();
			$this->postModel = new Post();
			$this->userModel = new User();

		}

		public function index(){
			require_once('view/post/index.php');
		}

		public function myPost(){
			$user_id = $_SESSION['user']['user_id'];
			$condition = "where user_id = ".$user_id;
			$data = $this->postModel->getAll($condition);
			foreach ($data as $key => $value) {
				$data[$key]['created_at'] = date('d/m/Y', strtotime($value['created_at']));
				if($value['status'] == 0)
					$data[$key]['status'] = "Chờ phê duyệt";
				elseif($value['status'] == 1)
					$data[$key]['status'] = "Đã phê duyệt";
				else
					$data[$key]['status'] = "Đã xóa";
			}

			require_once('view/post/myPost.php');
		}

		public function story(){
			$condition = "where type < 8";
			$data = $this->postModel->getAll($condition);

			$dbs = count($data);
			$pages = round($dbs/6);
			if(isset($_GET['page']))
				$page = $_GET['page'];
			else
				$page = 1;

			$start = ($page - 1)*6;
			$end = $start+6;
			/*echo $start;
			die($start);*/
			$condition = "join users on users.user_id = posts.user_id where type < 8  ORDER BY post_id DESC LIMIT ".$start.",".$end;
			$data = $this->postModel->getAll($condition);
			/*print_r($data);
			echo $pages;
			die;*/
			foreach ($data as $key => $value) {
				$data[$key]['created_at'] = date('d/m/Y', strtotime($value['created_at']));
			}
			require_once('view/post/story.php');
		}
		public function image1(){
			$condition = "where type = 8";
			$data = $this->postModel->getAll($condition);
			require_once('view/post/image1.php');
		}
		public function image2(){
			$condition = "where type = 9";
			$data = $this->postModel->getAll($condition);
			require_once('view/post/image2.php');
		}
		public function show(){
			$key = $_GET['key'];
			$data = $this->postModel->findMd5($key);
			$condition = "where type = ".$data['type'];
			$datas = $this->postModel->getAll($condition);
			$relative = array();
			if(count($datas) >= 3){
				for($i = 0; $i < 3; $i++){
					$relative[] = $datas[$i];
				}
			}
			else
				$relative = $datas;
			/*print_r($relative);
			die;*/
			switch ($data['type']) {
				case '0':
				{
					$data['type'] = "Truyện ngắn";
					$data['slogen'] = "Đau khổ thực sự thì ra không phải là nhìn thấy người mình yêu đi yêu người khác để rồi hối hận vì ngày xưa. Đau khổ thực sự là mỉm cười tác thành cho người đó, uống cạn ly rượu đắng mà vẫn khen ngon, từng ngày nhấm vị chát mà vẫn phải khen bùi.";
					break;
				}
				case '1':
				{
					$data['type'] = "Truyện blog";
					$data['slogen'] = "Quyến rũ một người phụ nữ là ở trong tầm tay một kẻ ngu ngốc vớ vẩn nào đó. Nhưng còn phải biết thoát khỏi cô ta nữa, điều này đòi hỏi phải là một người đàn ông chín chắn";
					break;
				}
				case '2':
				{
					$data['type'] = "Tâm sự";
					$data['slogen'] = "Không ai dừng lại một chỗ, bởi ngay cả khi bạn không đi, thời gian cũng sẽ kéo bạn đi.";
					break;

				}
				case '3':
				{
					$data['type'] = "Tiểu thuyết";
					$data['slogen'] = "";
					break;
				}
				case '4':
				{
					$data['type'] = "Yêu";
					$data['slogen'] = "Đừng nói lời yêu em khi anh không muốn cưới. Đừng bao giờ hứa hẹn khi anh chẳng muốn xác định chuyện tương lai.";
					break;
				}
				case '5':
				{
					$data['type'] = "Sống";
					$data['slogen'] = "Tổn thương đó nó có thể là ngắn, nhưng cũng có thể kéo dài âm ỉ chiếm gần hết cuộc đời. Có người bị tổn thương mà trở nên điên loạn. Có người bị tổn thương rồi nghĩ quẩn chấm dứt cuộc đời mình. Nhưng cũng có người sau khi bị tổn thương mà trở thành con người khác, mạnh mẽ hơn, ý chí kiên cường, đầy nghị lực hơn và từ tổn thương đó đã giúp họ thành công, biết yêu thương cuộc đời hơn.";
					break;
				}
				case '6':
				{
					$data['type'] = "Bạn bè";
					$data['slogen'] = "Hay mình mở lòng ra đón yêu thương, đời người như chiếc lá, tội gì mà phải cô đơn?";
					break;
				}
				case '7':
				{
					$data['type'] = "Gia đình";
					$data['slogen'] = "Má nói đàn bà, nghĩ nhiều sẽ lo nhiều, suy diễn nhiều sẽ khổ sở tâm can nhiều. Má sống 60 năm trên cõi đời, lời má nói đều có minh chứng hẳn hoi, đố có sai. Bởi vậy, nghĩ ít thôi, lo ít thôi, bớt suy diễn, sống hời hợt một chút, vậy mà sướng.";
					break;
				}
				case '8':
				{
					$data['type'] = "Ảnh chủ đề";
					$data['slogen'] = "";
					break;
				}
				case '9':
				{
					$data['type'] = "Ảnh nổi bật";
					$data['slogen'] = "";
					break;
				}
			}
			require_once('view/post/show.php');
		}

		public function postDetail(){
			$key = $_GET['key'];
			$data = $this->postModel->findMd5($key);
			$primary_key_value = $data['post_id'];
			$data['views'] = $data['views'] + 1;

			unset($data['post_id']);
			$data = $this->postModel->update($data, $primary_key_value);
			$data['created_at'] = date('d/m/Y', strtotime($data['created_at']));
			$user = $this->userModel->findKey($data['user_id']);
			require_once('view/post/postDetail.php');
		}

		public function newPost(){
			if($_GET['type'] == 7){
				require_once('view/post/dangBaiViet.php');
			}
			elseif($_GET['type'] == 8)
				require_once('view/post/dangAnh.php');
		}
		public function create(){
			$data = $_POST;
			date_default_timezone_set('asia/ho_chi_minh');
			$data['title'] = "N'".$data['title']."'";
			$data['content'] = "N'".$data['content']."'";
			$data['description'] = "N'".$data['description']."'";
			$data['user_id'] = $_SESSION['user']['user_id'];
			$data['thumbnail'] = "'".$data['thumbnail']."'";
			$data['status'] = 0;
			$data['user_id'] = $_SESSION['user']['user_id'];
			$data['created_at'] = date('Y-m-d');
			$data['views'] = 0;

			$data = $this->postModel->insert($data);
			$jSonData = json_encode($data, false);
     		echo $jSonData;
			/*print_r($data);
			die;*/
		}

		public function edit(){
			$post_id = $_GET['post_id'];
			$data = $this->postModel->findMd5($post_id);
			$user = $_SESSION['user'];
			/*print_r($data);
			die;*/
			require_once('view/post/editPost.php');
		}

		public function update(){
			$data = $_POST;
			$primary_key_value = $data['post_id'];
			$data['key_md5'] = "'".md5($primary_key_value)."'";
			$data['title'] = "N'".$data['title']."'";
			$data['description'] = "N'".$data['description']."'";
			if($data['content'] == "")
				unset($data['content']);
			else
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
	}
?>