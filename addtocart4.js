document.addEventListener('DOMContentLoaded', function () {
    const insertButton = document.getElementById('insert-button4');

    insertButton.addEventListener('click', function () {
        const smallContent1 = document.getElementById('quant4').textContent;
        const h6Content1 = document.getElementById('price4').textContent;
        const pContent1 = document.getElementById('foodname4').textContent;

        // Send the data to the server using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'riceaddtocart4.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(`quant4=${smallContent1}&price4=${h6Content1}&foodname4=${pContent1}`);
    });
});
