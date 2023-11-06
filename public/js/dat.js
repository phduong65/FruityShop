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

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
})
document.getElementById('name').addEventListener('input', function() {
    var inputText = this.value;
    var errorElement = document.getElementById('error');

    if (inputText.length < 4 || inputText.length > 20) {
        errorElement.textContent = 'Độ dài chuỗi không hợp lệ. Phải từ 4 đến 20 ký tự.';
    } else {
        errorElement.textContent = ''; // Xóa thông báo lỗi nếu hợp lệ
    }
});