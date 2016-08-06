<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserSpendingController extends Controller
{
    public function userSpendingPage()
    {
        $user = \Auth::user();
        $plans = $user->getSpendingPlans();

        return view('user_spending_page')->with(['user' => $user, 'plans' => $plans]);
    }
}
