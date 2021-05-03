const commentCounts = document.querySelectorAll(".comment-count");

commentCounts.forEach(function (a) {
    a.addEventListener("click", function (e) {
        e.preventDefault();

        const postId = this.getAttribute("data-postId");
        document.querySelector(".cc-" + postId).style.display = "block";
    });
});
