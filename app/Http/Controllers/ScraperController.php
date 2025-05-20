<?php

namespace App\Http\Controllers;

use App\Observers\ScraperObserver;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Crawler\Crawler;

class ScraperController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $urls = [
            "https://www.gov.uk/search/policy-papers-and-consultations?content_store_document_type%5B%5D=policy_papers&order=updated-newest",
            "https://www.gov.uk/search/policy-papers-and-consultations?content_store_document_type%5B%5D=policy_papers&order=updated-newest&page=2",
            "https://www.gov.uk/search/policy-papers-and-consultations?content_store_document_type%5B%5D=policy_papers&order=updated-newest&page=3",
        ];

        foreach ($urls as $url) {
            Crawler::create([RequestOptions::ALLOW_REDIRECTS => true])
                ->setCrawlObserver(new ScraperObserver())
                ->setMaximumDepth(0)
                ->setTotalCrawlLimit(1)
                ->setDelayBetweenRequests(1000)
                ->startCrawling($url);
        }

        return Inertia::render('Welcome', [
            'links' => $urls,
        ]);
    }
}
