<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

$rootDir = str_replace('/generator', '', __DIR__);

define('PIWIK_DOCUMENT_ROOT', $rootDir . '/piwik');
define('PIWIK_USER_PATH', PIWIK_DOCUMENT_ROOT);
define('PIWIK_INCLUDE_PATH', PIWIK_DOCUMENT_ROOT);

require_once $rootDir . '/generator/vendor/autoload.php';
require_once PIWIK_INCLUDE_PATH . '/core/Loader.php';
require_once __DIR__ . '/ApiFilter.php';

use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('tests')
    ->in(array(PIWIK_DOCUMENT_ROOT . '/core', PIWIK_DOCUMENT_ROOT . '/plugins'))
;

$latestStable = file_get_contents('http://builds.piwik.org/LATEST_BETA');
$latestStable = trim($latestStable);

if (empty($latestStable)) {
    echo 'Unable to fetch latest version';
    exit(1);
}

$versions = GitVersionCollection::create(PIWIK_DOCUMENT_ROOT)
    ->add('master', 'master branch')
    ->add($latestStable, 'latest stable')
;

return new Sami($iterator, array(
    'theme'                => 'markdown',
    'versions'             => $versions,
    'title'                => 'Piwik Plugin API',
    'build_dir'            => $rootDir.'/docs/generated/%version%',
    'cache_dir'            => $rootDir.'/docs/cache/%version%',
    'template_dirs'        => array($rootDir.'/generator/template'),
    'default_opened_level' => 5,
    'filter'               => new ApiFilter()
));