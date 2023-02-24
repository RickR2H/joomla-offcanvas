<?php

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Factory;

// Activate offcanvas javascript
HTMLHelper::_('bootstrap.offcanvas');

// Get template variables
$app              = Factory::getApplication('site');
$template         = $app->getTemplate(true);
$siteTitle        = $template->params->get('siteTitle', '');

$offcanvas        = 'joffcanvas' . $module->id;
$offcanvasName    = 'offcanvasNavbar' . $module->id;
$modId            = 'joffcanvas' . $module->id;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */

$wa = $app->getDocument()->getWebAssetManager();

$wa->addInlineStyle('
    #' . $modId . ' .offcanvas.show .offcanvas-body ul {
    position: relative;
    width: 100%;
    margin-top: 0.5rem;
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: transparent;}
    #' . $modId . ' .offcanvas.show .offcanvas-body a,
    #' . $modId . ' .offcanvas.show .offcanvas-body button {
    color: var(--body-color);}
    #' . $modId . ' .offcanvas.show .offcanvas-body a:active,
    #' . $modId . ' .offcanvas.show .offcanvas-body button:active,
    #' . $modId . ' .offcanvas.show .offcanvas-body a:hover,
    #' . $modId . ' .offcanvas.show .offcanvas-body button:hover {
    color: var(--cassiopeia-color-link);}
    #' . $modId . ' .offcanvas.show .offcanvas-body .active > a,
    #' . $modId . ' .offcanvas.show .offcanvas-body .active > button {
    color: var(--cassiopeia-color-link);}
    ', ['name' => $modId]);
?>
<nav id="<?php echo $offcanvas; ?>" class="navbar navbar-expand-lg mt-0 w-100" aria-label="Offcanvas navbar large">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="#"><?php echo $siteTitle; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#<?php echo $offcanvasName; ?>" aria-controls="<?php echo $offcanvasName; ?>">
      <span class="icon-menu" aria-hidden="true"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="<?php echo $offcanvasName; ?>"
      aria-labelledby="<?php echo $offcanvasName; ?>Label">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="<?php echo $offcanvasName; ?>Label"><?php echo $module->title; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body p-0 text-primary">
        <?php require(__DIR__ . '/dropdown-metismenu.php'); ?>
      </div>
    </div>
  </div>
</nav>
