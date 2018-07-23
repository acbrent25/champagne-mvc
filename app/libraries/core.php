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
      $this->getUrl();
    }

    public function getURL(){
      echo $_GET['url'];
    }
  }