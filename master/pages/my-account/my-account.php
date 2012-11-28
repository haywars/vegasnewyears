<?php

/*  Serve pages from a remote domain preserving the remote session
 *
 */
 
//  $remote_domain = 'yuval.cravetickets.info'; // to test from dev domain
$remote_domain = "beta.cravetickets.com"; //load from the cravetickets site. switch to .com when production ready 
//$remote_domain = "cravetickets.dev"; //local dev only
$remote_uri = '/my-account'; //loading paths relative to here

// get the path of the requested file
$path = null;
foreach ( $p->queryfolders as $qf ) {
    $path .= '/' . $qf;
}

$url = "http://${remote_domain}${remote_uri}/inc${path}" . "?domain=" . $_SERVER['HTTP_HOST'] . "&" . $p->querystring; //iframe (the /inc indicates that)

$p->title = "Share This Event"; // pull event info from 
$p->page_sidebar = 'no_sidebar';
$p->template('website','top');
?>
<? /* //non iframe approach:
LOADING...
<script type="text/javascript" src="<?= $url ?>"></script>
*/ ?>
<iframe
	width="960" height="3000" scrolling="no"
	src="<?= $url ?>">
</iframe>
<?
$p->template('website','bottom');

