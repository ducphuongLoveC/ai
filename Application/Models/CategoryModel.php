<?php

class CategoryModel extends BaseModel
{
    const TABLE = 'category';

    public function getAll($select = ['*'], $orderBys = [], $limit = 15)
    {
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

    public function getAllWithCount()
    {
        $sql = "SELECT category.*, COUNT(product.id) AS count 
            FROM category 
            LEFT JOIN product ON category.id = product.category_id 
            GROUP BY category.id
            HAVING category.status = 1";
        return $this->getByQuery($sql);
    }

    public function getAllWithCountAllStatus()
    {
        $sql = "SELECT category.*, COUNT(product.id) AS count 
            FROM category 
            LEFT JOIN product ON category.id = product.category_id 
            GROUP BY category.id";
        return $this->getByQuery($sql);
    }


    public function checkNameUnique($name, $nameCheck)
    {
        // {select name from product where name = 'rye flour' and name in (SELECT name FROM `product` WHERE name != 'blueberry cake')
        $sql = "select name from " . self::TABLE . " where name = '$name' and name in (SELECT name FROM " . self::TABLE . " WHERE name != '$nameCheck')";
        return $this->getByQuery($sql);
    }

    public function findCategoryById($select = ['*'], $id = '')
    {
        return $this->find(self::TABLE, $select, $id);
    }

    public function findCategoryByName($name)
    {
        $sql = "SELECT * from category WHERE name = '$name'";
        return $this->getByQuery($sql);
    }

    public function countProducts($id)
    {
        $sql = "SELECT count(id) as count FROM product WHERE category_id = $id";
        return $this->getByQuery($sql);
    }
    public function deleteData($id)
    {
        $this->delete(self::TABLE, $id);
    }

    public function updateData($id, $data)
    {
        $this->update(self::TABLE, $id, $data);
    }

    public function createData($data)
    {
        $this->create(self::TABLE, $data);
    }

    public function searchCategoryFull($categoryData)
    {
        $sql = "SELECT category.*, COUNT(product.id) AS count
            FROM category 
            LEFT JOIN product ON category.id = product.category_id
            WHERE (category.name LIKE ('%" . $categoryData . "%') 
                   OR category.id LIKE ('%" . $categoryData . "%'))
            GROUP BY category.id
            ORDER BY category.id DESC";
        return $this->getByQuery($sql);
    }
}
