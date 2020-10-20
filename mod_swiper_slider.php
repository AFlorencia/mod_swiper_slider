<?php
/*
# ------------------------------------------------------------------------
# Mod Swiper Slider
# ------------------------------------------------------------------------
# Copyright(C) 2020 www.intergraphix.com.ar All Rights Reserved.
# @license http://www.gnu.org/licenseses/gpl-3.0.html GNU/GPL
# Author: Intergraphix Argentina
# Website: https://intergraphix.com.ar

#Swiper slider : https://swiperjs.com/
	Swiper is the most modern free mobile touch slider with hardware accelerated transitions and amazing native behavior. It is intended to be used in mobile websites, mobile web apps, and mobile native/hybrid apps.
# ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die('Restricted access');


// TODO 
//Add params to the view.

// get params
$moduleclass_sfx 	= $params->get('moduleclass_sfx', '');


// display layout
require JModuleHelper::getLayoutPath('mod_swiper_slider', $params->get('layout', 'default'));

// display copyright text

$document = JFactory::getDocument();


$document->addScript(JURI::base(true) . '/modules/mod_swiper_slider/assets/js/swiper.min.js');
$document->addScript(JURI::base(true) . '/modules/mod_swiper_slider/assets/js/swiper.animation.min.js');
$document->addScript(JURI::base(true) . '/modules/mod_swiper_slider/assets/js/jquery.easing.min.js');
$document->addStylesheet(JURI::base(true) . '/modules/mod_swiper_slider/assets/css/swiper.min.css');
$document->addStylesheet(JURI::base(true) . '/modules/mod_swiper_slider/assets/css/animate.min.css');

