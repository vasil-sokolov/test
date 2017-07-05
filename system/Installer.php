<?php

namespace Aurora;

// use Composer\Script\Event;
// use Composer\Installer\PackageEvent;

class Installer
{
    public static function postUpdate(Event $event)
    {
		echo "22";
		$sPreConfig = file_get_contents('../build/wml-pre-config.json');

		$oPreConfig = json_decode($sPreConfig, true);

		if ($oPreConfig)
		{
			include_once './autoload.php';
			
			\Aurora\System\Api::Init();
			
			if ($oPreConfig['modules'])
			{
				foreach ($oPreConfig['modules'] as $sModuleName => $oModuleConfig)
				{
					foreach ($oModuleConfig as $sConfigName => $mConfigValue)
					{
						$oModuleManager = \Aurora\System\Api::GetModuleManager();

						$mValue = $oModuleManager->getModuleConfigValue($sModuleName, $sConfigName, null);
						if ($mValue !== null)
						{
							$oModuleManager->setModuleConfigValue($sModuleName, $sConfigName, $mConfigValue);
							$oModuleManager->saveModuleConfigValue($sModuleName);
						}
						else
						{
							echo 'Invalid setting \'' . $sConfigName . '\' in module \''.$sModuleName.'\'';
						}
					}
				}
			}
		}
		else
		{
			echo "Invalid config file";
		}

        // $composer = $event->getComposer();
        // do stuff
    }

    // public static function postAutoloadDump(Event $event)
    // {
        // $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        // require $vendorDir . '/autoload.php';

        // some_function_from_an_autoloaded_file();
    // }

    // public static function postPackageInstall(PackageEvent $event)
    // {
        // $installedPackage = $event->getOperation()->getPackage();
        // do stuff
    // }

    // public static function warmCache(Event $event)
    // {
        // make cache toasty
    // }
}
