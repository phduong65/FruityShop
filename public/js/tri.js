const handleRenderPost = () => {
    const post = document.querySelector(".news_content-left .news_list");
    const html = Array.from(new Array(6)).map((e) => {
        return `
                <div class="item">
                  <div class="thumnail">
                    <img
                      src="https://traicaykh.vn/uploads/source//anh-web-ngoc/thiet-ke-chua-co-ten-(8).png"
                      alt=""
                    />
                  </div>
                  <div class="content">
                    <a href="" class="name"
                      >Kiwi xanh và lợi ích tuyệt vời của chúng!</a
                    >
                    <p class="day">
                      <i class="fa-solid fa-clock"></i><span>Mon 10, 2023</span>
                    </p>
                  </div>
                </div>
        `;
    });
    post.innerHTML = html.join("");
};
// handleRenderPost();
const handleRenderPostNew = () => {
    const postnew = document.querySelector(".news_content-right .listnews");
    const htmlnew = Array.from(new Array(5)).map((e) => {
        return `
            <div class="item">
                <div class="thumnail">
                <img
                    src="https://traicaykh.vn/uploads/source//anh-web-ngoc/thiet-ke-chua-co-ten-(8).png"
                    alt=""
                />
                </div>
                <div class="content">
                <a href="#" class="name"
                    >Kiwi xanh và lợi ích tuyệt vời của chúng!</a
                >
                <p class="day">
                    <i class="fa-solid fa-clock"></i
                    ><span>Mon 10, 2023</span>
                </p>
                </div>
             </div>
        `;
    });
    postnew.innerHTML = htmlnew.join("");
};
// handleRenderPostNew();
const handleRecent = () => {
    const recentNew = document.querySelector(".recent-news .list");
    const htmlrecent = Array.from(new Array(2)).map((e) => {
        return `
            <div class="item">
                <div class="thumnail">
                <img
                    src="https://traicaykh.vn/uploads/source//anh-web-ngoc/thiet-ke-chua-co-ten-(8).png"
                    alt=""
                />
                </div>
                <div class="content">
                <a href="#" class="name"
                    >Kiwi xanh và lợi ích tuyệt vời của chúng!</a
                >
                <p class="day">
                    <i class="fa-solid fa-clock"></i
                    ><span>Mon 10, 2023</span>
                </p>
                </div>
             </div>
        `;
    });
    recentNew.innerHTML = htmlrecent.join("");
};
// handleRecent();
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

// handleHoverImage();uuu
const handleChangeQuality = () => {
    const multi = document.querySelector(".mul"),
        plus = document.querySelector(".plus"),
        quality = document.querySelector("#quality");
    multi.addEventListener("click", () => {
        if (quality.value > 1) quality.value -= 1;
    });
    plus.addEventListener("click", () => {
        if (quality.value < 100) {
            quality.value = parseInt(quality.value) + 1;
        }
    });
};
// handleChangeQuality();
const handleTab = () => {
    const listTab = document.querySelectorAll(".description_content-tabs .tab"),
        listContent = document.querySelectorAll(
            ".description_content-wrap .box"
        );
    listTab.forEach((e, i) => {
        e.addEventListener("click", () => {
            listTab.forEach((ev) => {
                ev.classList.remove("active");
            });
            e.classList.add("active");
            listContent.forEach((ev) => {
                ev.classList.remove("active");
            });
            listContent[i].classList.add("active");
        });
    });
};
handleTab();
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
function validateInput() {
    let count = 0;
    // input
    const inputNameProduct = document.querySelector(
        'input[name="nameproduct"]'
    );
    const inputPriceProduct = document.querySelector('input[name="price"]');
    const inputQuantityProduct = document.querySelector(
        'input[name="quantity"]'
    );
    const inputDiscountProduct = document.querySelector(
        'input[name="discount"]'
    );
    // err message
    const errorNameProduct = document.getElementById("error-message-name");
    const errorPriceProduct = document.getElementById("error-message-price");
    // const errorPriceNBProduct = document.getElementById(
    //     "error-message-pricenb"
    // );
    const errorQuantityProduct = document.getElementById(
        "error-message-quantity"
    );
    const errorDiscountProduct = document.getElementById(
        "error-message-discount"
    );
    // input value
    const inputNameValue = inputNameProduct.value;
    const inputPriceValue = inputPriceProduct.value;
    const inputQuantityValue = inputQuantityProduct.value;
    const inputDiscountValue = inputDiscountProduct.value;
    // btnsave
    const btnproductsave = document.querySelector("#btnproductsave");

    inputNameValue.length > 255
        ? handleBlock(errorNameProduct, inputNameProduct)
        : (handleNone(errorNameProduct, inputNameProduct), count++);

    inputPriceValue.length > 10
        ? handleBlock(errorPriceProduct, inputPriceProduct)
        : (handleNone(errorPriceProduct, inputPriceProduct), count++);

    inputQuantityValue.length > 10
        ? handleBlock(errorQuantityProduct, inputQuantityProduct)
        : (handleNone(errorQuantityProduct, inputQuantityProduct), count++);

    parseInt(inputDiscountValue, 10) > 100
        ? handleBlock(errorDiscountProduct, inputDiscountProduct)
        : (handleNone(errorDiscountProduct, inputDiscountProduct), count++);

    // /[^0-9]/.test(inputPriceValue)
    //     ? handleBlock(errorPriceNBProduct, inputPriceProduct)
    //     : (handleNone(errorPriceNBProduct, inputPriceProduct), count++);
    count == 4
        ? (btnproductsave.disabled = false)
        : (btnproductsave.disabled = true);
    console.log(count);
}

const handleBlock = (err, inputName) => {
    err.style.display = "block";
    inputName.classList.add("is-invalid");
};
const handleNone = (err, inputName) => {
    err.style.display = "none";
    inputName.classList.remove("is-invalid");
};
