function clearForms() {
  var forms = document.getElementsByClassName('clearForms');
  for (var i = 0; i < forms.length; i++) {
    forms[i].reset();
  }
}

$(document).ready(function () {
  var $form = $('form');
  $form.submit(function (event) {
    event.preventDefault();
    $.post($(this).attr('action'), $(this).serialize(), function () {
      window.location.reload();
    });
  });
});
