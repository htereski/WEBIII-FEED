<?php
require '../controllers/PostController.php';

$controller = new PostController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
  case 'index':
    $controller->index();
    break;
  case 'create':
    $controller->create();
    break;
  case 'store':
    $controller->store();
    break;
  case 'edit':
    $controller->edit();
    break;
  case 'update':
    $controller->update();
    break;
  case 'destroy':
    $controller->destroy();
    break;
  default:
    echo "Ação não encontrada.";
    break;
}
