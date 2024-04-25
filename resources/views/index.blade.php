@extends('shopify-app::layouts.default')
 
@section('content')

<div class="container flex flex-row"> 

    {{-- SIDEBAR --}}
    <x-sidebar-menu />

    {{-- START - INDEX ~ ASHBOARD CONTENT --}}
    <x-dashboard />
    {{-- END - INDEX ~ ASHBOARD CONTENT --}}

</div>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection