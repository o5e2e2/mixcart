function onSubmit(event)
{
    event.preventDefault();
    let formData = new FormData(event.target);

    // Собираем данные формы в объект
    let obj = {};
    formData.forEach((value, key) => obj[key] = value);

    let request = new Request('publish.php', {
        method: 'POST',
        body: JSON.stringify(obj),
        headers: {
            'Content-Type': 'application/json',
        },
    });

    fetch(request).then(
        function(response) {
            console.log(response);
        },
        function(error) {
            console.error(error);
        }
    );
}

window.onload = function () {
    let form = document.forms[0];
    form && form.addEventListener('submit', onSubmit);
};
