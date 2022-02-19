<?php

declare(strict_types=1);

namespace KonstantinDmitrienko\PHPVersionsParser;

use DOMDocument;

/**
 * Class PHPVersionsParser
 */
class PHPVersionsParser
{
    /**
     * Returns current stable version of the PHP from php.net website
     *
     * @return string
     */
    public function getCurrentStableVersion(): string
    {
        $content = file_get_contents('https://www.php.net/downloads');

        libxml_use_internal_errors(true);
        $DOM = new DOMDocument;
        $DOM->loadHTML($content);
        libxml_use_internal_errors(false);

        $items = $DOM->getElementsByTagName('h3');

        $version = '';
        for ($i = 0; $i < $items->length; $i++) {
            if (false !== strpos($items->item($i)->nodeValue, 'Current Stable')
                && $items->item($i)->getAttribute('id')
            ) {
                $version = str_replace('v', '', $items->item($i)->getAttribute('id'));
                break;
            }
        }

        return $version;
    }
}
