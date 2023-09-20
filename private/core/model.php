<?php

class Model extends Database{

    public $errors = array();

    public function __construct()
    {
        if(!property_exists($this, 'table'))
        {
            $this->table = strtolower($this::class) . 's';
        }  
    }

    public function where($column, $value){

        $query = "select * from {$this->table} where $column = :value";
        $data = $this->query($query, [
            'value' => $value
        ]);

        return $data;
    }

    public function selectCol($id, $columns = [])
    {
        if(property_exists($this, 'allowedColumns'))
        {
            $filteredColumns = array_intersect($columns, $this->allowedColumns);
            $columns = array_values($filteredColumns);        
        }

        $columnList = implode(",", $columns);

        $query = "select $columnList from $this->table where buyer_id = :id";

        $data['id'] = $id;

        return $this->query($query, $data);
    }

    public function update_market($id, $data)
    {
        $str = "";
        foreach($data as $key => $value)
        {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str,",");
        $data['id'] = $id;
        
        $query = "update {$this->table} set {$str} where item_id = :id";
        return $this->query($query, $data);
    }

    public function update_inventory($item_name, $user_id, $data)
    {
        $str = "";
        foreach($data as $key => $value)
        {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str,",");
        $data['item_name'] = $item_name;
        $data['user_id'] = $user_id;
        
        $query = "update {$this->table} set {$str} where item_name = :item_name and user_id = :user_id";
        return $this->query($query, $data);
    }

    public function update_acc($id, $data)
    {
        $str = "";
        foreach($data as $key => $value)
        {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str,",");
        $data['id'] = $id;
        
        $query = "update {$this->table} set {$str} where account_id = :id";
        return $this->query($query, $data);
    }

    public function update_req($id, $data)
    {
        $str = "";
        foreach($data as $key => $value)
        {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str,",");
        $data['id'] = $id;
        
        $query = "update {$this->table} set {$str} where request_id = :id";
        return $this->query($query, $data);
    }

    public function update_appeal($id, $data)
    {
        $str = "";
        foreach($data as $key => $value)
        {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str,",");
        $data['id'] = $id;
        
        $query = "update {$this->table} set {$str} where appeal_id = :id";
        return $this->query($query, $data);
    }

    public function update_user($id, $data)
    {
        if(property_exists($this, 'allowedColumns'))
        {
            foreach($data as $key => $column)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }

        if(property_exists($this, 'beforeUpdate'))
        {
            foreach($this->beforeUpdate as $func)
            {
                $data = $this->$func($data);
            }
        }
        
        $str = "";
        foreach($data as $key => $value)
        {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str,",");
        $data['id'] = $id;
        
        $query = "update {$this->table} set {$str} where user_id = :id";
        return $this->query($query, $data);
    }

    
    public function insert($data){
        if(property_exists($this, 'allowedColumns'))
        {
            foreach($data as $key => $column)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }

        if(property_exists($this, 'beforeInsert'))
        {
            foreach($this->beforeInsert as $func)
            {
                $data = $this->$func($data);
            }
        }
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = ':' . implode(',:', $keys);

        $query = "insert into {$this->table} ($columns) values ($values)";
        return $this->query($query, $data);
    }

    public function insert_invent($data){
        if(property_exists($this, 'allowedColumns'))
        {
            foreach($data as $key => $column)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = ':' . implode(',:', $keys);

        $query = "insert into inventory ($columns) values ($values)";
        return $this->query($query, $data);
    }

    public function delete_trade($id)
    {
        $query = "delete from {$this->table} where item_id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }   

    
}