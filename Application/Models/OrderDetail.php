<?php

class OrderDetail extends BaseModel
{
    const TABLE = "order_detail";
    protected $primaryKey = 'id';

    public function store($data)
    { //luu thong tin vao ban detail
        $this->create(self::TABLE, $data);
    }

}
