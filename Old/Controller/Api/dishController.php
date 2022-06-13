<?php
class dishController extends BaseController
{
    /**
     * "/user/list" Endpoint - Get list of users
     */
    public function action()
    {
        $strErrorDesc = '';
        $requestMethod = strtoupper($_SERVER["REQUEST_METHOD"]);
        $arrUrlParams = $this->getUrlParams();
        $arrBodyParams = $this->getBodyParams();
 
        // 初始化資料庫物件
        $baseModel = new BaseModel("dish");

        // GET
        if ($requestMethod == 'GET') {
            try {
                $arrWhere = array();
                if (isset($arrUrlParams['did']) && $arrUrlParams['did']) {  array_push($arrWhere, 'dId='.$arrUrlParams['did']); }
                if (isset($arrUrlParams['dname']) && $arrUrlParams['dname']) { array_push($arrWhere, "dName='".$arrUrlParams['dname']."'"); }

                if(count($arrWhere) > 0){
                    $baseModel->where(implode(" AND ",$arrWhere));
                }

                $intLimit = 10;
                if (isset($arrUrlParams['limit']) && $arrUrlParams['limit']) {
                    $intLimit = $arrUrlParams['limit'];
                }

                $arrTests = $baseModel->orderby("dId", true)->limit($intLimit)->toArray();

                $responseData = json_encode($arrTests, JSON_UNESCAPED_UNICODE);

            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().' Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } 
        // // POST
        // elseif  ($requestMethod == 'POST') {
        //     $uId = 0;
        //     $uName = "",

        //     if (isset($arrBodyParams['dId']) && $arrBodyParams['dId']) {
        //         $uId = $arrBodyParams['dId'];
        //     }
        //     if (isset($arrBodyParams['dName']) && $arrBodyParams['dName']) {
        //         $uName = $arrBodyParams['dName'];
        //     }

        //     $arrTests = $baseModel->add($uId, $uName).saveChange();

        //     $responseData = json_encode($arrTests);
        // }
        // // PUT
        // elseif  ($requestMethod == 'PUT') {
        //     $uId = 0;
        //     $uName = "",

        //     if (isset($arrBodyParams['uid']) && $arrBodyParams['uid']) {
        //         $uId = $arrBodyParams['uid'];
        //     }
        //     if (isset($arrBodyParams['uname']) && $arrBodyParams['uname']) {
        //         $uName = $arrBodyParams['uname'];
        //     }

        //     $arrTests = $baseModel->where("uId=$uId")->update(array("uname" => $uName)).saveChange();

        //     $responseData = json_encode($arrTests);
        // }
        // // DELETE
        // elseif  ($requestMethod == 'DELETE') {
        //     $arrWhere = array();
        //     $data = "";
        //     if (isset($arrUrlParams['uid']) && $arrUrlParams['uid']) {
        //         array_push($arrWhere, "uId=".$arrUrlParams['uid']);
        //     }
        //     if (isset($arrUrlParams['uname']) && $arrUrlParams['uname']) {
        //         $data = $arrUrlParams['uname'];
        //     }
        //     if(count($arrWhere) > 0){
        //         $baseModel->where(implode(" AND ",$arrWhere));
        //     }

        //     $arrTests = $baseModel->update(array("uname" => $uName)).saveChange();

        //     $responseData = json_encode($arrTests);
        // }
        // else {
        //     $strErrorDesc = 'Method not supported';
        //     $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        // }

        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } 
        else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}