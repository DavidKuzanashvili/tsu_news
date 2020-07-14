import $ from 'jquery';
import * as toastr from 'toastr';

const initSubscription = () => {
    $(".notify-btn").click(function () {
        $(".notify-btn").addClass("active");
        $("input").addClass("active");
        $(".submit-btn").addClass("active");
    });

    $(".submit-btn").click(function () {
        $(this).removeClass("active");
        $("input").removeClass("active");
        $(".thanku-btn").addClass("active");
        toastr.success('U have successfully subscribed TSU news');
    });
};

export default initSubscription;