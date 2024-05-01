<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class ShopifyAppController extends Controller
{

    public function install(Request $request)
    {
        $shop = $request->input('shop');
        $code = $request->input('code');

        $response = Http::asForm()->post("https://$shop/admin/oauth/access_token", [
            'client_id' => env('SHOPIFY_API_KEY'),
            'client_secret' => env('SHOPIFY_API_SECRET'),
            'code' => $code,
        ]);

        $accessToken = $response->json()['access_token'];

        // Store the access token in the database...
        Shop::create([
            'shop' => $shop,
            'access_token' => $accessToken,
        ]);
    }
 
    public function home(Request $request){ 
        $value = Session::get('key');
        $shopDomain = $request->query('shop');
        $currentUrl = session('shop'); 
        $shop = Auth::user();
        $products = $shop->api()->rest('GET', '/admin/products.json')['body']['products']; 
        return view('index',  ['value' => $value, 'shopDomain' => $shopDomain, 'products' => $products]);
    }

    public function customers(Request $request)
    {
        $shop = Auth::user();
        $customers = $shop->api()->rest('GET', '/admin/customers.json')['body']['customers']; 
        return view('shopify-app::customers',  ['customers' => $customers]);
    }
    

    public function orders(Request $request){ 
        $shop = Auth::user();
        $orders = $shop->api()->rest('GET', '/admin/orders.json')['body']['orders']; 
        return view('shopify-app::orders',  ['orders' => $orders]); 
    }

    public function calculator(Request $request){  
        return view('shopify-app::calculator'); 
    }
}
