/**
 * Created by shakal on 17.12.15.
 */
$(function () {
    $('.questions-accord__item .button, .questions-accord__item > span ').on('click', function () {
        $(this).parent('.questions-accord__item').toggleClass('visible');
        $(this).parent('.questions-accord__item').find('.answer').slideToggle(100);
        $(this).parent('.questions-accord__item').find('.button').toggleClass('open');
        return false
    });
});

function checkWinner(element,id) {
    var enable = 1;
    if ($(element)[0].checked) { //off set 0
        enable = 0;
    }
    $.ajax({
        url: "/admin/winnerset",
        type: "POST",
        data: {id:id, enable:enable},
        dataType: 'json',
        success: function (data) {
            console.log(data.success);
        }
    });

}

function removeOrder(id)
{
    $.ajax({
        url: "/admin/removeorder",
        type: "POST",
        data: {id:id},
        dataType: 'json',
        success: function (data) {
            location.reload();
        }
    });
}