  // Validate Error
  let product_name_input = document.getElementById('product_name');
  let product_details_input = document.getElementById('product_details');
  let product_price_input = document.getElementById('product_price');
  let product_image_input = document.getElementById('image');

  // Input Field Remove
  let product_name_span = document.getElementById('product_name_error');
  let product_details_span = document.getElementById('product_details_error');
  let product_price_span = document.getElementById('product_price_error');
  let product_image_span = document.getElementById('product_image_error');

  function validateInput() {
      product_name_input.innerText = '';
      product_details_input.innerText = '';
      product_price_input.innerText = '';
      product_image_input.innerText = '';
  }

  function validateError() {
      product_name_span.innerText = '';
      product_details_span.innerText = '';
      product_price_span.innerText = '';
      product_image_span.innerText = '';
  }

  
let formDataId = document.querySelector('#formData');
window.addEventListener('load', function() {
    formDataId.addEventListener('submit', function(e) {
        e.preventDefault();
        let data = new FormData(formDataId);
        axios({
                method: 'post',
                url: 'store',
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
                    if (key === product_name_input.name) {
                        product_name_span.innerText = value;
                    }
                    if (key === product_details_input.name) {
                        product_details_span.innerText = value;
                    }
                    if (key === product_price_input.name) {
                        product_price_span.innerText = value;
                    }
                    if (key === product_image_input.name) {
                        product_image_span.innerText = value;
                    }

                }
            });
    });
});
