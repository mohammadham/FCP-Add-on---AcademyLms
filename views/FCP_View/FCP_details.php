<?php
$FCP_details = $this->FCP_model->get_FCP_by_id($FCP_id)->row_array();
$instructor_details = $this->user_model->get_all_user($FCP_details['user_id'])->row_array();
$category_details = $this->FCP_model->get_categories($FCP_details['category_id'])->row_array();
$publisher_details = $this->FCP_model->get_Publisher_details_by_id($FCP_details['Publisher_id'])->row_array();
$course_details = $this->crud_model->get_course_by_id($FCP_details['course_id'])->row_array();

$user_id = $this->session->userdata('user_id');
                              
?>
<style>
    .FCP-content table tr th{
        width: 30%;
        background: #F1F2F4;
        padding: 10px;
        color: #000;
        border: 0.5px solid #dddddd;
    }
    .FCP-content table tr td{
        width: 70%;
        padding: 10px;
        border: 0.5px solid #dddddd;
    }
</style>
<!---------- Bread Crumb Area Start ---------->
<?php include "breadcrumb.php"; ?>
<!---------- Bread Crumb Area End ---------->

<!-- Start FCP Details -->
<section class="pt-100 pb-80">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-4">
            <div class="FCP-img"><img src="<?php echo base_url('uploads/FCP/banner/'.$FCP_details['banner'])?>" alt="" width="100%"/></div>
        </div>
        <div class="col-lg-8">
            <div class="FCP-content">
                <h4 class="s_Sidebar_title_one s_bar mb-20"><?php echo $FCP_details['title']; ?></h4>
                <!-- <p class="info"><?php echo htmlspecialchars_decode(substr_replace($FCP_details['description'], "...", 300)); ?></p> -->
                <p class="info"><i><?php echo get_phrase('Share_by') ?></i>
                    <a class="text-14px fw-600 text-decoration-none"
                        href="<?php echo site_url('home/instructor_page/' . $FCP_details['user_id']); ?>"><?php echo $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></a>

                </p>
                <?php 
                    if($publisher_details != null):
                        ?>
                        <p class="info"><?php echo get_phrase('publication_name') ?>
                            <span>
                            <?php echo $publisher_details['name'];?>
                            </span>
                        </p>
                        

                    <?php
                    endif;
                ?>
                
                <p class="info"><?php echo get_phrase('published_date') ?> : <span><?php echo  date('D, d-M-Y', $FCP_details['added_date']); ?></span>
                </p>
                <p class="info"><?php echo get_phrase('category_name') ?> : <span><?php echo $category_details['title'] ?></span></p>
            </div>
            
        </div>
        <!-- Modal -->
        <div class="modal fade" id="FCPModal" tabindex="-1" aria-labelledby="FCPModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="FCP-modal d-grid justify-content-center">
                        
                            <div class="w-100 text-center py-5 my-5">
                                <img width="200px" class="" src="<?php echo site_url('assets/global/image/no-preview-available.png'); ?>">
                            </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End FCP Details -->
<!-- start google ads section -->
<?php if (isset($googleAds)): ?>
    <section class="pb-80 pt-80">

    </section>
<?php endif; ?>
<!-- END google ads section -->
<!-- start Enrol section  -->
<section class="pb-80 pt-60 h-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="  h-40 sm:h-60 min-h-16 container  py-20  items-center">
                    <div class="fcp-box">
                        <a class="" onclick="redirectTo('<?php echo base_url(isset($latest_course['enrol_url'])?''.$publisher_details['base_url'].'/'.slugify($latest_course['base_course_name']).'/?couponCode='.$latest_course['FCP_id']:$latest_course['enrol_url']); ?>');">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                            <img loading="lazy" style="color: white" src="<?php echo base_url('assets/frontend/default-new/image/compare.png') ?>">
                            <?php echo get_phrase('Enrol'); ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
            <div class="h-40 sm:h-60 min-h-16 container  py-20  items-center">  
                <div class="fcp-box">                                  
                            <a class=" " style="background-color: #ffc107;color:black; hover:background-color:#ffc;
                              hover:box-shadow: 0 0 5px #ffc107,
                                        0 0 25px #ffc107,
                                        0 0 50px #ffc107,
                                        0 0 100px #ffc107;"  onclick="showAjaxModal('<?php echo site_url('addons/FCP_manager/coupon_FCP_show/'.$latest_course['coupon']); ?>', '<?php echo get_phrase('Coupon_Code'); ?>');">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                                <img loading="lazy" style="color: white" src="<?php echo base_url('assets/frontend/default-new/image/Group 17906.png') ?>">
                                <?php echo get_phrase('coupon_code'); ?>
                         </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Enrol section  -->
<!-- Start FCP Tabs -->
<section class="pb-80">
    <div class="container">
    <ul class="nav nav-tabs sNav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" id="forum-tab" data-bs-toggle="tab" data-bs-target="#forum-tab-pane" type="button" role="tab" aria-controls="forum-tab-pane" aria-selected="true"><?php echo get_phrase('Summary')?></button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="noticeboard-tab" data-bs-toggle="tab" data-bs-target="#noticeboard-tab-pane" type="button" role="tab" aria-controls="noticeboard-tab-pane" aria-selected="false"><?php echo get_phrase('Specification')?></button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="assignment-tab" data-bs-toggle="tab" data-bs-target="#assignment-tab-pane" type="button" role="tab" aria-controls="assignment-tab-pane" aria-selected="false"><?php echo get_phrase('Review')?></button>
        </li>
    </ul>
    <div class="tab-content sTab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="forum-tab-pane" role="tabpanel" aria-labelledby="forum-tab" tabindex="0">
            <div class="FCP-content">
                <h4 class="s_Sidebar_title_one mb-20"><?php echo $FCP_details['title'] ?></h4>
                <p class="info"><?php echo htmlspecialchars_decode($FCP_details['description']) ?></p>
            </div>
        </div>
        <div class="tab-pane fade" id="noticeboard-tab-pane" role="tabpanel" aria-labelledby="noticeboard-tab" tabindex="0">
            <div class="FCP-content">
                <table style="width:100%">
                    <tr>
                        <th style="width: 30%"><?php echo get_phrase('Title');?></th>
                        <td style="width:70%"><?php echo $FCP_details['title'] ?></td>
                    </tr>
                    <tr>
                        <th><?php echo get_phrase('Author');?></td>
                        <td colspan="2">
                            <?php echo $instructor_details['first_name']." ".$instructor_details['last_name'] ?>
                        </td>
                    </tr>
                    <?php if($publisher_details != null):?>
                    <tr>
                        <th><?php echo get_phrase('Publisher');?></td>
                        <td><?php echo $publisher_details['name'] ?></td>
                    </tr>
                    <tr>
                        <th><?php echo get_phrase('bade_url');?></td>
                        <td><?php echo $publisher_details['bade_url'] ?></td>
                    </tr>
                    <?php endif;?>
                    <?php if($course_details != null):?>
                    <tr>
                        <th><?php echo get_phrase('language');?></td>
                        <td><?php echo $course_details['language'] ?></td>
                    </tr>
                    <tr>
                        <th><?php echo get_phrase('level');?></td>
                        <td><?php echo $course_details['level'] ?></td>
                    </tr>
                    <tr>
                        <th><?php echo get_phrase('course_type');?></td>
                        <td><?php echo $course_details['course_type'] ?></td>
                    </tr>
                    <?php endif;?>
                    
                    
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="assignment-tab-pane" role="tabpanel" aria-labelledby="assignment-tab" tabindex="0">
        <div class="FCP-content">
            <?php if($user_id > 0):?>
        <h4 class="s_Sidebar_title_one mb-20"><?php echo get_phrase('Write a Review') ?></h4>
            <div class="row">
                <div class="col-sm-6">
                    <form action="<?php echo site_url('addons/FCP/FCP_rating/'.$FCP_details['FCP_id'].'/save_rating'); ?>" method="post">
                        <input type="hidden" name="course_id" value="">
                        <select class="form-control mb-3" name="rating">
                            <option value="1"><?php echo get_phrase('1 Start Rating') ?></option>
                            <option value="2"><?php echo get_phrase('2 Start Rating') ?></option>
                            <option value="3"><?php echo get_phrase('3 Start Rating') ?></option>
                            <option value="4"><?php echo get_phrase('4 Start Rating') ?></option>
                            <option value="5"><?php echo get_phrase('5 Start Rating') ?></option>
                        </select>
                        
                        <div class="msg mt-3">
                            <button type="submit" class="btn btn-primary"><?php echo get_phrase('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif;?>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- End FCP Tabs -->

<!-- Start Related FCP -->
<section class="pb-80">
    <div class="container">
    <h4 class="s_title_one pb-50"><?php echo get_phrase('Other Related FCPs')?></h4>
    <div class="row rg-24">
        <?php $this->db->limit(4);
        $other_related_FCPs = $this->FCP_model->get_FCPs($FCP_details['category_id'])->result_array();
        foreach ($other_related_FCPs as $other_related_FCP) : ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="FCP-item-one">
                <div class="img"><img src="<?php echo base_url('uploads/FCP/thumbnails/'.$other_related_FCP['thumbnail'])?>" alt="" width="100%"/></div>
                <div class="content">
                <h4 class="title"><?php echo $other_related_FCP['title'] ?></h4>
                <a href="<?php echo site_url('FCP/FCP_details/'.rawurlencode(slugify($other_related_FCP['title'])).'/'.$other_related_FCP['FCP_id']) ?>" class="link"><?php echo get_phrase('View Details')?></a>
                </div>
                <div class="status free">
                    <p>
                        <?php if($other_related_FCP['is_free'] == 1){
                            echo get_phrase('Free');
                        }else{
                            echo currency($other_related_FCP['price']);
                        }?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach?>
    </div>
    </div>
</section>
<!-- End Related FCP -->



<script>
    function handleCartItems(elem) {
        url1 = '<?php echo site_url('home/handleCartItems'); ?>';
        url2 = '<?php echo site_url('home/refreshWishList'); ?>';
        $.ajax({
            url: url1,
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function(response) {
                $('#cart_items').html(response);
                if ($(elem).hasClass('active')) {
                    $(elem).removeClass('active')
                    $(elem).text("<?php echo site_phrase('add_to_cart'); ?>");
                } else {
                    $(elem).addClass('active');
                    $(elem).addClass('active');
                    $(elem).text("<?php echo site_phrase('added_to_cart'); ?>");
                }
                $.ajax({
                    url: url2,
                    type: 'POST',
                    success: function(response) {
                        $('#wishlist_items').html(response);
                    }
                });
            }
        });
    }

    function handleBuyNow(elem) {

        url1 = '<?php echo site_url('home/handleCartItemForBuyNowButton'); ?>';
        url2 = '<?php echo site_url('home/refreshWishList'); ?>';
        urlToRedirect = '<?php echo site_url('home/shopping_cart'); ?>';
        var explodedArray = elem.id.split("_");
        var course_id = explodedArray[1];

        $.ajax({
            url: url1,
            type: 'POST',
            data: {
                course_id: course_id
            },
            success: function(response) {
                $('#cart_items').html(response);
                $.ajax({
                    url: url2,
                    type: 'POST',
                    success: function(response) {
                        $('#wishlist_items').html(response);
                        toastr.success('<?php echo site_phrase('please_wait') . '....'; ?>');
                        setTimeout(
                            function() {
                                window.location.replace(urlToRedirect);
                            }, 1000);
                    }
                });
            }
        });
    }

    function handleEnrolledButton() {
        $.ajax({
            url: '<?php echo site_url('home/isLoggedIn?url_history='.base64_encode(current_url())); ?>',
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }
            }
        });
    }

    function handleAddToWishlist(elem) {
        $.ajax({
            url: '<?php echo site_url('home/isLoggedIn?url_history='.base64_encode(current_url())); ?>',
            success: function(response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                } else {
                    $.ajax({
                        url: '<?php echo site_url('home/handleWishList'); ?>',
                        type: 'POST',
                        data: {
                            course_id: elem.id
                        },
                        success: function(response) {
                            if ($(elem).hasClass('active')) {
                                $(elem).removeClass('active');
                                $(elem).text("<?php echo site_phrase('add_to_wishlist'); ?>");
                            } else {
                                $(elem).addClass('active');
                                $(elem).text("<?php echo site_phrase('added_to_wishlist'); ?>");
                            }
                            $('#wishlist_items').html(response);
                        }
                    });
                }
            }
        });
    }

    function pausePreview() {
        player.pause();
    }

    $('.course-compare').click(function(e) {
        e.preventDefault()
        var redirect_to = $(this).attr('redirect_to');
        window.location.replace(redirect_to);
    });

    function go_course_playing_page(course_id, lesson_id) {
        var course_playing_url = "<?php echo site_url('home/lesson/'.slugify($FCP_details['title'])); ?>/" + course_id +
            '/' + lesson_id;

        $.ajax({
            url: '<?php echo site_url('home/go_course_playing_page/'); ?>' + course_id,
            type: 'POST',
            success: function(response) {
                if (response == 1) {
                    window.location.replace(course_playing_url);
                }
            }
        });
    }
</script>