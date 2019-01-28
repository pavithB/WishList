<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class ApiHandler extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        // Load User Model
        $this->load->model('user_model', 'UserModel');
    }

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

    
    /**
     * User Register
     * --------------------------
     * @param: fullname
     * @param: username
     * @param: email
     * @param: password
     * --------------------------
     * @method : POST
     * @link : api/user/register
     */
    public function register_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);

        $this->form_validation->set_data([
            'full_name' => $this->post('full_name', TRUE),
            'username' => $this->post('username', TRUE),
            'email' => $this->post('email', TRUE),
            'password' => $this->post('password', TRUE),
            'wishlist_name' => $this->post('wishlist_name', TRUE),
            'wishlist_description' => $this->post('wishlist_description', TRUE)
        ]);
        
        # Form Validation
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]|max_length[20]',
            array('is_unique' => 'This %s already exists please enter another username'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[80]',
            array('is_unique' => 'This %s already exists please enter another email address'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('wishlist_name', 'Wishlist Name', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('wishlist_description', 'Wishlist Description', 'trim|required|max_length[1000]');
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
            $insert_data = [
                'full_name' => $this->post('full_name', TRUE),
                'email' => $this->post('email', TRUE),
                'username' => $this->post('username', TRUE),
                'password' => md5($this->post('password', TRUE)),
                'wishlist_name' => $this->post('wishlist_name', TRUE),
                'wishlist_description' => $this->post('wishlist_description', TRUE)
            ];

            // Insert User in Database
            $output = $this->UserModel->insert_user($insert_data);
            if ($output > 0 AND !empty($output))
            {
                // Success 200 Code Send
                $message = [
                    'status' => true,
                    'message' => "User registration successful"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else
            {
                // Error
                $message = [
                    'status' => FALSE,
                    'message' => "Not Register Your Account."
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }


    /**
     * User Login API
     * --------------------
     * @param: username or email
     * @param: password
     * --------------------------
     * @method : POST
     * @link: api/user/login
     */
    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        
        $this->form_validation->set_data([
            'username' => $this->post('username', TRUE),
            'password' => $this->post('password', TRUE)
        ]);


        # Form Validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
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
            // Load Login Function
            $output = $this->UserModel->user_login($this->post('username'), $this->post('password'));
            if (!empty($output) AND $output != FALSE)
            {
                // Load Authorization Token Library
                $this->load->library('Authorization_Token');

                // Generate Token
                $token_data['id'] = $output->id;
                $token_data['full_name'] = $output->full_name;
                $token_data['username'] = $output->username;
                $token_data['email'] = $output->email;
                $token_data['time'] = time();

                $user_token = $this->authorization_token->generateToken($token_data);

                $return_data = [
                    'user_id' => $output->id,
                    'full_name' => $output->full_name,
                    'email' => $output->email,
                    'wishlist_name' => $output->wishlist_name,
                    'wishlist_description' => $output->wishlist_description,
                    'token' => $user_token,
                ];

                // Login Success
                $message = [
                    'status' => true,
                    'data' => $return_data,
                    'message' => "User login successful"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else
            {
                // Login Error
                $message = [
                    'status' => FALSE,
                    'message' => "Invalid Username or Password"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

/**
     * View Items in sharelist
     * -------------------------
     * @method: GET
     */
    public function user_get()
    {
       
            $_GET = $this->security->xss_clean($_GET);

            $id = $this->input->get('id');

            if (empty($id) AND !is_numeric($id))
            {
                $this->response(['status' => FALSE, 'message' => 'Invalid user id' ], REST_Controller::HTTP_NOT_FOUND);
            }
            else
            {
            
            
            // Load Login Function
            $output = $this->UserModel->viewUserDetails($id);
            if (!empty($output) AND $output != FALSE)
            {
                $return_data = [
                    'user_id' => $output->id,
                    'full_name' => $output->full_name,
                    'wishlist_name' => $output->wishlist_name,
                    'wishlist_description' => $output->wishlist_description
                ];

                // data retrive sucessfull
                $message = [
                    'status' => true,
                    'data' => $return_data,
                    'message' => "user: ".$id." wish list"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
                
            } else 
            {
                 // no items for user
                $message = [
                    'status' => FALSE,
                    'message' => "no item available"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }

    }
}