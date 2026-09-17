<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {

        $sites = Site::all();

        return view('sites.index', ['sites' => $sites]);
    }

    public function create() {
        return view('sites.create');
    }

    public function store(Request $request) {

        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required',
            'url' => 'required|url',
            'php_version' => 'required',
            'wp_version' => 'required',
            'status' => 'required',
        ]);
       
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

    public function update(Request $request, $id) {
        // Logic to update an existing site
    }

    public function destroy($id) {
        // Logic to delete a site
    }
}
