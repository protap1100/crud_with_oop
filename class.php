<?php

//Database connection

class Model{
	private $servename = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "crud-with-oop";
	private $con;

	public function __construct(){
		$this->con = new mysqli($this->servename, $this->username, $this->password,$this->dbname);

		if(!$this->con){
			echo "Connection Failed";
		}else{
			//connected
		}
	}//construct close

	public function InsertingRecord($post){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];

			$sql = "INSERT INTO users SET name='$name',email='$email',phone='$phone'";

			$res = mysqli_query($this->con,$sql);

			if ($res) {
			   header('location:index.php?msg=ins');
			}else{
				echo "Error".$sql."<br>". $this->con->error;
			}
	}// insert function completed


	public function DisplayRecord(){
		$sql = "SELECT * FROM users ";

		$result = mysqli_query($this->con,$sql);

		$count = mysqli_num_rows($result);

		if ($count>0) {
	       	while($row=mysqli_fetch_assoc($result)){

	       		$data[] = $row;
	       	
	       	}//while close
	       	
	       	return $data;
		
		}//ifelseclose

	}//DisplayRecord

	public function UpdatingRecord($post){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$editid = $_POST['hid'];

			$sql = "UPDATE users SET name='$name',email='$email',phone='$phone' WHERE id='$editid'";

			$res = mysqli_query($this->con,$sql);

			if ($res) {
			   header('location:index.php?msg=ups');
			}else{
				echo "Error".$sql."<br>". $this->con->error;
			}
	}// Update function completed

	public function DeleteRecord($delid){

			$sql = "DELETE FROM users WHERE id='$delid'";

			$res = mysqli_query($this->con,$sql);

			if ($res) {
			   header('location:index.php?msg=del');
			}else{
				echo "Error".$sql."<br>". $this->con->error;
			}
	}


	public function DisplayRecordById($editid){
		$sql = "SELECT * FROM users WHERE id = '$editid'";
		
		$result = mysqli_query($this->con,$sql);

		$count = mysqli_num_rows($result);

		if ($count==1) {

			$row = mysqli_fetch_assoc($result);
			
			return $row;

		}//if else closed

	}//DisplayRecordById Closed

}//class closed




?>