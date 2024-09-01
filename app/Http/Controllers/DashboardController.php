<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Lead;
use App\Models\Opportunity;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class DashboardController extends Controller
{
    //
    public function index(){
        $customers = Customer::count();
        $products = Product::count();
        $sales = Sale::sum('amount');
        $opportunities = Opportunity::sum('excpected_revenue');
        $contacts = Contact::count();
        $leads = Lead::count();
        $most_leads= DB::table('opportunities')
          ->select('lead_id', DB::raw('COUNT(lead_id) AS quantity'))
          ->groupBy('lead_id')
          ->orderBy('item', 'DESC')
          ->limit(1)->first();
        if($most_leads != null){
            $lead_max = Lead::find($most_leads->lead_id)->lead_source;
        }else{
            $lead_max = "No Data yet";
        }
        $activities = Activity::count();
        $tasks = Task::count();
        return view('dashborad',[
            'customers'=>$customers,
            'products'=>$products,
            'sales'=>$sales,
            'opportunities'=>$opportunities,
            'contacts'=>$contacts,
            'leads'=>$leads,
            'lead_max'=>$lead_max,
            'activities'=>$activities,
            'tasks'=>$tasks
        ]);

    }
}
