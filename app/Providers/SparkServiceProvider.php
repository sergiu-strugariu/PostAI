<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
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

        Spark::billable(User::class)->authorize(function (User $billable, Request $request) {
            return $request->user() &&
                $request->user()->id == $billable->id;
        });

        Spark::billable(User::class)->checkPlanEligibility(function ($billable, Plan $plan) {
            dd(1);
            if (count($billable->projects) > 1 && $plan->name == 'Standard ') {
                dd("Upgrade plan");
            }
        });
    }
}
