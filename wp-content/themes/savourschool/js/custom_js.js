/* custom_js */

jQuery(document).ready(function() {
    jQuery(function() {
        jQuery('.equalheight').matchHeight({
            byRow: true,
        });
    });

    jQuery(function(){
        jQuery('table.tkt-slctr-tbl tr.tckt-slctr-tkt-details-tr').each(function() {
            var eve_date = jQuery(this).find('.tckt-slctr-tkt-datetimes-sctn .tckt-slctr-tkt-details-tbl tbody td.small-text').html();
            var eve_time = jQuery(this).find('.tckt-slctr-tkt-datetimes-sctn .tckt-slctr-tkt-details-tbl tbody td.small-text.cntr').html();
            var event_datetime = '<h2>'+ eve_date + '</h2><p>' + eve_time + '</p>';
            jQuery(this).prev().find('td.tckt-slctr-tbl-td-name').html(event_datetime);
        });
    });

    jQuery(function(){
        jQuery('#myCarousel').carousel({
            interval: 9000
        });

        // handles the carousel thumbnails
        jQuery('[id^=carousel-selector-]').click( function(){
          var id_selector = jQuery(this).attr("id");
          var id = id_selector.substr(id_selector.length -1);
          id = parseInt(id);
          jQuery('#myCarousel').carousel(id);
          jQuery('[id^=carousel-selector-]').removeClass('selected');
          jQuery(this).addClass('selected');
        });

        // when the carousel slides, auto update
        jQuery('#myCarousel').on('slid.bs.carousel', function (e) {
          var id = jQuery('.item.active').data('slide-number');
          id = parseInt(id);
          jQuery('[id^=carousel-selector-]').removeClass('selected');
          jQuery('[id=carousel-selector-'+id+']').addClass('selected');
        });
    });

    jQuery(function() {
      jQuery('.grid-item .grid-inner .hover-wrapper').hover(function() {
        jQuery(this).parent().addClass('blur');
      }, function() {
        jQuery(this).parent().removeClass('blur');
      });
    });

     jQuery(function() {
      jQuery('#mega-menu-primary li.mega-menu-item-has-children')
      .mouseenter(function() {
        jQuery('#mega-menu-primary').addClass('remove_border');
      })
      .mouseleave(function() {
            setTimeout(function() {
                jQuery('#mega-menu-primary').removeClass('remove_border');
             }, 7000)
      });
    });

    jQuery(".open_form").click(function(){
        jQuery("#register-gform").toggle('slow');
    });

    jQuery( ".event-wrapper li" ).hover(
      function() {
        jQuery( this ).find('.event-inner-wrapper li:nth-child(2) span').css('background-color', 'rgb(254, 28, 114)');
      }, function() {
        jQuery( this ).find('.event-inner-wrapper li:nth-child(2) span').css('background-color', 'rgb(45, 254, 186)');
      }
    );
    jQuery( ".woocs_container" ).hover(
      function() {
        jQuery( this ).find('.woocs_title a').css('color', 'rgb(254, 28, 114)');
      }, function() {
        jQuery( this ).find('.woocs_title a').css('color', '#333');
      }
    );

    jQuery( "#sidebar-home_featured div a" ).hover(
      function() {
        jQuery( this ).find('span').css('background-color', 'rgb(254, 28, 114)');
      }, function() {
        jQuery( this ).find('span').css('background-color', 'rgb(45, 254, 186)');
      }
    );

});
jQuery(document).ready(function() {
    jQuery('.grid').isotope({
      // options...
      itemSelector: '.grid-item',
      masonry: {
        columnWidth: 25,
        gutter: 10,
        /*fitWidth: true*/
      }
    });


    jQuery('#category_list').multiselect({
        buttonText: function(options, select) {
            if (options.length === 0) {
                return 'Category :';
            }
            else if (options.length > 1) {
                return options.length + 'selected';
            }
        }
    });
    /*jQuery('.difficulty-values').multiselect({
        nonSelectedText: 'Level'
    });*/
    /*jQuery('.class-sort-by').multiselect({
        nonSelectedText: 'Sort By'
    });*/

});

jQuery(document).ready(function($) {
    // Category Filteration Query
    jQuery(document).on('change','#category_list',function(){
        var category_val = $(this).val();
        var difficulty_val = $('.difficulty-values').val();
        var sort_val = $('.sort-by').val();
        $("div#custom-loader").addClass('show');
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action:'filter_sort_by',
                category_val : category_val,
                difficulty_val : difficulty_val,
                sort_val : sort_val,

            },
            success:function(response){
                $('#ajax').html(response);
                $("div#custom-loader").removeClass('show');
            }
        });
    });

    jQuery(document).on('change','.difficulty-values',function(){
        var difficulty_val = $(this).val();
        var category_val = $('#category_list').val();
        var sort_val = $('.sort-by').val();

        $("div#custom-loader").addClass('show');
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action:'filter_sort_by',
                category_val : category_val,
                difficulty_val : difficulty_val,
                sort_val : sort_val,
            },
            success:function(response){
                $("div#custom-loader").removeClass('show');
                $('#ajax').html(response);
            }
        });
    });

    jQuery(document).on('change','.sort-by',function(){
        var sort_val = $(this).val();
        var category_val = $('#category_list').val();
        var difficulty_val = $('.difficulty-values').val();
        $("div#custom-loader").addClass('show');
        
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action:'filter_sort_by',
                category_val : category_val,
                difficulty_val : difficulty_val,
                sort_val : sort_val,
            },
            success:function(response){
                $("div#custom-loader").removeClass('show');
                $('#ajax').html(response);
            }
        });
    });

});


/* ==================================== Load more function for class page ==================================== */
jQuery(document).ready(function($) {
    var pageNumber = 1;

    function load_classes(){
        var sort_val = $('.sort-by').val();
        var category_val = $('#category_list').val();
        var level = $('.difficulty-values').val();
        $("div#custom-loader").addClass('show');
        $("#more_classes").hide(); // Disable the button, temp.
        $("#loadmore_classes").hide(); // Disable the button, temp.
        $("#ajax").find("#loadmore_classes").hide();
        $("#ajax").find(".more-article").css("display", "none");

        pageNumber++;
        var str = 'pageNumber=' + pageNumber + '&sort_val=' + sort_val + '&category_val=' + category_val + '&difficulty=' + level + '&action=more_classes_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajaxurl,
            data: str,
            success: function(data){
                $("div#custom-loader").removeClass('show');
                console.log(data);
                var $data = $(data);
                if($data.length){
                    $("#ajax").append($data);
                    $("#more_classes").attr("disabled",false);
                } else{
                    $("#more_classes").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    $("#more_classes").on("click",function(){ // When btn is pressed.
        $("#loadmore_classes").hide(); // Disable the button, temp.
        $("#ajax").find("#loadmore_classes").hide();
        $("#more_classes").hide(); // Disable the button, temp.
        $("#ajax").find(".more-article").css("display", "none");
        load_classes();
    });

    $("#loadmore_classes").live("click", function(){
        $("#ajax").find("#loadmore_classes").hide();
        $("#loadmore_classes").hide(); // Disable the button, temp.
        $("#more_classes").hide(); // Disable the button, temp.
        $("#ajax").find(".more-article").css("display", "none");
        load_classes();
    });
});

/* ============================================================ Load more function for video category ================================================ */

jQuery(document).ready(function($) {

    var ppp = 3; // Post per page
    var cat = $('#more_category_posts').data('category');
    var pageNumber = 1;


    function load_category_posts(){
        $("div#custom-loader").addClass('show');
        pageNumber++;
        var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=category_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajaxurl,
            data: str,
            success: function(data){
                $("div#custom-loader").removeClass('show');
                var $data = $(data);
                if($data.length){
                    $("#ajax-category-post").append($data);
                    $("#more_category_posts").attr("disabled",false);
                } else{
                    $("#more_category_posts").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    $("#more_category_posts").on("click",function(){ // When btn is pressed.
        $("#ajax-category-post").find("#more_category_posts").css("display", "none");
        $("#more_category_posts").hide(); // Disable the button, temp.
        $("#ajax-category-post").find("#more_category_postslist").css("display", "none");
        load_category_posts();
    });

    $("#more_category_postslist").live("click", function(){ // When btn is pressed.
        $("#ajax-category-post").find("#more_category_posts").css("display", "none");
        $("#more_category_posts").hide(); // Disable the button, temp.
        $("#ajax-category-post").find("#more_category_postslist").css("display", "none");
        load_category_posts();
    });

});

/* ============================================================ Load more function for all video ================================================ */

jQuery(document).ready(function($) {

    var ppp = 3; // Post per page
    var pageNumber = 1;

    function load_all_online_posts(){
        $("div#custom-loader").addClass('show');
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=online_classes_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajaxurl,
            data: str,
            success: function(data){
                $("div#custom-loader").removeClass('show');
                var $data = $(data);
                if($data.length){
                    $("#ajax-all-video-post-list").append($data);
                    $("#load_more_online_posts").hide();
                } else{
                    $("#load_more_online_posts").hide();
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    $("#load_more_online_posts").on("click",function(){ // When btn is pressed.
        $("#ajax-all-video-post-list").find("#load_more_online_posts").css("display", "none");
        $("#load_more_all_online_posts").hide(); // Disable the button, temp.
        $("#load_more_all_online_posts").find("#load_more_all_online_posts").css("display", "none");
        load_all_online_posts();
    });

    $("#load_more_all_online_posts").live("click", function(){
        $("#ajax-all-video-post-list").find("#load_more_online_posts").css("display", "none");
        $("#load_more_all_online_posts").hide(); // Disable the button, temp.
        $("#load_more_all_online_posts").find("#load_more_all_online_posts").css("display", "none");
        load_all_online_posts();
    });

});

/* ============================================================ Load more function for Class category page ================================================ */

jQuery(document).ready(function($) {

    var ppp = 10; // Post per page
    var pageNumber = 1;
    var category_name = $('.event_category').data('category');

    function load_all_category_event_posts(){
        $("div#custom-loader").addClass('show');
        pageNumber++;
        var str = '&category_name=' + category_name + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=event_category_page_listing';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajaxurl,
            data: str,
            success: function(data){
                $("div#custom-loader").removeClass('show');
                var $data = $(data);
                if($data.length){
                    $("#event_category_list").append($data);
                    $("#event_category_post_loadmore").hide();
                } else{
                    $("#event_category_post_loadmore").hide();
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

    $("#event_category_post_loadmore").on("click",function(){ // When btn is pressed.
        $("#event_category_list").find("#event_category_post_loadmore").css("display", "none");
        $(".more-event-category-post").hide(); // Disable the button, temp.
        $("#event_category_list").find("#event_category_post_btn").css("display", "none");
        load_all_category_event_posts();
    });

    $("#event_category_post_btn").live("click", function(){
        $("#event_category_list").find("#event_category_post_loadmore").css("display", "none");
        $(".more-event-category-post").hide(); // Disable the button, temp.
        $("#event_category_list").find("#event_category_post_btn").css("display", "none");
        load_all_category_event_posts();
    });

});