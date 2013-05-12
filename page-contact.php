<?php
ini_set( 'display_errors', true );
if ( defined( 'PHP_MAJOR_VERSION' ) ) {
	// PHP 5.3以上で定義 Qdmail用。
	ini_set( 'error_reporting', E_ALL - E_DEPRECATED );
} else {
	ini_set( 'error_reporting', E_ALL );
}
?>
<?php
/**
 * メールフォーム用共通ライブラリへのパス
 */
define("LIB_PATH", dirname(__FILE__).'/contact/Lib/');

/**
 * 添付フォルダへのパス
 */
define("TMP_FILE_PATH", LIB_PATH . 'tmp/');

/**
 * LOGフォルダへのパス
 */
define("LOG_FILE_PATH", LIB_PATH . 'logs/');

/**
 * Contactフォルダへのパス
 */
define("TEMPLATE_FILE_PATH", dirname(__FILE__). '/contact/');

require_once dirname(__FILE__) . '/contact/Contact.class.php';
$Form = new ContactForm;
?>

<?php
/*
Template Name: Contact
*/
get_header( 'contact' ); ?>

<section class="btn-area" id="enterprise-how">
<div class="container center">
	<div>
		<div id="contact-us">
			<h2 style="text-align: left">Contact us</h2>
			<p style="text-align: left">
				For ordering single document translation, please try our <a href="#">online order form</a>
			</p>
			<?php echo $Form->render(); ?>
		</div>
	</div>
</div>
</section>

<?php get_footer( 'contact' ); ?>