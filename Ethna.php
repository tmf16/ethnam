<?php
// vim: foldmethod=marker
/**
 *	Ethna.php
 *
 *	@author		Masaki Fujimoto <fujimoto@php.net>
 *	@license	http://www.opensource.org/licenses/bsd-license.php The BSD License
 *	@package	Ethna
 *	@version	$Id$
 */

/** Ethna��¸�饤�֥��: PEAR, PEAR_Error */
include_once('PEAR.php');

/** Ethna��¸�饤�֥��: PEAR::DB */
include_once('DB.php');

/** Ethna��¸�饤�֥��: Smarty */
include_once('Smarty/Smarty.class.php');


/** �С��������� */
define('ETHNA_VERSION', '0.1.2-dev');

/** Ethna�١����ǥ��쥯�ȥ���� */
define('ETHNA_BASE', dirname(__FILE__));

include_once(ETHNA_BASE . '/class/Ethna_ActionClass.php');
include_once(ETHNA_BASE . '/class/Ethna_ActionError.php');
include_once(ETHNA_BASE . '/class/Ethna_ActionForm.php');
include_once(ETHNA_BASE . '/class/Ethna_AppManager.php');
include_once(ETHNA_BASE . '/class/Ethna_AppObject.php');
include_once(ETHNA_BASE . '/class/Ethna_AppSQL.php');
include_once(ETHNA_BASE . '/class/Ethna_AppSearchObject.php');
include_once(ETHNA_BASE . '/class/Ethna_Backend.php');
include_once(ETHNA_BASE . '/class/Ethna_Config.php');
include_once(ETHNA_BASE . '/class/Ethna_Controller.php');
include_once(ETHNA_BASE . '/class/Ethna_DB.php');
include_once(ETHNA_BASE . '/class/Ethna_Filter.php');
include_once(ETHNA_BASE . '/class/Ethna_I18N.php');
include_once(ETHNA_BASE . '/class/Ethna_InfoManager.php');
include_once(ETHNA_BASE . '/class/Ethna_LogWriter.php');
include_once(ETHNA_BASE . '/class/Ethna_LogWriter_File.php');
include_once(ETHNA_BASE . '/class/Ethna_LogWriter_Syslog.php');
include_once(ETHNA_BASE . '/class/Ethna_Logger.php');
include_once(ETHNA_BASE . '/class/Ethna_MailSender.php');
include_once(ETHNA_BASE . '/class/Ethna_Session.php');
include_once(ETHNA_BASE . '/class/Ethna_SkeltonGenerator.php');
include_once(ETHNA_BASE . '/class/Ethna_SmartyPlugin.php');
include_once(ETHNA_BASE . '/class/Ethna_Util.php');
include_once(ETHNA_BASE . '/class/Ethna_ViewClass.php');
include_once(ETHNA_BASE . '/class/AMF/Ethna_AMF_ActionClass.php');
include_once(ETHNA_BASE . '/class/Action/Ethna_Action_Info.php');
include_once(ETHNA_BASE . '/class/CLI/Ethna_CLI_ActionClass.php');
include_once(ETHNA_BASE . '/class/Form/Ethna_Form_Info.php');
include_once(ETHNA_BASE . '/class/View/Ethna_View_List.php');

if (extension_loaded('soap')) {
	include_once(ETHNA_BASE . '/class/SOAP/Ethna_SOAP_ActoinForm.php');
	include_once(ETHNA_BASE . '/class/SOAP/Ethna_SOAP_Gateway.php');
	include_once(ETHNA_BASE . '/class/SOAP/Ethna_SOAP_GatewayGenerator.php');
	include_once(ETHNA_BASE . '/class/SOAP/Ethna_SOAP_Util.php');
	include_once(ETHNA_BASE . '/class/SOAP/Ethna_SOAP_WsdlGenerator.php');
}

/** ���饤����ȸ������: �Ѹ� */
define('LANG_EN', 'en');

/** ���饤����ȸ������: ���ܸ� */
define('LANG_JA', 'ja');


/** ���饤����ȥ�����: �����֥֥饦��(PC) */
define('CLIENT_TYPE_WWW', 1);

/** ���饤����ȥ�����: SOAP���饤����� */
define('CLIENT_TYPE_SOAP', 2);

/** ���饤����ȥ�����: Flash Player (with Flash Remoting) */
define('CLIENT_TYPE_AMF', 3);

/** ���饤����ȥ�����: ��Х���(AU) */
define('CLIENT_TYPE_MOBILE_AU', 4);


/** DB�������: R/W */
define('DB_TYPE_RW', 1);

/** DB�������: R/O */
define('DB_TYPE_RO', 2);

/** DB�������: Misc  */
define('DB_TYPE_MISC', 3);


/** ���Ƿ�: ���� */
define('VAR_TYPE_INT', 1);

/** ���Ƿ�: ��ư�������� */
define('VAR_TYPE_FLOAT', 1);

/** ���Ƿ�: ʸ���� */
define('VAR_TYPE_STRING', 2);

/** ���Ƿ�: ���� */
define('VAR_TYPE_DATETIME', 3);

/** ���Ƿ�: ������ */
define('VAR_TYPE_BOOLEAN', 4);

/** ���Ƿ�: �ե����� */
define('VAR_TYPE_FILE', 5);


/** �ե����෿: text */
define('FORM_TYPE_TEXT', 1);

/** �ե����෿: password */
define('FORM_TYPE_PASSWORD', 2);

/** �ե����෿: textarea */
define('FORM_TYPE_TEXTAREA', 3);

/** �ե����෿: select */
define('FORM_TYPE_SELECT', 4);

/** �ե����෿: radio */
define('FORM_TYPE_RADIO', 5);

/** �ե����෿: checkbox */
define('FORM_TYPE_CHECKBOX', 6);

/** �ե����෿: button */
define('FORM_TYPE_SUBMIT', 7);

/** �ե����෿: button */
define('FORM_TYPE_FILE', 8);


/** ���顼������: ���̥��顼 */
define('E_GENERAL', 1);

/** ���顼������: DB��³���顼 */
define('E_DB_CONNECT', 2);

/** ���顼������: DB����ʤ� */
define('E_DB_NODSN', 3);

/** ���顼������: DB�����ꥨ�顼 */
define('E_DB_QUERY', 4);

/** ���顼������: DB��ˡ����������顼 */
define('E_DB_DUPENT', 5);

/** ���顼������: DB���̥��顼 */
define('E_DB_INVALIDTYPE', 6);

/** ���顼������: ���å���󥨥顼(ͭ�������ڤ�) */
define('E_SESSION_EXPIRE', 16);

/** ���顼������: ���å���󥨥顼(IP���ɥ쥹�����å����顼) */
define('E_SESSION_IPCHECK', 17);

/** ���顼������: ���������̤������顼 */
define('E_APP_UNDEFINED_ACTION', 32);

/** ���顼������: ��������󥯥饹̤������顼 */
define('E_APP_UNDEFINED_ACTIONCLASS', 33);

/** ���顼������: ���ץꥱ������󥪥֥�������ID��ʣ���顼 */
define('E_APP_DUPENT', 34);

/** ���顼������: ���ץꥱ�������᥽�åɤ�¸�ߤ��ʤ� */
define('E_APP_NOMETHOD', 35);

/** ���顼������: ���å����顼 */
define('E_APP_LOCK', 36);

/** ���顼������: CSVʬ�䥨�顼(�Է�³) */
define('E_UTIL_CSV_CONTINUE', 64);

/** ���顼������: �ե������ͷ����顼(�����顼�������������) */
define('E_FORM_WRONGTYPE_SCALAR', 128);

/** ���顼������: �ե������ͷ����顼(��������˥����顼����) */
define('E_FORM_WRONGTYPE_ARRAY', 129);

/** ���顼������: �ե������ͷ����顼(������) */
define('E_FORM_WRONGTYPE_INT', 130);

/** ���顼������: �ե������ͷ����顼(��ư����������) */
define('E_FORM_WRONGTYPE_FLOAT', 131);

/** ���顼������: �ե������ͷ����顼(���շ�) */
define('E_FORM_WRONGTYPE_DATETIME', 132);

/** ���顼������: �ե������ͷ����顼(BOOL��) */
define('E_FORM_WRONGTYPE_BOOLEAN', 133);

/** ���顼������: �ե������ͷ����顼(FILE��) */
define('E_FORM_WRONGTYPE_FILE', 134);

/** ���顼������: �ե�������ɬ�ܥ��顼 */
define('E_FORM_REQUIRED', 135);

/** ���顼������: �ե������ͺǾ��ͥ��顼(������) */
define('E_FORM_MIN_INT', 136);

/** ���顼������: �ե������ͺǾ��ͥ��顼(��ư����������) */
define('E_FORM_MIN_FLOAT', 137);

/** ���顼������: �ե������ͺǾ��ͥ��顼(ʸ����) */
define('E_FORM_MIN_STRING', 138);

/** ���顼������: �ե������ͺǾ��ͥ��顼(���շ�) */
define('E_FORM_MIN_DATETIME', 139);

/** ���顼������: �ե������ͺǾ��ͥ��顼(�ե����뷿) */
define('E_FORM_MIN_FILE', 140);

/** ���顼������: �ե������ͺ����ͥ��顼(������) */
define('E_FORM_MAX_INT', 141);

/** ���顼������: �ե������ͺ����ͥ��顼(��ư����������) */
define('E_FORM_MAX_FLOAT', 142);

/** ���顼������: �ե������ͺ����ͥ��顼(ʸ����) */
define('E_FORM_MAX_STRING', 143);

/** ���顼������: �ե������ͺ����ͥ��顼(���շ�) */
define('E_FORM_MAX_DATETIME', 144);

/** ���顼������: �ե������ͺ����ͥ��顼(�ե����뷿) */
define('E_FORM_MAX_FILE', 145);

/** ���顼������: �ե�������ʸ����(����ɽ��)���顼 */
define('E_FORM_REGEXP', 146);

/** ���顼������: �ե������Ϳ���(������������å�)���顼 */
define('E_FORM_INVALIDVALUE', 147);

/** ���顼������: �ե�������ʸ����(������������å�)���顼 */
define('E_FORM_INVALIDCHAR', 148);

/** ���顼������: ��ǧ�ѥ���ȥ����ϥ��顼 */
define('E_FORM_CONFIRM', 149);


if (defined('E_STRICT') == false) {
	/** PHP 5�Ȥθߴ��ݻ���� */
	define('E_STRICT', 0);
}

/** Ethna�������Х��ѿ�: ���顼������Хå��ؿ� */
$GLOBALS['_Ethna_error_callback_list'] = array();

/** Ethna�������Х��ѿ�: ���顼��å����� */
$GLOBALS['_Ethna_error_message_list'] = array();

/** Ethna�������Х��ѿ�: ���饤����ȼ��� */
$GLOBALS['_Ethna_client_type'] = null; 


// {{{ Ethna
/**
 *	Ethna�ե졼�������饹
 *
 *	@author		Masaki Fujimoto <fujimoto@php.net>
 *	@access		public
 *	@package	Ethna
 */
class Ethna extends PEAR
{
	/**#@+
	 *	@access	private
	 */

	/**#@-*/

	/**
	 *	Ethna_Error���֥������Ȥ���������(���顼��٥�:E_USER_ERROR)
	 *
	 *	@access	public
	 *	@param	string	$message			���顼��å�����
	 *	@param	int		$code				���顼������
	 *	@static
	 */
	function &raiseError($message, $code)
	{
		$userinfo = null;
		if (func_num_args() > 2) {
			$userinfo = array_slice(func_get_args(), 2);
			if (count($userinfo) == 1 && is_array($userinfo[0])) {
				$userinfo = $userinfo[0];
			}
		}
		return PEAR::raiseError($message, $code, PEAR_ERROR_RETURN, E_USER_ERROR, $userinfo, 'Ethna_Error');
	}

	/**
	 *	Ethna_Error���֥������Ȥ���������(���顼��٥�:E_USER_WARNING)
	 *
	 *	@access	public
	 *	@param	string	$message			���顼��å�����
	 *	@param	int		$code				���顼������
	 *	@static
	 */
	function &raiseWarning($message, $code)
	{
		$userinfo = null;
		if (func_num_args() > 2) {
			$userinfo = array_slice(func_get_args(), 2);
			if (count($userinfo) == 1 && is_array($userinfo[0])) {
				$userinfo = $userinfo[0];
			}
		}
		return PEAR::raiseError($message, $code, PEAR_ERROR_RETURN, E_USER_WARNING, $userinfo, 'Ethna_Error');
	}

	/**
	 *	Ethna_Error���֥������Ȥ���������(���顼��٥�:E_USER_NOTICE)
	 *
	 *	@access	public
	 *	@param	string	$message			���顼��å�����
	 *	@param	int		$code				���顼������
	 *	@static
	 */
	function &raiseNotice($message, $code)
	{
		$userinfo = null;
		if (func_num_args() > 2) {
			$userinfo = array_slice(func_get_args(), 2);
			if (count($userinfo) == 1 && is_array($userinfo[0])) {
				$userinfo = $userinfo[0];
			}
		}
		return PEAR::raiseError($message, $code, PEAR_ERROR_RETURN, E_USER_NOTICE, $userinfo, 'Ethna_Error');
	}

	/**
	 *	���顼ȯ������(�ե졼�����Ȥ��Ƥ�)������Хå��ؿ������ꤹ��
	 *
	 *	@access	public
	 *	@param	mixed	string:������Хå��ؿ�̾ array:������Хå����饹(̾|���֥�������)+�᥽�å�̾
	 *	@static
	 */
	function setErrorCallback($callback)
	{
		$GLOBALS['_Ethna_error_callback_list'][] = $callback;
	}

	/**
	 *	���顼ȯ�����ν�����Ԥ�(������Хå��ؿ�/�᥽�åɤ�ƤӽФ�)
	 *	
	 *	@access	public
	 *	@param	object	Ethna_Error		Ethna_Error���֥�������
	 *	@static
	 */
	function handleError(&$error)
	{
		for ($i = 0; $i < count($GLOBALS['_Ethna_error_callback_list']); $i++) {
			$callback =& $GLOBALS['_Ethna_error_callback_list'][$i];
			if (is_array($callback) == false) {
				call_user_func($callback, $error);
			} else if (is_object($callback[0])) {
				$object =& $callback[0];
				$method = $callback[1];

				// perform some more checks?
				$object->$method($error);
			} else {
				call_user_func($callback, $error);
			}
		}
	}
}
// }}}
?>