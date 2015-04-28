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

    // meta tag robots
    osc_add_hook('header','bender_follow_construct');

    bender_add_body_class('home');


    $buttonClass = '';
    $listClass   = '';
    if(bender_show_as() == 'gallery'){
          $listClass = 'listing-grid';
          $buttonClass = 'active';
    }
?>




<?php osc_current_web_theme_path('header.php') ; ?>
<div class="clear"></div>


<div class="latest_ads">
<h1><strong><?php _e('Latest Listings', 'bender') ; ?></strong></h1>
 <?php if( osc_count_latest_items() == 0) { ?>
    <div class="clear"></div>
    <p class="empty"><?php _e("There aren't listings available at this moment", 'bender'); ?></p>
<?php } else { ?>
    <div class="actions">
      <span class="doublebutton <?php echo $buttonClass; ?>">
           <a href="<?php echo osc_base_url(true); ?>?sShowAs=list" class="list-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span><?php _e('List', 'bender'); ?></span></a>
           <a href="<?php echo osc_base_url(true); ?>?sShowAs=gallery" class="grid-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span><?php _e('Grid', 'bender'); ?></span></a>
      </span>
    </div>
    <?php
    View::newInstance()->_exportVariableToView("listType", 'latestItems');
    View::newInstance()->_exportVariableToView("listClass",$listClass);
    osc_current_web_theme_path('loop.php');
    ?>
    <div class="clear"></div>
    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
        <p class="see_more_link"><a href="<?php echo osc_search_show_all_url() ; ?>">
            <strong><?php _e('See all listings', 'bender') ; ?> &raquo;</strong></a>
        </p>
    <?php } ?>
<?php } ?>
</div>
</div><!-- main -->
<div id="sidebar">
    
    <div class="premium-container-zb">
        <h3>Premium</h3>
        
        <?php 
         osc_query_item(array("premium"=>"1", "results_per_page"=>5));
        //osc_query_item("region_name=Madrid");
if( osc_count_custom_items() == 0) { ?>
    <p class="empty"><?php _e('No Listings', 'modern') ; ?></p>
<?php } else { ?>
            <ul class="listing-card-list premiums-list-zb" id="listing-card-list">
                
                 <?php while ( osc_has_custom_items() ) { ?>
                
                    <li class="listing-card <?php echo $class; ?>premium">
                
                    <?php if( osc_images_enabled_at_items() ) { ?>
                        <?php if(osc_count_item_resources()) { ?>
                            <a class="listing-thumb" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title() ; ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
                        <?php } else { ?>
                            <a class="listing-thumb" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title() ; ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
                        <?php } ?>
                    <?php } ?>
                            
                    <div class="listing-detail">
                        <div class="listing-cell">
                            <div class="listing-data">
                                <div class="listing-basicinfo">
                                    <a href="<?php echo osc_item_url() ; ?>" class="title" title="<?php echo osc_item_title() ; ?>"><?php echo osc_item_title() ; ?></a>
                                    <div class="listing-attributes">
                                        <span class="category"><?php echo osc_item_category() ; ?></span> 
                                        <?php if(osc_item_city() != ''){ ?>
                                        -
                                        <span class="location"><?php echo osc_item_city(); ?> <?php if(osc_item_region()!='') { ?>(<?php echo osc_item_region(); ?>)<?php } ?></span> 
                                        <?php } ?>
                                        <br/>
                                        <!--<span class="g-hide">-</span>--> <?php echo osc_format_date(osc_item_pub_date()); ?>
                                        <?php if( osc_price_enabled_at_items() ) { ?><span class="currency-value"><?php echo osc_format_price(osc_item_price()); ?></span><?php } ?>
                                    </div>
                                    <p><?php echo osc_highlight( osc_item_description(), 100 ); ?></p>
                                </div>
                                <?php if($admin){ ?>
                                    <span class="admin-options">
                                        <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender'); ?></a>
                                        <span>|</span>
                                        <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bender')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'bender'); ?></a>
                                        <?php if(osc_item_is_inactive()) {?>
                                        <span>|</span>
                                        <a href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'bender'); ?></a>
                                        <?php } ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>
                
            </ul>

    
    <?php /* ?>
    <table border="0" cellspacing="0">
         <tbody>
            <?php $class = "even"; ?>
            <?php while ( osc_has_custom_items() ) { ?>
             <tr class="<?php echo $class. (osc_item_is_premium()?" premium":"") ; ?>">
                    <?php if( osc_images_enabled_at_items() ) { ?>
                     <td class="photo">
                        <?php if( osc_count_item_resources() ) { ?>
                            <a href="<?php echo osc_item_url() ; ?>">
                                <img src="<?php echo osc_resource_thumbnail_url() ; ?>" width="75" height="56" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />
                            </a>
                        <?php } else { ?>
                            <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="" title=""/>
                        <?php } ?>
                     </td>
                    <?php } ?>
                     <td class="text">
                         <h3><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_item_title() ; ?></a></h3>
                         <p><strong><?php if( osc_price_enabled_at_items() ) { echo osc_item_formated_price() ; ?> - <?php } echo osc_item_city(); ?> (<?php echo osc_item_region();?>) - <?php echo osc_format_date(osc_item_pub_date()); ?></strong></p>
                         <p><?php echo osc_highlight( strip_tags( osc_item_description() ) ) ; ?></p>
                     </td>                                       
                 </tr>
                <?php $class = ($class == 'even') ? 'odd' : 'even' ; ?>
            <?php } ?>
        </tbody>
    </table>
     <?php */?>
     
<?php }; ?>
    
    
        <?php  
       
        
        /*
            while(osc_has_latest_items() ) {
                if(osc_item_is_premium()){
                    $class = 'premiums-list-item-zb';
//                    if($i%3 == 0){
//                        $class = 'first';
//                    }
                    bender_draw_item($class);
                    
                    if($i == 4){
                        break;
                    }
                    $i++;
                }
            }
         * 
         */
        ?>
    </div>
    
    <?php if( osc_get_preference('sidebar-300x250', 'bender') != '') {?>
    <!-- sidebar ad 350x250 -->
    <div class="ads_300">
        <?php echo osc_get_preference('sidebar-300x250', 'bender'); ?>
    </div>
    <!-- /sidebar ad 350x250 -->
    <?php } ?>
    <div class="widget-box">
        <?php if(osc_count_list_regions() > 0 ) { ?>
        <div class="box location">
            <h3><strong><?php _e("Location", 'bender') ; ?></strong></h3>
            <ul>
            <?php while(osc_has_list_regions() ) { ?>
                <li><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_list_region_name() ; ?> <em>(<?php echo osc_list_region_items() ; ?>)</em></a></li>
            <?php } ?>
            </ul>
        </div>
        <?php } ?>
    </div>
</div>
<div class="clear"><!-- do not close, use main clossing tag for this case -->
<?php if( osc_get_preference('homepage-728x90', 'bender') != '') { ?>
<!-- homepage ad 728x60-->
<div class="ads_728">
    <?php echo osc_get_preference('homepage-728x90', 'bender'); ?>
</div>
<!-- /homepage ad 728x60-->
<?php } ?>
<?php osc_current_web_theme_path('footer.php') ; ?>