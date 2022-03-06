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

$GLOBALS['TL_HOOKS']['generatePage'][] = ['MarcelMathiasNolte\AddBrowserLanguageAsBodyClassBundle\Manager', 'generatePage'];
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = ['MarcelMathiasNolte\AddBrowserLanguageAsBodyClassBundle\Manager', 'replaceInsertTags'];
