function geoFindMe() {
  const status = document.querySelector("#status");
  // Add selectors for the hidden form inputs
  const latInput = document.querySelector('[name="latitude"]');
 const lonInput = document.querySelector('[name="longitude"]');

  function success(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    // Update the hidden form inputs
    latInput.value = latitude;
    lonInput.value = longitude;

    status.textContent = `Latitude: ${latitude} °, Longitude: ${longitude} °`;
  }

  function error() {
    status.textContent = "Unable to retrieve your location";
  }

  if (!navigator.geolocation) {
    status.textContent = "Geolocation is not supported by your browser";
  } else {
    status.textContent = "Locating…";
    navigator.geolocation.getCurrentPosition(success, error);
  }
}

document.querySelector("#find-me").addEventListener("click", geoFindMe);