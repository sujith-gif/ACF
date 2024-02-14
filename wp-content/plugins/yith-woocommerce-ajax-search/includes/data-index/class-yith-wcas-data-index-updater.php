<?php
/**
 * Updater class
 *
 * @author  YITH
 * @package YITH/Search/DataIndex
 * @version 2.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Recover the data from database
 *
 * @since 2.0.0
 */
class YITH_WCAS_Data_Index_Updater {

	use YITH_WCAS_Trait_Singleton;

	/**
	 * The logger
	 *
	 * @var YITH_WCAS_Logger
	 */
	protected $logger;

	/**
	 * Post Processed List
	 *
	 * @var array
	 */
	protected $post_processed = array();

	/**
	 * Constructor
	 */
	private function __construct() {
		add_action( 'woocommerce_delete_product', array( $this, 'post_index_delete' ), 100 );
		add_action( 'woocommerce_delete_product_variation', array( $this, 'post_index_delete' ), 100 );
		add_action( 'woocommerce_trash_product', array( $this, 'post_index_delete' ), 100 );
		add_action( 'woocommerce_trash_product_variation', array( $this, 'post_index_delete' ), 100 );

		add_action( 'woocommerce_new_product', array( $this, 'post_index_update' ), 100, 2 );
		add_action( 'woocommerce_update_product', array( $this, 'post_index_update' ), 100, 2 );
		add_action( 'woocommerce_update_product_variation', array( $this, 'post_index_update' ), 100, 2 );

		if( defined('YITH_WCAS_PREMIUM') ){
			add_action( 'deleted_post', array( $this, 'post_index_delete' ), 100 );
			add_action( 'save_post', array( $this, 'post_index_update' ), 100, 2 );
		}

	}


	/**
	 * Update the index when a product is created or updated
	 *
	 * @param   int    $post_id  Post id.
	 * @param   Object $object   Current post.
	 *
	 * @return void
	 */
	public function post_index_update( $post_id, $object ) {

		if ( apply_filters( 'ywcas_skip_post_index_update', ! $post_id, $post_id, $object ) || in_array( $post_id, $this->post_processed, true ) ) {
			return;
		}

		$post = get_post( $post_id );
		if ( $post ) {
			ywcas()->indexer->delete( $post );
			if( 'publish' === $post->post_status ){
				ywcas()->indexer->schedule( $post_id, 0, array( $post_id ) );

				$this->post_processed[] = $post_id;
			}
		}

	}

	/**
	 * Update the index when a product is created or updated
	 *
	 * @param   int $post_id  Post id.
	 */
	public function post_index_delete( $post_id ) {

		if ( apply_filters( 'ywcas_skip_post_index_delete', ! $post_id, $post_id ) || in_array( $post_id, $this->post_processed, true ) ) {
			return;
		}

		$post = get_post( $post_id );
		if ( $post ) {
			ywcas()->indexer->delete( $post );
			$this->post_processed[] = $post_id;
		}

	}
}
