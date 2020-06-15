<?php 
	namespace App;
	use PDO;
	abstract class Data {
		abstract protected function tampil();
		abstract protected function tambah(String $c1,$c2);
		abstract protected function edit(String $c1, $c2, $c3);
		abstract protected function pilihdata(String $c1);
		abstract protected function hapus(String $c1);

	}

	class category extends Data {
		private $db;

		public function __construct()
		{
			try {
				$this->db = new PDO("mysql:host=localhost;dbname=db_uts", "root", "");
			} catch (PDOException $e) {
				die ("Error " . $e->getMessage());
			}

		}

		public function tampil()
		{
			$sql = "SELECT * FROM category";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) 
			{
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah (String $d1, $d2) 
		{
			$sql = "INSERT INTO category VALUES (NULL, :cat_name, :cat_text)";
			$stmt = $this->db->prepare($sql);
			$stmt-> bindParam(":cat_name", $d1);
			$stmt->bindParam(":cat_text", $d2);
			$stmt->execute();
		}

		public function edit(String $d1, $d2, $d3)
		{
			$sql = "UPDATE category SET cat_name = :cat_name, cat_text = :cat_text WHERE cat_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":cat_name", $d2);
			$stmt -> bindParam(":cat_text", $d3);
			$stmt->execute();
		}

		
		public function hapus(String $d1)
		{
			$sql = "DELETE FROM category WHERE cat_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM category WHERE cat_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}
	}
 ?>