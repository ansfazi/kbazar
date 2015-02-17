  <div class="jumbotron home-tron-search well ">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="home-tron-search-inner">

                                <div class="row">
                                    <form action="<?php echo osc_base_url(true); ?>" method="get" class="search nocsrf" onsubmit="javascript:return doSearch();">
                                        <div class="col-sm-8 col-xs-9" style="text-align: center">
                                        <div class="row">

                                            <div class="col-sm-12 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon input-group-addon-text hidden-xs">Find me a</span>
                                                     <input type="hidden" name="page" value="search"/>
                                                     <input type="text" name="sPattern" id="query"  aria-label="" class="form-control col-sm-3" value="<?php echo osc_search_pattern(); ?>" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'bender_theme'), 'bender')); ?>" />
                                       
                                                    <div class=" input-group-addon hidden-xs">
                                                        <div class="btn-group">
                                                               <?php  if ( osc_count_categories() ) { ?>
                                                                    <?php osc_categories_select('sCategory', null, __('Select a category', 'bender')) ; ?>
                                                                <?php  } ?>
<!--                                                            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                                                All categories <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">Cars, Vans &amp; Motorbikes</a></li>
                                                                <li><a href="#">Community</a></li>
                                                                <li><a href="#">Flats &amp; Houses</a></li>
                                                                <li><a href="#">For Sale</a></li>
                                                                <li><a href="#">Jobs</a></li>
                                                                <li><a href="#">Pets</a></li>
                                                                <li><a href="#">Services</a></li>
                                                            </ul>-->
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>
                                    </div>


                                    <div class="col-sm-4 col-xs-3" style="text-align: center">
                                        <div class="row">
                                            <div class="col-sm-11 pull-right">
                                                <button class="btn btn-primary search-btn"><i class="icon-search"></i><i class="fa fa-search fa-2"></i>&nbsp;Search</button>
                                            </div>
                                        </div>
                                    </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
