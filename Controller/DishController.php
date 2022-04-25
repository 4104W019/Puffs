<?php
require_once("../DataAccess/DBUtility.php");
require_once("SimpleRest.php");

/*
 * RESTful service 控制器
 * URL 映射
*/
$method = $_SERVER['REQUEST_METHOD'];

$siteRestHandler = new SiteRestHandler();
switch($method){
 
    case "GET":
        $siteRestHandler->getSite($_GET["id"]);
        break;
        
/*     case "POST":
        $siteRestHandler->addSite($_GET["id"]);
        break;
 
    case "PUT":
        $siteRestHandler->updateSite($_GET["id"]);
        break;

    case "DELETE":
        $siteRestHandler->deleteSite($_GET["id"]);
        break; */
}


class DishController extends SimpleRest {

    public function getSite($id) {
        $site = new Site();
        $rawData = $site->getSite($id);
 
        if(empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'No sites found!');        
        } else {
            $statusCode = 200;
        }
 
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this ->setHttpHeaders($requestContentType, $statusCode);
                
        if(strpos($requestContentType,'application/json') !== false){
            $response = $this->encodeJson($rawData);
            echo $response;
        } else if(strpos($requestContentType,'text/html') !== false){
            $response = $this->encodeHtml($rawData);
            echo $response;
        } else if(strpos($requestContentType,'application/xml') !== false){
            $response = $this->encodeXml($rawData);
            echo $response;
        }
    }
    

    public function encodeHtml($responseData) {
    
        $htmlResponse = "<table border='1'>";
        foreach($responseData as $key=>$value) {
                $htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
        }
        $htmlResponse .= "</table>";
        return $htmlResponse;        
    }
    
    public function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;
    }
    
    public function encodeXml($responseData) {
        // 创建 SimpleXMLElement 对象
        $xml = new SimpleXMLElement('<?xml version="1.0"?><site></site>');
        foreach($responseData as $key=>$value) {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }
}


?>