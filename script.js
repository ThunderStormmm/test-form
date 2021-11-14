document.addEventListener("DOMContentLoaded", function(event) {
    const http = '/sendmail.php';
    const form = document.getElementById('consultation-form');
    console.log("DOM fully loaded and parsed");
    const xhr = new XMLHttpRequest();

    form.addEventListener('submit', sendForm);

    async function sendForm(e){
        e.preventDefault();
        let formData = new FormData(form);
        console.log(formData);

        let response = await fetch(http, {
            method: "POST",
            body: formData
        });
        if(response.ok) {
            let result = await response.json();
            console.log(result.message);
            form.reset();
        }

    }
    
  });