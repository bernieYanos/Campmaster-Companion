// Get a reference to the UnitName select field and the container div
const unitNameSelect = document.getElementById('unitname');
const campsiteContainer = document.getElementById('campsite-container');

// Listen for changes in the UnitName select field
unitNameSelect.addEventListener('change', function () {
  // Clear any existing select fields in the container div
  campsiteContainer.innerHTML = '';

  // Fetch the relevant data from the server using AJAX
  const unitName = this.value;
  const campsite = new XMLHttpRequest();
  campsite.open('GET', '/campmaster/get-campsites.php?unitname=' + unitName);
  campsite.send();

  campsite.onload = function () {
    if (campsite.status === 200) {
      // Parse the JSON data returned from the server
      const campsiteData = JSON.parse(campsite.responseText);

      // Fetch the checkout data from the server using AJAX
      const checkout = new XMLHttpRequest();
      checkout.open('GET', '/campmaster/get-checkout.php');
      checkout.send();

      checkout.onload = function () {
        if (checkout.status === 200) {
          // Parse the JSON data returned from the server
          const checkoutData = JSON.parse(checkout.responseText);

          const checks = new XMLHttpRequest();
          checks.open(
            'GET',
            '/campmaster/get-checkdata.php?unitname=' + unitName
          );
          checks.send();

          checks.onload = function () {
            if (checks.status === 200) {
              // Parse the JSON data returned from the server
              const checksData = JSON.parse(checks.responseText);

              // Generate a new select field for each row in the data
              campsiteData.forEach(function (row, index) {
                const campsite = row.Campsite;
                const optionText = campsite;
                const optionValue = campsite;
                const campsiteLabel = document.createElement('label');
                campsiteLabel.className = 'form-label';
                campsiteLabel.innerHTML = 'Campsite:';
                const campsiteSelect = document.createElement('select');
                campsiteSelect.className = 'form-select form-select-sm';
                campsiteSelect.name = 'campsite' + (index + 1);
                campsiteSelect.id = 'campsite' + (index + 1);
                campsiteSelect.innerHTML =
                  '<option value="notAnOption">Select campsite</option>' +
                  '<option value="' +
                  optionValue +
                  '">' +
                  optionText +
                  '</option>';

                const checkoutLabel = document.createElement('label');
                checkoutLabel.className = 'form-label';
                checkoutLabel.innerHTML = 'Check-Out Time:';
                const checkoutSelect = document.createElement('select');
                checkoutSelect.className = 'form-select form-select-sm';
                checkoutSelect.name = 'checkout' + (index + 1);
                checkoutSelect.id = 'checkout' + (index + 1);
                checkoutSelect.innerHTML =
                  '<option value="notAnOption">Select check-out time</option><option value="same">Keep same time</option>';

                checkoutData.forEach(function (time) {
                  const optionText = time;
                  const optionValue = time;
                  const option = document.createElement('option');
                  option.value = optionValue;
                  option.innerHTML = optionText;
                  checkoutSelect.appendChild(option);
                });

                campsiteContainer.appendChild(campsiteLabel);
                campsiteContainer.appendChild(campsiteSelect);
                campsiteContainer.appendChild(checkoutLabel);
                campsiteContainer.appendChild(checkoutSelect);
              });

              const checkboxData = checksData[0];

              const inventoryCheckbox = document.createElement('input');
              inventoryCheckbox.className = 'form-check-input';
              inventoryCheckbox.type = 'checkbox';
              inventoryCheckbox.id = 'inventory-checkbox';
              inventoryCheckbox.name = 'inventory';
              if (checkboxData.Inventory === '1') {
                inventoryCheckbox.checked = 'checked';
              }

              const scheduleCheckbox = document.createElement('input');
              scheduleCheckbox.className = 'form-check-input';
              scheduleCheckbox.type = 'checkbox';
              scheduleCheckbox.id = 'schedule-checkbox';
              scheduleCheckbox.name = 'schedule';
              scheduleCheckbox.checked = checksData.schedule;
              if (checkboxData.Sched === '1') {
                scheduleCheckbox.checked = 'checked';
              }

              const rosterCheckbox = document.createElement('input');
              rosterCheckbox.className = 'form-check-input';
              rosterCheckbox.type = 'checkbox';
              rosterCheckbox.id = 'roster-checkbox';
              rosterCheckbox.name = 'roster';
              if (checkboxData.Roster === '1') {
                rosterCheckbox.checked = 'checked';
              }

              const paidCheckbox = document.createElement('input');
              paidCheckbox.className = 'form-check-input';
              paidCheckbox.type = 'checkbox';
              paidCheckbox.id = 'paid-checkbox';
              paidCheckbox.name = 'paid';
              if (checkboxData.Paid === '1') {
                paidCheckbox.checked = 'checked';
              }

              // Create the labels for the checkboxes
              const inventoryLabel = document.createElement('label');
              inventoryLabel.className = 'form-check-label';
              inventoryLabel.htmlFor = 'inventory-checkbox';
              inventoryLabel.innerHTML = 'Inventory';

              const scheduleLabel = document.createElement('label');
              scheduleLabel.className = 'form-check-label';
              scheduleLabel.htmlFor = 'schedule-checkbox';
              scheduleLabel.innerHTML = 'Schedule';

              const rosterLabel = document.createElement('label');
              rosterLabel.className = 'form-check-label';
              rosterLabel.htmlFor = 'roster-checkbox';
              rosterLabel.innerHTML = 'Roster';

              const paidLabel = document.createElement('label');
              paidLabel.className = 'form-check-label';
              paidLabel.htmlFor = 'paid-checkbox';
              paidLabel.innerHTML = 'Paid';

              // Create the divs for the checkboxes
              const inventoryDiv = document.createElement('div');
              const inventoryFormDiv = document.createElement('div');
              const inventoryCheckDiv = document.createElement('div');
              const inventoryLabelDiv = document.createElement('div');
              inventoryDiv.className = 'form-check mt-2';
              inventoryFormDiv.className = 'row align-items-center';
              inventoryCheckDiv.className = 'col-auto pe-0';
              inventoryLabelDiv.className = 'col';
              inventoryDiv.appendChild(inventoryFormDiv);
              inventoryFormDiv.appendChild(inventoryCheckDiv);
              inventoryCheckDiv.appendChild(inventoryCheckbox);
              inventoryFormDiv.appendChild(inventoryLabelDiv);
              inventoryLabelDiv.appendChild(inventoryLabel);
              // inventoryDiv.appendChild(inventoryCheckbox);
              // inventoryDiv.appendChild(inventoryLabel);
              for (let i = 0; i < 1; i++) {
                const breakElement = document.createElement('br');
                inventoryDiv.appendChild(breakElement);
              }

              const scheduleDiv = document.createElement('div');
              const scheduleFormDiv = document.createElement('div');
              const scheduleCheckDiv = document.createElement('div');
              const scheduleLabelDiv = document.createElement('div');
              scheduleDiv.className = 'form-check';
              scheduleFormDiv.className = 'row align-items-center';
              scheduleCheckDiv.className = 'col-auto pe-0';
              scheduleLabelDiv.className = 'col';
              scheduleDiv.appendChild(scheduleFormDiv);
              scheduleFormDiv.appendChild(scheduleCheckDiv);
              scheduleCheckDiv.appendChild(scheduleCheckbox);
              scheduleFormDiv.appendChild(scheduleLabelDiv);
              scheduleLabelDiv.appendChild(scheduleLabel);
              // scheduleDiv.className = 'form-check';
              // scheduleDiv.appendChild(scheduleCheckbox);
              // scheduleDiv.appendChild(scheduleLabel);
              for (let i = 0; i < 1; i++) {
                const breakElement = document.createElement('br');
                scheduleDiv.appendChild(breakElement);
              }

              const rosterDiv = document.createElement('div');
              const rosterFormDiv = document.createElement('div');
              const rosterCheckDiv = document.createElement('div');
              const rosterLabelDiv = document.createElement('div');
              rosterDiv.className = 'form-check';
              rosterFormDiv.className = 'row align-items-center';
              rosterCheckDiv.className = 'col-auto pe-0';
              rosterLabelDiv.className = 'col';
              rosterDiv.appendChild(rosterFormDiv);
              rosterFormDiv.appendChild(rosterCheckDiv);
              rosterCheckDiv.appendChild(rosterCheckbox);
              rosterFormDiv.appendChild(rosterLabelDiv);
              rosterLabelDiv.appendChild(rosterLabel);
              // rosterDiv.className = 'form-check';
              // rosterDiv.appendChild(rosterCheckbox);
              // rosterDiv.appendChild(rosterLabel);
              for (let i = 0; i < 1; i++) {
                const breakElement = document.createElement('br');
                rosterDiv.appendChild(breakElement);
              }

              const paidDiv = document.createElement('div');
              const paidFormDiv = document.createElement('div');
              const paidCheckDiv = document.createElement('div');
              const paidLabelDiv = document.createElement('div');
              paidDiv.className = 'form-check';
              paidFormDiv.className = 'row align-items-center';
              paidCheckDiv.className = 'col-auto pe-0';
              paidLabelDiv.className = 'col';
              paidDiv.appendChild(paidFormDiv);
              paidFormDiv.appendChild(paidCheckDiv);
              paidCheckDiv.appendChild(paidCheckbox);
              paidFormDiv.appendChild(paidLabelDiv);
              paidLabelDiv.appendChild(paidLabel);
              // paidDiv.className = 'form-check';
              // paidDiv.appendChild(paidCheckbox);
              // paidDiv.appendChild(paidLabel);
              for (let i = 0; i < 1; i++) {
                const breakElement = document.createElement('br');
                paidDiv.appendChild(breakElement);
              }

              // Append the checkboxes and labels to the container

              campsiteContainer.appendChild(inventoryDiv);
              campsiteContainer.appendChild(scheduleDiv);
              campsiteContainer.appendChild(rosterDiv);
              campsiteContainer.appendChild(paidDiv);
            }
          };
        }
      };
    }
  };
});

// Get a reference to the clear button element
const clearButton = document.getElementById('clear-button');

// Add an event listener to the clear button
clearButton.addEventListener('click', function (event) {
  event.preventDefault();
  window.location.reload();
});

// campsiteContainer.appendChild(checkoutSelectField);

// // Get a reference to the UnitName select field and the container div
// const unitNameSelect = document.getElementById('unitname');
// const campsiteContainer = document.getElementById('campsite-container');

// // Listen for changes in the UnitName select field
// unitNameSelect.addEventListener('change', function () {
//   // Clear any existing campsite options in the container div
//   campsiteContainer.innerHTML = '';

//   // Fetch the relevant data from the server using AJAX
//   const unitName = this.value;
//   const xhr = new XMLHttpRequest();
//   xhr.open('GET', '/campmaster/get-campsites.php?unitname=' + unitName);
//   xhr.onload = function () {
//     if (xhr.status === 200) {
//       // Parse the JSON data returned from the server
//       const data = JSON.parse(xhr.responseText);

//       // Generate an HTML string containing the list of campsites
//       let campsiteOptions =
//         '<label class="form-label" for="campsite">Campsite:</label><ul class="text-white">';
//       data.forEach(function (row) {
//         const campsite = row.Campsite;
//         campsiteOptions += '<li>' + campsite + '</li>';
//       });
//       campsiteOptions += '</ul>';

//       // Print the list of campsites to the container div
//       campsiteContainer.innerHTML = campsiteOptions;
//     }
//   };
//   xhr.send();
// });
