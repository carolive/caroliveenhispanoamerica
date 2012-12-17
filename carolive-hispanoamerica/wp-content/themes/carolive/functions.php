function alter_the_query( $request ) {
    $dummy_query = new WP_Query();  // the query isn't run if we don't pass any query vars
    $dummy_query->parse_query( $request );

    // this is the actual manipulation; do whatever you need here
    if ( $dummy_query->is_home() )
        $request['category_name'] = 'presentation';

    return $request;
}
add_filter( 'request', 'alter_the_query' );