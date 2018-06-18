$(document).ready(function () {
    randomColor();
    addInterest();
    deleteInterest();

    function addInterest() {
        $(".add_interest").click(function() {
            $interest_id = $(this).data('title');
            $interest_name = $(this).data('content');

            $interest = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: 'http://localhost/share_and_help/public/user/interest',
                data: {
                    'id': $interest_id,
                    'name': $interest_name
                },
                success: function(data) {
                    $interest.attr('disabled', 'disabled');

                    $('.add_message').html('<b>' + data + '</b> is added to your interests!');
                    $('.add_message').css({
                        'opacity': '1'
                    });
                }
            });

            $(document).ajaxStop(function(){
                setTimeout(function(){// wait for 5 secs(2)
                    window.location.reload(); // then reload the page.(3)
                }, 1500);
            });

        });
    }
    
    function deleteInterest() {
        $(".delete_interest").click(function() {
            $interest_id = $(this).data('title');
            $interest_name = $(this).data('content');

            $interest = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: 'http://localhost/share_and_help/public/user/interest',
                data: {
                    'id': $interest_id,
                    'name': $interest_name
                },
                success: function(data) {
                    $('.add_message').html('<b>' + data + '</b> is succesfully deleted!');
                    $('.add_message').css({
                        'opacity': '1'
                    });
                }
            });

            $(document).ajaxStop(function(){
                setTimeout(function(){// wait for 5 secs(2)
                    window.location.reload(); // then reload the page.(3)
                }, 1500);
            });
        });
    }

    function randomColor() {
        var colors = ['#FF6B6B', '#3685B5', '#E2C044', '#FCAA67', '#B23A48', '#AA7BC3'];
        $('.interest').each(function(i, obj) {
            var random_color = colors[Math.floor(Math.random() * colors.length)];
            $(this).css('background-color', random_color);
        });
    }
});
