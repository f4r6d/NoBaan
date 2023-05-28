<?php

function bought_discounted($phone_number)
{
    global $db;
    $query = 'SELECT * FROM orders WHERE phone_number=:phone_number AND discounted=1';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':phone_number', $phone_number);
        $statement->execute();
        $order = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
    } catch (PDOException $e) {
        return display_error('bought_discounted error',$e->getMessage());
    }

    return $order;
}


function buy($product_id, $phone_number, $amount, $discounted)
{
    global $db;
    $query = 'INSERT INTO orders (product_id, phone_number, amount, discounted) VALUES (:product_id, :phone_number, :amount, :discounted)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->bindValue(':phone_number', $phone_number);
        $statement->bindValue(':amount', $amount);
        $statement->bindValue(':discounted', $discounted);
        $result = $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        return display_error('خطا', 'در خرید سفارش، لطفا دوباره امتحان کنید');
    }

    return $result;
}


function get_orders()
{
    global $db;
    $query = 'SELECT * FROM products JOIN orders ON orders.product_id = products.id ORDER BY orders.phone_number' ;
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
    } catch (PDOException $e) {
        return display_error('get_orders error',$e->getMessage());
    }

    return $orders;
}