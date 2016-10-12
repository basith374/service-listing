<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Business;
use App\Setting;
use App\Category;
use App\State;
use App\Locality;
use Mail;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    
	public function index() {
        $businesses = Business::with('category', 'reviews')->orderBy('id', 'desc')->paginate(10);
    	return view('home', compact('businesses'));
	}

    public function addListing() {
        $categories = Category::lists('name', 'id');
        $states = State::lists('name', 'id');
        return view('add', compact('categories', 'states'));
    }

    public function business($locality, $category, $business) {
        $business = Business::whereSlug($business)->first();
        return view('business', compact('business'));
    }

    public function saveListing(Request $request) {
        $data = $request->only('name', 'description', 'street_address', 'district_id', 'postcode', 'telephone', 'category_id', 'keywords');
        $data['slug'] = str_slug($data['name']);

        $address_locality = $request->address_locality;
        $locality = Locality::whereSlug(str_slug($address_locality))->first();
        if(!$locality) {
            $locality = Locality::create(['name' => $address_locality, 'slug' => str_slug($address_locality)]);
        }
        $data['locality_id'] = $locality->id;

        $image = $request->file('image');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path() . '/uploads/', $filename);
        $data['image'] = $filename;

        $business = Business::create($data);
        return redirect('/')->withSuccess("Listing Created");
    }

    public function districts($state) {
        $state = State::find($state);
        if($state) {
            return response()->json(['districts' => $state->districts]);
        }
    }

    public function postReview(Request $request) {
        $data = $request->only('business_id', 'review', 'rating', 'facebook_id');
        $business = Business::find($data['business_id']);
        if($business) {
            $business->reviews()->create($data);
            return redirect('/' . $business->locality->slug . '/' . $business->category->slug . '/' . $business->slug)->withSuccess('Review posted');
        }
    }

	public function contact(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->message
        ];
        // return view('emails.contact', $data);
        Mail::send('emails.contact', $data, function($m) use ($request) {
            $m->from('mailer@example.com', 'Your Website');
            $m->to('info@example.com', 'Website Moderator')->subject('Contact Letter');
        });
        return redirect('/contact')->withSuccess('Your message has been sent!');
	}

}
