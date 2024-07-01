<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Requests\SiteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\categorier;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Fetch paginated sites and all categories
        return View('welcome', [
            'site' => Site::paginate(8)->onEachSide(0), // Paginate sites with 8 per page and no extra pages on either side
            'categorier' => categorier::all() // Fetch all categories
        ]);
    }

    /**
     * Display sites belonging to a specific category.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function site($id)
    {
        // Fetch sites belonging to the category
        $sites = Site::where('id_cat', $id)->paginate(8)->onEachSide(0);
        // Find the category by ID
        $category = categorier::where('id', $id)->first();

        // Check if category exists
        if (!$category) {
            // Return 404 Not Found if category doesn't exist
            return abort(404);
        }

        return view('welcome', [
            'site' => $sites, // Pass the filtered sites to the view
            'categorier' => categorier::all() // Pass all categories to the view
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate request data
        $formFields = $request->validate([
            'description' => 'required |string',
            'titre' => 'required|string',
            'lien' => 'required',
            'categorier' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'new_cat' => 'nullable|string|min:3',
        ], [
            'logo.max' => 'le logo ne doit pas dépasser 3 Mo',
            'description.required' => 'la description est obligatoire',
            'description.string' => 'la description  doit être un string',
            'titre.required' => 'le titre est obligatoire',
            'titre.string' => 'le titre  doit être un string',
            'lien.required' => 'le lien est obligatoire',
            'categorier.required' => 'la catégorie est obligatoire',

        ]);

        // Create a new Site instance
        $site = new Site();
        $site->lien = $request->lien;
        $site->titre = $request->titre;
        $site->description = $request->description;

        // Store logo if uploaded
        if ($request->file('logo') != null) {
            $site->logo =  $request->file('logo')->store('logos', 'public');
        }

        // Check if new category was added
        if ($request->categorier == -1) {
            // Create a new category
            $cat = categorier::where('categorier', $request->new_cat)->first();
            if (is_null($cat)) {
                $category = new categorier();
                $category->categorier = strtolower($request->new_cat);
                $category->save();
                // Assign category to the site
                $site->id_cat = $category->id;
            } else {
                $site->id_cat = $cat->id;
            }
        } else {
            // Assign existing category to the site
            $site->id_cat =  $request->categorier;
        }

        // Save the new site
        $site->save();

        // Redirect to home with a success message
        return redirect('/')->with('success', 'Site created successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    function site_create()
    {
        // Pass all categories to the create site view
        return View('creat_site', ['categorier' => categorier::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Contracts\View\View
     */
    function site_update(Site $site)
    {
        // Pass the site and all categories to the update site view
        return View('update_site', [
            'site' => $site,
            'categorier' => categorier::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\RedirectResponse
     */
    function update(Request $request, Site $site)
    {
        // Validate request data
        $formFields = $request->validate([
            'description' => 'required |string',
            'titre' => 'required|string',
            'lien' => 'required| string',
            'categorier' => 'required',
            'new_cat' => 'nullable|unique:categoriers,categorier',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3000'
        ]);

        // Update site attributes
        $site->lien = $request->lien;
        $site->titre = $request->titre;
        $site->description = $request->description;

        // Store logo if uploaded
        if ($request->file('logo') != null) {
            $site->logo =  $request->file('logo')->store('logos', 'public');
        }

        // Check if new category was added
        if ($request->categorier == -1) {
            // Create a new category
            $category = new categorier();
            $category->categorier = strtolower($request->new_cat);
            $category->save();
            // Assign category to the site
            $site->id_cat = $category->id;
        } else {
            // Assign existing category to the site
            $site->id_cat =  $request->categorier;
        }

        // Save the updated site
        $site->save();

        // Redirect to home with a success message
        return redirect('/')->with('success', 'Site updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\RedirectResponse
     */
    function delete(Site $site)
    {
        // Delete the site
        $site->delete();

        // Redirect to home with a success message
        return redirect('/')->with('success', 'Site deleted successfully');
    }
}
