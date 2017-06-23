<?php
/**
* 2014 - 2015 Watt Is It
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PayGreen <contact@paygreen.fr>
*  @copyright 2014-2014 Watt It Is
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

require_once implode(DIRECTORY_SEPARATOR, array(dirname(__FILE__), '..', '..', 'config', 'config.inc.php'));
require_once implode(DIRECTORY_SEPARATOR, array(dirname(__FILE__), '..', '..', 'init.php'));
require_once implode(DIRECTORY_SEPARATOR, array(dirname(__FILE__), 'paygreen.php'));
$o_paygreen = new Paygreen();
$client = $o_paygreen->getCaller();
$pac = new PaygreenApiClient();
$ui = $o_paygreen->getUniqueIdPP();
$cp = Configuration::get($o_paygreen::_CONFIG_PRIVATE_KEY);
if (preg_match("#^[0-9a-z]{32}$#", Tools::getValue('paiementToken'))) {
    $datas = array(
        'paymentToken' => Tools::getValue('paiementToken'),
    );
    if (Tools::getValue('getInfo') == true) {
        $result = $pac->getTransactionInfo($ui, $cp, Tools::getValue('paiementToken'));
        echo $result->success;
    } elseif (Tools::getValue('getRounding') == true) {
         $result = $pac->getRoundingInfo($ui, $cp, Tools::getValue('paiementToken'));
        echo json_encode($result);
    } elseif (Tools::getValue('cancelRounding') == true) {
        $result = $pac->refundRounding($ui, $cp, $datas);
        echo json_encode($result);
    } elseif (Tools::getValue('associationId') > 0 && Tools::getValue('amount') > 0) {
        $datas['content'] = array(
            "associationId" => Tools::getValue('associationId'),
            "type" => "rounding",
            "amount" => Tools::getValue('amount') * 100
        );
        $result = $pac->validateRounding($ui, $cp, $datas);
        echo json_encode($result);
    } else {
        echo '{"success":false,"message":"requestApi"}';
    }
} else {
    echo '{"success":false, "message": "paiementToken"}';
}
