<?php
namespace App;
use PDO;

abstract class Data1 {
	abstract protected function tampil();
	abstract protected function tambah(String $c1,$c2,$c3,$c4,$c5);
	abstract protected function edit(String $c1,$c2,$c3,$c4,$c5,$c6);
	abstract protected function pilihdata(String $c1);
	abstract protected function hapus(String $c1);
}

class post extends Data1 {
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
			$sql = "SELECT * FROM post";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1,$d2,$d3,$d4, $d5){
			$sql = "INSERT INTO post VALUES (NULL, :post_cat_id, :post_date, :post_slug, :post_tittle, :post_text)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":post_cat_id", $d1);
			$stmt -> bindParam(":post_date", $d2);
			$stmt -> bindParam(":post_slug", $d3);
			$stmt -> bindParam(":post_tittle", $d4);
			$stmt -> bindParam(":post_text", $d5);
			
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM post WHERE post_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2, $d3, $d4, $d5, $d6)
		{
			$sql = "UPDATE post SET  
					post_cat_id = :post_cat_id,
					post_date = :post_date,
					post_slug = :post_slug,
					post_tittle = :post_tittle,
					post_text = :post_text 
					WHERE post_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":post_cat_id", $d2);
			$stmt -> bindParam(":post_date", $d3);
			$stmt -> bindParam(":post_slug", $d4);
			$stmt -> bindParam(":post_tittle", $d5);
			$stmt -> bindParam(":post_text", $d6);
			$stmt->execute();
		}

		public function hapus(String $d1)
		{
			$sql = "DELETE FROM post WHERE post_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
