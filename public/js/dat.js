var ENDPOINT = window.location.href;
console.log(ENDPOINT)
var page = 1;

$(".load-more-data").click(function() {
  page++;
  LoadMore(page);
});

function LoadMore(page) {
  $.ajax({
      url: ENDPOINT + "?page=" + page,
      datatype: "html",
      type: "get",
      beforeSend: function() {
        $('.auto-load').show();
      }
  })
  .done(function(response) {
      console.log(response);
      if (response.html == '') {
          $('.auto-load').hide();
          $('.load-more-data').hide();
      } else {
          $('.auto-load').hide();
          $("#data-wrapper").append("<div class='row'>" + response.html + "</div>");
      }
  });
}