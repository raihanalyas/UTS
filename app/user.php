<?php
class user {
	private $db;

	public function __construct()
	{
		try {
				$this->db =
				new PDO("mysql:host=localhost;dbname=db_uts", "root", "");
			} catch (PDOException $e) {
				die ("Error " . $e->getMessage());
			}
		}
		public function login(string $user,$pass)
		{
			$slog = "SELECT * FROM tb_user WHERE username = :username AND password = :userpass";
			$log = $this->db->prepare($slog);
			$log->bindParam(":username", $user);
			$log->bindParam(":userpass", $pass);
			$log->execute();
			$login = $log->fetch();
			if($log->rowCount() > 0){
					session_start();
					$_SESSION["nama"] = $login['user_name'];
					header("location:index.php");
					exit;
			}

		}
	}
