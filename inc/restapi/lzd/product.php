<?php 
include get_template_directory() . "/lzd/LazopSdk.php";

add_action( 'rest_api_init', function () {
    register_rest_route( 'dv/v1', '/lzd/products', array(
      'methods' => 'GET',
      'callback' => 'dv_get_lzd_product',
      'permission_callback' =>  function ( WP_REST_Request $request ) {
        return true;
        },
    ) );
} );


function dv_get_lzd_product(WP_REST_Request $request) {

    $appKey = 105827;
    $appSecret = "r8ZMKhPxu1JZUCwTUBVMJiJnZKjhWeQF";

    $c = new LazopClient('https://api.lazada.test/rest', "{$appKey}", "{$appSecret}");
    $request = new LazopRequest('/mock/api/get');
    $request->addApiParam('api_id',1);
    $request->addHttpHeaderParam('cx','test');

    var_dump($c->execute($request));

    return  new WP_REST_Response( $c->execute($request) );


}
	// https://api.lazada.vn/rest