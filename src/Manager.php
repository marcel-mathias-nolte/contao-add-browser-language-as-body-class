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

use Contao\PageRegular;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\Frontend;

class Manager
{
    protected static $strBrowserLanguage = '';

    public function generatePage(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular) {
        if (Manager::detectBrowserLanguage())
            Manager::addBodyClass();
    }

    public static function detectBrowserLanguage() {
        global $objPage;
        if ($objPage == null) return false;
        $objRootpage = PageModel::findByPk($objPage->rootId);
        if (trim($objRootpage->mmnDetectableLanguages) == '') return false;
        $languages = explode(',', $objRootpage->mmnDetectableLanguages);
        $header = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        foreach($header as $lang) {
            if(in_array($lang, $languages)) {
                self::$strBrowserLanguage = $lang;
                return true;
            }
        }
        if (trim($objRootpage->mmnFallbackLanguage) == '') return false;
        self::$strBrowserLanguage = $objRootpage->mmnFallbackLanguage;
        return true;
    }

    public static function addBodyClass() {
        global $objPage;
        $objPage->cssClass .= ' ' . self::$strBrowserLanguage;
    }

    /**
     * On replace the insert tag
     *
     * @param string $insertTag
     * @param bool   $useCache
     * @param mixed  $cachedValue
     * @param array  $flags
     * @param array  $tags
     * @param array  $cache
     * @param int    &$_rit
     * @param int    &$_cnt
     *
     * @return mixed
     */
    public function replaceInsertTags(string $insertTag, bool $useCache, string $cachedValue, array $flags, array $tags, array $cache, int &$_rit, int &$_cnt) {
        if (!Manager::detectBrowserLanguage()) return;
        $chunks   = trimsplit('::', $insertTag);
        switch ($chunks[0]) {
            case 'ifblng':
            case 'ifnblng':
                return $this->parseConditionalTags($chunks, $tags, $_rit, $_cnt);
        }

        return false;
    }

    /**
     * Parse the conditional tags
     *
     * @param array $chunks
     * @param array $tags
     * @param int   &$_rit
     * @param int   &$_cnt
     *
     * @return mixed
     */
    private function parseConditionalTags(array $chunks, array $tags, int &$_rit, int &$_cnt)
    {
        if (
            count($chunks) > 1 &&
            ($chunks[0] == 'ifblng' && Manager::$strBrowserLanguage != $chunks[1]) ||
            ($chunks[0] == 'ifnblng' && Manager::$strBrowserLanguage == $chunks[1])
        ) {
            $step = version_compare(VERSION, '4.4', '>=') ? 2 : 3;
            for (; $_rit < $_cnt; $_rit += $step) {
                if ($tags[$_rit + 1] === $chunks[0]) {
                    break;
                }
            }

            return null;
        }

        return false;
    }
}
