<?php
namespace models;

class Model
{
    protected $_db;

    // 操作的表名，具体的值由子类确定
    protected $table;
    // 表单中的数据，值由子类来设置
    protected $data;

    public function __construct()
    {
        $this->_db = \libs\Db::make();
    }

    public function insert()
    {
        $keys=[];
        $values=[];
        $token=[];
        
        foreach($data as $k => $v)
        {
            $keys[] = $k;
            $values = $v;
            $token[] = '?';
        }

        $keys = implode(',', $keys);
        $token = implode(',', $token);

        $sql = "INSERT INTO {$this->table}($keys) VALUES('$token')";

        $stmt = $this->_db->prepare($sql);
        return $stmt->execute($values);
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function findAll()
    {
        
    }

    public function findOne()
    {
        
    }

    // 接收表单中的数据
    public function fill($data)
    {
        // 判断是否在白名单 中
        foreach($data as $k => $v)
        {
            if(!in_array($k, $this->fillable))
            {
                unset($data[$k]);
            }
        }
        $this->data = $data;
    }
}