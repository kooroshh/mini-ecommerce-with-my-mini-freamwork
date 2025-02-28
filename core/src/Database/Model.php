<?php namespace Main\Core\Database;


use PDO;
use PDOStatement;

class Model extends Database
{
    protected string $table;
    protected PDOStatement $statement;
    protected int $fetchMod = PDO::FETCH_OBJ;
    protected array $selectedItems = [];
    protected int $limit = 0;
    protected array $whereList = [];
    protected array $valuesForBind = [];
    protected Database $db;

    public function __construct()
    {
        $this->db = app()->db;
    }

    public function create(array $data) : bool
    {

        $keyOfData = array_keys($data);

        $inputs = implode(',', $keyOfData);
        $params = implode(',', array_map(fn($item) => ":$item", $keyOfData));

        $this->setStatement("INSERT INTO {$this->table} ($inputs) VALUES ($params)");
        $this->bindValues($data);

        return $this->statement->execute();


    }

    public function update(int $id, array $data) : bool
    {
        $fieldsOfData = array_map(fn($key) => "$key = :$key", array_keys($data));
        $fieldsOfData = implode(',', $fieldsOfData);

        $this->setStatement("UPDATE {$this->table} SET $fieldsOfData WHERE id = :id");
        $this->bindValues(array_merge($data, ['id' => $id]));

        return $this->statement->execute();

    }

    public function delete(int $id)
    {


        $this->setStatement("DELETE FROM {$this->table} WHERE id = :id");
        $this->bindValues(["id" => $id]);

        return $this->statement->execute();
    }

    public function get(): array|bool
    {
        return $this->result()->fetch();
    }

    public function find($value, $field = "id")
    {
        return $this->where($field, $value)->first();
    }

    public function first()
    {
        return $this->limit(1)->result()->fetch('fetch');
    }

    public function count(string $name = null,$value = null, string $operator = "=")
    {
        if(!is_null($name)){
            return $this->select("count(*) as count")->where($name, $value, $operator)->result()->fetch('fetch')->count;
        }
        
        return $this->select("count(*) as count")->result()->fetch('fetch')->count;
    }




    public function where(string $name, $value, string $operator = "=") : self
    {

        $this->whereList[] = "$name $operator :$name";

        $this->valuesForBind[$name] = $value;

        return $this;
    }
    public function from(string $table) : self
    {
        $this->table = $table;
        return $this;
    }

    public function select() : self
    {
        $this->selectedItems = func_get_args();

        return $this;
    }

    public function limit(int $limit = 0) : self
    {
        $this->limit = $limit;

        return $this;
    }

    public function result() : self
    {
        $query = ['Select'];

        $query[] = count($this->selectedItems) == 0 ? '*' : implode(',',$this->selectedItems);

        $query[] = "FROM {$this->table}";

        if(count($this->whereList)){
            $query[] = $this->prepareWhereStatement();
        }

        if($this->limit !== 0)
            $query[] = "LIMIT {$this->limit}";


        $this->setStatement(implode(' ', $query));
        $this->bindValues();
        $this->statement->execute();
        return $this;
    }

    public function fetch(string $fetchMethod = "fetchAll")
    {
        return $this->statement->{$fetchMethod}($this->fetchMod);
    }

    public function bindValues(array $data = []) : void
    {
        $data = array_merge($this->valuesForBind,$data);
        foreach($data as $key => $value)
        {
            $this->statement->bindValue($key, $value);
        }
    }

    public function prepareWhereStatement() : string
    {

        $query[] = "WHERE ";

        foreach($this->whereList as $key => $value)
        {
            if($key !== array_key_first($this->whereList))
                $query[] = "AND ";

            $query[] = $value;
        }
        return implode(' ',$query);
    }

    public function setStatement(string $query) : void
    {
        $this->statement = $this->db->pdo->prepare($query);
    }

}