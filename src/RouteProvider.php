<?php
namespace Starbug\Files;

use Starbug\Files\Collection\FilesSelectCollection;
use Starbug\Files\Controller\ApiFilesController;
use Starbug\Files\Controller\DownloadController;
use Starbug\Files\Controller\UploadController;
use Starbug\Routing\Route;
use Starbug\Routing\RouteProviderInterface;

class RouteProvider implements RouteProviderInterface {

  public function configure(Route $routes) {
    $routes->addRoute("upload", UploadController::class, ["groups" => "user"]);
    $routes->addRoute("files/download/{id:[0-9]+}", DownloadController::class, ["groups" => ["admin"]]);

    $api = $routes->getRoute("api");
    $select = $api->addRoute("/files/select.{format:json}");
    $select->setController(ApiFilesController::class);
    $select->setOptions(["model" => "files", "collection" => FilesSelectCollection::class]);
  }
}
