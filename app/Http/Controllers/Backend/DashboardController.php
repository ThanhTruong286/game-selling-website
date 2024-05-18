<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Developers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $product_banner = Product::where('banner',1)->first();
        $total_product = Product::all()->count();
        $total_cate = Category::all()->count();
        $total_revenue = Product::all()->sum('revenue');
        $total_coop = Developers::all()->count();
        $most_revenue = Product::orderBy('revenue', 'desc')->first();
        $low_revenue = Product::orderBy('revenue', 'asc')->first();
        $best_customer = User::withCount('games')->orderBy('games_count', 'desc')->first();
        $config = $this->config();
        $template = "backend.dashboard.home.index";
        return view("backend.dashboard.layout",compact('product_banner','total_cate',"template",'config','total_product','total_revenue','total_coop','most_revenue','low_revenue','best_customer'));//dung compact de day bien template sang view de su dung
    }
    private function config(){
        return [
            'js' => [
                'assets/js/plugins/flot/jquery.flot.js',
                'assets/js/plugins/flot/jquery.flot.tooltip.min.js',
                'assets/js/plugins/flot/jquery.flot.spline.js',
                'assets/js/plugins/flot/jquery.flot.resize.js',
                'assets/js/plugins/flot/jquery.flot.pie.js',
                'assets/js/plugins/flot/jquery.flot.symbol.js',
                'assets/js/plugins/flot/jquery.flot.time.js',
                'assets/js/plugins/peity/jquery.peity.min.js',
                'assets/js/demo/peity-demo.js',
                'assets/js/inspinia.js',
                'assets/js/plugins/pace/pace.min.js',
                'assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                'assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                'assets/js/plugins/easypiechart/jquery.easypiechart.js',
                'assets/js/plugins/sparkline/jquery.sparkline.min.js',
                'assets/js/demo/sparkline-demo.js'
            ]
        ];
    }
}
