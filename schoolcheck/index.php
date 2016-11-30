<?php

// Get username, password from database
include 'includes/config.php';
// Load Smarty library
require 'libs/Smarty.class.php';
// Initialize
include 'includes/bootstrap.php';
// Make database connection
include 'includes/database.php';

include 'includes/fncts.php';

// Assign value of page title to the smarty variable 'title', usually the value comes from a database
$templateParser->assign('title', 'Schoolcheck');

// Display template: output html
$templateParser->display('head.tpl');

$templateParser->display('header.tpl');


$action = isset($_GET['action'])?$_GET['action']:'home';

switch($action){
  case 'home':
  $page_nr = isset($_GET['pagenr'])?$_GET['pagenr']:1;

  include('model/select_newsarticles.php');
  $templateParser->assign('result', $result);
  $templateParser->display('newsarticles.tpl');
  break;

  case 'search':
 $templateParser->display('search.tpl');
  break;

  case 'tourdates':
  include('model/select_tourdates.php');
  $templateParser->assign('result', $result);
  $templateParser->display('tourdates.tpl');
  break;

  case 'audio':
  include('model/select_audio.php');
  $templateParser->assign('result', $result);
  $templateParser->display('audio.tpl');
  break;

  case 'admin':
  $cms_action = isset($_GET['cms_action'])?$_GET['cms_action']:'show';
  switch($cms_action){
    case 'show':
    //show all items
    include 'model/select_all.php';
    $templateParser->assign('result', $result);

    $templateParser->display('show_newsarticles.tpl');

    break;

    case 'edit':
    break;

    case 'delete':
    $id = isset($_GET['id'])?$_GET['id']: 0;
    include ('model/delete_item.php');
    break;

    case 'insert':
    break;
  }


};

// Show newsarticles 'old style' => refactor to template system.
//include('views/newsarticles.php');

$footerText = 'Nino MD2A - Schoolproject';
$templateParser->assign('footerString',$footerText);
$templateParser->display('footer.tpl');
