<?= view('dashboard_sections/vw_dash_header') ?>

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <div class="col-md-7">
                    <div class="widget">
                        <div class="widget-body">
                            <?php
                            echo "<pre>";
                            var_dump(session()->get('user'));
                            echo "</pre>";
                            ?>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->
                <div class="col-md-5">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Records</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body row">
                            <div class="col-xs-4">
                                <div class="text-center p-h-md" style="border-right: 2px solid #eee">
                                    <h6 class="fz-xl fw-400 m-0" >Book</h6>
                                    <h2 class="fz-xl fw-400 m-0" data-plugin="counterUp"><?= $bookSize; ?></h2>
                                </div>
                            </div><!-- END column -->
                            <div class="col-xs-4">
                                <div class="text-center p-h-md" style="border-right: 2px solid #eee">
                                    <h6 class="fz-xl fw-400 m-0" >Offer</h6>
                                    <h2 class="fz-xl fw-400 m-0" data-plugin="counterUp"><?= $offerSize; ?></h2>
                                </div>
                            </div><!-- END column -->
                            <div class="col-xs-4">
                                <div class="text-center p-h-md">
                                    <h2 class="fz-xl fw-400 m-0" >User</h2>
                                    <h2 class="fz-xl fw-400 m-0" data-plugin="counterUp"><?= $userSize; ?></h2>
                                </div>
                            </div><!-- END column -->
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->

                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Connect Point</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="media">
                                <div class="media-left">
                                    <div class="icon icon-circle m-0 m-r-md b-0 primary text-white" style="width: 90px; height: 90px; line-height: 90px;">
                                        <i class="fa fa-2x fa-warning" style="font-size: 50px;line-height: 90px;"></i>
                                    </div>
                                </div>
                                <div class="media-body p-b-md p-t-xs">
                                    <p class="m-0" style="line-height: 85px">Buradan sadece data edit yapılabilir</p>
                                </div>
                            </div><!-- .media -->
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->
            </div><!-- .row -->

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Streams</h4>
                        </header>
                        <hr class="widget-separator"/>
                        <div class="widget-body">
                            <div class="streamline m-l-lg">
                                <div class="sl-item p-b-md">
                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                        <img class="img-responsive" src="../assets/images/221.jpg" alt="avatar"/>
                                    </div><!-- .avatar -->
                                    <div class="sl-content m-l-xl">
                                        <h5 class="m-t-0"><a href="javascript:void(0)" class="m-r-xs theme-color">John Doe</a><small class="text-muted fz-sm">last month</small></h5>
                                        <p>John has just started working on the project</p>
                                    </div>
                                </div><!-- .sl-item -->

                                <div class="sl-item p-b-md">
                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                        <img class="img-responsive" src="../assets/images/214.jpg" alt="avatar"/>
                                    </div><!-- .avatar -->
                                    <div class="sl-content m-l-xl">
                                        <h5 class="m-t-0"><a href="javascript:void(0)" class="m-r-xs theme-color">Jane Doe</a><small class="text-muted fz-sm">last month</small></h5>
                                        <p>Jane sent you invitation to attend the party</p>
                                    </div>
                                </div><!-- .sl-item -->

                                <div class="sl-item p-b-md">
                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                        <img class="img-responsive" src="../assets/images/217.jpg" alt="avatar"/>
                                    </div><!-- .avatar -->
                                    <div class="sl-content m-l-xl">
                                        <h5 class="m-t-0"><a href="javascript:void(0)" class="m-r-xs theme-color">Sally Mala</a><small class="text-muted fz-sm">last month</small></h5>
                                        <p>Sally added you to her circles</p>
                                    </div>
                                </div><!-- .sl-item -->

                                <div class="sl-item p-b-md">
                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                        <img class="img-responsive" src="../assets/images/211.jpg" alt="avatar"/>
                                    </div><!-- .avatar -->
                                    <div class="sl-content m-l-xl">
                                        <h5 class="m-t-0"><a href="javascript:void(0)" class="m-r-xs theme-color">Sara Adams</a><small class="text-muted fz-sm">last month</small></h5>
                                        <p>Sara has finished her task</p>
                                    </div>
                                </div><!-- .sl-item -->
                                <div class="sl-item p-b-md">
                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                        <img class="img-responsive" src="../assets/images/214.jpg" alt="avatar"/>
                                    </div><!-- .avatar -->
                                    <div class="sl-content m-l-xl">
                                        <h5 class="m-t-0"><a href="javascript:void(0)" class="m-r-xs theme-color">Sandy Doe</a><small class="text-muted fz-sm">last month</small></h5>
                                        <p>Sara has finished her task</p>
                                    </div>
                                </div><!-- .sl-item -->
                            </div><!-- .streamline -->
                        </div>
                    </div><!-- .widget -->
                </div><!-- END column -->

                <div class="col-md-6 col-sm-6">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Africa Map</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div id="africa-map" data-plugin="vectorMap" data-options="
							{
								map: 'africa_mill',
								backgroundColor: '#ffffff',
								regionsSelectable: true,
								regionStyle: {
									initial: { fill: '#3498db', 'fill-opacity': 1, stroke: 'none', 'stroke-width': 0, 'stroke-opacity': 1 },
									hover: { 'fill-opacity': 0.8, cursor: 'pointer' },
									selected: { fill: '#2980b9' },
								}
							}" style="width: 100%; height: 310px;">
                            </div>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->
            </div><!-- .row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Last Offers</h4>
                        </header>
                        <hr class="widget-separator"/>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table no-cellborder">
                                    <thead>
                                    <tr>
                                        <th>Offer id</th>
                                        <th>Offer Creator</th>
                                        <th>Offer Target User</th>
                                        <th>Offer Description</th>
                                        <th>Current State</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($offers as $key => $offer): ?>
                                        <tr>
                                            <td class="text-info"><?= $offer->of_id; ?></td>
                                            <td><?= $offer->ownerName; ?></td>
                                            <td><?= $offer->targetName; ?></td>
                                            <td><?=$offer->of_description?></td>
                                            <td>
                                            <td><?php if ($offer->of_status == 0): ?>
                                                    <span class="label label-info">Waiting</span>
                                                <?php elseif($offer->of_status == 1): ?>
                                                    <span class="label label-success">Accepted</span>
                                                <?php else: ?>
                                                    <span class="label label-danger">Rejected</span>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- .widget -->
                </div><!-- END column -->
            </div><!-- .row-->
        </section><!-- .app-content -->
    </div><!-- .wrap -->
    <?= view('dashboard_sections/vw_dash_footer') ?>
