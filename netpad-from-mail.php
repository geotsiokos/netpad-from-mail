<?php
/**
 * Plugin Name: Netpad From Email
 * Plugin URI: http://www.netpad.gr
 * Description: Modifies the From email and name for outgoing email messages
 * Version: 1.0.0
 * Author: George Tsiokos
 * Author URI: http://www.netpad.gr
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright (c) 2015-2016 "gtsiokos" George Tsiokos www.netpad.gr
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @package netpad-from-email
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'wp_mail_from', 'ntpd_wp_mail_from' );

/**
 * Modifies 'from' email address
 *
 * @param string $original_email_address
 * @return string
 */
function ntpd_wp_mail_from( $original_email_address ) {
	//Make sure the email is from the same domain 
	//as your website to avoid being marked as spam.
	
	return 'info@' . $_SERVER['SERVER_NAME'];
}

/**
 * Modifies 'from name' in email messages
 *
 * @param string $original_email_from
 * @return string
 */
add_filter( 'wp_mail_from_name', 'ntpd_wp_mail_from_name' );
function ntpd_wp_mail_from_name( $original_email_from ) {
	return get_bloginfo( 'name' );
}
