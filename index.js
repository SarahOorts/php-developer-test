let like = document.querySelector(".like");

like.addEventListener("click", e => {
    let imageId = e.target.dataset.id;
    let data = new FormData();
    data.append("imageId", imageId);

    fetch("ajax/save_like.php", {
        method: "POST",
        body: data,
    }).then(response => response.json())
    .then(res => {
        console.log("Success: ", res);
        if(res.status === "success"){
            let span = res.totallikes;
            document.querySelector(".likes__counter").innerHTML += span;
        }
    }).catch((error) =>{
        console.error("Error: ", error);
    });

    e.preventDefault();
})