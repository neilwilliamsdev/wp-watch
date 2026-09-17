<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
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
}
