<?php

namespace PixlMint\CMS\Controllers;

use Nacho\Controllers\AbstractController;
use Nacho\Models\HttpResponseCode;

class ViewPageController extends AbstractController
{
    // /api/entry/view
    public function loadEntry(): string
    {
        $url = $_REQUEST['p'];
        $url = str_replace('%20', ' ', $url);
        $page = $this->nacho->getMarkdownHelper()->getPage($url);
        if (is_null($page)) {
            return $this->json(['message' => 'Unable to find Entry ' . $url], HttpResponseCode::NOT_FOUND);
        }
        $content = $this->nacho->getMarkdownHelper()->renderPage($page);
        $ret = ['content' => $content];
        $ret = array_merge($ret, (array)$page);

        return $this->json($ret);
    }
}