 <?php
    class Database
    {
        public $conn;
        public $result;

        function __construct()
        {
            $this->conn=mysqli_connect('localhost','root','','lifecare');
        }

        public function insert($table,$column=array())
        {
            $table_columns = implode(',',array_keys($column));
            $table_value = implode("','", $column);

            $query="INSERT INTO $table ($table_columns) VALUES ('$table_value')";
            $this->result=mysqli_query($this->conn,$query);
        }

        public function update($table,$column=array(),$where,$id)
        {
            $args=array();

            foreach ($column as $key => $value)
            {
                $args[] = "$key = '$value'";
            }

            $table_value = implode(',', $args);

            $query="UPDATE $table SET $table_value WHERE $where=$id";
            $this->result=mysqli_query($this->conn,$query);
        }

        public function delete($table,$where,$id)
        {
            $query="DELETE FROM $table WHERE $where=$id";
            $this->result=mysqli_query($this->conn,$query);
        }

        public function select($table,$column='*',$where="")
        {
            $query="SELECT $column FROM $table";

            if($where!="")
            {
                $query.=" WHERE $where";
            }
            
            $this->result=mysqli_query($this->conn,$query);
        }


    }
?>