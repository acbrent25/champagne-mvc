<?php
  /*
  * App Core Class
  * Creates URL & loads core controller
  * URL FORMAT - /controller/method/params
  */

  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    // Constructor
    public function __construct(){
      //print_r($this->getUrl());
      $url = $this->getUrl();
      // Look in controller for controller
      if(file_exists('../app/conrollers/' . ucwords($url[0]). '.php')){
        // if exists, set as controller
        $this->$currentController = ucwords($url[0]);
        // unset 0 index
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/' . $this->currentController . '.php';

      // Instatiate conroller class
      $this->currentController = new $this->currentController;

    }

    public function getURL(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }