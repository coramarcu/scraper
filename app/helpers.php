<?php

function normaliseUrls(array $urls, $baseUrl = 'https://www.gov.uk/')
{
return array_map(function ($url) use ($baseUrl) {
    $url = trim($url);

    if (preg_match('/^https?:\/\//i', $url)) {
    return $url;
    }

    $url = ltrim($url, '/');

    $baseUrl = rtrim($baseUrl, '/') . '/';

    return $baseUrl . $url;
    }, $urls);
}
