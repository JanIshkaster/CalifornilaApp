<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ShopifyAppController extends Controller
{
    public function index(Request $request)
    {
            // Replace with your Shopify store credentials
            $shopifyStore = 'californila-v2.myshopify.com';
            $apiKey = 'd9145200d641d9215adcdedfc454d896';
            $apiPassword = '090d02aa9c7bbb7dfccc0f905a85a399';
            // Make a request to Shopify's API to get products
            $client = new \GuzzleHttp\Client();
            $response = $client->get("https://$shopifyStore/admin/api/2024-04/products.json", [
                'auth' => [$apiKey, $apiPassword]
            ]);
            $products = json_decode($response->getBody(), true)['products']; 
        
            return view('vendor.shopify-app.home.index', ['products' => $products]);

    }

    public function testSession(Request $request){
        $request->session()->put('key', 'value');
        $value = Session::get('key');
        $shopDomain = Session::get('shop_domain');
        return view('index',  ['value' => $value, 'shopDomain' => $shopDomain]);
    }

    public function customers(Request $request){
        dd();
        return view('customers');
    }

    public function orders(Request $request){
        dd();
        return view('orders');
    }
}
