//DOM selectors
const wrapper = document.querySelector(".wrapper");
const inputPart = document.querySelector(".input__part");
const infoText = document.querySelector(".info__txt");
const inputField = document.querySelector("input");
const locationBtn = document.querySelector("button");
const weatherPart = document.querySelector(".weather__part");
const weatherIcon = document.querySelector("img");
const arrowBack = document.querySelector("#header i");

//API Key
const apiKey = "742c65c679f9ce7d9651c4ed98293b55";
let api;

//Listens to a keydown event (Enter) if input value has some value
inputField.addEventListener("keydown", (e) => {
  if (e.key == "Enter" && inputField.value != "") {
    requestApi(inputField.value);
  }
});

//Gets current location of a user
locationBtn.addEventListener("click", () => {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(onSuccess, onError);
  } else {
    alert("Your browser doesn't support geolocation API");
  }
});

//Request to API
function requestApi(city) {
  api = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`;
  fetchData();
}

function onSuccess(position) {
  const { latitude, longitude } = position.coords;
  api = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=metric&appid=${apiKey}`;
  fetchData();
}

function onError(error) {
  infoText.innerText = error.message;
  infoText.classList.add("error");
}

//Data fetching from API
function fetchData() {
  infoText.innerText = "Getting weather details...";
  infoText.classList.add("pending");
  fetch(api)
    .then((res) => res.json())
    .then((result) => weatherDetails(result))
    .catch(() => {
      infoTxt.innerText = "Something went wrong";
      infoTxt.classList.replace("pending", "error");
    });
}

//Check for the input value if it's given a valid city name and then it gives details for the weather including dynamic changes via SVG
function weatherDetails(info) {
  if (info.cod == "404") {
    infoText.classList.replace("pending", "error");
    infoText.innerText = `${inputField.value} isn't a valid city name`;
  } else {
    const city = info.name;
    const country = info.sys.country;
    const { description, id } = info.weather[0];
    const { temp, feels_like, humidity } = info.main;

    if (id == 800) {
      weatherIcon.src = "icons/clear.svg";
    } else if (id >= 200 && id <= 232) {
      weatherIcon.src = "icons/storm.svg";
    } else if (id >= 600 && id <= 622) {
      weatherIcon.src = "icons/snow.svg";
    } else if (id >= 701 && id <= 781) {
      weatherIcon.src = "icons/haze.svg";
    } else if (id >= 801 && id <= 804) {
      weatherIcon.src = "icons/cloud.svg";
    } else if ((id >= 500 && id <= 531) || (id >= 300 && id <= 321)) {
      weatherIcon.src = "icons/rain.svg";
    }

    weatherPart.querySelector(".temp .numb").innerText = Math.floor(temp);
    weatherPart.querySelector(".weather").innerText = description;
    weatherPart.querySelector(".location span").innerText = 
    `${city}, ${country}`;
    weatherPart.querySelector(".temp .numb-2").innerText =
      Math.floor(feels_like);
    weatherPart.querySelector(".humidity span").innerText = `${humidity}%`;
    infoText.classList.remove("pending", "error");
    infoText.innerText = "";
    inputField.value = "";
    wrapper.classList.add("active");
  }
}

//Top Arrow to go back at first page of the weather container
arrowBack.addEventListener("click", () => {
  wrapper.classList.remove("active");
});
