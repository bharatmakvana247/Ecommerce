let category_name_input = document.getElementById('category_name');

let category_span_err = document.getElementById('category_name_error')

// Axios Data Store
let formDataId = document.querySelector('#formData');
window.addEventListener('load', function() {
    formDataId.addEventListener('submit', function(e) {
        e.preventDefault();
        let data = new FormData(formDataId);
        axios({
                method: 'post',
                url: Project_Url + '/userside/category_list',
                data: data,
            })
            .then((res, data) => {
                let div = document.getElementById('divID');
                div.setAttribute('class', "alert alert-info");
                div.innerHTML = 'Record Added Successfully';
                window.location.reload();
                // response.data.errors.clear();
            })
            .catch((err) => {
                // err.response.data.errors.clear();
                let data = err.response.data.errors;

                for (let [key, value] of Object.entries(data)) {
                    // let errorID = document.getElementById(
                    //     `${key}_error`);
                    // console.log(formID);
                    // errorID.innerHTML = value;
                    if (key === category_name_input.name) {
                        category_span_err.innerText = value;
                    }
                }

            });
    });
});
