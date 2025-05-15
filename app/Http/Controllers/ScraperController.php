<?php

namespace App\Http\Controllers;

use App\Observers\ScraperObserver;
use Illuminate\Http\Request;
use Spatie\Crawler\Crawler;

class ScraperController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $url = "https://www.gov.uk/search/policy-papers-and-consultations?content_store_document_type%5B%5D=policy_papers&order=updated-newest";

        Crawler::create()
            ->setCrawlObserver(new ScraperObserver())
            ->setMaximumDepth(0)
            ->setTotalCrawlLimit(1)
            ->startCrawling($url);
    }
}
