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

  function includeCss($name) {
    echo '<link rel="stylesheet" href="' . $this->getAbsolutePath($name, 'css') . '">';
  }

  function inlineCss($name) {
    echo '<style>' . file_get_contents($_SERVER['DOCUMENT_ROOT'] . $this->getAbsolutePath($name, 'css')) . '</style>';
  }

  function includeJs($name) {
    echo '<script src="'. $this->getAbsolutePath($name, 'js') . '" defer></script>';
  }

  private function getAbsolutePath($bundleName, $fileType) {
    $relativePath = $this->assets[$bundleName][$fileType];
    $absolutePath = $this->path . $relativePath;

    return $absolutePath;
  }
}
