<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Models\Site;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class SiteController extends Controller
{
    /**
     * Display a listing of the sites.
     *
     * @return View
     */
    public function index(): View {

        $sites = Site::all();

        return view('sites.index', ['sites' => $sites]);
    }

    /**
     * Create a site entry
     *
     * @return View
     */
    public function create(): View {
        return view('sites.create');
    }

    /**
     * Store a site entry
     *
     * @param StoreSiteRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSiteRequest $request): RedirectResponse {

        // The incoming request data is already validated by StoreSiteRequest
        $validated = $request->validated();
       
        // Store new site
        Site::create($validated);

        return redirect()->route('sites.index');
    }

    /**
     * Display a specific site entry
     *
     * @param Site $site
     * @return View
     */
    public function show(Site $site): View {
        return view('sites.show', ['site' => $site]);
    }

    /**
     * Edit a specific site entry
     *
     * @param Site $site
     * @return View
     */
    public function edit(Site $site): View {
        return view('sites.edit', ['site' => $site]);
    }

    /**
     * Update a specific site entry
     *
     * @param StoreSiteRequest $request
     * @param Site $site
     * @return RedirectResponse
     */
    public function update(StoreSiteRequest $request, Site $site): RedirectResponse {

        // The incoming request data is already validated by StoreSiteRequest
        $validated = $request->validated();

        // Update the site with validated data
        $site->update($validated);

        // Redirect back to the sites index page after updating
        return redirect()->route('sites.index');
        
    }

    /**
     * Destroy site entry
     *
     * @param Site $site
     * @return RedirectResponse
     */
    public function destroy(Site $site): RedirectResponse {

        $site->delete();

        return redirect()->route('sites.index');
    }

    /**
     * Display a specific site entry as JSON (API endpoint)
     *
     * @param Site $site
     * @return \Illuminate\Http\JsonResponse
     */
    // public function apiShow(Site $site) {
    //     return response()->json($site);
    // }

    public function testApi(Site $site)
    {
        try {
            $response = Http::withBasicAuth(
                env('ES_WATCH_USERNAME'),
                env('ES_WATCH_PASSWORD')
            )->get($site->url . '/wp-json/wp-watch/v1/plugin-updates');
        } catch (ConnectionException $e) {
            return 'Unable to connect to the WordPress site.';
        }
dd($response->json());
        if ($response->failed()) {
            return 'WordPress API request failed.';
        }

        return $response->json();
    }
}
