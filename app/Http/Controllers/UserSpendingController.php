<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpendingPlan;

use App\Http\Requests;

class UserSpendingController extends Controller
{
    public function userSpendingPage()
    {
        $user = \Auth::user();
        $plans = $user->getSpendingPlans();

        return view('spending_plans.user_spending_page')->with(['user' => $user, 'plans' => $plans]);
    }

    public function addSpendingPlan(Request $request)
    {
        $user = \Auth::user();
        $user->spendingPlan()->create(['name' => $request->get('name'), 'amount_spent' => $request->get('amount_spent'), 'range_type' => $request->get('range_type')]);
        return redirect()->action('UserSpendingController@userSpendingPage');
    }

    public function deleteSpendingPlan($id)
    {
        SpendingPlan::find($id)->delete();
        return redirect()->action('UserSpendingController@userSpendingPage');
    }

    public function updateSpendingPlanPage($id)
    {
        return view('spending_plans.update_spending_plan')->with(['plan' => SpendingPlan::find($id)]);
    }

    public function updateSpendingPlan($id)
    {
        SpendingPlan::find($id)->update(['name' => \Request::get('name'), 'amount_spent' => \Request::get('amount_spent'), 'range_type' => \Request::get('range_type')]);
        return redirect()->action('UserSpendingController@updateSpendingPlanPage', [$id]);
    }
}
