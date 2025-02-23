document.addEventListener("DOMContentLoaded", function () {
    function loadPosts() {
        let cachedPosts = localStorage.getItem("posts");
        if (cachedPosts) {
            displayPosts(JSON.parse(cachedPosts));
        }

        fetch("php/fetch_posts.php")
            .then(response => response.json())
            .then(data => {
                localStorage.setItem("posts", JSON.stringify(data));
                displayPosts(data);
            });
    }

    function displayPosts(data) {
        let postContainer = document.getElementById("postContainer");
        postContainer.innerHTML = "";

        data.forEach(post => {
            let postElement = document.createElement("div");
            postElement.classList.add("post-item");
            postElement.innerHTML = `
                <img src="${post.icon}" alt="${post.title}" loading="lazy">
                <h3>${post.title}</h3>
                <p>${post.desp}</p>
            `;
            postContainer.appendChild(postElement);
        });

        // Lazy load images after posts are added
        let images = document.querySelectorAll("img");
        images.forEach(img => img.setAttribute("loading", "lazy"));
    }

    loadPosts();
});
