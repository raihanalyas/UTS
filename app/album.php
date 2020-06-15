<?php
namespace App;
use PDO;
abstract class Data3 {
	abstract protected function tampil();
	abstract protected function tambah(String $c1,$c2,$c3);
	abstract protected function edit(String $c1,$c2,$c3,$c4);
	abstract protected function pilihdata(String $c1);
	abstract protected function hapus(String $c1);
}
class album extends Data3 {
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
			$sql = "SELECT * FROM album";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah (String $d1,$d2,$d3){
			$sql = "INSERT INTO album VALUES (NULL, :album_pho_id, :album_name, :album_text)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":album_pho_id", $d1);
			$stmt -> bindParam(":album_name", $d2);
			$stmt -> bindParam(":album_text", $d3);
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM album WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2, $d3, $d4)
		{
			$sql = "UPDATE album SET album_pho_id = :album_pho_id, album_name = :album_name, album_text = :album_text WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":album_pho_id", $d2);
			$stmt -> bindParam(":album_name", $d3);
			$stmt -> bindParam(":album_text", $d4);
			$stmt->execute();
		}

		public function hapus(string $d1)
		{
			$sql = "DELETE FROM album WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
