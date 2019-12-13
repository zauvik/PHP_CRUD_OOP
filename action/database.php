<?php
class database{
 
	var $host = "127.0.0.1"; //your local ip
	var $dbuser = "root";
	var $dbpass = "";
    var $db = "oop_mhs";
    var $conn;
    
    //////////////////////////////////// class constructor /////////////////////////////////////
	public function __construct(){
        $conn = new mysqli($this->host,$this->dbuser,$this->dbpass,$this->db);
        $this->conn = $conn;

        // Check connection
        if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }
    }

    ////////////////////////////////// private function ////////////////////////////////////////
    // only can use this method in this class
    private function catch_error($err){
        echo "<hr><b>ERROR QUERY</b></br>";
        echo  "gimana sih..udah jomblo, ngoding error terus juga! nih liat error mu : ".$err."<hr>";
    }

    private function sanitize($var){
        $return = mysqli_real_escape_string($this->conn, $var);
        return $return;
    }

    //////////////////////////////// public function //////////////////////////////////////////
    // can use this function in other class

    //show / read
    public function show(){
        $conn = $this->conn;
        $qres = $conn->query("SELECT * FROM mahasiswa");
        if(!$qres){
            $this->catch_error($conn->error);
            return $hasil = [];
        }
		return $qres;
    }

    //insert
    public function insert($nama,$nim,$kelas,$angkatan){
        //modifikasi/convert karakter yang berpotensi membuat query menjadi error -> ' , "", dll
        $nama = $this->sanitize($nama);
        $nim = $this->sanitize($nim);
        $kelas = $this->sanitize($kelas);
        $angkatan = $this->sanitize($angkatan);

        //mulai aksi
        $conn = $this->conn;
        $sql = "INSERT INTO mahasiswa (nama, nim, kelas, angkatan) VALUES ('$nama', '$nim', '$kelas','$angkatan')";
        $qres = $conn->query($sql);
        if(!$qres){
            $this->catch_error($conn->error);
        }
    }

    //show by id
    public function show_byid($id){
        $conn = $this->conn;
        $qres = $conn->query("SELECT * FROM mahasiswa WHERE id=$id LIMIT 1");
        if(!$qres){
            $this->catch_error($conn->error);
            return $hasil = [];
        }
		return $qres;
    }

    //update
    public function update($id,$nama,$nim,$kelas,$angkatan){
        //modifikasi/convert karakter yang berpotensi membuat query menjadi error -> ' , "", dll
        $nama = $this->sanitize($nama);
        $nim = $this->sanitize($nim);
        $kelas = $this->sanitize($kelas);
        $angkatan = $this->sanitize($angkatan);

        //mulai aksi
        $conn = $this->conn;
        $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', kelas='$kelas', angkatan='$angkatan' WHERE id=$id";
        $qres = $conn->query($sql);
        if(!$qres){
            $this->catch_error($conn->error);
        }
    }

    public function delete($id){
        //mulai aksi
        $conn = $this->conn;
        $sql = "DELETE FROM mahasiswa WHERE id=$id";
        $qres = $conn->query($sql);
        if(!$qres){
            $this->catch_error($conn->error);
        }
    }
 
} 
