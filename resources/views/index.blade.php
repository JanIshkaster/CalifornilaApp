@extends('shopify-app::layouts.default')

@section('content')
    <div class="container flex flex-row">

        {{-- SIDEBAR --}}
        <x-sidebar-menu />

        {{-- START - INDEX ~ ASHBOARD CONTENT --}}
        <x-dashboard />
        {{-- END - INDEX ~ ASHBOARD CONTENT --}}
        {{-- <ul class="products">
            @foreach ($products as $product)
                <li>{{ $product['title'] }}</li>
            @endforeach

        </ul> --}}
        <h1>Session Value: {{ $value }}</h1>
        <h1>{{ Auth::user()->name }}</h1>
        <h1>Shop Domain: {{ $shopDomain }}</h1>

    </div>
@endsection

@section('scripts')
    @parent

    <script>
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var utils = AppBridge.utilities;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: "Dashboard",
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>

    <script>
        // function makeRequest() {
        //     var shopDomain = 'californila-v2.myshopify.com'; // Replace with your actual shop domain

        //     $.ajax({
        //         url: '/?shop=' + shopDomain,
        //         method: 'GET',
        //         success: function(response) {
        //             console.log(response);
        //         }
        //     });
        // }
        // makeRequest();
    </script>
@endsection
