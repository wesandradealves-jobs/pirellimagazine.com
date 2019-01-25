$.getJSON('http://gd.geobytes.com/GetCityDetails?callback=?', function(data) {
  console.log(data);
  function getWeatherData(lat, lon) {
      var key = '0f66f51b', 
      weatherDataURL = 'https://api.hgbrasil.com/weather?format=json-cors&key='+ key +'&city_name=' + data.geobytescity + ',' + data.geobytescode
      $.ajax({
        dataType: "json",
        url: weatherDataURL,
        success: function(data) {
          console.log(data.results);
          var current_date = data.results.date,
              current_day = data.results.date.substr(0, 2);
          $('.weather-title > span').html(data.results.city_name);
          $('.weather-title > .weather').html(data.results.description);
          switch(data.results.condition_slug){
            case 'clear_day' :
              var ico = 'wi-day-sunny';
            break;
            case 'cloudly_day':
              var ico = 'wi-day-cloudy';
            break;
            case 'storm':
              var ico = 'wi-day-thunderstorm';
            break;          
          }
          data.results.forecast.forEach(function(forecast) {
            var forecastDate = forecast.date,
                filterForeCastDate = forecast.date.substr(0, 2);
  
                if(filterForeCastDate == current_day)
                {
                  var min = forecast.min,
                      max = forecast.max;
  
                      $('.max > span').html(max),
                      $('.min > span').html(min);
                }
                $('.weekly-weather').append('<li><small class="weekday">'+forecast.weekday+'</small><span class="weekheat"><span>'+forecast.max+'</span> <i class="wi wi-degrees"></i></span></li>');
          });        
          $('.wheather-ico').attr('class', 'wheather-ico wi ' + ico);
          $('.weather-heat > span').html(data.results.temp);
          $('.wind > span').html(data.results.wind_speedy);
          $('.humidity > span').html(data.results.humidity);
        },
        error: function() {
          console.log("error happened");
        }
      });
    }    
    getWeatherData(data.geobyteslatitude, data.geobyteslongitude);
});

  // function getGeoCoord() {
  //   var googleGeoAPIurl = 'https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDSAyYgB2bl7vqRqgyijrdweVbdjcBzF0U';
  //     jQuery.post(googleGeoAPIurl, function(success) {
  //       var crd = success.location;      
  //       console.log(success.location);
  //       getWeatherData(crd.lat, crd.lng);
  //     })
  //     .fail(function(err) {
  //       alert("API Geolocation error! \n\n" + err);
  //     });
  // }

  // getGeoCoord();