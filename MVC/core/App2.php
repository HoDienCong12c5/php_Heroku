<?php
    class App2
    {
    protected $controller = "Home";
    protected $action = "index";
    protected $paramas = [];
    function __construct()
    { 
        $arr = $this->UrlProcess(); 
        if($arr !=NULL)
        {  
            if($arr[0]=="Admin"){
                
                unset($arr[0]);
                $arr = array_values($arr);
                $this->controller = "ListWork";
                
                 if (!empty($arr[0])) {
                    $this->controller = ucfirst($arr[0]);
                }
                if (file_exists('MVC/controllers/Admin/'.($this->controller). '.php')) {
                    
                    require_once 'MVC/controllers/Admin/'.($this->controller). '.php'; 
                    //kiểm tra class this->controllers
                    echo "Vào admin";
                    if (class_exists($this->controller)) {
                        print_r($arr);
                        $this->controller = new $this->controller;
                    } else {
                        //echo "lỗi rồi";
                        $this->loadError();
                    }
                    unset($arr[0]);
                }
            }
                /*if(file_exists("MVC/controllers/".$arr[0].".php"))
                {
                    $this->controller = $arr[0];
                    unset($arr[0]);
                } */
            
        }
        /*
        require_once "MVC/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;
        if(isset($arr[1]))
        { 
            if(method_exists($this->controller,$arr[1]))
            {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        $this->paramas = $arr?array_values($arr):[];
        call_user_func_array([$this->controller,$this->action],$this->paramas);*/
    }
    function UrlProcess()
    {
         if(isset($_GET["url"]))
        {
            
            return explode("/",filter_var(trim($_GET["url"],"/")));
        }
    }
}
?>
