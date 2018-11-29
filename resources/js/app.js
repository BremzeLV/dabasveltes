$(function(){
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';


    $( ".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.geocomplete').geocomplete({
        details: '#address-information',
        map: "#address-map",
        mapOptions: {
            zoom: 10
        },
        markerOptions: {
            draggable: true
        },
    });

    $('select').selectpicker();

    $('.geocomplete').trigger("geocode");

    if($('*[data-upload-id="upload-input"]').length) {
        const upload = new FileUploadWithPreview('upload-input')
    }

    $('#notificationsDropdown').click(function(){
        if($(this).parent().find('#notificationsDropdown[aria-expanded="false"]').length) {
            $.ajax({
                type: "GET",
                url: "/user/notificationsSeen",
                success: function (data) {
                    console.log(data);
                    $('.notification-count').hide();
                    if(typeof data !== 'undefined' && data.length){
                        var notifyArray = [];
                        for(var i = 0; i<data.length; i++){
                            var className = '';

                            if(!data[i].is_seen) {
                                className = 'not-seen';
                            }

                            notifyArray.push('<li><a href="/'+data[i].link+'" class="notification-item '+className+'">'+ data[i].text +'</a></li>');
                        }
                        $('.notification-list').html(notifyArray);
                    } else {
                        $('.notification-list').html('<li><span class="notification-item alert alert-default">Nav paziņojumu</span></li>');
                    }
                }

            });
        }
    });

    $('.send-notification').on('click',function(){
        $.ajax({
            type: "POST",
            url: "/subscribe/notify",
            data: {
                id: $(this).data('id')
            },
            success: function (data) {
                alert('Done!');
            }
        });
    });
});