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