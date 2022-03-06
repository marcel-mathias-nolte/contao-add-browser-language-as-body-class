<?php

/*
 * This file is part of AddBrowserLanguageAsBodyClassBundle.
 *
 * @package   AddBrowserLanguageAsBodyClassBundle
 * @author    Marcel Mathias Nolte
 * @copyright Marcel Mathias Nolte 2015-2020
 * @website	  https://github.com/marcel-mathias-nolte
 * @license   LGPL-3.0-or-later
 */

namespace MarcelMathiasNolte\AddBrowserLanguageAsBodyClassBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use MarcelMathiasNolte\AddBrowserLanguageAsBodyClassBundle\AddBrowserLanguageAsBodyClassBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(AddBrowserLanguageAsBodyClassBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
