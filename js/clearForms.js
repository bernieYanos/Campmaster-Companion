function clearForms() {
  var forms = document.getElementsByClassName('clearForms');
  for (var i = 0; i < forms.length; i++) {
    forms[i].reset();
  }
}

window.addEventListener('beforeunload', function () {
  clearForms();
});

// $(document).ready(function () {
//   var $form = $('form');
//   $form.submit(function (event) {
//     var unit = document.getElementById('unit').value;

//     if (unit === 'notAnOption') {
//       event.preventDefault();
//       alert('Please select a troop.');
//     } else {
//       event.preventDefault();
//       $.post($(this).attr('action'), $(this).serialize(), function () {
//         window.location.href = 'status.php';
//       });
//     }
//   });
// });
