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

namespace MarcelMathiasNolte\AddBrowserLanguageAsBodyClassBundle;

use MarcelMathiasNolte\AddBrowserLanguageAsBodyClassBundle\DependencyInjection\AddBrowserLanguageAsBodyClassBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AddBrowserLanguageAsBodyClassBundle extends Bundle
{

    public function getContainerExtension(): AddBrowserLanguageAsBodyClassBundleExtension
    {
        return new AddBrowserLanguageAsBodyClassBundleExtension();
    }
}
