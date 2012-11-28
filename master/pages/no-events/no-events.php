<?php

/**
 * This page is included if there are no categories or events on this website
 */

$this->template('website', 'top', array(
    'title' => $website->domain . ': There are currently no events.'
));

?>

<div id="no-events">
    <p>
        There are currently no events on this site.
    </p>
    <p>
        Check back soon!
    </p>
</div>

<?

$this->template('website', 'bottom');
