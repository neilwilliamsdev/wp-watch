<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Http\Requests\StoreSiteRequest;

class SiteController extends Controller
{
    public function index() {

        $sites = Site::all();

        return view('sites.index', ['sites' => $sites]);
    }

    public function create() {
        return view('sites.create');
    }

    public function store(StoreSiteRequest $request) {

        // The incoming request data is already validated by StoreSiteRequest
        $validated = $request->validated();
       
        // Store new site
        $site = new Site();
        $site->name = $validated['name'];
        $site->url = $validated['url'];
        $site->php_version = $validated['php_version'];
        $site->wp_version = $validated['wp_version'];
        $site->status = $validated['status'];
        
        // Save the new site to the database
        $site->save();

        return redirect('/sites');
    }

    public function show(Site $site) {
        return view('sites.show', ['site' => $site]);
    }

    public function update(StoreSiteRequest $request, $id) {
        // Logic to update an existing site
    }

    public function destroy($id) {
        // Logic to delete a site
    }
}
