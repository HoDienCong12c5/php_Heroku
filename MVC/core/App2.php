<?php
    class App2
    {
    protected $controller = "Home";
    protected $action = "index";
    protected $paramas = [];
    function __construct()
    { 
        $arr = $this->UrlProcess();  
        print_r($arr);
        if($arr !=NULL)
        {  
            if($arr[0]=="Admin"){
                echo "Vào admin";
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
