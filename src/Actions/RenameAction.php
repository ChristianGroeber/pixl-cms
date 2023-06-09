<?php

namespace PixlMint\CMS\Actions;

use Nacho\Helpers\MarkdownHelper;
use PixlMint\CMS\Contracts\ActionInterface;

class RenameAction implements ActionInterface
{
    private static MarkdownHelper $markdownHelper;

    public static function setMarkdownHelper(MarkdownHelper $markdownHelper): void
    {
        self::$markdownHelper = $markdownHelper;
    }

    public static function run(array $arguments): bool
    {
        $newName = $arguments['new-title'];
        $entry = $arguments['entry'];

        self::$markdownHelper->editPage($entry, '', ['title' => $newName]);
        $page = self::$markdownHelper->getPage($entry);
        $splPath = explode(DIRECTORY_SEPARATOR, $page->file);
        $filename = array_pop($splPath);

        if ($filename === 'index.md') {
            return true;
        }

        return true;
    }
}