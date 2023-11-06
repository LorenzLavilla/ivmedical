document.addEventListener('DOMContentLoaded', function () {
    const insertButton = document.getElementById('insert-button3');

    insertButton.addEventListener('click', function () {
        const smallContent1 = document.getElementById('quant3').textContent;
        const h6Content1 = document.getElementById('price3').textContent;
        const pContent1 = document.getElementById('foodname3').textContent;

        // Send the data to the server using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'riceaddtocart3.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(`quant3=${smallContent1}&price3=${h6Content1}&foodname3=${pContent1}`);
    });
});
