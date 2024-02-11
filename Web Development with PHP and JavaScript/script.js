$(document).ready(function(){

    $('#hideButton').click(function(){
        $('#content').hide();
    });


    $('#showButton').click(function(){
        $('#content').show();
    });


    $('#fadeInButton').click(function(){
        $('#content').fadeIn();
    });

    $('#fadeOutButton').click(function(){
        $('#content').fadeOut();
    });

});

document.addEventListener("DOMContentLoaded",function(){

    const object = document.getElementById("object");
    const scoreDisplay = document.getElementById("score");
    let score = 0;


    object.addEventListener("click",function(){
        score++;
        scoreDisplay.textContent = score;
        moveObject();
    });

    function moveObject() {
        const x = Math.random() * (400 - 50);
        const y = Math.random() * (300 - 50);
        object.style.left = x + "px";
        object.style.top = y + "px";
    }

});


document.addEventListener("DOMContentLoaded",function(){

    const url = 'https://jsonplaceholder.typicode.com/posts';
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const dataContainer = document.getElementById('data-container');

            data.forEach(post => {

                const postElement = document.createElement('div');
                postElement.classList.add('post');
                postElement.innerHTML= `<h2>${post.title}</h2> <p>${post.body}</p>`;
                dataContainer.appendChild(postElement);
            });



        });

});