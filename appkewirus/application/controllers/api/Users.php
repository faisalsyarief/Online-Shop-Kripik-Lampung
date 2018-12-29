<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('api_model');

		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function index()
	{
		$id_token = $this->input->get('id_token');
		$decoded = JWT::decode($id_token, "my Secret key!", array('HS256'));
		$users = $this->api_model->get_user($id_token);
		if($users){
			if($decoded->group=='1'){
				foreach ($users as $user) {
					$json[] = array(
						'id' => $user['id'],
						'fullname' => $user['fullname'],
						'email' => $user['email'],
						'telp' => $user['telp'],
						'username' => $user['username'],
						'password' => $user['password'],
						'gender' => $user['gender'],
						'address' => $user['address'],
						'zip_code' => $user['zip_code'],
						'province_id' => $user['province_id'],
						'regency_id' => $user['regency_id'],
						'district_id' => $user['district_id'],
						'group' => $user['group'],
						'signup_date' => $user['signup_date']
						);
				}
			}else{
				$json = array();
			}
		}else{
			$json = array();
		}
		echo json_encode($json);
	}

	public function login()	
	{
		$dataobjek = json_decode(file_get_contents("php://input"));
		$username = $dataobjek->username;
		$password = $dataobjek->password;
        $invalidLogin = ['invalid' => $username];
        $login = $this->api_model->login($username,$password);
        $id=$login->id;
        $group=$login->group;
        if($login) {
            $token['id'] = $id;
            $token['username'] = $username;
            $token['group'] = $group;
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();
            $token['exp'] = $date->getTimestamp() + 60*60*5;
            $output['username'] = $username;
            $output['id_token'] = JWT::encode($token, "my Secret key!");
            $jwt = $this->api_model->insert_jwt($output);
            echo json_encode($output);
        }
        else {
        	echo json_encode($invalidLogin);
        }
    }

	public function detail()	
	{
		$id_token = $this->input->get('id_token');
		$decoded = JWT::decode($id_token, "my Secret key!", array('HS256'));
		$id = $decoded->id;
		$user = $this->api_model->get_user_by_id($id,$id_token);
		if($user){
			$json = array(
				'id' => $user['id'],
				'fullname' => $user['fullname'],
				'email' => $user['email'],
				'telp' => $user['telp'],
				'username' => $user['username'],
				'password' => $user['password'],
				'gender' => $user['gender'],
				'address' => $user['address'],
				'zip_code' => $user['zip_code'],
				'province_id' => $user['province_id'],
				'regency_id' => $user['regency_id'],
				'district_id' => $user['district_id'],
				'group' => $user['group'],
				'signup_date' => $user['signup_date']
				);
		}else{
			$json = array();
		}
		echo json_encode($json);
	}

	public function add()	
	{
		$id_token = $this->input->get('id_token');
		$decoded = JWT::decode($id_token, "my Secret key!", array('HS256'));

		$dataobjek = json_decode(file_get_contents("php://input"));
		$id = $dataobjek->id;
		$fullname = $dataobjek->fullname;
		$email = $dataobjek->email;
		$telp = $dataobjek->telp;
		$username = $dataobjek->username;
		$password = $dataobjek->password;
		$gender = $dataobjek->gender;
		$address = $dataobjek->address;
		$zip_code = $dataobjek->zip_code;
		$province_id = $dataobjek->province_id;
		$regency_id = $dataobjek->regency_id;
		$district_id = $dataobjek->district_id;
		$group = $dataobjek->group;
		$signup_date = $dataobjek->signup_date;
		if($decoded->group=='1'){
			$data = array(
				'id' => $id,
				'fullname' => $fullname,
				'email' => $email,
				'telp' => $telp,
				'username' => $username,
				'password' => $password,
				'gender' => $gender,
				'address' => $address,
				'zip_code' => $zip_code,
				'province_id' => $province_id,
				'regency_id' => $regency_id,
				'district_id' => $district_id,
				'group' => $group,
				'signup_date' => $signup_date
				);

			$user = $this->api_model->insert_user($data,$id_token);
			$json['status'] = "Data berhasil disimpan";
		} else {
			$json['warning'] = "Anda bukan admin";
		}
		echo json_encode($json);
	}

	public function edit()	
	{
		$id_token = $this->input->get('id_token');
		$decoded = JWT::decode($id_token, "my Secret key!", array('HS256'));
		$dataobjek = json_decode(file_get_contents("php://input"));
		$fullname = $dataobjek->fullname;
		$email = $dataobjek->email;
		$telp = $dataobjek->telp;
		$username = $dataobjek->username;
		$password = $dataobjek->password;
		$gender = $dataobjek->gender;
		$address = $dataobjek->address;
		$zip_code = $dataobjek->zip_code;
		$province_id = $dataobjek->province_id;
		$regency_id = $dataobjek->regency_id;
		$district_id = $dataobjek->district_id;
		$group = $dataobjek->group;
		$signup_date = $dataobjek->signup_date;
		if($decoded->group=='1'){
			$data = array(
				'fullname' => $fullname,
				'email' => $email,
				'telp' => $telp,
				'username' => $username,
				'password' => $password,
				'gender' => $gender,
				'address' => $address,
				'zip_code' => $zip_code,
				'province_id' => $province_id,
				'regency_id' => $regency_id,
				'district_id' => $district_id,
				'group' => $group,
				'signup_date' => $signup_date
				);

			$id = $this->input->get('id');
			$user = $this->api_model->update_user($id,$data,$id_token);
			$json['status'] = "Data berhasil diedit";
		}elseif($decoded->group=='2'){
			$data = array(
				'fullname' => $fullname,
				'email' => $email,
				'telp' => $telp,
				'username' => $username,
				'password' => $password,
				'gender' => $gender,
				'address' => $address,
				'zip_code' => $zip_code,
				'province_id' => $province_id,
				'regency_id' => $regency_id,
				'district_id' => $district_id,
				'group' => $group,
				'signup_date' => $signup_date
				);

			$id = $decoded->id;
			$user = $this->api_model->update_user($id,$data,$id_token);
			$json['status'] = "Data berhasil diedit";
		}
		echo json_encode($json);
	}

	public function delete()	
	{
		$id_token = $this->input->get('id_token');
		$decoded = JWT::decode($id_token, "my Secret key!", array('HS256'));
		if($decoded->group=='1'){
			$id = $this->input->get('id');
			$user = $this->api_model->delete_user($id,$id_token);
			$json['status'] = "Data berhasil dihapus";
		}else{
			$json['warning'] = "Anda bukan admin";
		}
		echo json_encode($json);
	}
}
