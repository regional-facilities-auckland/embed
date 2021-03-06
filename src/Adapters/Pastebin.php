<?php
/**
 * Adapter to generate embed code from pastebin
 */
namespace Embed\Adapters;

use Embed\Request;
use Embed\Utils;

class Pastebin extends Webpage implements AdapterInterface
{
    /**
     * {@inheritdoc}
     */
    public static function check(Request $request)
    {
        return $request->isValid() && $request->match([
            'http://pastebin.com/*',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        $embed_url = 'http://pastebin.com/embed_iframe.php?i='.($this->request->getQueryParameter('i') ?: $this->request->getDirectoryPosition(0));

        return Utils::iframe($embed_url);
    }
}
