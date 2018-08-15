@extends('MasterAdmin/MasterPage')
@section('content')
    <style>
        /* Latest compiled and minified CSS included as External Resource*/

        /* Optional theme */

        /*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
        body {
            margin-top:30px;
        }
        .stepwizard-step p {
            margin-top: 0px;
            color:#666;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
            filter: alpha(opacity=100) !important;*/
        }
        .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
            opacity:1 !important;
            color:#bbb;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content:" ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>
    <script>
        $(document).ready(function () {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-success').addClass('btn-default');
                    $item.addClass('btn-success');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function () {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-success').trigger('click');
        });
    </script>
<div class="content-i">
    <div class="content-box"><div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Restaurant
                    </h6>
                    <div class="element-box">
                        <div class="container">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                        <p><small>Restaurant Main</small></p>
                                    </div>
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                        <p><small>Restaurant Register & Owner</small></p>
                                    </div>
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                        <p><small>Schedule</small></p>
                                    </div>
                                    <div class="stepwizard-step col-xs-3">
                                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                        <p><small>Html Builder & Website</small></p>
                                    </div>
                                </div>
                            </div>

                            <form role="form" method="post">
                                @csrf
                                <div class="panel panel-primary setup-content" id="step-1">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Restaurant</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label">Restaurant Name</label>
                                            <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name" name="restaurant_name"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Restaurant Type</label>
                                            <select class="form-control" onchange="yesnoCheck(this);" name="restaurant_type">
                                                <option>--</option>
                                                <option value="0">Comission</option>
                                                <option value="1">Week</option>
                                                <option value="2">Month</option>
                                                <option value="3">Year</option>
                                            </select>
                                        </div>
                                        <div id="ifYes" class="form-group" style="display: none;">
                                            <label class="control-label">Restaurant Comission</label>
                                            <input maxlength="100" type="number" class="form-control" placeholder="Enter Comission ( % )" name="restaurant_comission"/>
                                        </div>


                                        <script>
                                            function yesnoCheck(that) {
                                                if (that.value == "0") {
                                                    $('#ifYes').show();
                                                } else {
                                                    $('#ifYes').hide();
                                                }
                                            }
                                        </script>

                                        <div class="form-group">
                                            <label class="control-label">Restaurant Adress</label>
                                            <textarea class="form-control" rows="5" name="restaurant_adress"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Restaurant Post Code</label>
                                           <input type="text" class="form-control"name="restaurant_postcode" />
                                        </div>
                                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                    </div>
                                </div>
                                <div class="panel panel-primary setup-content" id="step-2">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Restaurant Owner & Register</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label">Restaurant Owner Name & Surname</label>
                                            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Restaurant Owner Name" name="restaurant_owner_name"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Restaurant Register Email</label>
                                            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Restaurant Register Email" name="restaurant_email"/>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Restaurant Register Password</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Restaurant Register Password" name="restaurant_password"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Restaurant Register Password Again</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Restaurant Register Password Again" name="restaurant_password_again"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Restaurant Nots</label>
                                            <textarea class="form-control" rows="5" name="restaurant_nots" ></textarea>
                                        </div>



                                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                    </div>
                                </div>

                                <div class="panel panel-primary setup-content" id="step-3">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Schedule</h3>
                                    </div>
                                    <div class="panel-body">
                                        <style>

                                            .schedule-rows td {
                                                width: 180px;
                                                height: 10px;
                                                margin: 5px;
                                                padding: 10px;
                                                background-color: #3498DB;
                                                cursor: pointer;
                                                border:1px solid #000;
                                            }

                                            .schedule-rows td:first-child {
                                                background-color: transparent;
                                                position: relative;
                                            }

                                            .schedule-rows td[data-selected],
                                            .schedule-rows td[data-selecting] { background-color: #E74C3C; }

                                            .schedule-rows td[data-disabled] { opacity: 0.55; }

                                        </style>
                                        <script src="{{ asset('adminStyle/js/index.js') }}"></script>

                                        <div id="day-schedule"></div>
                                        <script>
                                            (function ($) {
                                                $("#day-schedule").dayScheduleSelector({

                                                    days: [1, 2, 3,4, 5, 6,7],
                                                    interval: 60,
                                                    startTime: '00:00',
                                                    endTime: '24:00'
                                                });
                                                $("#day-schedule").on('selected.artsy.dayScheduleSelector', function (e, selected) {
                                                    $(selected).find('input[type=checkbox]').prop("checked", true);
                                                })
                                            })($);


                                        </script>

                                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                    </div>
                                </div>

                                <div class="panel panel-primary setup-content" id="step-4">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Web Site</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label">Company Web Site</label>
                                            <input maxlength="200" type="text" required="required" class="form-control" name="restaurant_website" placeholder="Enter Company Name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Company Page Dizayn</label>
                                            <select class="form-control" name="restaurant_website_dizayn">
                                                <option value="0">Büyük </option>
                                                <option value="1">Küçük </option>
                                                <option value="2">Orta </option>
                                                <option value="3">son</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-success pull-right" type="submit">Finish!</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="floated-colors-btn second-floated-btn">
            <div class="os-toggler-w">
                <div class="os-toggler-i">
                    <div class="os-toggler-pill"></div>
                </div>
            </div>
            <span>Dark </span><span>Colors</span>
        </div>
        <!--------------------
        END - Color Scheme Toggler
        --------------------><!--------------------
              START - Demo Customizer
              -------------------->
        <div class="floated-customizer-btn third-floated-btn">
            <div class="icon-w">
                <i class="os-icon os-icon-ui-46"></i>
            </div>
            <span>Customizer</span>
        </div>
        <div class="floated-customizer-panel">
            <div class="fcp-content">
                <div class="close-customizer-btn">
                    <i class="os-icon os-icon-x"></i>
                </div>
                <div class="fcp-group">
                    <div class="fcp-group-header">
                        Menu Settings
                    </div>
                    <div class="fcp-group-contents">
                        <div class="fcp-field">
                            <label for="">Menu Position</label><select class="menu-position-selector">
                                <option value="left">
                                    Left
                                </option>
                                <option value="right">
                                    Right
                                </option>
                                <option value="top">
                                    Top
                                </option>
                            </select>
                        </div>
                        <div class="fcp-field">
                            <label for="">Menu Style</label><select class="menu-layout-selector">
                                <option value="compact">
                                    Compact
                                </option>
                                <option value="full">
                                    Full
                                </option>
                                <option value="mini">
                                    Mini
                                </option>
                            </select>
                        </div>
                        <div class="fcp-field with-image-selector-w">
                            <label for="">With Image</label><select class="with-image-selector">
                                <option value="yes">
                                    Yes
                                </option>
                                <option value="no">
                                    No
                                </option>
                            </select>
                        </div>
                        <div class="fcp-field">
                            <label for="">Menu Color</label>
                            <div class="fcp-colors menu-color-selector">
                                <div class="color-selector menu-color-selector color-bright selected"></div>
                                <div class="color-selector menu-color-selector color-dark"></div>
                                <div class="color-selector menu-color-selector color-light"></div>
                                <div class="color-selector menu-color-selector color-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fcp-group">
                    <div class="fcp-group-header">
                        Sub Menu
                    </div>
                    <div class="fcp-group-contents">
                        <div class="fcp-field">
                            <label for="">Sub Menu Style</label><select class="sub-menu-style-selector">
                                <option value="flyout">
                                    Flyout
                                </option>
                                <option value="inside">
                                    Inside/Click
                                </option>
                                <option value="over">
                                    Over
                                </option>
                            </select>
                        </div>
                        <div class="fcp-field">
                            <label for="">Sub Menu Color</label>
                            <div class="fcp-colors">
                                <div class="color-selector sub-menu-color-selector color-bright selected"></div>
                                <div class="color-selector sub-menu-color-selector color-dark"></div>
                                <div class="color-selector sub-menu-color-selector color-light"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fcp-group">
                    <div class="fcp-group-header">
                        Other Settings
                    </div>
                    <div class="fcp-group-contents">
                        <div class="fcp-field">
                            <label for="">Full Screen?</label><select class="full-screen-selector">
                                <option value="yes">
                                    Yes
                                </option>
                                <option value="no">
                                    No
                                </option>
                            </select>
                        </div>
                        <div class="fcp-field">
                            <label for="">Show Top Bar</label><select class="top-bar-visibility-selector">
                                <option value="yes">
                                    Yes
                                </option>
                                <option value="no">
                                    No
                                </option>
                            </select>
                        </div>
                        <div class="fcp-field">
                            <label for="">Above Menu?</label><select class="top-bar-above-menu-selector">
                                <option value="yes">
                                    Yes
                                </option>
                                <option value="no">
                                    No
                                </option>
                            </select>
                        </div>
                        <div class="fcp-field">
                            <label for="">Top Bar Color</label>
                            <div class="fcp-colors">
                                <div class="color-selector top-bar-color-selector color-bright selected"></div>
                                <div class="color-selector top-bar-color-selector color-dark"></div>
                                <div class="color-selector top-bar-color-selector color-light"></div>
                                <div class="color-selector top-bar-color-selector color-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
@endsection