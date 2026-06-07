<!DOCTYPE html>
<html ng-app="streams" <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Streams</title>
	<?php wp_head(); ?>
</head>

<body ng-controller="bodyCtrl">
	
	<div ng-include="partials + '/nav.html'" ng-controller="navbarCtrl"></div>
	
	<div ng-view></div>
