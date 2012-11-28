<?

/*

#$this->template('html5', 'top');

echo '<h1>ct_event</h1>';
$e = new ct_event(2984);
krumo($e());

echo '<h1>Event min</h1>';
$e = new \Crave\Api\Event(array(
    'id' => 2984,
    'min' => true
));
krumo($e);

echo '<h1>Event no tickets</h1>';
$e = new \Crave\Api\Event(array(
    'id' => 2984,
    'no_tickets' => true
));
krumo($e);

echo '<h1>Event</h1>';
$e = new \Crave\Api\Event(array(
    'id' => 2984
));
krumo($e);

*/

/*

$events = ct_event::getList(array(
    'ct_category_id' => 1,
    'ct_promoter_id' => 1,
    'limit' => $_GET['limit'] ?: 1
));

foreach ( $events as $ct_event_id ) {

    $event = new ct_event( $ct_event_id );

    $path = '/venues/'.$event->venue->venue_id;

    for ( $i=1; $i<=10; $i++ ) {

        elapsed("begin $i");

        $folder = vf::getFolder( $path, array(
            'limit' => $i
        ));
        elapsed("getFolder: $i random");

        $folder = vf::getFolder( $path, array(
            'limit' => $i,
            'random' => true
        ));
        elapsed("getFolder: $i");
        elapsed();

        print_pre( $folder );

    }

}

elapsed('end');

*/



$folder = '/venues/59935';
$ss = vf::slideshow(array(
    'folder' => $folder,
    'width' => 300,
    'height' => 200,
    'limit' => 6,
    'thumb_width' => 94,
    'thumb_height' => 70
));
echo $ss->html;





#$this->template('html5', 'bottom');
