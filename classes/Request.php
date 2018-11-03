<?php

class Request
{

    public $get;
    public $post;
    public $server;
    public $session;
    public $cookie;

    /**
     * Request constructor.
     * @param $get
     * @param $post
     * @param null $server
     * @param null $session
     * @param null $cookie
     */
    // ova funkcija uzima sve od nabrojanih globalnih varijabli
    public function __construct($get = null, $post = null, $server = null, $session = null, $cookie = null)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->session = $session;
        $this->cookie = $cookie;
    }

    public function checkIfUserSubmitted ()
    {
        if (isset($this->post['submit'])) {
            return true;
        }
        else {
            return false;
        }
    }

//    public function cookie () {
//
//        if (!empty($request->cookie['user']))
//        {
//            echo $request->cookie['user'];
//        }
//    }




}