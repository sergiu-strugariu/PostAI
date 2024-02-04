<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Spark\Plan;
use Spark\Spark;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Spark::billable(User::class)->resolve(function (Request $request) {
            return $request->user();
        });

        Spark::billable(User::class)->authorize(function (User $user, Request $request) {
            return $request->user() && $request->user()->id == $user->id;
        });

/*         Spark::billable(User::class)->checkPlanEligibility(function (User $user, Plan $plan) { // this is for the team plan rolse dosent have anything with authetification to do
            if (count($user->ownedTeams->count()) > 3 && $plan->name == 'Standard') {
                throw ValidationException::withMessages([
                    'plan' => 'You have too many teams for the selected plan.'
                ]);
            }
            if (count($user->ownedTeams->count()) > 10 && $plan->name == 'Large') {
                throw ValidationException::withMessages([
                    'plan' => 'You have too many projects for the selected plan.'
                ]);
            }
        }); */
    }
}
