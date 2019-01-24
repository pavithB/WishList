<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Items extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
    }


///////////////////////////

/**
     * View Items in Wishlist
     * -------------------------
     * @method: GET
     */
    public function item_get($itemID)
    {
        header("Access-Control-Allow-Origin: *");
        
        // Load Authorization Token Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
            # Create a Wishlist Item

            # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
            $_GET = $this->security->xss_clean($_GET);


            if (empty($itemID) AND !is_numeric($itemID))
            {
                $this->response(['status' => FALSE, 'message' => 'Invalid Item ID' ], REST_Controller::HTTP_NOT_FOUND);

            }else{
            
            // Load Item Model
            $this->load->model('item_model', 'ItemModel');
            
            // Load Login Function
            $output = $this->ItemModel->viewItemDetails($itemID);
            if (!empty($output) AND $output != FALSE)
            {
                 
                // data retrive sucessfull
                $message = [
                    'status' => true,
                    'data' => $output,
                    'message' => "user: ".$itemID." wish list"
                ];
                $this->response($output, REST_Controller::HTTP_OK);
                
            } else 
            {
                 // no items for user
                $message = [
                    'status' => FALSE,
                    'message' => "item data not available"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
    //    ////////////
    }
        } else
        {
             $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);  
        }

    }

    //////////////////

/**
     * View Items in Wishlist
     * -------------------------
     * @method: GET
     */
    public function wishlist_get()
    {
        header("Access-Control-Allow-Origin: *");
        
        // Load Authorization Token Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
            # Create a Wishlist Item

            # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
            $_GET = $this->security->xss_clean($_GET);

            $id = $this->input->get('id');

            if (empty($id) AND !is_numeric($id))
            {
                $this->response(['status' => FALSE, 'message' => 'Invalid user id' ], REST_Controller::HTTP_NOT_FOUND);
            }
            else
            {
            
            // Load Item Model
            $this->load->model('item_model', 'ItemModel');
            
            // Load Login Function
            $output = $this->ItemModel->viewAllItems($id);
            if (!empty($output) AND $output != FALSE)
            {
                 
                // data retrive sucessfull
                $message = [
                    'status' => true,
                    'data' => $output,
                    'message' => "user: ".$id." wish list"
                ];
                $this->response($output, REST_Controller::HTTP_OK);
                
            } else 
            {
                 // no items for user
                $message = [
                    'status' => FALSE,
                    'message' => "no item available"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }
        } else
        {
             $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);  
        }

    }

    
/**
     * View Items in sharelist
     * -------------------------
     * @method: GET
     */
    public function sharelist_get()
    {
       
            $_GET = $this->security->xss_clean($_GET);

            $id = $this->input->get('id');

            if (empty($id) AND !is_numeric($id))
            {
                $this->response(['status' => FALSE, 'message' => 'Invalid user id' ], REST_Controller::HTTP_NOT_FOUND);
            }
            else
            {
            
            // Load Item Model
            $this->load->model('item_model', 'ItemModel');
            
            // Load Login Function
            $output = $this->ItemModel->viewAllItems($id);
            if (!empty($output) AND $output != FALSE)
            {
                 
                // data retrive sucessfull
                $message = [
                    'status' => true,
                    'data' => $output,
                    'message' => "user: ".$id." wish list"
                ];
                $this->response($output, REST_Controller::HTTP_OK);
                
            } else 
            {
                 // no items for user
                $message = [
                    'status' => FALSE,
                    'message' => "no item available"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }

    }

    /**
     * Add new Item with API
     * -------------------------
     * @method: POST
     */
    public function item_post()
    {
        header("Access-Control-Allow-Origin: *");
    
        // Load Authorization Token Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
            # Create a User Item

            # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
            $_POST = $this->security->xss_clean($_POST);

            $this->form_validation->set_data([
                'title' => $this->post('title', TRUE),
                'description' => $this->post('description', TRUE),
                'url' => $this->post('url', TRUE),
                'price' => $this->post('price', TRUE),
                'priority' => $this->post('priority', TRUE),
            ]);
            
            # Form Validation
            $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[1000]');
            $this->form_validation->set_rules('url', 'Url', 'trim|max_length[500]');
            $this->form_validation->set_rules('price', 'Price', 'trim|max_length[50]');
            $this->form_validation->set_rules('priority', 'priority Level', 'trim|required|max_length[50]');
            if ($this->form_validation->run() == FALSE)
            {
                // Form Validation Errors
                $message = array(
                    'status' => false,
                    'error' => $this->form_validation->error_array(),
                    'message' => validation_errors()
                );

                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
            else
            {
                // Load Item Model
                $this->load->model('item_model', 'ItemModel');

                $insert_data = [
                    'user_id' => $is_valid_token['data']->id,
                    'title' => $this->post('title', TRUE),
                    'description' => $this->post('description', TRUE),
                    'url' => $this->post('url', TRUE),
                    'price' => $this->post('price', TRUE),
                    'priority' => $this->post('priority', TRUE),
                    'createtime' => time(),
                ];

                // Insert Item
                $output = $this->ItemModel->create_item($insert_data);

                if ($output > 0 AND !empty($output))
                {
                    // Success
                    $message = [
                        'status' => true,
                        'message' => "Item Add"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else
                {
                    // Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Item not create"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Delete an Item with API
     * @method: DELETE
     */
    public function item_delete($id)
    {
        header("Access-Control-Allow-Origin: *");
    
        // Load Authorization Token Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
            # Delete a User Item

            # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
            $id = $this->security->xss_clean($id);
            
            if (empty($id) AND !is_numeric($id))
            {
                $this->response(['status' => FALSE, 'message' => 'Invalid Item ID' ], REST_Controller::HTTP_NOT_FOUND);
            }
            else
            {
                // Load Item Model
                $this->load->model('item_model', 'ItemModel');

                $delete_item = [
                    'id' => $id,
                    'user_id' => $is_valid_token['data']->id,
                ];

                // Delete an Item
                $output = $this->ItemModel->delete_item($delete_item);

                if ($output > 0 AND !empty($output))
                {
                    // Success
                    $message = [
                        'status' => true,
                        'message' => "Item Deleted"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else
                {
                    // Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Item not delete"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update an Item with API
     * @method: PUT
     */
    public function item_put($id)
    {
        header("Access-Control-Allow-Origin: *");
    
        // Load Authorization Token Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
            # Update a User Item


            # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
            $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")), true);
            
            $this->form_validation->set_data([
                'id' => $this->input->post('id', TRUE),
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('description', TRUE),
                'url' => $this->input->post('url', TRUE),
                'price' => $this->input->post('price', TRUE),
                'priority' => $this->input->post('priority', TRUE),
            ]);

            
            # Form Validation
            $this->form_validation->set_rules('id', 'Item ID', 'trim|required|numeric');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[1000]');
            $this->form_validation->set_rules('url', 'Url', 'trim|max_length[500]');
            $this->form_validation->set_rules('price', 'Price', 'trim|max_length[50]');
            $this->form_validation->set_rules('priority', 'priority Level', 'trim|required|max_length[50]');
            if ($this->form_validation->run() == FALSE)
            {
                // Form Validation Errors
                $message = array(
                    'status' => false,
                    'error' => $this->form_validation->error_array(),
                    'message' => validation_errors()
                );

                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
            else
            {
                // Load Item Model
                $this->load->model('item_model', 'ItemModel');

                $update_data = [
                    'user_id' => $is_valid_token['data']->id,
                    'id' => $this->input->post('id', TRUE),
                    'title' => $this->input->post('title', TRUE),
                    'description' => $this->input->post('description', TRUE),
                    'url' => $this->input->post('url', TRUE),
                    'price' => $this->input->post('price', TRUE),
                    'priority' => $this->input->post('priority', TRUE),
                ];

                // Update an Item
                $output = $this->ItemModel->update_item($update_data);

                if ($output > 0 AND !empty($output))
                {
                    // Success
                    $message = [
                        'status' => true,
                        'message' => "Item Updated"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else
                {
                    // Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Item not update"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}