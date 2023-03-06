<?php

class Config
{
    public $HOST = "localhost";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DB_NAME = "railway";
    public $TABLE = "railway_table";

    public $conn;

    public function Connect()
    {
        $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
    }

    public function insert($name, $age, $email, $departure, $arrival, $train)
    {
        $this->Connect();

        $query = "INSERT INTO $this->TABLE(name , age , email , departure , arrival , train) VALUES('$name',$age, '$email' , '$departure' , '$arrival' , '$train');";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function fetchAllRecord()
    {
        $this->Connect();

        $query = "SELECT * FROM $this->TABLE";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function fetch_single_record($id)
    {
        $this->Connect();

        $query = "SELECT * FROM $this->TABLE WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function delete($id)
    {
        $this->Connect();
        $query = "DELETE FROM $this->TABLE WHERE id=$id;";
        $res = mysqli_query($this->conn, $query);
        return $res;
    }

    public function update($name, $age, $email, $departure, $arrival, $train, $id)
    {
        $this->Connect();
        $query = "UPDATE $this->TABLE SET name='$name', age=$age , email = '$email' , departure = '$departure' , arrival = '$arrival' , train = '$train' WHERE id=$id;";

        $res = mysqli_query($this->conn, $query);

        return $res;


    }


}

?>