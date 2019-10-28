<?php
    class Route{
    
        private $routes = [];
        
        public function __construct(){}
        
        public function addRoute($method, $url, $callback){
            $this->routes[] = array('method' => $method, 
                                  'url' => $url, 
                                  'callback' => $callback);
        }
        
        public function doRouting(){
            $reqUrl = $_SERVER['REQUEST_URI'];
            $reqMet = $_SERVER['REQUEST_METHOD'];
            foreach($this->routes as  $route) {
                if($route['method']==$reqMet&&$route['url']==$reqUrl)
                    return $route['callback']();
                
            }
        }
    }
    
    $route = new Route();
    
    
    $route->addRoute('GET', '/', function(){
         include_once 'views/accueil.html';
    });
    
     $route->addRoute('GET', '/contact', function(){
         require 'views/contact.html';
     });

     $route->addRoute('GET', '/signup', function(){
         include_once 'views/signup.html';
     });
     $route->addRoute('GET', '/signin', function(){
         include_once 'views/signin.html';
     });
     $route->addRoute('POST','/signup',function(){
            include_once 'controllers/signup.php';
            echo "signup success!";
    });
     $route->addRoute('GET', '/form', function(){
         include_once 'views/form.html';
     });
     
     
     
     
     
     
  /*  
     $route->addRoute('POST', '/Contacts', function(){
            include_once dirname(__FILE__).'/Route/api/Contacts.php';
            //用header浏览器会显示302
            header('Location: /Contacts');
            //这样也可以实现功能,但是要刷新一次页面才能生效cookie，因为include是同一次请求，并没有使浏览器生成cookie
            //只有当这次请求responds后，浏览器接收到服务器端的setcookie指令才会在浏览器端生成cookie并用于以后的请求
            //include_once 'Route/main/Contacts.php';
     });
     $route->addRoute('POST', '/Se-connecter', function(){
            include_once dirname(__FILE__).'/Route/api/login.php';
            header('Location: /Se-connecter');
     });
     
     
    $route->addRoute('GET','/inscrire',function(){
            include_once 'Route/main/inscrire.html';
    });
    $route->addRoute('POST','/inscrire',function(){
            include_once 'Route/api/inscrire.php';
            header('Location: /Se-connecter');
    });
    $route->addRoute('GET','/logout',function(){
            include_once 'Route/api/logout.php';
            header('Location: /Se-connecter');
    });
    $route->addRoute('GET','/Enregister',function(){
            include_once 'Route/main/Enregister.php';
    });
    */
    
     $route->doRouting();