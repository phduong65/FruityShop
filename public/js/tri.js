const handleHoverImage = () => {
    const listImage = document.querySelectorAll(".thumnailmini .pic .photo");
    const ImageBig = document.querySelector(".thumnailbig .photo");
    listImage.forEach((e) => {
        e.addEventListener("mouseover", () => {
            let srcImage = e.getAttribute("src");
            ImageBig.setAttribute("src", srcImage);
        });
    });
};
handleHoverImage();


const handelTinyEditor = () => {
    tinymce.init({
        selector: ".block",
        plugins:
            "mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste autocorrect a11ychecker typography inlinecss",
        toolbar:
            "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
        ai_request: (request, respondWith) =>
            respondWith.string(() =>
                Promise.reject("See docs to implement AI Assistant")
            ),
    });
};
handelTinyEditor();
// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseup", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".manager_main");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
};

const questionDelete = (event) => {
    event.preventDefault(); // Prevent the default form submission behavior

    Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to delete this item",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // You can submit the form manually
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            event.target.submit();
        }
    });
};

const handleUpdateImage = (input) => {
    let previewImage = document.querySelector(".photobigsrc");
    let srcroot = previewImage.src;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        // Nếu không chọn hình ảnh, set src về một giá trị mặc định (nếu cần)
        previewImage.src = `${srcroot}`;
    }
};
const handleUpdateImageChild = (input) => {
    const wrapImage = document.querySelector(".wrap_image");
    if (input.files && input.files.length > 0) {
        wrapImage.innerHTML = null;
        for (let i = 0; i < input.files.length; i++) {
            let reader = new FileReader();
            let div = document.createElement("div");
            let img = document.createElement("img");
            div.classList.add("thumnail");
            img.classList.add("photominisrc");
            reader.onload = function (e) {
                img.src = e.target.result;
            };
            reader.readAsDataURL(input.files[i]);
            div.appendChild(img);
            wrapImage.appendChild(div);
        }
    }
};
const handlePrev = (input) => {
    let imgPre = document.querySelector(".postimgpre");
    let srcroot = imgPre.src;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            imgPre.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        // Nếu không chọn hình ảnh, set src về một giá trị mặc định (nếu cần)
        imgPre.src = `${srcroot}`;
    }
};
