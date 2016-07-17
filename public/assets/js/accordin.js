jQuery(document).ready(function () {
    jQuery("#jquery-accordion-menu").jqueryAccordionMenu();

});

$(function () {
    //列表项背景颜色切换
    $("#demo-list li").click(function () {
        $("#demo-list li.active").removeClass("active");
        $(this).addClass("active");
    })
});

(function ($) {
    $.expr[":"].Contains = function (a, i, m) {
        return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    };
    function filterList(header, list) {
        //@header 头部元素
        //@list 无序列表
        //创建一个搜素表单
        var form = $("<form>").attr({
            "class": "filterform",
            action: "#"
        }), input = $("<input>").attr({
            "class": "filterinput",
            type: "text"
        });
        $(form).append(input).appendTo(header);
        $(input).change(function () {
            var filter = $(this).val();
            if (filter) {
                $matches = $(list).find("a:Contains(" + filter + ")").parent();
                $("li", list).not($matches).slideUp();
                $matches.slideDown();
            } else {
                $(list).find("li").slideDown();
            }
            return false;
        }).keyup(function () {
            $(this).change();
        });
    }

    $(function () {
        filterList($("#form"), $("#demo-list"));
    });
})(jQuery);