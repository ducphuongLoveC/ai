<?php


class OrderModel extends BaseModel
{
    const TABLE = 'order';
    protected $primaryKey = 'id';


    public function getAll($select = ['*'], $orderBys = [], $limit = 15)
    {
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

    public function getTotalOrders()
    {
        $sql = "SELECT count(id) as total_orders FROM `order`";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
    public function store($data)
    {
        //TODO: get key value
        // return $this->create(self::TABLE, $input);
        return $this->create(self::TABLE, $data);
    }

    public function updateData($id, $data = [])
    {
        $this->update(self::TABLE, $id, $data);
    }

    public function findOrderById($select = ['*'], $id = '')
    {
        return $this->find(self::TABLE, $select, $id);
    }


    public function getAllOrdersByAccountId($account_id)
    {
        $sql = "select `order`.*, SUM(price) AS total, SUM(quantity) AS quantity from `order` inner join `order_detail` on `order`.`id` = `order_detail`.`id` inner join `account` on `order`.`account_id` = `account`.`id` where `order`.`account_id` = $account_id group by `order`.`id` order by `id` desc";
        return $this->paginate($sql);
    }

    public function getAllOrderPaginate()
    {

        $sql = "SELECT `order`.*, SUM(order_detail.price) AS total, SUM(order_detail.quantity) AS quantity
            FROM `order`
            INNER JOIN order_detail ON `order`.id = order_detail.id
            GROUP BY `order`.id
            ORDER BY `order`.id DESC";
        return $this->paginate($sql, 7);
    }

    public function getOrderDetailById($id)
    {
        $sql = "SELECT `order`.*, SUM(`order_detail`.price) AS total, SUM(`order_detail`.quantity) AS quantity 
        FROM `order_detail` 
        INNER JOIN `order` ON `order_detail`.id = `order`.id 
        WHERE `order`.id = $id";

        $query = $this->_query($sql);

        return mysqli_fetch_assoc($query);
    }

    public function getAllProductsInOrderById($id)
    {
        $sql = "SELECT `product`.*, `order_detail`.quantity, `order_detail`.price AS price_sum 
        FROM `order_detail` 
        INNER JOIN `product` ON `product`.id = `order_detail`.product_id 
        WHERE `order_detail`.id = $id";

        return $this->getByQuery($sql);
    }

    public function searchOrderFull($orderData)
    {
        $sql = "SELECT `order`.*, sum(price) as total, sum(quantity) as quantity 
                FROM `order` , order_detail 
                WHERE `order`.id = order_detail.id AND
                    (`fname` like ('%" . $orderData . "%') 
                    or `lname` like ('%" . $orderData . "%')
                    or `phone` like ('%" . $orderData . "%')
                    or `address` like ('%" . $orderData . "%')
                    or `province` like ('%" . $orderData . "%')) 
                GROUP BY `order`.id 
                ORDER BY `order`.id DESC";
        return $this->paginate($sql);
    }
}
