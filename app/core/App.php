<?php
require_once 'Controller.php';
class App{
    private $controller = 'IndexController';
    private $method = 'index';
    private $params = [];

    function __construct(){
        $url = $this->getURL();
        $file = "../app/controllers/$url[0]".'.php';
            // find controller (file)
        if(file_exists($file) ){
            $this->controller = $url[0];
            unset($url[0]);
            // find method (in controller) - require + new class controller
            require_once "../app/controllers/$this->controller.php";
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }  
        }
        else require_once "../app/controllers/$this->controller.php";
        
        $this->params = array_values(isset($url)?$url:[]); 
        
        call_user_func_array([$this->controller,$this->method],[$this->params]); 
            // $CLASS_OBJ->$METHOD(array $this->params); 
    }
    public function getURL(){
        if(isset($_GET["url"])){
            return explode("/",filter_var(trim($_GET["url"])));
        }
    }
}

?>

