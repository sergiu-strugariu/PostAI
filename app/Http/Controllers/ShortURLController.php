<?php

namespace App\Http\Controllers;

use App\Models\ShortURL;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class ShortURLController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return Inertia::render("UserDashboard/Pages/ShortURL");
        }

        return Inertia::render('ShortURL');
    }

    public function shortUrlStore(Request $request)
    {
        $request->validate([
            'original_url' => ['required', 'url'],
        ]);
        
        $url = $request->original_url;
        $randomString =  Str::random(10);
        $shortUrl = "127.0.0.1:8000/links/" . $randomString;

        $user = Auth::user();

        if (!$user) {
            ShortURL::create([
                'company_name' => 'links',
                'original_url' => $url,
                'short_url' => $shortUrl,
                'pixel_script' => $request->pixel_script,
                'code' => $randomString,
            ]);

            return Inertia::render("ShortURL", [
                'short_url' => $shortUrl
            ]);
        }

        if (!$user->ownedTeams->first()) {
            session()->flash('flash.banner', "You don't have any team please create one.");
            session()->flash('flash.bannerStyle', "danger");
            return redirect()->route('teams.create');
        }

        $shortUrl = "127.0.0.1:8000/" . $user->currentTeam->name . "/" . $randomString;

        ShortURL::create([
            'company_id' => $user->currentTeam->id,
            'company_name' => $user->currentTeam->name,
            'original_url' => $url,
            'short_url' => $shortUrl,
            'pixel_script' => $request->pixel_script,
            'code' => $randomString,
        ]);

        return Inertia::render("UserDashboard/Pages/ShortURL", [
            'short_url' => $shortUrl
        ]);
    }

    public function redirectToUrl($company, $short_url)
    {
        $team = Team::where('name', $company)->first();
        $shortUrl = ShortURL::where('code', $short_url)->first();
        
        if (!$shortUrl) {
            return abort(404, 'Not Found');
        }

        if ($company != $shortUrl->company_name) {
            return abort(404, 'Not Found');
        }

        $shortUrl->visit_tracking += 1;
        $shortUrl->save();

        return Inertia::render("UserDashboard/Pages/ShortURL/RedirectPage", [
            'company' => $team->name,
            'original_url' => $shortUrl->original_url,
            'pixel_script' => $shortUrl->pixel_script
        ]);
    }
}
