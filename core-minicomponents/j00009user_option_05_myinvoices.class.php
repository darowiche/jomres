<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2014 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/**
#
 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
#
 *
 * @package Jomres
#
 */
class j00009user_option_05_myinvoices
	{

	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function j00009user_option_05_myinvoices( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = true;

			return;
			}
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		if ( $thisJRUser->userIsRegistered && !$thisJRUser->userIsManager && !$thisJRUser->superPropertyManager )
			{
			$this->cpanelButton = jomres_mainmenu_option( JOMRES_SITEPAGE_URL . "&task=list_invoices", '', jr_gettext( '_JRPORTAL_INVOICES_SHOWINVOICES', _JRPORTAL_INVOICES_SHOWINVOICES, false, false ), null, jr_gettext( "_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_MYACCOUNT", _JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_MYACCOUNT, false, false ) );
			}
		}

	function touch_template_language()
		{
		$output    = array ();
		$output[ ] = jr_gettext( '_JRPORTAL_INVOICES_SHOWINVOICES', _JRPORTAL_INVOICES_SHOWINVOICES );
		foreach ( $output as $o )
			{
			echo $o;
			echo "<br/>";
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->cpanelButton;
		}
	}

?>