<?php
/**
 * LIG functions.php
 */
function lig_wp_setup() {

	// {{{ 共通系
	/**
	 * デバッグモード時のみprint_r()をラップします。
	 *
	 * @param  array $vars
	 * @author Kobayashi
	 */
	if ( WP_DEBUG ) {
		function pr( $vars ) {
			echo '<pre>';
			print_r( $vars );
			echo '</pre>';
		}
	}
	// }}} 共通系

	// {{{ 管理画面投稿フォーム系
	/**
	 * アイキャッチに対応させる場合に利用します。
	 *
	 * @author Kobayashi
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hoge-thumbnail', 200, 200, false );	// アイキャッチサイズ指定

	/**
	 * アイキャッチの説明を追加する場合に利用します。
	 *
	 * @param  string $content
	 * @return string
	 * @author Kobayashi
	 */
	function lig_wp_add_featured_image_instruction( $content ) {
		global $post_type; // 投稿タイプで変更可能。
		$content.= '<p>';
		$content.= 'アイキャッチ画像として画像を追加するとサムネイルが表示されるようになります。<br />';
		$content.= 'サイズは横300px、縦200pxになるようにしてください。';
		$content.= '</p>';
		return $content;
	}
	//add_filter( 'admin_post_thumbnail_html', 'lig_wp_add_featured_image_instruction');

	/**
	 * タイトルのプレースホルダーを変更する場合に利用します。
	 *
	 * @param  string $title
	 * @return string
	 * @author Kobayashi
	 */
	function lig_wp_title_text_input( $title ){
		global $post_type; // 投稿タイプで変更可能。
		return $title = 'ここに記事の題名を書きます';
	}
	//add_filter( 'enter_title_here', 'lig_wp_title_text_input' );

	/**
	 * 投稿フォームで不要な項目を除外する場合に利用します。
	 *
	 * @author Kobayashi
	 */
	function lig_wp_remove_default_post_screen_metaboxes() {
		remove_meta_box( 'postcustom',      'post','normal' ); // カスタムフィールド
		remove_meta_box( 'postexcerpt',     'post','normal' ); // 抜粋
		remove_meta_box( 'commentstatusdiv','post','normal' ); // コメント
		remove_meta_box( 'trackbacksdiv',   'post','normal' ); // トラックバック
		remove_meta_box( 'slugdiv',         'post','normal' ); // スラッグ
		remove_meta_box( 'authordiv',       'post','normal' ); // 著者
	}
	//add_action( 'admin_menu','lig_wp_remove_default_post_screen_metaboxes' );

	/**
	 * 固定ページフォームで不要な項目を除外する場合に利用します。
	 *
	 * @author Kobayashi
	 */
	function lig_wp_remove_default_page_screen_metaboxes() {
		remove_meta_box( 'postcustom',      'page','normal' ); // カスタムフィールド
		remove_meta_box( 'commentstatusdiv','page','normal' ); // コメント
		remove_meta_box( 'trackbacksdiv',	'page','normal' ); // トラックバック
		remove_meta_box( 'slugdiv',			'page','normal' ); // スラッグ
		remove_meta_box( 'authordiv',		'page','normal' ); // 著者
	}
	//add_action( 'admin_menu','lig_wp_remove_default_page_screen_metaboxes' );

	/**
	 * カテゴリーを入れ子にしたときにチェックしたものを上部にまとめる機能を無効にする場合に利用します。
	 *
	 * @param  array   $args
	 * @param  integer $post_id
	 * @return array
	 * @author Kobayashi
	 */
	function lig_wp_category_terms_checklist_no_top( $args, $post_id = null ) {
		if ( isset( $args['checked_ontop'] ) === false ) {
			$args['checked_ontop'] = false;
		}
		return $args;
	}
	//add_action( 'wp_terms_checklist_args', 'lig_wp_category_terms_checklist_no_top' );

	// }}} 管理画面投稿フォーム系

	// {{{ 管理画面外観系
	/**
	 * 不要なメニューを削除する場合に利用します。
	 *
	 * @author Kobayashi
	 */
	function remove_menus () {
		// global $menu を出力するとslugが確認しやすいです。
		//remove_menu_page( 'edit.php' );
		//remove_menu_page( 'upload.php' );
		//remove_menu_page( 'link-manager.php' );
		//remove_menu_page( 'edit-comments.php' );
		//remove_menu_page( 'tools.php' );
		//remove_menu_page( 'ps-taxonomy-expander.php' );
	 	//remove_submenu_page( 'index.php', 'update-core.php' ); // 本体更新ページ
	 	//remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
	}
	if ( ! is_super_admin() ) { // ※管理者以外のログイン時にフックする場合。
		//add_action( 'admin_menu', 'remove_menus' );
	}

	/**
	 * ログイン画面のスタイルシートを変更する場合に利用します。
	 *
	 * @author Kobayashi
	 */
	function lig_wp_custom_login() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/css/custom-login-page.css" />';
	}
	//add_action( 'login_head', 'lig_wp_custom_login' );

	/**
	 * 管理画面のフッターを変更する場合に利用します。
	 *
	 * @author Kobayashi
	 */
	function lig_wp_custom_admin_footer() {
		echo ' <a href="http://liginc.co.jp">株式会社LIG</a>';
	}
	//add_filter( 'admin_footer_text', 'lig_wp_custom_admin_footer' );

	/**
	 * ログインメッセージを変更する場合に利用します。
	 *
	 * @param  object $wp_admin_bar
	 * @author Kobayashi
	 */
	function lig_wp_replace_hello_text( $wp_admin_bar ) {
		$my_account = $wp_admin_bar->get_node( 'my-account' );
		$newtitle = str_replace( 'こんにちは、', 'お疲れさまです！', $my_account->title );
		$wp_admin_bar->add_menu( array(
									 'id' => 'my-account',
									 'title' => $newtitle,
									 'meta' => false
								 ) );
	}
	//add_filter( 'admin_bar_menu', 'lig_wp_replace_hello_text', 25 );
	// }}} 管理画面外観系

	// バージョンを表示しない
	remove_action('wp_head', 'wp_generator');

	/**
	 * 固定ページなどでURLを使用する際のショートコードを設定します
	 */
	//add_shortcode( 'my_home_url', 'my_home_url' );
	function my_home_url( $atts ) {
		return home_url();
	}

	/* NewArrivalのカラー */
	function get_new_arrival() {
		$data = array();
		$data[] = array(
				'color' => 'blueDark'
		);
		$data[] = array(
				'color' => 'purple'
		);
		$data[] = array(
				'color' => 'red'
		);
		$data[] = array(
				'color' => 'orange'
		);
		$data[] = array(
				'color' => 'yellow'
		);
		$data[] = array(
				'color' => 'greenDark'
		);
		return $data;
	}

	/* ShopArchiveのカラー */
	function get_shop_archive() {
		$data = array();
		$data[] = array(
				'color' => 'blueDark'
		);
		$data[] = array(
				'color' => 'purple'
		);
		$data[] = array(
				'color' => 'red'
		);
		$data[] = array(
				'color' => 'orange'
		);
		$data[] = array(
				'color' => 'yellow'
		);
		$data[] = array(
				'color' => 'greenDark'
		);
		return $data;
	}

	/* OtherNewsのカラー */
	function get_other_news() {
		$data = array();
		$data[] = array(
				'color' => 'blueDark'
		);
		$data[] = array(
				'color' => 'purple'
		);
		$data[] = array(
				'color' => 'red'
		);
		$data[] = array(
				'color' => 'orange'
		);
		$data[] = array(
				'color' => 'yellow'
		);
		$data[] = array(
				'color' => 'greenDark'
		);
		return $data;
	}

	/* OtherShopsのカラー */
	function get_other_shops() {
		$data = array();
		$data[] = array(
				'color' => 'blueDark'
		);
		$data[] = array(
				'color' => 'purple'
		);
		$data[] = array(
				'color' => 'red'
		);
		$data[] = array(
				'color' => 'orange'
		);
		$data[] = array(
				'color' => 'yellow'
		);
		$data[] = array(
				'color' => 'greenDark'
		);
		return $data;
	}

	/* 登録しているカスタム投稿タイプの情報を入れる */
	function get_custom_post_type() {
		$data = array();
		$data[] = array(
				'label' => '東京 UnderGround.',
				'slug' => 'tokyo',
				'color' => 'orange',
		);
		$data[] = array(
				'label' => '十和田 UnderGround.',
				'slug' => 'towada',
				'color' => 'green',
		);
		$data[] = array(
				'label' => '神奈川 UnderGround.',
				'slug' => 'kanagawa',
				'color' => 'blue',
		);
		return $data;
	}

	/* カスタム投稿タイプ */
	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		/* TOWADA */
		register_post_type( 'towada', /* post-type */
				array(
						'labels' => array(
								'name' => __( '十和田' ),
								'singular_name' => __( 'TOWADA' )
						),
						'has_archive' => true,
						'public' => true,
						'menu_position' => 5,
						'rewrite' => true,
						'supports' => array('title','editor','thumbnail',
								'custom-fields','excerpt','author','trackbacks',
								'comments','revisions','page-attributes'),
				)
		);
		/* TOWADAタクソノミー */
		register_taxonomy(
				'towadas',		/* タクソノミーの名前 */
				'towada',		/* books投稿で設定する */
				array(
						'hierarchical' => false, 	/* 親子関係が必要なければ false */
						'update_count_callback' => '_update_post_term_count',
						'label' => 'TOWADAのカテゴリ',
						'singular_label' => 'TOWADAのカテゴリ',
						'public' => true,
						'show_ui' => true,
						'hierarchical' => true,
						'rewrite' => array( 'slug' => 'towada' ),
				)
		);

		/* TOKYO */
		register_post_type( 'tokyo', /* post-type */
				array(
					'labels' => array(
						'name' => __( '東京' ),
						'singular_name' => __( 'TOKYO' )
					),
					'has_archive' => true,
					'public' => true,
					'menu_position' => 5,
					'rewrite' => true,
					'supports' => array('title','editor','thumbnail',
					'custom-fields','excerpt','author','trackbacks',
					'comments','revisions','page-attributes'),
				)
		);
		/* TOKYOタクソノミー */
		register_taxonomy(
				'tokyos',		/* タクソノミーの名前 */
				'tokyo',		/* books投稿で設定する */
				array(
					'hierarchical' => false, 	/* 親子関係が必要なければ false */
					'update_count_callback' => '_update_post_term_count',
					'label' => 'TOKYOのカテゴリ',
					'singular_label' => 'TOKYOのカテゴリ',
					'public' => true,
					'show_ui' => true,
					'hierarchical' => true,
					'rewrite' => array( 'slug' => 'tokyo' ),
				)
		);

		/* KANAGAWA */
		register_post_type( 'kanagawa', /* post-type */
				array(
					'labels' => array(
					'name' => __( '神奈川' ),
					'singular_name' => __( 'TOKYO' )
					),
					'has_archive' => true,
					'public' => true,
					'menu_position' => 5,
					'rewrite' => true,
					'supports' => array('title','editor','thumbnail',
					'custom-fields','excerpt','author','trackbacks',
					'comments','revisions','page-attributes'),
					)
		);
		/* TOKYOタクソノミー */
		register_taxonomy(
				'kanagawas',		/* タクソノミーの名前 */
				'kanagawa',		/* books投稿で設定する */
				array(
					'hierarchical' => false, 	/* 親子関係が必要なければ false */
					'update_count_callback' => '_update_post_term_count',
					'label' => 'KANAGAWAのカテゴリ',
					'singular_label' => 'KANAGAWAのカテゴリ',
					'public' => true,
					'show_ui' => true,
					'hierarchical' => true,
					'rewrite' => array( 'slug' => 'kanagawa' ),
				)
		);
	}
}
add_action( 'after_setup_theme', 'lig_wp_setup' );
