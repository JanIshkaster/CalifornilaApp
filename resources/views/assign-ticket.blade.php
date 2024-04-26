@extends('shopify-app::layouts.default')

@section('content')
    <div class="container flex flex-row">

        {{-- SIDEBAR --}}
        <x-sidebar-menu />

        Assign Ticket

    </div>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, {
            title: 'Welcome'
        });
    </script>
@endsection
