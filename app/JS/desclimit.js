// <![CDATA[
$(function () {
    $(".limitdesc").each(function (i) {
        len = $(this).text().length;
        if (len > 200) {
            $(this).text($(this).text().substr(0, 200) + '...');
        }
    });
});
    // ]]>