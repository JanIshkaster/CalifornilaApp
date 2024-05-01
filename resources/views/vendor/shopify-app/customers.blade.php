@extends('shopify-app::layouts.default')


<div class="container flex flex-row">

    {{-- SIDEBAR --}}
    <x-sidebar-menu />

    <div class="container-fluid w-full">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Receive </th>
                        <th scope="col" class="px-6 py-3">Product </th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        foreach ($customers as $customer){
                    ?>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4"><?= $customer->first_name ?> <?= $customer->last_name ?> </td>
                        <td class="px-6 py-4"><?= $customer->email ?> </td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4"><a href="customer/<?= $customer->id ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                        </td>
                    </tr>
                    <?php    
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


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
            title: "Customers",
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection
