<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
require_once ('nusoap/lib/nusoap.php');
/**
 * Description of Soap_server
 *
 * @author craven
 */
class CI_soap_server extends nusoap_server {
    //put your code here
    function CI_soap_server($wsdl=false) {
        parent::nusoap_server($wsdl);
    }
}
?>
