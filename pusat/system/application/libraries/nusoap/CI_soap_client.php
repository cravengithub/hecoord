<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of Soap_client
 *
 * @author craven
 */
require_once ('nusoap/lib/nusoap.php');
class CI_soap_client  extends  nusoap_client {
    //put your code here
    function  __construct($params) {
        $endpoint=isset ($params['endpoint'])?$params['endpoint']:'';
        $wsdl = isset ($params['wsdl'])?$params['wsdl']:FALSE;
        $proxyhost = isset ($params['proxyhost'])?$params['proxyhost']:FALSE;
        $proxyport = isset ($params['proxyport'])?$params['proxyport']:FALSE;
        $proxyusername = isset ($params['proxyusername'])?$params['proxyusername']:FALSE;
        $proxypassword = isset ($params['proxypassword'])?$params['proxypassword']:FALSE;
        $timeout = isset ($params['timeout'])?$params['timeout']:0;
        $response_timeout = isset ($params['response_timeout'])?$params['response_timeout']:30;
        $portName = isset ($params['portName'])?$params['portName']:FALSE;
        parent::nusoap_client(trim($endpoint), $wsdl, $proxyhost, $proxyport, $proxyusername, $proxypassword, $timeout, $response_timeout, $portName);

    }
    function set_soap_client($params) {
        $endpoint=$params['endpoint'];
        $wsdl = isset ($params['wsdl'])?$params['wsdl']:FALSE;
        $proxyhost = isset ($params['proxyhost'])?$params['proxyhost']:FALSE;
        $proxyport = isset ($params['proxyport'])?$params['proxyport']:FALSE;
        $proxyusername = isset ($params['proxyusername'])?$params['proxyusername']:FALSE;
        $proxypassword = isset ($params['proxypassword'])?$params['proxypassword']:FALSE;
        $timeout = isset ($params['timeout'])?$params['timeout']:0;
        $response_timeout = isset ($params['response_timeout'])?$params['response_timeout']:30;
        $portName = isset ($params['portName'])?$params['portName']:FALSE;
        parent::nusoap_client(trim($endpoint), $wsdl, $proxyhost, $proxyport, $proxyusername, $proxypassword, $timeout, $response_timeout, $portName);

    }

}
?>
