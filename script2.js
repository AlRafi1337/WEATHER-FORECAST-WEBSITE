const form = document.querySelector('.header-form');
const locationInput = document.getElementById('location');
const temperatureElement = document.getElementById('temperature');
const humidityElement = document.getElementById('humidity');
const windElement = document.getElementById('wind');
const currentLocationElement = document.querySelector('.header-icon-text');
const forecastContainer = document.querySelector('.weather-forecast');
const body = document.body;

form.addEventListener('submit', function (e) {
	e.preventDefault(); // Prevent form submission
	
	const location = locationInput.value;
	
	
	const apiKey = '22e57013c4953e44e4af92268a024a82';
	const currentWeatherUrl = `https://api.openweathermap.org/data/2.5/weather?q=${location}&appid=${apiKey}`;
	const forecastUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${location}&appid=${apiKey}`;
	
	fetch(currentWeatherUrl)
    .then((response) => response.json())
    .then((data) => {
		const temperatureKelvin = data.main.temp;
		const temperatureCelsius = temperatureKelvin - 273.15;
		const activityRecommendationElement = document.getElementById('activity-recommendation-text');
		
		temperatureElement.textContent = `Temperature: ${temperatureCelsius.toFixed(2)}°C`;
		humidityElement.textContent = `Humidity: ${data.main.humidity}%`;
		windElement.textContent = `Wind: ${data.wind.speed} km/h`;
		currentLocationElement.textContent = `Current Location: ${location}`;
		activityRecommendationElement.textContent = getActivityRecommendation(temperatureCelsius);
		
		// Change background color based on temperature
		if (temperatureCelsius >= 30) {
			body.style.backgroundColor = 'red';
			} else if (temperatureCelsius >= 20) {
			body.style.backgroundColor = 'orange';
			} else if (temperatureCelsius >= 10) {
			body.style.backgroundColor = 'green';
			} else {
			body.style.backgroundColor = 'blue';
		}
	})
    .catch((error) => {
		console.log('Error:', error);
	});
	
	fetch(forecastUrl)
	.then((response) => response.json())
	.then((data) => {
		const forecastItems = forecastContainer.querySelectorAll('.weather-item');
		
		data.list.forEach((forecastItem, index) => {
			const date = new Date(forecastItem.dt_txt);
			const day = date.toLocaleDateString('en-US', { weekday: 'long' });
			const temperatureKelvin = forecastItem.main.temp;
			const temperatureCelsius = Math.round(temperatureKelvin - 273.15); // Convert temperature to Celsius
			
			const article = forecastItems[index];
			const dayHeading = article.querySelector('.weather-forecast-day');
			const temperatureParagraph = article.querySelector('.weather-forecast-temperature');
			
			dayHeading.textContent = day;
			temperatureParagraph.textContent = `${temperatureCelsius}°C`;
		});
	})
    .catch((error) => {
		console.log('Error:', error);
	});
});

// Function to get activity recommendation based on temperature
function getActivityRecommendation(temperature) {
	if (temperature >= 35) {
		return 'It\'s hot! Stay hydrated and avoid prolonged sun exposure.';
		} else if (temperature >=30) {
		return 'It\'s a pleasant day! Enjoy outdoor activities like hiking or cycling.';
		} else if (temperature >= 28) {
		return 'It\'s a bit chilly. You can go for a walk or visit a local cafe.';
		} else {
		return 'It\'s cold. Stay warm indoors and enjoy a good book or movie.';
	}
}

// Helper function to get the correct weather icon URL based on the icon code
function getWeatherIcon(iconCode) {
	return `https://openweathermap.org/img/wn/${iconCode}.png`;
}
