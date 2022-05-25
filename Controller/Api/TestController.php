<?php
class TestController extends BaseController
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
        $baseModel = new BaseModel("Test");

        // GET
        if ($requestMethod == 'GET') {
            try {
                $arrWhere = array();
                if (isset($arrUrlParams['uid']) && $arrUrlParams['uid']) {
                    array_push($arrWhere, "uId=".$arrUrlParams['uid']);
                }
                if (isset($arrUrlParams['uname']) && $arrUrlParams['uname']) {
                    array_push($arrWhere, "uName=".$arrUrlParams['uname']);
                }
                if(count($arrWhere) > 0){
                    $baseModel->where(implode(" AND ",$arrWhere));
                }

                $intLimit = 10;
                if (isset($arrUrlParams['limit']) && $arrUrlParams['limit']) {
                    $intLimit = $arrUrlParams['limit'];
                }

                $arrTests = $baseModel->orderby("uId", true)->limit($intLimit)->toArray();

                $responseData = json_encode($arrTests);

            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } 
        // POST
        elseif  ($requestMethod == 'POST') {
            $uId = 0;
            $uName = "",

            if (isset($arrBodyParams['uid']) && $arrBodyParams['uid']) {
                $uId = $arrBodyParams['uid'];
            }
            if (isset($arrBodyParams['uname']) && $arrBodyParams['uname']) {
                $uName = $arrBodyParams['uname'];
            }

            $arrTests = $baseModel->add($uId, $uName).saveChange();

            $responseData = json_encode($arrTests);
        }
        // PUT
        elseif  ($requestMethod == 'PUT') {
            $uId = 0;
            $uName = "",

            if (isset($arrBodyParams['uid']) && $arrBodyParams['uid']) {
                $uId = $arrBodyParams['uid'];
            }
            if (isset($arrBodyParams['uname']) && $arrBodyParams['uname']) {
                $uName = $arrBodyParams['uname'];
            }

            $arrTests = $baseModel->where("uId=$uId")->update(array("uname" => $uName)).saveChange();

            $responseData = json_encode($arrTests);
        }
        // DELETE
        elseif  ($requestMethod == 'DELETE') {
            $arrWhere = array();
            $data = "";
            if (isset($arrUrlParams['uid']) && $arrUrlParams['uid']) {
                array_push($arrWhere, "uId=".$arrUrlParams['uid']);
            }
            if (isset($arrUrlParams['uname']) && $arrUrlParams['uname']) {
                $data = $arrUrlParams['uname'];
            }
            if(count($arrWhere) > 0){
                $baseModel->where(implode(" AND ",$arrWhere));
            }

            $arrTests = $baseModel->update(array("uname" => $uName)).saveChange();

            $responseData = json_encode($arrTests);
        }
        else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}