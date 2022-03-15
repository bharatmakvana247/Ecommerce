        $(function() {
            $("#btnReplayReview").click(function() {
                $("#dvReplayReview").toggle();
            });
            let formDataId = document.querySelector('#formData');
            window.addEventListener('load', function() {
                formDataId.addEventListener('submit', function(e) {
                    e.preventDefault();
                    let data = new FormData(formDataId);
                    axios({
                            method: 'post',
                            url: Project_Url + 'userside/review',
                            data: data,
                        })
                        .then((res) => {
                            console.log(res.data);
                            var ja = '';
                            if (res.data.status == 'success') {
                                console.log(res.data.review);

                                $('#reviewcheck').append((
                                    `<div class="media mt-30">
                                        <div class="media-left">
                                        <a href="#"><img class="media-object"
                                        src="{{ asset('user/img/author/1.jpg') }}"
                                        alt=""></a>
                                        </div>
                                        <div class=" media-body">
                                        <div class="clearfix">
                                        <div class="name-commenter pull-left">
                                        <h6 class="media-heading"><a
                                        href="#">${res.data.user_name}</a>
                                        </h6>
                                        <p class="mb-10">
                                        ${res.data.created_at}
                                        </p>

                                        </div>
                                        </div>
                                        <p class="mb-0">${res.data.review}</p>
                                        </div>
                                        </div>`
                                ))
                                //     //     // this.user = response.data.user;
                            }
                            // console.log(res);
                        })
                        .catch((err) => {
                            alert(err);
                        });
                });
            });
        });