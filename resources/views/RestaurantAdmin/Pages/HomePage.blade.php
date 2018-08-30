@extends('RestaurantAdmin/MasterPage')
@section('content')
    <div class="content-w">
        <!--------------------
        START - Top Bar
        -------------------->
        <div class="top-bar color-scheme-transparent">
            <!--------------------
            START - Top Menu Controls
            -------------------->
            <div class="top-menu-controls">
                <div class="element-search autosuggest-search-activator">
                    <input placeholder="Start typing to search..." type="text">
                </div>
                <!--------------------
                START - Messages Link in secondary top menu
                -------------------->
                <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
                    <i class="os-icon os-icon-mail-14"></i>
                    <div class="new-messages-count">
                        12
                    </div>
                    <div class="os-dropdown light message-list">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            John Mayers
                                        </h6>
                                        <h6 class="message-title">
                                            Account Update
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar2.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Phil Jones
                                        </h6>
                                        <h6 class="message-title">
                                            Secutiry Updates
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar3.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Bekky Simpson
                                        </h6>
                                        <h6 class="message-title">
                                            Vacation Rentals
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar4.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Alice Priskon
                                        </h6>
                                        <h6 class="message-title">
                                            Payment Confirmation
                                        </h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--------------------
                END - Messages Link in secondary top menu
                --------------------><!--------------------
              START - Settings Link in secondary top menu
              -------------------->
                <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                    <i class="os-icon os-icon-ui-46"></i>
                    <div class="os-dropdown">
                        <div class="icon-w">
                            <i class="os-icon os-icon-ui-46"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--------------------
                END - Settings Link in secondary top menu
                --------------------><!--------------------
              START - User avatar and menu in secondary top menu
              -------------------->
                <div class="logged-user-w">
                    <div class="logged-user-i">
                        <div class="avatar-w">
                            <img alt="" src="img/avatar1.jpg">
                        </div>
                        <div class="logged-user-menu color-style-bright">
                            <div class="logged-user-avatar-info">
                                <div class="avatar-w">
                                    <img alt="" src="img/avatar1.jpg">
                                </div>
                                <div class="logged-user-info-w">
                                    <div class="logged-user-name">
                                        Maria Gomez
                                    </div>
                                    <div class="logged-user-role">
                                        Administrator
                                    </div>
                                </div>
                            </div>
                            <div class="bg-icon">
                                <i class="os-icon os-icon-wallet-loaded"></i>
                            </div>
                            <ul>
                                <li>
                                    <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                                </li>
                                <li>
                                    <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                                </li>
                                <li>
                                    <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - User avatar and menu in secondary top menu
                -------------------->
            </div>
            <!--------------------
            END - Top Menu Controls
            -------------------->
        </div>
        <!--------------------
        END - Top Bar
        --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Products</a>
            </li>
            <li class="breadcrumb-item">
                <span>Laptop with retina screen</span>
            </li>
        </ul>
        <!--------------------
        END - Breadcrumbs
        -------------------->
        <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
        </div>
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="element-actions">
                                <form class="form-inline justify-content-sm-end">
                                    <select class="form-control form-control-sm rounded">
                                        <option value="Pending">
                                            Today
                                        </option>
                                        <option value="Active">
                                            Last Week
                                        </option>
                                        <option value="Cancelled">
                                            Last 30 Days
                                        </option>
                                    </select>
                                </form>
                            </div>
                            <h6 class="element-header">
                                Daily Sales Dashboard
                            </h6>
                            <div class="element-content">
                                <div class="row" >
                                    <div class="col-sm-4 col-xxxl-3" >
                                        <a class="element-box el-tablo" href="#" style="background: green;">
                                            <div class="label" style="color:#fff;">
                                                New Order
                                            </div>
                                            <div class="value" style="color:#fff;">
                                                {{ $OrderCount }}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-xxxl-3">
                                        <a class="element-box el-tablo" href="#">
                                            <div class="label">
                                            Delivered Orders
                                            </div>
                                            <div class="value">
                                                $457
                                            </div>
                                            <div class="trending trending-down-basic">
                                                <span>12%</span><i class="os-icon os-icon-arrow-down"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-xxxl-3">
                                        <a class="element-box el-tablo" href="#">
                                            <div class="label">
                                                New Customers
                                            </div>
                                            <div class="value">
                                                125
                                            </div>
                                            <div class="trending trending-down-basic">
                                                <span>9%</span><i class="os-icon os-icon-arrow-down"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-none d-xxxl-block col-xxxl-3">
                                        <a class="element-box el-tablo" href="#">
                                            <div class="label">
                                                Refunds Processed
                                            </div>
                                            <div class="value">
                                                $294
                                            </div>
                                            <div class="trending trending-up-basic">
                                                <span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-xxxl-6">
                        <div class="element-wrapper">
                            <h6 class="element-header">
                                New Orders
                            </h6>
                            <div class="element-box">
                                <div class="table-responsive">
                                    <table class="table table-lightborder">
                                        <thead>
                                        <tr>
                                            <th>
                                                Customer
                                            </th>
                                            <th>
                                                Products
                                            </th>
                                            <th class="text-center">
                                                Status
                                            </th>
                                            <th class="text-right">
                                                Adres
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Orders as $order)
                                        <tr>
                                            <td class="nowrap">
                                                {{ $order->user->first_name }}
                                            </td>
                                            <td>
                                                <div class="cell-image-list">
                                                    <div class="cell-img" style="background-image: url(img/portfolio9.jpg)"></div>
                                                    <div class="cell-img" style="background-image: url(img/portfolio2.jpg)"></div>
                                                    <div class="cell-img" style="background-image: url(img/portfolio12.jpg)"></div>
                                                    <div class="cell-img-more">
                                                        + 5 more
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                                            </td>
                                            <td>
                                                {{ $order->customerAddress->adress }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 d-xxxl-none">
                        <!--START - Top Selling Chart-->
                        <div class="element-wrapper">
                            <h6 class="element-header">
                                Top Selling Today
                            </h6>
                            <div class="element-box">
                                <div class="el-chart-w">
                                    <canvas height="120" id="donutChart" width="120"></canvas>
                                    <div class="inside-donut-chart-label">
                                        <strong>142</strong><span>Total Orders</span>
                                    </div>
                                </div>
                                <div class="el-legend condensed">
                                    <div class="row">
                                        <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto col-6">
                                            <div class="legend-value-w">
                                                <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                                <div class="legend-value">
                                                    <span>Prada</span>
                                                    <div class="legend-sub-value">
                                                        14 Pairs
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="legend-value-w">
                                                <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                                <div class="legend-value">
                                                    <span>Maui Jim</span>
                                                    <div class="legend-sub-value">
                                                        26 Pairs
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 d-lg-none d-xxl-block">
                                            <div class="legend-value-w">
                                                <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                                <div class="legend-value">
                                                    <span>Gucci</span>
                                                    <div class="legend-sub-value">
                                                        17 Pairs
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="legend-value-w">
                                                <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                                <div class="legend-value">
                                                    <span>Armani</span>
                                                    <div class="legend-sub-value">
                                                        12 Pairs
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END - Top Selling Chart-->
                    </div>
                    <div class="d-none d-xxxl-block col-xxxl-6">
                        <!--START - Questions per Product-->
                        <div class="element-wrapper">
                            <div class="element-actions">
                                <form class="form-inline justify-content-sm-end">
                                    <select class="form-control form-control-sm rounded">
                                        <option value="Pending">
                                            Today
                                        </option>
                                        <option value="Active">
                                            Last Week
                                        </option>
                                        <option value="Cancelled">
                                            Last 30 Days
                                        </option>
                                    </select>
                                </form>
                            </div>
                            <h6 class="element-header">
                                Inventory Stats
                            </h6>
                            <div class="element-box">
                                <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                        <div class="bar-label-left">
                                            <span class="bigger">Eyeglasses</span>
                                        </div>
                                        <div class="bar-label-right">
                                            <span class="info">25 items / 10 remaining</span>
                                        </div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                        <div class="bar-level-2" style="width: 70%">
                                            <div class="bar-level-3" style="width: 40%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                        <div class="bar-label-left">
                                            <span class="bigger">Outwear</span>
                                        </div>
                                        <div class="bar-label-right">
                                            <span class="info">18 items / 7 remaining</span>
                                        </div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                        <div class="bar-level-2" style="width: 40%">
                                            <div class="bar-level-3" style="width: 20%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                        <div class="bar-label-left">
                                            <span class="bigger">Shoes</span>
                                        </div>
                                        <div class="bar-label-right">
                                            <span class="info">15 items / 12 remaining</span>
                                        </div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                        <div class="bar-level-2" style="width: 60%">
                                            <div class="bar-level-3" style="width: 30%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                        <div class="bar-label-left">
                                            <span class="bigger">Jeans</span>
                                        </div>
                                        <div class="bar-label-right">
                                            <span class="info">12 items / 4 remaining</span>
                                        </div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                        <div class="bar-level-2" style="width: 30%">
                                            <div class="bar-level-3" style="width: 10%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 border-top pt-3">
                                    <div class="element-actions d-none d-sm-block">
                                        <form class="form-inline justify-content-sm-end">
                                            <select class="form-control form-control-sm form-control-faded">
                                                <option selected="true">
                                                    Last 30 days
                                                </option>
                                                <option>
                                                    This Week
                                                </option>
                                                <option>
                                                    This Month
                                                </option>
                                                <option>
                                                    Today
                                                </option>
                                            </select>
                                        </form>
                                    </div>
                                    <h6 class="element-box-header">
                                        Inventory History
                                    </h6>
                                    <div class="el-chart-w">
                                        <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46,38,32,45" height="50" id="liteLineChartV3" width="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END - Questions per product                  -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xxxl-9">
                        <div class="element-wrapper">
                            <h6 class="element-header">
                                Unique Visitors Graph
                            </h6>
                            <div class="element-box">
                                <div class="os-tabs-w">
                                    <div class="os-tabs-controls">
                                        <ul class="nav nav-tabs smaller">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tab_overview">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tab_sales">Sales</a>
                                            </li>
                                        </ul>
                                        <ul class="nav nav-pills smaller d-none d-md-flex">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#">Today</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_overview">
                                            <div class="el-tablo bigger">
                                                <div class="label">
                                                    Unique Visitors
                                                </div>
                                                <div class="value">
                                                    12,537
                                                </div>
                                            </div>
                                            <div class="el-chart-w">
                                                <canvas height="150px" id="lineChart" width="600px"></canvas>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_sales"></div>
                                        <div class="tab-pane" id="tab_conversion"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-xxxl-block col-xxxl-3">
                        <div class="element-wrapper">
                            <h6 class="element-header">
                                Visitors by Browser
                            </h6>
                            <div class="element-box less-padding">
                                <div class="el-chart-w">
                                    <canvas height="120" id="donutChart1" width="120"></canvas>
                                    <div class="inside-donut-chart-label">
                                        <strong>1,248</strong><span>Visitors</span>
                                    </div>
                                </div>
                                <div class="el-legend condensed">
                                    <div class="row">
                                        <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto">
                                            <div class="legend-value-w">
                                                <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                                <div class="legend-value">
                                                    <span>Safari</span>
                                                    <div class="legend-sub-value">
                                                        17%, 12 Visits
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="legend-value-w">
                                                <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                                <div class="legend-value">
                                                    <span>Chrome</span>
                                                    <div class="legend-sub-value">
                                                        22%, 763 Visits
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 d-none d-xxxxl-block">
                                            <div class="legend-value-w">
                                                <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                                <div class="legend-value">
                                                    <span>Firefox</span>
                                                    <div class="legend-sub-value">
                                                        3%, 7 Visits
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="legend-value-w">
                                                <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                                <div class="legend-value">
                                                    <span>Explorer</span>
                                                    <div class="legend-sub-value">
                                                        15%, 45 Visits
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header">
                                Recent Orders
                            </h6>
                            <div class="element-box-tp">
                                <!--------------------
                                START - Controls Above Table
                                -------------------->
                                <div class="controls-above-table">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a class="btn btn-sm btn-secondary" href="#">Download CSV</a><a class="btn btn-sm btn-secondary" href="#">Archive</a><a class="btn btn-sm btn-danger" href="#">Delete</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <form class="form-inline justify-content-sm-end">
                                                <input class="form-control form-control-sm rounded bright" placeholder="Search" type="text"><select class="form-control form-control-sm rounded bright">
                                                    <option selected="selected" value="">
                                                        Select Status
                                                    </option>
                                                    <option value="Pending">
                                                        Pending
                                                    </option>
                                                    <option value="Active">
                                                        Active
                                                    </option>
                                                    <option value="Cancelled">
                                                        Cancelled
                                                    </option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--------------------
                                END - Controls Above Table
                                ------------------          --><!--------------------
                      START - Table with actions
                      ------------------  -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-lg table-v2 table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                <input class="form-control" type="checkbox">
                                            </th>
                                            <th>
                                                Customer Name
                                            </th>
                                            <th>
                                                Country
                                            </th>
                                            <th>
                                                Order Total
                                            </th>
                                            <th>
                                                Referral
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <input class="form-control" type="checkbox">
                                            </td>
                                            <td>
                                                John Mayers
                                            </td>
                                            <td>
                                                <img alt="" src="img/flags-icons/us.png" width="25px">
                                            </td>
                                            <td class="text-right">
                                                $245
                                            </td>
                                            <td>
                                                Organic
                                            </td>
                                            <td class="text-center">
                                                <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                                            </td>
                                            <td class="row-actions">
                                                <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a href="#"><i class="os-icon os-icon-grid-10"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="form-control" type="checkbox">
                                            </td>
                                            <td>
                                                Mike Astone
                                            </td>
                                            <td>
                                                <img alt="" src="img/flags-icons/fr.png" width="25px">
                                            </td>
                                            <td class="text-right">
                                                $154
                                            </td>
                                            <td>
                                                Organic
                                            </td>
                                            <td class="text-center">
                                                <div class="status-pill red" data-title="Cancelled" data-toggle="tooltip"></div>
                                            </td>
                                            <td class="row-actions">
                                                <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a href="#"><i class="os-icon os-icon-grid-10"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="form-control" type="checkbox">
                                            </td>
                                            <td>
                                                Kira Knight
                                            </td>
                                            <td>
                                                <img alt="" src="img/flags-icons/us.png" width="25px">
                                            </td>
                                            <td class="text-right">
                                                $23
                                            </td>
                                            <td>
                                                Adwords
                                            </td>
                                            <td class="text-center">
                                                <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                                            </td>
                                            <td class="row-actions">
                                                <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a href="#"><i class="os-icon os-icon-grid-10"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="form-control" type="checkbox">
                                            </td>
                                            <td>
                                                Jessica Bloom
                                            </td>
                                            <td>
                                                <img alt="" src="img/flags-icons/ca.png" width="25px">
                                            </td>
                                            <td class="text-right">
                                                $112
                                            </td>
                                            <td>
                                                Organic
                                            </td>
                                            <td class="text-center">
                                                <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                                            </td>
                                            <td class="row-actions">
                                                <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a href="#"><i class="os-icon os-icon-grid-10"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <input class="form-control" type="checkbox">
                                            </td>
                                            <td>
                                                Gary Lineker
                                            </td>
                                            <td>
                                                <img alt="" src="img/flags-icons/ca.png" width="25px">
                                            </td>
                                            <td class="text-right">
                                                $64
                                            </td>
                                            <td>
                                                Organic
                                            </td>
                                            <td class="text-center">
                                                <div class="status-pill yellow" data-title="Pending" data-toggle="tooltip"></div>
                                            </td>
                                            <td class="row-actions">
                                                <a href="#"><i class="os-icon os-icon-ui-49"></i></a><a href="#"><i class="os-icon os-icon-grid-10"></i></a><a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--------------------
                                END - Table with actions
                                ------------------            --><!--------------------
                      START - Controls below table
                      ------------------  -->
                                <div class="controls-below-table">
                                    <div class="table-records-info">
                                        Showing records 1 - 5
                                    </div>
                                    <div class="table-records-pages">
                                        <ul>
                                            <li>
                                                <a href="#">Previous</a>
                                            </li>
                                            <li>
                                                <a class="current" href="#">1</a>
                                            </li>
                                            <li>
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li>
                                                <a href="#">4</a>
                                            </li>
                                            <li>
                                                <a href="#">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--------------------
                                END - Controls below table
                                -------------------->
                            </div>
                        </div>
                    </div>
                </div><!--------------------
              START - Color Scheme Toggler
              -------------------->
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
                <!--------------------
                END - Demo Customizer
                --------------------><!--------------------
              START - Chat Popup Box
              -------------------->
                <div class="floated-chat-btn">
                    <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
                </div>
                <div class="floated-chat-w">
                    <div class="floated-chat-i">
                        <div class="chat-close">
                            <i class="os-icon os-icon-close"></i>
                        </div>
                        <div class="chat-head">
                            <div class="user-w with-status status-green">
                                <div class="user-avatar-w">
                                    <div class="user-avatar">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6 class="user-title">
                                        John Mayers
                                    </h6>
                                    <div class="user-role">
                                        Account Manager
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-messages">
                            <div class="message">
                                <div class="message-content">
                                    Hi, how can I help you?
                                </div>
                            </div>
                            <div class="date-break">
                                Mon 10:20am
                            </div>
                            <div class="message">
                                <div class="message-content">
                                    Hi, my name is Mike, I will be happy to assist you
                                </div>
                            </div>
                            <div class="message self">
                                <div class="message-content">
                                    Hi, I tried ordering this product and it keeps showing me error code.
                                </div>
                            </div>
                        </div>
                        <div class="chat-controls">
                            <input class="message-input" placeholder="Type your message here..." type="text">
                            <div class="chat-extra">
                                <a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - Chat Popup Box
                -------------------->
            </div>
            <!--------------------
            START - Sidebar
            -------------------->
            <div class="content-panel">
                <div class="content-panel-close">
                    <i class="os-icon os-icon-close"></i>
                </div>
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Quick Links
                    </h6>
                    <div class="element-box-tp">
                        <div class="el-buttons-list full-width">
                            <a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-delivery-box-2"></i><span>Create New Product</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-window-content"></i><span>Customer Comments</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-wallet-loaded"></i><span>Store Settings</span></a>
                        </div>
                    </div>
                </div>
                <!--------------------
                START - Support Agents
                -------------------->
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Support Agents
                    </h6>
                    <div class="element-box-tp">
                        <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                                <div class="pt-avatar-w">
                                    <img alt="" src="img/avatar1.jpg">
                                </div>
                                <div class="pt-user-name">
                                    John Mayers
                                </div>
                            </a>
                            <div class="profile-tile-meta">
                                <ul>
                                    <li>
                                        Last Login:<strong>Online Now</strong>
                                    </li>
                                    <li>
                                        Tickets:<strong><a href="apps_support_index.html">12</a></strong>
                                    </li>
                                    <li>
                                        Response Time:<strong>2 hours</strong>
                                    </li>
                                </ul>
                                <div class="pt-btn">
                                    <a class="btn btn-success btn-sm" href="apps_full_chat.html">Send Message</a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-tile">
                            <a class="profile-tile-box" href="users_profile_small.html">
                                <div class="pt-avatar-w">
                                    <img alt="" src="img/avatar3.jpg">
                                </div>
                                <div class="pt-user-name">
                                    Ben Gossman
                                </div>
                            </a>
                            <div class="profile-tile-meta">
                                <ul>
                                    <li>
                                        Last Login:<strong>Offline</strong>
                                    </li>
                                    <li>
                                        Tickets:<strong><a href="apps_support_index.html">9</a></strong>
                                    </li>
                                    <li>
                                        Response Time:<strong>3 hours</strong>
                                    </li>
                                </ul>
                                <div class="pt-btn">
                                    <a class="btn btn-secondary btn-sm" href="apps_full_chat.html">Send Message</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - Support Agents
                --------------------><!--------------------
              START - Recent Activity
              -------------------->
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Recent Activity
                    </h6>
                    <div class="element-box-tp">
                        <div class="activity-boxes-w">
                            <div class="activity-box-w">
                                <div class="activity-time">
                                    10 Min
                                </div>
                                <div class="activity-box">
                                    <div class="activity-avatar">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                    <div class="activity-info">
                                        <div class="activity-role">
                                            John Mayers
                                        </div>
                                        <strong class="activity-title">Opened New Account</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="activity-box-w">
                                <div class="activity-time">
                                    2 Hours
                                </div>
                                <div class="activity-box">
                                    <div class="activity-avatar">
                                        <img alt="" src="img/avatar2.jpg">
                                    </div>
                                    <div class="activity-info">
                                        <div class="activity-role">
                                            Ben Gossman
                                        </div>
                                        <strong class="activity-title">Posted Comment</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="activity-box-w">
                                <div class="activity-time">
                                    5 Hours
                                </div>
                                <div class="activity-box">
                                    <div class="activity-avatar">
                                        <img alt="" src="img/avatar3.jpg">
                                    </div>
                                    <div class="activity-info">
                                        <div class="activity-role">
                                            Phil Nokorin
                                        </div>
                                        <strong class="activity-title">Opened New Account</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="activity-box-w">
                                <div class="activity-time">
                                    2 Days
                                </div>
                                <div class="activity-box">
                                    <div class="activity-avatar">
                                        <img alt="" src="img/avatar4.jpg">
                                    </div>
                                    <div class="activity-info">
                                        <div class="activity-role">
                                            Jenny Miksa
                                        </div>
                                        <strong class="activity-title">Uploaded Image</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - Recent Activity
                --------------------><!--------------------
              START - Team Members
              -------------------->
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Team Members
                    </h6>
                    <div class="element-box-tp">
                        <div class="input-search-w">
                            <input class="form-control rounded bright" placeholder="Search team members..." type="search">
                        </div>
                        <div class="users-list-w">
                            <div class="user-w with-status status-green">
                                <div class="user-avatar-w">
                                    <div class="user-avatar">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6 class="user-title">
                                        John Mayers
                                    </h6>
                                    <div class="user-role">
                                        Account Manager
                                    </div>
                                </div>
                                <a class="user-action" href="users_profile_small.html">
                                    <div class="os-icon os-icon-email-forward"></div>
                                </a>
                            </div>
                            <div class="user-w with-status status-green">
                                <div class="user-avatar-w">
                                    <div class="user-avatar">
                                        <img alt="" src="img/avatar2.jpg">
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6 class="user-title">
                                        Ben Gossman
                                    </h6>
                                    <div class="user-role">
                                        Administrator
                                    </div>
                                </div>
                                <a class="user-action" href="users_profile_small.html">
                                    <div class="os-icon os-icon-email-forward"></div>
                                </a>
                            </div>
                            <div class="user-w with-status status-red">
                                <div class="user-avatar-w">
                                    <div class="user-avatar">
                                        <img alt="" src="img/avatar3.jpg">
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6 class="user-title">
                                        Phil Nokorin
                                    </h6>
                                    <div class="user-role">
                                        HR Manger
                                    </div>
                                </div>
                                <a class="user-action" href="users_profile_small.html">
                                    <div class="os-icon os-icon-email-forward"></div>
                                </a>
                            </div>
                            <div class="user-w with-status status-green">
                                <div class="user-avatar-w">
                                    <div class="user-avatar">
                                        <img alt="" src="img/avatar4.jpg">
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6 class="user-title">
                                        Jenny Miksa
                                    </h6>
                                    <div class="user-role">
                                        Lead Developer
                                    </div>
                                </div>
                                <a class="user-action" href="users_profile_small.html">
                                    <div class="os-icon os-icon-email-forward"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - Team Members
                -------------------->
            </div>
            <!--------------------
            END - Sidebar
            -------------------->
        </div>
    </div>
@endsection