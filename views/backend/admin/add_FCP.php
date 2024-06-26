<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('add_new_FCP'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title my-1"><?php echo get_phrase('FCP_adding_form'); ?></h4>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo site_url('addons/FCP_manager/FCP'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm my-1"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_FCP_list'); ?></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <form class="required-form" action="<?php echo site_url('addons/FCP_manager/FCP/add'); ?>"
                            method="post" enctype="multipart/form-data">
                            <div id="basicwizard">

                                <ul class="nav nav-pills nav-justified form-wizard-header">
                                    <li class="nav-item">
                                        <a href="#basic" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-fountain-pen-tip"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('basic'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#Coupon" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-fountain-pen-tip"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('Coupon'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#pricing" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-currency-cny"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('pricing'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#course" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-library-video"></i>
                                            <span
                                                class="d-none d-sm-inline"><?php echo get_phrase('Course'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                        </a>
                                    </li>

                                </ul>

                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane mt-4" id="basic">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10">

                                                <h4 class='mb-3'><?php echo get_phrase('add_a_new_FCP'); ?>
                                                </h4>

                                                <div class="form-group">
                                                    <label for="title"><?php echo get_phrase('title'); ?></label>
                                                    <input type="text" class="form-control" name="title" id="title"
                                                        placeholder="<?php echo get_phrase('enter_FCP_title'); ?>"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        for="category_id"><?php echo get_phrase('category'); ?></label>
                                                    <select class="form-control select2" data-toggle="select2"
                                                        name="category_id" id="category_id" required>
                                                        <option value="">
                                                            <?php echo get_phrase('select_a_category'); ?>
                                                        </option>
                                                        <?php foreach($this->FCP_model->get_FCP_categories()->result_array() as $category): ?>
                                                        <option value="<?php echo $category['category_id']; ?>">
                                                            <?php echo $category['title']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="Publisher_id"><?php echo get_phrase('Publisher'); ?></label>
                                                    <select class="form-control select2" data-toggle="select2"
                                                        name="Publisher_id" id="Publisher_id" required>
                                                        <option value="">
                                                            <?php echo get_phrase('select_a_Publisher'); ?>
                                                        </option>
                                                        <?php foreach($this->FCP_model->get_FCP_Publishers()->result_array() as $Publisher): ?>
                                                        <option value="<?php echo $Publisher['category_id']; ?>">
                                                            <?php echo $Publisher['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="description"><?php echo get_phrase('description'); ?></label>
                                                    <div class="col-md-12">
                                                        <textarea name="description" id="description"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="short_description"><?php echo get_phrase('short_description'); ?></label>
                                                    <div class="col-md-12">
                                                        <textarea name="short_description" id="short_description"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                

                                                <div class="form-group mb-3">
                                                    <label
                                                        for="banner"><?php echo get_phrase('FCP_banner'); ?></label>
                                                    <div class="wrapper-image-preview" style="margin-left: -6px;">
                                                        <div class="box" style="width: 300px;">
                                                            <div class="js--image-preview"
                                                                style="background-image: url('<?php echo base_url('uploads/FCP/banner/placeholder.png') ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;">
                                                            </div>
                                                            <div class="upload-options">
                                                                <label for="banner" class="btn"> <i
                                                                        class="mdi mdi-camera"></i>
                                                                    <?php echo get_phrase('choose_a_banner'); ?>
                                                                    <br> <small>(2000 x 500)</small>
                                                                </label>
                                                                <input id="banner" style="visibility:hidden;"
                                                                    type="file" class="image-upload" name="banner"
                                                                    accept="image/*">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label
                                                        for="thumbnail"><?php echo get_phrase('FCP_thumbnail'); ?></label>
                                                    <div class="wrapper-image-preview" style="margin-left: -6px;">
                                                        <div class="box" style="width: 300px;">
                                                            <div class="js--image-preview"
                                                                style="background-image: url('<?php echo base_url('uploads/FCP/thumbnails/placeholder.png') ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;">
                                                            </div>
                                                            <div class="upload-options">
                                                                <label for="thumbnail" class="btn"> <i
                                                                        class="mdi mdi-camera"></i>
                                                                    <?php echo get_phrase('choose_a_thumbnail'); ?>
                                                                    <br> <small>(800 x 500)</small>
                                                                </label>
                                                                <input id="thumbnail" style="visibility:hidden;"
                                                                    type="file" class="image-upload" name="thumbnail"
                                                                    accept="image/*">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>





                                            </div>
                                        </div>
                                    </div> <!-- end tab pane -->
                                    <div class="tab-pane mt-4" id="Coupon">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10">

                                                <h4 class='mb-3'><?php echo get_phrase('Coupon_Setting'); ?>
                                                </h4>

                                                <div class="form-group">
                                                    <label for="coupon"><?php echo get_phrase('Coupon'); ?></label>
                                                    <input type="text" class="form-control" name="coupon" id="coupon"
                                                        placeholder="<?php echo get_phrase('enter_coupon'); ?>"
                                                        required>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="bade_url"><?php echo get_phrase('bade_url'); ?></label>
                                                    <div class="col-md-12">
                                                        <input name="bade_url" id="bade_url" class="form-control" ></input>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="enrol_url"><?php echo get_phrase('enrol_url'); ?></label>
                                                    <div class="col-md-12">
                                                        <input name="enrol_url" id="enrol_url" class="form-control"></input>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div> <!-- end tab pane -->
                                    <div class="tab-pane mt-4" id="pricing">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <div class="offset-md-2 col-md-10">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="is_free" id="is_free" value="1"
                                                                onclick="togglePriceFields(this.id)">
                                                            <label class="custom-control-label"
                                                                for="is_free"><?php echo get_phrase('check_if_this_is_a_free_FCP'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="paid-course-stuffs">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="price"><?php echo get_phrase('FCP_price').' ('.currency_code_and_symbol().')'; ?></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control" id="price"
                                                                name="price"
                                                                placeholder="<?php echo get_phrase('enter_FCP_price'); ?>"
                                                                min="1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="price"><?php echo get_phrase('course_price').' ('.currency_code_and_symbol().')'; ?></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control" id="course_price"
                                                                name="course_price"
                                                                placeholder="<?php echo get_phrase('enter_course_price'); ?>"
                                                                min="1">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="discount_flag" id="discount_flag" value="1">
                                                                <label class="custom-control-label"
                                                                    for="discount_flag"><?php echo get_phrase('check_if_this_Cource_has_discount'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="discounted_price"><?php echo get_phrase('discounted_price').' ('.currency_code_and_symbol().')'; ?></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control"
                                                                name="discounted_price" id="discounted_price"
                                                                onkeyup="calculateDiscountPercentage(this.value)"
                                                                min="0">
                                                            <small
                                                                class="text-muted"><?php echo get_phrase('this_Course_has'); ?>
                                                                <span id="discounted_percentage"
                                                                    class="text-danger">0%</span>
                                                                <?php echo get_phrase('discount'); ?></small>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end tab-pane -->
                                    <div class="tab-pane mt-4" id="course">
                                        <div class="row justify-content-center">



                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="course_overview_url"><?php echo get_phrase('Search_similar_courses'); ?></label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="search_string" id="search_string" oninput="filterCourses()">
                                                        <p id="error_text" style="color: red; display: none;">No courses found.</p>
                                                    </div>
                                                    <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id" >
                                                        <option value=""><?php echo get_phrase('select_a_course'); ?></option>
                                                        <?php 
                                                        $courses = $this->api_model->courses_by_search_string_get('');
                                                        foreach($courses as $course): 
                                                        ?>
                                                        <option value="<?php echo $course['course_id']; ?>">
                                                            <?php echo $course['title']; ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="base_course_name"><?php echo get_phrase('base_course_name'); ?></label>
                                                    <div class="col-md-12">
                                                        <input name="base_course_name" id="base_course_name" class="form-control" ></input>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label"
                                                        for="course_duration"><?php echo get_phrase('course_duration'); ?></label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="course_duration" id="course_duration" class="form-control" ></input>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <!-- this portion will be generated theme wise from the theme-config.json file Starts-->
                                            <?php //include 'course_media_add.php'; ?>
                                            <!-- this portion will be generated theme wise from the theme-config.json file Ends-->

                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane mt-4" id="finish">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                    <h3 class="mt-0"><?php echo get_phrase("thank_you"); ?> !</h3>

                                                    <p class="w-75 mb-2 mx-auto">
                                                        <?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                                    <div class="mb-3 mt-3">
                                                        <button type="button" class="btn btn-primary text-center"
                                                            onclick="checkRequiredFields()"><?php echo get_phrase('submit'); ?></button>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <ul class="list-inline mb-0 wizard text-center">
                                        <li class="previous list-inline-item">
                                            <a href="javascript::" class="btn btn-info"> <i
                                                    class="mdi mdi-arrow-left-bold"></i> </a>
                                        </li>
                                        <li class="next list-inline-item">
                                            <a href="javascript::" class="btn btn-info"> <i
                                                    class="mdi mdi-arrow-right-bold"></i> </a>
                                        </li>
                                    </ul>



                                </div> <!-- tab-content -->
                            </div> <!-- end #progressbarwizard-->
                        </form>
                    </div>
                </div><!-- end row-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    initSummerNote(['#description']);
});
</script>

<script type="text/javascript">
var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_requirement = jQuery('#blank_requirement_field').html();
jQuery(document).ready(function() {
    jQuery('#blank_outcome_field').hide();
    jQuery('#blank_requirement_field').hide();
});

function appendOutcome() {
    jQuery('#outcomes_area').append(blank_outcome);
}

function removeOutcome(outcomeElem) {
    jQuery(outcomeElem).parent().parent().remove();
}

function appendRequirement() {
    jQuery('#requirement_area').append(blank_requirement);
}

function removeRequirement(requirementElem) {
    jQuery(requirementElem).parent().parent().remove();
}

function priceChecked(elem) {
    if (jQuery('#discountCheckbox').is(':checked')) {

        jQuery('#discountCheckbox').prop("checked", false);
    } else {

        jQuery('#discountCheckbox').prop("checked", true);
    }
}

function topCourseChecked(elem) {
    if (jQuery('#isTopCourseCheckbox').is(':checked')) {

        jQuery('#isTopCourseCheckbox').prop("checked", false);
    } else {

        jQuery('#isTopCourseCheckbox').prop("checked", true);
    }
}

function isFreeCourseChecked(elem) {

    if (jQuery('#' + elem.id).is(':checked')) {
        $('#price').prop('required', false);
    } else {
        $('#price').prop('required', true);
    }
}

function calculateDiscountPercentage(discounted_price) {
    if (discounted_price > 0) {
        var actualPrice = jQuery('#price').val();
        if (actualPrice > 0) {
            var reducedPrice = actualPrice - discounted_price;
            var discountedPercentage = (reducedPrice / actualPrice) * 100;
            if (discountedPercentage > 0) {
                jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + '%');

            } else {
                jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
            }
        }
    }
}
function filterCourses() {
    var searchInput = document.getElementById('search_string').value.toLowerCase();
    var courses = document.querySelectorAll('#course_id option');

    var found = false;
    courses.forEach(function(course) {
        var courseTitle = course.textContent.toLowerCase();
        if (courseTitle.includes(searchInput)) {
            course.style.display = 'block';
            found = true;
        } else {
            course.style.display = 'none';
        }
    });

    var errorText = document.getElementById('error_text');
    if (!found) {
        errorText.style.display = 'block';
    } else {
        errorText.style.display = 'none';
    }
}
</script>

<style media="screen">
body {
    overflow-x: hidden;
}
</style>