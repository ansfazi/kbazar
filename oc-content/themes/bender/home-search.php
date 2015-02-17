    <div class="jumbotron home-search" style="">
    <div class="container">
        <div class="row">
            
    
            <div class="col-sm-12">
                <br>
                <p class="main_description"><?php echo osc_page_description(); ?></p>

                <br>
                 <form action="<?php echo osc_base_url(true); ?>" method="get" class="search nocsrf" onsubmit="javascript:return doSearch();">
                  
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1" style="text-align: center">
                        <div class="row">

                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-text">Find me a</span>
                                       <input type="hidden" name="page" value="search"/>
                                                 
                                        <input type="text" name="sPattern" id="query"  aria-label="" class="form-control col-sm-3" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'bender_theme'), 'bender')); ?>" />
                                            <?php /* ?>
                                            <div class="input-group-btn">
                                                      <?php  if ( osc_count_categories() ) { ?>
                                                        <?php osc_categories_select('sCategory', null, __('Select a category', 'bender')) ; ?>
                                                        <?php  } else { ?>
                                                      <?php  } ?>
                                                    </div>
                                                <div id="message-seach"></div>
                                            <?php */ ?>
                                    <div class=" input-group-addon hidden-xs">
                                        <div class="btn-group">
                                            <?php  if ( osc_count_categories() ) { ?>
                                                <?php osc_categories_select('sCategory', null, __('Select a category', 'bender')) ; ?>
                                            <?php  } ?>
                                            <!--                                            
                                            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
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
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-12" style="text-align: center">
                        <button type="submit" class="btn btn-primary search-btn">Search</button>
                    </div>
                </div>
                    
               </form>
<!--            
                <br>
                <br>
                    
                <div class="row">
                    <div class="col-sm-12" style="text-align: center">

                        <div id="quotes">
                            <div class="text-item" style="display: none;">Boom! <strong>Vince</strong> just sold a <strong>Washing Machine</strong> in <strong>Sheffield</strong></div>
                            <div class="text-item" style="display: none;"><strong>Julia</strong> is availiable for <strong>home cleaning</strong> in <strong>Manchester</strong></div>
                            <div class="text-item" style="display: block;">Success! <strong>Paul</strong> has just sold a <strong>Mercedes-Benz E-class</strong> in <strong>Liverpool</strong></div>
                            <div class="text-item" style="display: none;">Hey, <strong>Uber</strong> has a <strong>job opening</strong> in <strong>London</strong></div>
                        </div>

                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>