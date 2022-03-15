let name_input = document.getElementById('name');
let email_input = document.getElementById('email');
let message_input = document.getElementById('message');

const name_span = document.getElementById('name_error');
const email_span = document.getElementById('email_error');
const message_span = document.getElementById('message_error');
let formFeedbackID = document.getElementById('formFeedback');
window.addEventListener('load', function() {
    formFeedbackID.addEventListener('submit', function(e) {
        e.preventDefault();
        let data = new FormData(formFeedbackID);
        axios({
                method: 'post',
                url: Project_Url + '/userside/contact/store',
                data: data,
            })
            .then((res, data) => {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Thank You for Your Feedback!',
                    showConfirmButton: false,
                    timer: 3000
                })
                document.getElementById("name").value = null;
                document.getElementById("email").value = null;
                document.getElementById("message").value = null;
                // $('#message').val('').empty(); //Jquery
            })

            .catch((err) => {
                let errors = err.response.data.errors;
                for (let [key, value] of Object.entries(errors)) {
                    if (key === name_input.name) {
                        name_span.innerText = value;
                    }
                    if (key === email_input.name) {
                        email_span.innerText = value;
                    }
                    if (key === message_input.name) {
                        message_span.innerText = value;
                    }
                }
            });
        name_span.innerText = "";
        email_span.innerText = "";
        message_span.innerText = "";
    })
});