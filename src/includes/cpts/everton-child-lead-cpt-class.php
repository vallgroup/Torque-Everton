<?php
/**
 * Register the torque cpt and it's meta boxes
 */
class Everton_Lead_CPT {

	/**
	 * Holds the listing cpt object
	 *
	 * @var Object
	 */
	protected $lead = null;

	/**
	 * Holds the labels needed to build the custom post type.
	 *
	 * @var array
	 */
	public static $lead_labels = array(
			'singular'       => 'Lead',
			'plural'         => 'Leads',
			'slug'           => 'lead',
			'post_type_name' => 'torque_lead',
	);

	/**
	 * Holds options for the custom post type
	 *
	 * @var array
	 */
	protected $lead_options = array(
		'supports' => array(
			'title',
		),
		'menu_icon'			=> 'dashicons-id-alt',
    'show_in_rest'	=> true
	);

	/**
	 * register our post type and meta boxes
	 */
	function __construct() {
		if ( class_exists( 'PremiseCPT' ) ) {
			new PremiseCPT( self::$lead_labels, $this->lead_options );
		}

		add_action('acf/init', array( $this, 'add_acf_metaboxes' ) );
		add_action( 'pre_get_posts', array( $this, 'remove_cpt_from_search_results' ) );
	}

	public static function send_lead( array $lead_data ) {
		// first get API key
		$api_key = get_field( 'rentcafe_api_token', 'options' )
			? trim( get_field( 'rentcafe_api_token', 'options' ) )
			: null;

		// TODO: use these?
		$vendor_propert_id = 'somevendorID';
		// OR these?
		$property_code = 'p0150955'; // TODO: get just the first property code from the options page, if multiple exist...
		$username = 'livercqa7s@yardi.com';
		$password = 'password';

		// TODO: check other fields (see above) if necessary
		// if we have a key, continue, otherwise exit with response
		if ( $api_key ) {
			// lead data
			$first_name = isset( $lead_data['first_name'] )
				? self::prep_data_for_api( $lead_data['first_name'] )
				: '';
			$last_name = isset( $lead_data['last_name'] )
				? self::prep_data_for_api( $lead_data['last_name'] )
				: '';
			$email = isset( $lead_data['email'] )
				? self::prep_data_for_api( $lead_data['email'] )
				: '';
			$phone = isset( $lead_data['phone'] )
				? self::prep_data_for_api( $lead_data['phone'] )
				: '';
			$address_1 = isset( $lead_data['address_1'] )
				? self::prep_data_for_api( $lead_data['address_1'] )
				: '';
			$address_2 = isset( $lead_data['address_2'] )
				? self::prep_data_for_api( $lead_data['address_2'] )
				: '';
			$city = isset( $lead_data['city'] )
				? self::prep_data_for_api( $lead_data['city'] )
				: '';
			$state = isset( $lead_data['state'] )
				? self::prep_data_for_api( $lead_data['state'] )
				: '';
			$zip_code = isset( $lead_data['zip_code'] )
				? self::prep_data_for_api( $lead_data['zip_code'] )
				: '';
			$message = isset( $lead_data['message'] )
				? self::prep_data_for_api( $lead_data['message'] )
				: '';
			$source = 'Website';

			$curl = curl_init();
	
			$request_url = 'https://api.rentcafe.com/rentcafeapi.aspx?requestType=lead&propertyCode='.$property_code.'&username='.$username.'&password='.$password.'&firstName='.$first_name.'&lastName='.$last_name.'&email='.$email.'&phone='.$phone.'&message='.$message.'&source='.$source.'&addr1='.$address_1.'&addr2='.$address_2.'&city='.$city.'&state='.$state.'&ZIPCode='.$zip_code;
	
			curl_setopt_array( $curl, array(
				CURLOPT_URL => $request_url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_HTTPHEADER => array( 'Content-Length: 0' ),
			) );
	
			$response = curl_exec( $curl );
	
			curl_close( $curl );
		} else {
			$response = 'No API key present in Options -> RentCafe Options page, therefore we couldn\'t send the request to RentCafe.';
		}

		return $response;
	}

	public static function save_lead( array $lead_data ) {
		// lead data
		$first_name = isset( $lead_data['first_name'] )
			? $lead_data['first_name']
			: '';
		$last_name = isset( $lead_data['last_name'] )
			? $lead_data['last_name']
			: '';
		$email = isset( $lead_data['email'] )
			? $lead_data['email']
			: '';
		$phone = isset( $lead_data['phone'] )
			? $lead_data['phone']
			: '';
		$address_1 = isset( $lead_data['address_1'] )
			? $lead_data['address_1']
			: '';
		$address_2 = isset( $lead_data['address_2'] )
			? $lead_data['address_2']
			: '';
		$city = isset( $lead_data['city'] )
			? $lead_data['city']
			: '';
		$state = isset( $lead_data['state'] )
			? $lead_data['state']
			: '';
		$zip_code = isset( $lead_data['zip_code'] )
			? $lead_data['zip_code']
			: '';
		$message = isset( $lead_data['message'] )
			? $lead_data['message']
			: '';
		$response_status = isset( $lead_data['response_status'] )
			? $lead_data['response_status']
			: '';
		$source = 'website';

		$lead = array(
			'post_title'    => $lead_data['first_name'] . ' ' . $lead_data['last_name'],
			'post_status'   => 'publish',
			'post_type'			=> self::$lead_labels['post_type_name']
		);

		// insert the post into the database
		$lead_id = wp_insert_post( $lead );

		// update the ACF fields
		// NOTE: ACF keys must match those found below for each given field
		if ( $lead_id ) {
			update_field('field_5fb70576f97bf', $first_name, $lead_id);
			update_field('field_5fb70580f97c0', $last_name, $lead_id);
			update_field('field_5fb70588f97c1', $email, $lead_id);
			update_field('field_5fb7058df97c2', $phone, $lead_id);
			update_field('field_5fb705c4f97c5', $address_1, $lead_id);
			update_field('field_5fb720073d7d0', $address_2, $lead_id);
			update_field('field_5fb72d71e83b9', $city, $lead_id);
			update_field('field_5fb705d2f97c6', $state, $lead_id);
			update_field('field_5fb705e1f97c7', $zip_code, $lead_id);
			update_field('field_5fb705b8f97c4', $source, $lead_id);
			update_field('field_5fb70592f97c3', $message, $lead_id);
			update_field('field_5fb7062e5ffb4', $response_status, $lead_id);
		}

		return $lead_id;
	}

	/**
	 * Helper to format data before sending to API endpoint
	 */
	public static function validate_data_for_api( array $data ) {
		if (
			! $data
			|| ! isset( $data['first_name'] )
			|| ! $data['first_name']
			|| ! isset( $_POST['last_name'] )
			|| ! $_POST['last_name']
			|| ! isset( $_POST['email'] )
			|| ! $_POST['email']
			|| ! isset( $_POST['phone'] )
			|| ! $_POST['phone']
			|| ! isset( $_POST['address_1'] )
			|| ! $_POST['address_1']
			|| ! isset( $_POST['city'] )
			|| ! $_POST['city']
			|| ! isset( $_POST['state'] )
			|| ! $_POST['state']
			|| ! isset( $_POST['zip_code'] )
			|| ! $_POST['zip_code']
		) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Helper to format data before sending to API endpoint
	 */
	public static function prep_data_for_api( string $data ) {
		// trim it
		$_new_data = trim( $data );
		
		// remove internal spaces
		$_new_data = str_replace(
			' ',
			'%20',
			$_new_data
		);

		return $_new_data;
	}

	/**
	 * remove CPT from search results
	 */
	function remove_cpt_from_search_results( $query ){
		/* check is front end main loop content */
		if ( is_admin() || !$query->is_main_query() ) return;
	
		/* check is search result query */
		if ( $query->is_search() ) {
			$searchable_post_types = get_post_types( array( 'exclude_from_search' => false ) );
			/* make sure you got the proper results, and that your post type is in the results */
			if ( 
				is_array( $searchable_post_types ) 
				&& in_array( self::$lead_labels['post_type_name'], $searchable_post_types )
			){
					/* remove the post type from the array */
					unset( $searchable_post_types[ self::$lead_labels['post_type_name'] ] );
					/* set the query to the remaining searchable post types */
					$query->set( 'post_type', $searchable_post_types );
			}
		}
	}

	/**
	 * Define ACF fields here
	 */
	public function add_acf_metaboxes() {

		// START - ACF defs

		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array(
				'key' => 'group_5fb70572b371e',
				'title' => 'Lead Details',
				'fields' => array(
					array(
						'key' => 'field_5fb70576f97bf',
						'label' => 'First Name',
						'name' => 'first_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array(
						'key' => 'field_5fb70580f97c0',
						'label' => 'Last Name',
						'name' => 'last_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5fb70588f97c1',
						'label' => 'Email',
						'name' => 'email',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5fb7058df97c2',
						'label' => 'Phone',
						'name' => 'phone',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5fb70592f97c3',
						'label' => 'Message',
						'name' => 'message',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_5fb705c4f97c5',
						'label' => 'Address 1',
						'name' => 'address_1',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array(
						'key' => 'field_5fb720073d7d0',
						'label' => 'Address 2',
						'name' => 'address_2',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array(
						'key' => 'field_5fb72d71e83b9',
						'label' => 'City',
						'name' => 'city',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array(
						'key' => 'field_5fb705d2f97c6',
						'label' => 'State',
						'name' => 'state',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5fb705e1f97c7',
						'label' => 'Zip Code',
						'name' => 'zip_code',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5fb705b8f97c4',
						'label' => 'Source',
						'name' => 'source',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'torque_lead',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));
			
			acf_add_local_field_group(array(
				'key' => 'group_5fb70624ab93e',
				'title' => 'Lead Submission',
				'fields' => array(
					array(
						'key' => 'field_5fb7062e5ffb4',
						'label' => 'Response Status',
						'name' => 'response_status',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
						'readonly' => 1,
						'disabled' => 1,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'torque_lead',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'side',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));
			
			endif;
		
		// END - ACF defs

	}
}

?>
