<?php
namespace Sontungx305\LaravelSimpleHtmlDom;
use \simplehtmldom\HtmlDocument as simple_html_dom;
use \simplehtmldom\HtmlNode as simple_html_dom_node;
class SimpleHtmlDom {
    
    function file_get_html(
    $url,
    $use_include_path = false,
    $context = null,
    $offset = 0,
    $maxLen = -1,
    $lowercase = true,
    $forceTagsClosed = true,
    $target_charset = simple_html_dom::DEFAULT_TARGET_CHARSET,
    $stripRN = true,
    $defaultBRText = simple_html_dom::DEFAULT_BR_TEXT,
    $defaultSpanText = simple_html_dom::DEFAULT_SPAN_TEXT)
    {
        if($maxLen <= 0) { $maxLen = MAX_FILE_SIZE; }

        $dom = new simple_html_dom(
            null,
            $lowercase,
            $forceTagsClosed,
            $target_charset,
            $stripRN,
            $defaultBRText,
            $defaultSpanText
        );

        $contents = file_get_contents(
            $url,
            $use_include_path,
            $context,
            $offset,
            $maxLen + 1 // Load extra byte for limit check
        );

        if (empty($contents) || strlen($contents) > $maxLen) {
            $dom->clear();
            return false;
        }

        return $dom->load($contents, $lowercase, $stripRN);
    }

    function str_get_html(
        $str,
        $lowercase = true,
        $forceTagsClosed = true,
        $target_charset = simple_html_dom::DEFAULT_TARGET_CHARSET,
        $stripRN = true,
        $defaultBRText = simple_html_dom::DEFAULT_BR_TEXT,
        $defaultSpanText = simple_html_dom::DEFAULT_SPAN_TEXT)
    {
        $dom = new simple_html_dom(
            null,
            $lowercase,
            $forceTagsClosed,
            $target_charset,
            $stripRN,
            $defaultBRText,
            $defaultSpanText
        );

        if (empty($str) || strlen($str) > simple_html_dom::MAX_FILE_SIZE) {
            $dom->clear();
            return false;
        }

        return $dom->load($str, $lowercase, $stripRN);
    }

    /** @codeCoverageIgnore */
    function dump_html_tree($node, $show_attr = true, $deep = 0)
    {
        $node->dump($node);
    }
}