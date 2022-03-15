let brand_name_input = document.getElementById('brand_name');
let brand_span_err = document.getElementById('brand_name_error')

// Axios Data Store
let formDataId = document.querySelector('#formData');

window.onload = window.addEventListener('load', function() {
    formDataId.addEventListener('submit', function(e) {
        e.preventDefault();
        let data = new FormData(formDataId);
        axios({
                method: 'post',
                url:  Project_Url + '/admin/brand/store',
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
                    if (key === brand_name_input.name) {
                        brand_name_error.innerText = value;
                    }
                }

            });
    });
});
