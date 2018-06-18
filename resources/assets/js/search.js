$(document).ready(function () {
    $('#post_search_interest').on('keyup',function(){

        $value=$(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type : 'GET',
            url : './interests',
            data:{'search':$value},

            success:function(data){
                $html = '';
                data.forEach(function (tag) {
                    $html += "<div class='post_tag_wrapper'><div class='tag_name'>" + tag['name'] + "</div>" +
                    "<div class='add_post_tag' data-title='" + tag['id'] +"' data-content='" +  tag['name']+ "'>" +
                    "<i class='fas fa-plus'></i></div></div>";
                });

                $('.tags_options').html($html);
            }
        });
    });

    $html_tags = '';

    $(".tags_options").on('click', '.add_post_tag', function () {
        $tag_id = $(this).data('title');
        $tag_name = $(this).data('content');

        $html_tags += "<span class='added_tag'>" + $tag_name + "</span>";

        $('<input>').attr({
            type: 'hidden',
            name: 'tags[]',
            value: $tag_id
        }).appendTo('form');

        $('.added_tags').html($html_tags);
    });
});
