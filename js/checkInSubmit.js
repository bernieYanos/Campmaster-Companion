document
  .getElementById('modifyForm')
  .addEventListener('submit', function (event) {
    event.preventDefault(); // stop the form from submitting normally
    var form = event.target;
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'modify.php');
    xhr.onload = function () {
      // handle the response from the server
      window.location.href = 'status.php'; // redirect to the new page
    };
    xhr.send(formData); // send the form data to the new page
  });
