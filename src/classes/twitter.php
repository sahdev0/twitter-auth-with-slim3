<?php

use Abraham\TwitterOAuth\TwitterOAuth;

define('OAUTH_CALLBACK', "http://localhost/slim/public/login/twitter/");

class Twitter{
    
    private $tw;
    private $data;
    public function __construct($data){
        $this->tw = new TwitterOAuth($data['consumer_key'], $data['consumer_secret']);
    }

    public function login(){

            if(isset($_REQUEST['oauth_token'])){

                $request_token = [];
                $request_token['oauth_token'] = $_SESSION['oauth_token'];
                $request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
                $this->tw = new TwitterOAuth($this->data['consumer_key'], $this->data['consumer_secret'], $request_token['oauth_token'], $request_token['oauth_token_secret']);
                $access_token = $this->tw->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);

                echo "<pre>";
                print_r($access_token);
                echo "</pre>";
                die;
            }else{

                $request_token = $this->tw->oauth('oauth/request_token', array("oauth_callback" => OAUTH_CALLBACK));
                $_SESSION['oauth_token'] = $request_token['oauth_token'];
                $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

                $url = $this->tw->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

                return $url;

            }
    }
}