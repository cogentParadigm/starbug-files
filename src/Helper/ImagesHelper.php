<?php
namespace Starbug\Files\Helper;

use Starbug\Files\ImagesInterface;

class ImagesHelper {
  public function __construct(
    protected ImagesInterface $target
  ) {
  }
  public function helper() {
    return $this->target;
  }
}
