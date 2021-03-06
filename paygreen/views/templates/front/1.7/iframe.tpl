{*
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
*
*}
<script src="modules/paygreen/views/js/1.7/jquery-1.12.3.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="modules/paygreen/views/css/1.7/normalize.css" />
<script type="text/javascript" id="plugin{$id|escape:'html':'UTF-8'}">
	{literal}
	$(document).ready(function() {
		{/literal} 
    	$('#checkout'{literal}).paygreenInsites(
    		{
    			"id" :{/literal} {$id|escape:'html':'UTF-8'},
    			"amount": {$amount|escape:'html':'UTF-8'},
                "url":"{$url|escape:'html':'UTF-8'}",
				"carbonQt":{$carbonQt|escape:'html':'UTF-8'},
				"carbonPrice":{$carbonPrice|escape:'html':'UTF-8'},
				"solidarityType":"{$solidarityType|escape:'html':'UTF-8'}",
    			{literal}
    			"module": "prestashop"
    		}
    	); 
	});
	{/literal}
</script>
