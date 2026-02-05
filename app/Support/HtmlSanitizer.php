<?php

namespace App\Support;

use DOMDocument;
use DOMElement;

class HtmlSanitizer
{
    /**
     * Basic HTML sanitizer for admin-authored content.
     * Keeps common formatting + links + images and removes scripts/event handlers.
     */
    public static function sanitize(string $html): string
    {
        $html = trim($html);
        if ($html === '') {
            return '';
        }

        // First-pass: drop dangerous tags entirely.
        $allowed = '<p><br><h2><h3><h4><h5><h6><ul><ol><li><strong><b><em><i><u><a><img><blockquote><code><pre><hr>';
        $html = strip_tags($html, $allowed);

        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="utf-8" ?><div id="root">' . $html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        /** @var DOMElement|null $root */
        $root = $doc->getElementById('root');
        if (!$root) {
            return $html;
        }

        self::walk($root);

        // Return innerHTML of root.
        $out = '';
        foreach ($root->childNodes as $child) {
            $out .= $doc->saveHTML($child);
        }
        return $out;
    }

    private static function walk(DOMElement $node): void
    {
        // Clean current node attributes
        self::cleanAttributes($node);

        // Walk children
        foreach (iterator_to_array($node->childNodes) as $child) {
            if ($child instanceof DOMElement) {
                self::walk($child);
            }
        }
    }

    private static function cleanAttributes(DOMElement $el): void
    {
        $tag = strtolower($el->tagName);

        // Remove all event handlers and style/class/id by default.
        $allowedAttrs = match ($tag) {
            'a' => ['href', 'title', 'target', 'rel'],
            'img' => ['src', 'alt', 'title', 'width', 'height'],
            default => [],
        };

        // Remove disallowed attributes
        foreach (iterator_to_array($el->attributes) as $attr) {
            $name = strtolower($attr->name);
            if (str_starts_with($name, 'on')) {
                $el->removeAttributeNode($attr);
                continue;
            }
            if (!in_array($name, $allowedAttrs, true)) {
                $el->removeAttributeNode($attr);
            }
        }

        if ($tag === 'a') {
            $href = $el->getAttribute('href');
            if ($href !== '' && !self::isSafeUrl($href)) {
                $el->removeAttribute('href');
            }
            if ($el->getAttribute('target') === '_blank') {
                $rel = trim($el->getAttribute('rel'));
                $relParts = array_filter(preg_split('/\s+/', $rel) ?: []);
                foreach (['noopener', 'noreferrer'] as $r) {
                    if (!in_array($r, $relParts, true)) $relParts[] = $r;
                }
                $el->setAttribute('rel', trim(implode(' ', $relParts)));
            }
        }

        if ($tag === 'img') {
            $src = $el->getAttribute('src');
            // Disallow data: URIs and javascript:
            if ($src === '' || str_starts_with(strtolower($src), 'data:') || !self::isSafeUrl($src)) {
                $el->parentNode?->removeChild($el);
                return;
            }
        }
    }

    private static function isSafeUrl(string $url): bool
    {
        $u = trim($url);
        if ($u === '') return false;

        // allow same-page and relative
        if (str_starts_with($u, '#') || str_starts_with($u, '/') || str_starts_with($u, './') || str_starts_with($u, '../')) {
            return true;
        }

        $lower = strtolower($u);
        if (str_starts_with($lower, 'http://') || str_starts_with($lower, 'https://')) return true;
        if (str_starts_with($lower, 'mailto:') || str_starts_with($lower, 'tel:')) return true;

        return false;
    }
}

