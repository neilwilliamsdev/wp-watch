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

    public function show($id) {
        return view('sites.show', ['id' => $id]);
    }

    public function store(Request $request) {
       
        // Store new site
        $site = new Site();
        $site->name = $request->input('name');
        $site->url = $request->input('url');
        $site->php_version = $request->php_version;
        $site->wp_version = $request->wp_version;
        $site->status = $request->status;
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
