const cityInput = document.querySelector(".city-input");
const searchButton = document.querySelector(".search-btn");
const locationButton = document.querySelector(".location-btn");
const API_KEY = "aeb3211014ab6736d2e287a6a79af95f";
const currentWeatherDiv = document.querySelector(".current-weather");
const weatherCardsDiv = document.querySelector(".weather-cards");

const createWeatheraCard = (cityName, weatherItem, index) => {
    const date = new Date(weatherItem.dt * 1000); // Convert Unix timestamp to milliseconds
    const time = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
    const weatherCondition = weatherItem.weather[0].main;
    const pressureInMillibar = weatherItem.main.pressure;

    let safetyTips = "";
    if (weatherCondition === "Clear") {
        safetyTips = "Clear skies. Enjoy the sunshine!\n";
    } else if (weatherCondition === "Clouds") {
        safetyTips = "Partly cloudy. Bring an umbrella just in case!\n";
    } else if (weatherCondition === "Rain") {
        safetyTips = "Rainy day. Don't forget your raincoat!\n";
    }    

    let dangerAlert = "";
    if (weatherItem.main.temp - 273.15 >= 35) {
        dangerAlert = "Excessive Heat: Severe heat is expected in this area.\n";
    } else if (weatherItem.main.temp - 273.15 < 0) {
        dangerAlert = "Extreme Cold: Extremely low temperatures are expected in this area.\n";
    }

    if (weatherItem.main.humidity >= 80) {
        dangerAlert += "High Humidity: High humidity levels can lead to the formation of severe thunderstorms and heavy rainfall.\n";
    } else if (weatherItem.main.humidity <= 30) {
        dangerAlert += "Low Humidity: Low humidity levels can increase the risk of wildfires.\n";
    }

    if (weatherItem.wind.speed >= 20) {
        dangerAlert += "High Wind Speed: Strong winds can cause significant damage, especially in hurricanes and tornadoes.\n";
    }
    dangerAlert = dangerAlert.trim();
    safetyTips = safetyTips.trim();

    if (index === 0) { 
        return `<div class="current-weather">
            <div class="details">
                <h2>${cityName} (${date.toLocaleDateString()}) ${time}</h2>
                <h5>Current: ${(weatherItem.main.temp - 273.15).toFixed(0)}°C</h5>
                <h5>Feels Like: ${(weatherItem.main.feels_like - 273.15).toFixed(0)}°C</h5> <!-- Display feels like temperature -->
                <h5>Humidity: ${weatherItem.main.humidity}%</h5>
                <h5>Wind Speed: ${weatherItem.wind.speed}M/S</h5>
                <h5>Pressure: ${pressureInMillibar} hPa (${(pressureInMillibar / 1000).toFixed(2)} millibar)</h5> <!-- Display pressure in hPa and millibars -->
                <h5>Safety Tips: ${safetyTips}</h5> <!-- Display safety tips here -->
                <h5 class="danger-alert">${dangerAlert}</h5> <!-- Display danger alert if applicable -->
            </div>
            <div class="icon">
                <img src="https://openweathermap.org/img/wn/${weatherItem.weather[0].icon}@4x.png" alt="weather-icon">
                <h4>${weatherItem.weather[0].description}</h4>
            </div>
        </div>`;
    }
    return ` <li class="card">
        <h3>${date.toLocaleDateString()} ${time}</h3>
        <img src="https://openweathermap.org/img/wn/${weatherItem.weather[0].icon}@2x.png" alt="weather-icon">
        <h5>Feels Like: ${(weatherItem.main.feels_like - 273.15).toFixed(0)}°C</h5> <!-- Display feels like temperature -->
        <h5>Humidity: ${weatherItem.main.humidity}%</h5>
        <h5>Wind Speed: ${weatherItem.wind.speed}M/S</h5>
        <h5>Pressure: ${pressureInMillibar} hPa (${(pressureInMillibar / 1000).toFixed(2)} millibar)</h5> <!-- Display pressure in hPa and millibars -->
        <h5>Safety Tips: ${safetyTips}</h5> <!-- Display safety tips here -->
        <h5 class="danger-alert">${dangerAlert}</h5> <!-- Display danger alert if applicable -->
        </li>`;
};


        

const getWeatherDetails = (cityName, lat, lon) => {
    const WEATHER_API_URL = `http://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${API_KEY}`;
    fetch(WEATHER_API_URL)
        .then(res => res.json())
        .then(data => {
            const uniqueForecastDays = [];
            const fiveDaysForecast = data.list.filter(forecast => {
                const forecastDate = new Date(forecast.dt_txt).getDate();
                if (!uniqueForecastDays.includes(forecastDate)) {
                    uniqueForecastDays.push(forecastDate);
                    return true;
                }
                return false;
            });

            cityInput.value = "";
            weatherCardsDiv.innerHTML = "";
            currentWeatherDiv.innerHTML = "";

            fiveDaysForecast.forEach((weatherItem, index) => {
                if (index === 0) {
                    currentWeatherDiv.insertAdjacentHTML("beforeend", createWeatheraCard(cityName, weatherItem, index));
                } else {
                    weatherCardsDiv.insertAdjacentHTML("beforeend", createWeatheraCard(cityName, weatherItem, index));
                }
            });

        })
        .catch(() => {
            alert("An error occurred while fetching weather forecast");
        });
};

const getCityCoordinates = () => {
    const cityName = cityInput.value.trim();

    if (!cityName) return; //Return if city empty

    //Get city coordinates(latitude,longitude,name) from API
    const GEOCODING_API_URL = `http://api.openweathermap.org/geo/1.0/direct?q=${cityName}&limit=1&appid=${API_KEY}`;
    fetch(GEOCODING_API_URL)
        .then(res => res.json())
        .then(data => {
            if (!data.length) return alert(`No Coordinates found for ${cityName}`);
            const { name, lat, lon } = data[0];
            getWeatherDetails(name, lat, lon);

        })
        .catch(() => {
            alert("An error occurred while fetching the coordinates!");
        });
};

const getUserCoordinates = () => {
    navigator.geolocation.getCurrentPosition(
        position => {
            const { latitude, longitude } = position.coords; //Get coordinates of user location
            const REVERSE_GEOCODING_URL = `http://api.openweathermap.org/geo/1.0/reverse?lat=${latitude}&lon=${longitude}&limit=1&appid=${API_KEY}`;
            //Get city name from coordinates using reverse geocoding api
            fetch(REVERSE_GEOCODING_URL)
                .then(res => res.json())
                .then(data => {
                    const { name } = data[0];
                    getWeatherDetails(name, latitude, longitude);

                })
                .catch(() => {
                    alert("An error occurred while fetching the city coordinates!");
                });
        },
        error => { //Show error if user denied the location permission
            if (error.code === error.PERMISSION_DENIED) {
                alert("Geolocation request denied. Please reset the location to grant access.")
            };
        }
    );
}

searchButton.addEventListener("click", getCityCoordinates);
locationButton.addEventListener("click", getUserCoordinates);

const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("light");
    }else{
        localStorage.setItem("light","set");
    }
}

function isLight(){
    return localStorage.getItem("light");
}

if(isLight()){
    toggleRootClass();
}

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
