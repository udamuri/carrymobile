<?php

/**
* Class SaveClass.php
*/
class SaveClass 
{
	
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "dbcarry";
	private $con = '';

	public $nama = '';
	public $alamat = '';
	public $kode_pos = '';
	public $telepon = '';

	public function __construct()
	{
		$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    	// set the PDO error mode to exception
    	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}


	/**
	*  parse data
	*  @param String $data
	*/
	public function save()
	{
		try {
			// prepare sql and bind parameters
		    $stmt = $this->conn->prepare("INSERT INTO tbldata (nama, alamat, kode_pos,telepon)
		    VALUES (:nama, :alamat, :kode_pos, :telepon)");
		    $stmt->bindParam(':nama', $nama);
		    $stmt->bindParam(':alamat', $alamat);
		    $stmt->bindParam(':kode_pos', $kode_pos);
		    $stmt->bindParam(':telepon', $telepon);

		    // insert a row
		    $nama = $this->nama;
		    $alamat = $this->alamat;
		    $kode_pos = $this->kode_pos;
		    $telepon = $this->telepon;
		    if($stmt->execute())
		    {
		    	return true;
		    }

		    return false;
        } catch (Exception $e) {
            throw $e;
        }

	}
}
