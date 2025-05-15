<?php

namespace App\Observers;

use Spatie\Crawler\CrawlObservers\CrawlObserver;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\DomCrawler\Crawler;

class ScraperObserver extends CrawlObserver
{
    public function __construct(?string $content = null)
    {
    }

    /*
    * Called when the crawler will crawl the url.
    */
    public function willCrawl(UriInterface $url, ?string $linkText): void
    {
        Log::info('WillCrawl', ['url' => $url]);
    }

    /*
     * Called when the crawler has crawled the given url successfully.
     */
    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null,
        ?string $linkText = null,
    ): void {
        Log::info("Crawled: {$url}");

        $crawler = new Crawler((string) $response->getBody());

        $links = $crawler->filter('div#js-results > div.finder-results > ul > li > div > a')->each(function (Crawler $node, $i) {
            return $node->attr('href');
        });

        dd($links);

    }

    /*
     * Called when the crawler had a problem crawling the given url.
     */
    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null,
        ?string $linkText = null,
    ): void {
        Log::error("Failed: {$url}");
    }

    /*
     * Called when the crawl has ended.
     */
    public function finishedCrawling(): void
    {
        Log::info("Finished crawling");
    }
}
