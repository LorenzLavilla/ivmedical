document.addEventListener('DOMContentLoaded', function () {
    const insertButton = document.getElementById('insert-button2');

    insertButton.addEventListener('click', function () {
        const smallContent1 = document.getElementById('quant2').textContent;
        const h6Content1 = document.getElementById('price2').textContent;
        const pContent1 = document.getElementById('foodname2').textContent;

        // Send the data to the server using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'riceaddtocart2.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(`quant2=${smallContent1}&price2=${h6Content1}&foodname2=${pContent1}`);
    });
});
