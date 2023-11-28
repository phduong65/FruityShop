const handle = (id) => {
    localStorage.setItem("id", id);
};
let id = localStorage.getItem("id");
let nextPageUrl = "";

const catePostList = document.querySelector(".categorypostlist"),
    titleCatePost = document.querySelector("#titlecategorypost"),
    btnload = document.querySelector("#btnloadmore");
const encone = "123123jnjnbj1v3g12c3g123vgmnsadsf98f9sd8f09sd8f09sd8f0s";
const enctwo = "3i192u3j13bnj12b3b398191830183ksdmadmkfnajsnfas98f980a8";

const fetchData = async (id) => {
    const url = `/post/categorypost/${id}`;
    const response = await fetch(url);
    const result = await response.json();

    const html = result.posts.data.map((e) => {
        const url = `${encone}${enctwo}${e.id}`;
        return `
            <div class="item">
                <div class="thumnail">
                    <img src="/uploads/post/${e.photo}" alt="" />
                </div>
                <div class="content">
                    <a href="/posts/${url}" class="name">${e.title}</a>
                    <p class="day">
                        <i class="fa-solid fa-clock"></i><span>${e.created_at}</span>
                    </p>
                </div>
            </div>
        `;
    });
    titleCatePost.innerHTML = result.catename;
    catePostList.innerHTML = html.join("");
    nextPageUrl = result.posts.next_page_url;
    if (nextPageUrl == null) {
        btnload.remove();
    }
};
if (id) {
    fetchData(id);
}

btnload.addEventListener("click", () => {
    loadMore();
});
const loadMore = async () => {
    const response = await fetch(nextPageUrl);
    const result = await response.json();
    const html = result.posts.data.map((e) => {
        return `
            <div class="item">
                <div class="thumnail">
                    <img src="/uploads/post/${e.photo}" alt="" />
                </div>
                <div class="content">
                    <a href="/posts" class="name">${e.title}</a>
                    <p class="day">
                        <i class="fa-solid fa-clock"></i><span>${e.created_at}</span>
                    </p>
                </div>
            </div>
        `;
    });
    catePostList.innerHTML += html.join("");
    nextPageUrl = result.posts.next_page_url;
    if (nextPageUrl == null) {
        btnload.remove();
    }
};
