document.addEventListener("DOMContentLoaded", function () {
  const insertAllButton = document.getElementById("insert-all-button");

  insertAllButton.addEventListener("click", function () {
    Swal.fire({
      title: "Are you sure?",
      text: "Your order cannot be canceled afer checking out.",
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Yes",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        
          const rows = document.querySelectorAll("table tr"); // Select all rows including the header
          const data = [];

          for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.cells;
            const name = cells[0].textContent;
            const age = cells[2].textContent;
            const column3 = cells[4].textContent;
            const column4 = cells[5].textContent;
            data.push({ name, age, column3, column4 });
          }

          // Send the data to the server using AJAX
          const xhr = new XMLHttpRequest();
          xhr.open("POST", "insert.php", true);
          xhr.setRequestHeader("Content-Type", "application/json");
          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
              console.log(xhr.responseText);
            }
          };
          xhr.send(JSON.stringify(data));
          Swal.fire({
            icon: 'success',
            title: 'Thank you for Ordering!',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
          window.location.href = 'cart.php';
            }
          });
      } else if (result.isDismissed === Swal.DismissReason.cancel) {
        Swal.fire("Insertion canceled");
      }
    });
  });
});
