function displayChangeSearch() {
    $(".search_bar").hide();
    $(".search_ic").click(function () {
        $(".search_bar").show();
    });
    $(".search_hidden").click(function () {
        $(".search_bar").hide();
    });
    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            $(".search_bar").hide();
        }
    });
}
displayChangeSearch();