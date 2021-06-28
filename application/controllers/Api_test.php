<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/API_Controller.php';

class Api_Test extends API_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function demo()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            /**
             * By Default Request Method `GET`
             */
            'methods' => ['POST'], // 'GET', 'OPTIONS'

            /**
             * Number limit, type limit, time limit (last minute)
             */
            'limit' => [5, 'ip', 'everyday'],

            /**
             * type :: ['header', 'get', 'post']
             * key  :: ['table : Check Key in Database', 'key']
             */
            'key' => ['POST', $this->key() ], // type, {key}|table (by default)
        ]);
        
        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => "Return API Response",
            ],
        200);
    }

    /**
     * Check API Key
     *
     * @return key|string
     */
    private function key()
    {

        return 1452;
    }

    public function login()
    {
        header("Access-Control-Allow-Origin: *");
        $user_name  = strip_tags($_GET['username']);
        $password   = strip_tags($_GET['password']);
        // config api
        $this->_apiConfig([
            'methods' => ['GET'],
        ]);

        $payload = [
            'ep_id'     => "112",
            'ep_email'  => "tuannguyenduy0111@gmail.com",
            'ep_name'   => "Nguyễn Duy Tuân"
        ];

        $this->load->library('authorization_token');

        if ($user_name == 'tuandev@gmail.com') {
           $token = $this->authorization_token->generateToken($payload);
           
        //

        // return data
            $this->api_return(
            [
                'status' => true,
                'result' => [
                    'token' => $token,
                ],
                'messages' => 'Đăng nhập thành công'
                
            ],
            200);
       } else {
            $this->api_return(
            [
                'status' => false,
                "messages" => "Login failed"
                
            ],
            200);
       }
      
    }

 
    public function view()
    {
        header("Access-Control-Allow-Origin: *");

        $user_data = $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);

        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'user_info' => $user_data['token_data']
                ],
            ],
        200);
    }
}