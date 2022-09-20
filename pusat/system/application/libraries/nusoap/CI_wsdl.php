<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
require_once ('nusoap/lib/nusoap.php');
/**
 * Description of CI_wsdl
 *
 * @author craven
 */
class CI_wsdl extends wsdl {
    //put your code here
    function CI_wsdl($params) {
        $wsdl = isset ($params['wsdl'])?$params['wsdl']:FALSE;
        $proxyhost = isset ($params['proxyhost'])?$params['proxyhost']:FALSE;
        $proxyport = isset ($params['proxyport'])?$params['proxyport']:FALSE;
        $proxyusername = isset ($params['proxyusername'])?$params['proxyusername']:FALSE;
        $proxypassword = isset ($params['proxypassword'])?$params['proxypassword']:FALSE;
        $timeout = isset ($params['timeout'])?$params['timeout']:0;
        $response_timeout = isset ($params['response_timeout'])?$params['response_timeout']:30;
        $portName = isset ($params['portName'])?$params['portName']:FALSE;
        $curl_options =isset ($params['curl_options'])?$params['curl_options']:NULL;
        $use_curl=isset ($params['use_curl'])?$params['use_curl']:FALSE;
        parent::wsdl($wsdl, $proxyhost, $proxyport, $proxyusername, $proxypassword, $timeout, $response_timeout, $curl_options, $use_curl);
    }
}
?>
