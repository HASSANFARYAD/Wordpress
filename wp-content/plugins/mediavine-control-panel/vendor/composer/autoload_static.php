<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit950f0e4bd90e84912fd10ae913a61148
{
    public static $files = array (
        '8036741dfcb3d8f0ca6a1575ecd1fdee' => __DIR__ . '/../..' . '/lib/functions-helpers.php',
        '699f437313c98878af82136f7ff72a11' => __DIR__ . '/../..' . '/lib/functions-version-check.php',
        '06348ebd5cb8aceee5f6c4237bd62898' => __DIR__ . '/../..' . '/lib/functions-amp.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'MVAMP' => __DIR__ . '/../..' . '/lib/class-mvamp.php',
        'MV_Base' => __DIR__ . '/../..' . '/lib/class-mv-base.php',
        'MV_Control_Panel' => __DIR__ . '/../..' . '/class-mv-control-panel.php',
        'MV_Debug' => __DIR__ . '/../..' . '/lib/class-mv-debug.php',
        'MV_Extension' => __DIR__ . '/../..' . '/lib/class-mv-extension.php',
        'MV_Security' => __DIR__ . '/../..' . '/lib/class-mv-security.php',
        'MV_Util' => __DIR__ . '/../..' . '/lib/class-mv-util.php',
        'Mediavine\\Control_Panel\\Admin_Init' => __DIR__ . '/../..' . '/admin/class-admin-init.php',
        'Mediavine\\MCP\\AMP_Web_Stories' => __DIR__ . '/../..' . '/lib/class-amp-web-stories.php',
        'Mediavine\\MCP\\API_Services' => __DIR__ . '/../..' . '/lib/class-api-services.php',
        'Mediavine\\MCP\\Ad_Settings' => __DIR__ . '/../..' . '/lib/class-ad-settings.php',
        'Mediavine\\MCP\\Ads_Txt' => __DIR__ . '/../..' . '/lib/class-ads-txt.php',
        'Mediavine\\MCP\\MV_DBI' => __DIR__ . '/../..' . '/lib/class-mv-dbi.php',
        'Mediavine\\MCP\\MV_Identity' => __DIR__ . '/../..' . '/lib/class-mv-identity.php',
        'Mediavine\\MCP\\Models' => __DIR__ . '/../..' . '/lib/class-models.php',
        'Mediavine\\MCP\\Settings' => __DIR__ . '/../..' . '/lib/class-settings.php',
        'Mediavine\\MCP\\Settings_API' => __DIR__ . '/../..' . '/lib/class-settings-api.php',
        'Mediavine\\MCP\\ThirdParty\\MV_WP_Rocket' => __DIR__ . '/../..' . '/lib/third-party/class-mv-wp-rocket.php',
        'Mediavine\\MCP\\Upstream' => __DIR__ . '/../..' . '/lib/class-upstream.php',
        'Mediavine\\MCP\\Video' => __DIR__ . '/../..' . '/lib/video/class-video.php',
        'Mediavine\\MCP\\Video_API' => __DIR__ . '/../..' . '/lib/video/class-video-api.php',
        'Mediavine\\MCP\\Video_Featured' => __DIR__ . '/../..' . '/lib/video/class-video-featured.php',
        'Mediavine\\MCP\\Video_Playlist' => __DIR__ . '/../..' . '/lib/video/class-video-playlist.php',
        'Mediavine\\MCP\\Video_Sitemap' => __DIR__ . '/../..' . '/lib/video/class-video-sitemap.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit950f0e4bd90e84912fd10ae913a61148::$classMap;

        }, null, ClassLoader::class);
    }
}
