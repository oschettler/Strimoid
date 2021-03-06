<?php namespace Strimoid\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Settings;

abstract class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return homepage group name.
     */
    protected function homepageGroup() : string
    {
        $groupName = 'all';

        // Show popular instead of all as homepage for guests
        // $groupName = Auth::guest() ? 'popular' : $groupName;

        // Maybe user is having subscribed set as his homepage?
        $subscribedEnabled = Settings::get('homepage_subscribed');
        $groupName = $subscribedEnabled ? 'subscribed' : $groupName;

        return $groupName;
    }
}
