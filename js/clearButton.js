// Get a reference to the clear button element
const clearButton = document.getElementById('clear-button');

// Add an event listener to the clear button
clearButton.addEventListener('click', function (event) {
  event.preventDefault();
  window.location.reload();
});
