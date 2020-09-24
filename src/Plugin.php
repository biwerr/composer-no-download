<?php

namespace ComposerNoDownload;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface {

    public function activate( Composer $composer, IOInterface $io ) {
        if( 'apply' === getenv('COMPOSER_NO_DOWNLOAD')) {
            $installer = new Installer($io, $composer);
            $composer->getInstallationManager()->addInstaller($installer);
        }
    }
}
