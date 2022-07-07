<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    // show all listings
    //replace get with paginate for pagination
    public function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    //show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create(){
        return view('listings.create');
    }

    //Store listing data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            /* 'website' => 'nullable',
            'email' =>  'nullable', */
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // When creating a new listing, we link the current user's id
        $formFields['user_id'] = Auth::id();

        Listing::create($formFields);

        // fire flash message upon adding listing
        return redirect('/')->with('message', 'Listing created successfully!');
    }
    //Show edit form 
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' =>$listing]);
    }

     //Update listing data
     public function update(Request $request, Listing $listing){

        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            /* 'website' => 'required',
            'email' => 'email', */
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        // fire flash message upon adding listing
        return redirect('/')->with('message', 'Listing updated successfully!');
    }

    //Delete listing
    public function destroy(Listing $listing){

        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    //Manage listing
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
