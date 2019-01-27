<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item_Model extends CI_Model
{
    protected $item_table = 'item';

    /**
     * Add a new Item
     * @param: {array} Item Data
     */
    public function create_item(array $data) {
        $this->db->insert($this->item_table, $data);
        return $this->db->insert_id();
    }

    /**
     * Delete an Item
     * @param: {array} Item Data
     */
    public function delete_item(array $data)
    {
        /**
         * Check Item exist with item_id and user_id
         */
        $query = $this->db->get_where($this->item_table, $data);
        if ($this->db->affected_rows() > 0) {
            
            // Delete Item
            $this->db->delete($this->item_table, $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        }   
        return false;
    }

    /**
     * Update an Item
     * @param: {array} Item Data
     */
    public function update_item(array $data)
    {
        /**
         * Check Item exist with item_id and user_id
         */
        $query = $this->db->get_where($this->item_table, [
            'user_id' => $data['user_id'],
            'id' => $data['id'],
        ]);

        if ($this->db->affected_rows() > 0) {

            // Update an Item
            $update_data = [
                'title' =>  $data['title'],
                'description' =>  $data['description'],
                'url' =>  $data['url'],
                'price' =>  $data['price'],
                'priority' =>  $data['priority'],
            ];

            return $this->db->update($this->item_table, $update_data, ['id' => $query->row('id')]);
        }   
        return false;
    }

     /**
     * View all Items
     * @param: User ID
     */
    public function viewAllItems($user_ID)
    {
        $this->db->where('user_id', $user_ID);
        $query = $this->db->get($this->item_table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


     /**
     * View Item Details
     * @param: Item ID
     */
    public function viewItemDetails($item_ID)
    {
        $this->db->where('id', $item_ID);
        $query = $this->db->get($this->item_table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = $row;
            }
            return $data;
        }
        return false;
    }

}