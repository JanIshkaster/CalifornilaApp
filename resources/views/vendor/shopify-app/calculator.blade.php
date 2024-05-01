@extends('shopify-app::layouts.default')


<div class="container flex flex-row">

    {{-- SIDEBAR --}}
    <x-sidebar-menu />

    <div class="container-fluid w-full">
        <form method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend>Calculator Playground v.1</legend>
                <hr style="width:100%">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-12 control-label" for="weight">Weight</label>
                    <div class="col-md-12">
                        <input id="weight" name="weight" type="text" placeholder=""
                            value="<?= set_value('weight') ?>" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-12 control-label" for="lenght">Lenght</label>
                    <div class="col-md-12">
                        <input id="lenght" name="lenght" type="text" placeholder=""
                            value="<?= set_value('lenght') ?>" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-12 control-label" for="width">Width</label>
                    <div class="col-md-12">
                        <input id="width" name="width" type="text" value="<?= set_value('width') ?>"
                            placeholder="" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-12 control-label" for="height">Height</label>
                    <div class="col-md-12">
                        <input id="height" name="height" type="text" value="<?= set_value('height') ?>"
                            placeholder="" class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-12 control-label" for="value">Package Value ($) </label>
                    <div class="col-md-12">
                        <input id="value" name="value" type="text" value="<?= set_value('value') ?>"
                            placeholder="" class="form-control input-md">

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-12 control-label" for="type">Package type</label>
                    <div class="col-md-12">
                        <select id="type" name="type" class="form-control">
                            <option value="<?= set_value('type') ?>"> <?= set_value('type') ?> </option>
                            <option value="Normal">Normal</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Fragile Item">Fragile Item</option>
                            <option value="Automotive Parts">Automotive Parts</option>
                            <option value="Irregular-Sized Packages">Irregular-Sized Packages</option>
                        </select>
                    </div>
                </div>

            </fieldset>
            <div class="col-md-12">
                <button type="submit" class="btn get_estimate p-2 col-8 border btn-shipping" style="width:100%">Get
                    Estimate</button>
            </div>
        </form>
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
