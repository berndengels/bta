<?php

namespace App\Libs\Crawler;

use App\Models\Crawler;
use Psr\Http\Message\UriInterface;
use Illuminate\Support\Facades\Log;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObservers\CrawlObserver;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class Observer extends CrawlObserver
{
    /**
     * Called when the crawler has crawled the given url successfully.
     *
     * @param UriInterface $url
     * @param ResponseInterface $response
     * @param UriInterface|null $foundOnUrl
     */
    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null
    ): void {
        $body = $response->getBody();
        $crawler = new DomCrawler($body);
        $html = $crawler->filter('body')->html();
        dd($html);
/*
        // Create records
        $crawl = Crawler::updateOrCreate([
            'url' => $url
        ], [
            'status' => $response->getStatusCode()
        ]);
*/
    }

    /**
     * Called when the crawler had a problem crawling the given url.
     *
     * @param UriInterface $url
     * @param RequestException $requestException
     * @param UriInterface|null $foundOnUrl
     */
    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null
    ): void {
        Log::error('crawlFailed: ' . $url);
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling(): void
    {
        //
    }
}
