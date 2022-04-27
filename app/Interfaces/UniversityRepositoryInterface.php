<?php
namespace App\Interfaces;
interface UniversityRepositoryInterface{
    /**
     * Returns all rows from required table
     * @return
     */
    public function getAllOrders();
    /**
     * Returns object by its ID
     * @return
     */
    public function getOrderById($orderId);
    /**
     * Deletes row object from DB
     * @return
     */
    public function deleteOrder($orderId);
    /**
     * Creates new object and insert to DB
     * @return
     */
    public function createOrder(array $orderDetails);
    /**
     * Updates existing object and saves changes in DB
     * @return
     */
    public function updateOrder($orderId, array $newDetails);
}
?>