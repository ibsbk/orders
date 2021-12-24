document.addEventListener('DOMContentLoaded', function () {

    let addPost = document.getElementById('addpost');
    let content_wrap = document.getElementById('content_wrap');
    let dialog = document.getElementById('dialog');
    let title = document.querySelector('.form-title'),
        text = document.querySelector('.form-text'),
        photo = document.querySelector('.form-photo')

    addPost.addEventListener('click', function () {

        content_wrap.style.display = 'none';
        dialog.style.display = 'flex';

        let accept_post = document.getElementById('accept_post');
        accept_post.addEventListener('click', async function () {
            console.log(title, text, photo)

            let fetchData = {
                method: 'POST',
            }

            let formData = new FormData()
            formData.append('header', title.value)
            formData.append('body', text.value)
            formData.append('image', photo.files[0])
            formData.append('user', 1)

            fetchData['body'] = formData

            let response = await fetch('http://rkidfsj-m1.wsr.ru/api/addPost', fetchData);
            let resJson = await response.json()
            console.log(resJson)

            if (true) {
                content_wrap.style.display = 'block';
                dialog.style.display = 'none';
                let response = await fetch('/getPosts');
                let request = await response.json();
                console.log(request);
                response = null;
                content_wrap.innerHTML = '';
                for (let i in request) {
                    console.log(request[i].header);
                    content_wrap.innerHTML += '<div class="post"><div class="header">' + request[i].header + '</div>' +
                        '<div class="body">' + request[i].body + '</div><div class="body"><i>' + request[i].status + '</i></div>' +
                        '<div class="image"><img class="img" src="../../storage/app/public/' + request[i].image + '"></div>' +
                        '<div class="actions"><div>' +
                        '<a href="deletePost/' + request[i].id + '">удалить</a>' +
                        '</div' +
                        '></div>' +
                        '</div>';
                }
                request = null;
            }
        });

        let cancel_post = document.getElementById('cancel_post');
        cancel_post.addEventListener('click', function () {
            response = null;
            request = null;
            content_wrap.style.display = 'block';
            dialog.style.display = 'none';
        });
    });
})

