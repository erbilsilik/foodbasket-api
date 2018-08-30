@extends('RestaurantAdmin/MasterPage')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                   Restaurants
                </h6>
                <div class="element-box">
                    <h5 class="form-header">
                        Restaurants
                    </h5>
                    <div class="form-desc">
                        <a href="{{ url('admin/add-restaurant') }}"><button class="btn btn-default" style="width: 33%;height:40px;font-size:24px;">Add Restaurant</button></a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>Restaurant Name</th>
                                <th>Web Site</th>
                                <th>Restaurant Type</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Restaurants as $restaurant)
                            <tr>
                                <td>{{ $restaurant->name }}</td>
                                <td>{{ $restaurant->web_site }}</td>
                                <td>@if($restaurant->type == 0) % @else  £ @endif</td>
                                <td>@if($restaurant->status != 0) Kapalı @else  Açık @endif</td>
                                <td>{{ $restaurant->created_at }}</td>
                                <td><button class="btn btn-primary">Restaurant Admin Panel</button><button class="btn btn-warning">Edit</button><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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
@endsection