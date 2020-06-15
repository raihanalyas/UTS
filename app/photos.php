<?php
namespace App;
use PDO;
abstract class Data2 {
	abstract protected function tampil();
	abstract protected function tambah(String $c1,$c2,$c3,$c4,$c5);
	abstract protected function edit(String $c1,$c2,$c3,$c4,$c5);
	abstract protected function pilihdata(String $c1);
	abstract protected function hapus(String $c1);
}
class photos extends Data2 {
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
			$sql = "SELECT * FROM photos";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1,$d2,$d3,$d4,$d5)
		{
			$sql = "INSERT INTO photos VALUES (NULL, :pho_post_id, :pho_date, :pho_tittle, :pho_text, :gambar)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":pho_post_id", $d1);
			$stmt -> bindParam(":pho_date", $d2);
			$stmt -> bindParam(":pho_tittle", $d3);
			$stmt -> bindParam(":pho_text", $d4);
			$stmt -> bindParam(":gambar", $d5);
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM photos WHERE pho_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2, $d3, $d4, $d5)
		{
			$sql = "UPDATE photos SET pho_post_id = :pho_post_id, pho_date = :pho_date, pho_tittle = :pho_tittle, pho_text= :pho_text WHERE pho_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":pho_post_id", $d2);
			$stmt -> bindParam(":pho_date", $d3);
			$stmt -> bindParam(":pho_tittle", $d4);
			$stmt -> bindParam(":pho_text", $d5);
			$stmt->execute();
		}

		public function hapus(string $d1)
		{
			$sql = "DELETE FROM photos WHERE pho_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
