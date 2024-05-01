<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyShopify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @param  string|null  $shop
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ?string $shop = null)
    {
        $shopifyShop = $request->query('shop');
        $hmac = $request->header('x-shopify-hmac-sha256');

        // Your Shopify verification logic here
        if ($this->isValidShopifyRequest($shopifyShop, $hmac)) {
            return $next($request);
        }

        // Invalid Shopify request, return unauthorized response or redirect
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Validate the Shopify request.
     *
     * @param  string|null  $shopifyShop
     * @param  string|null  $hmac
     * @return bool
     */
    private function isValidShopifyRequest(?string $shopifyShop, ?string $hmac): bool
    {
        // Get the shared secret from your Shopify Partner Dashboard
        $sharedSecret = env('SHOPIFY_API_SECRET');

        // Create a hash using the shared secret and the request data
        $data = $shopifyShop . $hmac;
        $calculatedHmac = hash_hmac('sha256', $data, $sharedSecret);

        // Compare the calculated HMAC with the one in the request
        return hash_equals($hmac, $calculatedHmac);
    }
}


