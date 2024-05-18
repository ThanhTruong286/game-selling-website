<div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-success pull-right">Monthly</span> -->
                                <h5>Total Products</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$total_product}}</h1>
                                <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                                <small>Products</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-info pull-right">Annual</span> -->
                                <h5>Revenue</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{number_format($total_revenue)}} VND</h1>
                                <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                                <small>New orders</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Today</span>
                                <h5>Cooperation</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$total_coop}}</h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                                <small>Companies</small>
                            </div>
                        </div>
                    </div>
                    @if($most_revenue)
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-danger pull-right">Low value</span> -->
                                <h5>Most Revenue</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$most_revenue->name}}</h1>
                                <!-- <div class="stat-percent font-bold text-success">38% <i class="fa fa-level-up"></i></div> -->
                                <small>{{number_format($most_revenue->revenue)}} VND</small>
                            </div>
                        </div>
                    </div>
                    @endif

            </div>

            <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-success pull-right">Monthly</span> -->
                                <h5>Total Categories</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$total_cate}}</h1>
                                <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                                <small>Categories</small>
                            </div>
                        </div>
                    </div>
                    @if($best_customer)
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-info pull-right">Annual</span> -->
                                <h5>Best Customer</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$best_customer->name}}</h1>
                                <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                                <small>Have {{$best_customer->games->count()}} Games In Library</small>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($product_banner)
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Today</span>
                                <h5>Shop Current Banner</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$product_banner->name}}</h1>
                                <div class="stat-percent font-bold text-navy">Sale {{$product_banner->sale}} %</div>
                                <small>{{number_format($product_banner->price)}} VND</small>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($low_revenue)
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!-- <span class="label label-danger pull-right">Low value</span> -->
                                <h5>Lowest Revenue</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$low_revenue->name}}</h1>
                                <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> -->
                                <small>{{number_format($low_revenue->revenue)}} VND</small>
                            </div>
                        </div>
                    </div>
                    @endif

            </div>
            </div>