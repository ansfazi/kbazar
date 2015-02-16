<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php') ; ?>
    </head>
<body <?php bender_body_class(); ?>>
    
    
    
<nav class="navbar navbar-default" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="navbar-brand ">
                <?php echo logo_header(); ?>
                <span id="description"><?php echo osc_page_description(); ?></span>
            </div>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right visible-xs">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="my_account.html">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="listing.php">Listings</a></li>
                <li><a href="account_ad_create.html">Post an ad</a></li>
            </ul> 
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="row">

                    <div class="pull-right">


                        <a data-toggle="modal" data-target="#modalLogin" href="#">Login</a> | 
                        <a href="register.html">Register</a> | 
                        <a href="listings.html">Listings</a> 
                        <a href="account_ad_create.html" class="btn btn-default post-ad-btn">Post an ad</a>

                    </div>	
                </div>
            </div>

        </div>
    </div>

</nav>

    <?php /* ?>
    
<div id="header">
    <!-- header ad 728x60-->
    <div class="ads_header">
    <?php echo osc_get_preference('header-728x90', 'bender'); ?>
    <!-- /header ad 728x60-->
    </div>
    <div class="clear"></div>
    <div class="wrapper">
        <div id="logo">
            <?php echo logo_header(); ?>
            <span id="description"><?php echo osc_page_description(); ?></span>
        </div>
        <ul class="nav">
            <?php if( osc_is_static_page() || osc_is_contact_page() ){ ?>
                <li class="search"><a class="ico-search icons" data-bclass-toggle="display-search"></a></li>
                <li class="cat"><a class="ico-menu icons" data-bclass-toggle="display-cat"></a></li>
            <?php } ?>
            <?php if( osc_users_enabled() ) { ?>
            <?php if( osc_is_web_user_logged_in() ) { ?>
                <li class="first logged">
                    <span><?php echo sprintf(__('Hi %s', 'bender'), osc_logged_user_name() . '!'); ?>  &middot;</span>
                    <strong><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'bender'); ?></a></strong> &middot;
                    <a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'bender'); ?></a>
                </li>
            <?php } else { ?>
                <li><a id="login_open" href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'bender') ; ?></a></li>
                <?php if(osc_user_registration_enabled()) { ?>
                    <li><a href="<?php echo osc_register_account_url() ; ?>"><?php _e('Register for a free account', 'bender'); ?></a></li>
                <?php }; ?>
            <?php } ?>
            <?php } ?>
            <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
            <li class="k-publish publish-bk" ><a class="waves-effect waves-light btn" href="<?php echo osc_item_post_url_in_category() ; ?>"><?php _e("Publish your ad for free", 'bender');?></a></li>
            <?php } ?>
        </ul>

    </div>
    <?php if( osc_is_home_page() || osc_is_static_page() || osc_is_contact_page() ) { ?>
    <form action="<?php echo osc_base_url(true); ?>" method="get" class="search nocsrf" <?php /* onsubmit="javascript:return doSearch();"* ?>>
        <input type="hidden" name="page" value="search"/>
        <div class="main-search">
            <div class="cell">
                <div class="input-group"> 
                    <input type="text" name="sPattern" id="query"  aria-label="" class="input-text-bk form-control" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'bender_theme'), 'bender')); ?>" />
                    <div class="input-group-btn">
                      <?php  if ( osc_count_categories() ) { ?>
                        <?php osc_categories_select('sCategory', null, __('Select a category', 'bender')) ; ?>
                        <?php  } else { ?>
                      <?php  } ?>
                    </div>
                  </div>
            </div>
            
            <?php  /* if ( osc_count_categories() ) { ?>
                <div class="cell selector">
                    <?php osc_categories_select('sCategory', null, __('Select a category', 'bender')) ; ?>
                </div>
                <div class="cell reset-padding">
            <?php  } else { ?>
                <div class="cell">
            <?php  } * ?>
                <button class="btn btn-primary search-btn"><?php _e("Search", 'bender');?></button>
            
        <div id="message-seach"></div>
    </form>
    <?php } ?>
</div>
       
<?php osc_show_widgets('header'); ?>
         <?php */ ?>
        
    
    <div class="jumbotron home-search" style="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <p class="main_description">Search thousands of stores, brands, products and user classifieds all in one place</p>

                <br><br>
                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2" style="text-align: center">
                        <div class="row">

                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-text">Find me a</span>

                                    <input class="form-control col-sm-3" placeholder="e.g. BMW, 2 bed flat, sofa " type="text">
                                    <div class=" input-group-addon hidden-xs">
                                        <div class="btn-group">
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
                                            </ul>
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
                        <a href="listings.html" class="btn btn-primary search-btn">Search</a>
                    </div>
                </div>                
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
                </div>
            </div>
        </div>
    </div>
</div>

    
    
    
    
<div class="wrapper wrapper-flash">
    <?php
        $breadcrumb = osc_breadcrumb('&raquo;', false, get_breadcrumb_lang());
        if( $breadcrumb !== '') { ?>
        <div class="breadcrumb">
            <?php echo $breadcrumb; ?>
            <div class="clear"></div>
        </div>
    <?php
        }
    ?>
    <?php osc_show_flash_message(); ?>
</div>
<?php osc_run_hook('before-content'); ?>
<div class="wrapper" id="content">
    <?php osc_run_hook('before-main'); ?>
    <div id="main">
        <?php osc_run_hook('inside-main'); ?>