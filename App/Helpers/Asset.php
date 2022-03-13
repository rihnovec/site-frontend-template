<?php

namespace Rikhnovets\Helpers;

class Asset {
  private static $assetsFilePath;
  private string $path;
  private array $assets;

  function __construct($path = '/local/assets/local/')
  {
    $this::$assetsFilePath = $_SERVER['DOCUMENT_ROOT'] . '/../../assets.json';
    $this->path = $path;
    
    $this->prepareAssetsFile();
  }

  private function prepareAssetsFile() {
    $assets = file_get_contents($this::$assetsFilePath);
    $this->assets = json_decode($assets, true);
  }

  function includeCss() {
    
  }

  function includeJs($name) {
    $relativePath = $this->assets[$name]['js'];
    $absolutePath = $this->path . $relativePath;

    echo '<script src="'. $absolutePath . '" defer></script>';
  }
}
