<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIiJ5ePXkiOXNbiSK2phLK-saH0HPMeoc">
  </script>

  <style media="screen">
    body {
      font-family: "微軟正黑體";
      color: #666;
    }

    .sos {
      display: table-cell;

      border: 2px solid #ccc;
      height: 40vh;
      width: 100vw;
      margin: auto;
      background-color: rgb(71,71,71);
      font-size: 70px;
      text-align: center;
      vertical-align: middle;
      cursor: pointer;
    }
    a{
      color:white;
    }

    #inner {
      display: inline;
    }

    .soscontent {
      margin: auto;
      /*margin-bottom: 15px;*/
      background-color: #ddd;

      text-align: center;
    }

    .table {
      margin: auto;
      padding: 10px;
      background-color: #ddd;
      border-radius: 10px;
    }



    .formstyle {
      width: 200px;
      border-radius: 5px;
    }

    .test {
      color: red;
    }

    tr {
      padding: 10px;
      margin: 20px;
    }
  </style>
  <!-- <script src="mabo.js" charset="utf-8"></script> -->
  <title>Document</title>
</head>

<body>

  <div class="sos">
    <div id="inner">
      <!-- <a href="sms:+886988007513?body=text">發送SOS簡訊</a><br> -->
      <!-- <script type="text/javascript">
      var phonenumber = '+886123456789';
      var contenttext = 'sdfffasdfsdf';
        document.write('<a href="sms:'+phonenumber+'?body='+contenttext+'">發送SOS簡訊</a><br>'); -->
      <!-- </script> -->
    </div>
  </div>
  <form class="soscontentform" action="cookie.php" method="post">

    <div class="soscontent">
      <table class="table">
        <tr>
          <th>SMS Content</th>
          <td>
            <input type="text" class="formstyle" id="inputx" onkeyup="functionx()" name="currentStatus"<?php if (!isset($_COOKIE["currentStatus"])) {
                echo 'placeholder="SOS  !!!"' ;
            } else {
                echo 'value="', $_COOKIE["currentStatus"],'"' ;
            }
            ?>>
          </td>
        </tr>
        <tr>
          <th>收件人手機號碼</th>
          <td>
            <input type="tel" class="formstyle" id="inputy" onkeyup="functiony()" name="mailto"  <?php if (!isset($_COOKIE["mailto"])) {
                echo 'placeholder="+886988007513"' ;
            } else {
                echo 'value="', $_COOKIE["mailto"],'"' ;
            }
            ?>>
          </td>
        </tr>
        <tr>
          <th>Position</th>
          <td id="position"></td>
        </tr>
        <tr>
          <th>Time</th>
          <td>
            <script>
              document.write(Date());
            </script>
          </td>
        </tr>
        <tr>
          <th>將聯絡資訊<br>記錄在cookie</th>
          <td>
            <input type="submit" value="Memo in cookie">
          </td>
        </tr>
      </table>
    </div>

  </form>

  <div id="myMap" style="width:100vw;height:70vh;"></div>


  <div>
    this is designed for Android phone ^^ !! 
  </div>


  <script type="text/javascript">
  var phonenumber ;
  var contenttext ;
  var lati ;
  var longi ;
  var accu;



      // window.alert(phonenumber);

    // document.write('<a href="sms:'+phonenumber+'?body='+contenttext+'">發送SOS簡訊</a><br>');

  // function functionz(){
  //
  //   write123.innerHTML='<a href="sms:'+phonenumber+'?body='+contenttext+'">發送SOS簡訊</a><br>';
  // }

  function doFirst() {
  	navigator.geolocation.getCurrentPosition(succCallback,errorCallback);
  }
  function succCallback(e) {
    	 lati = e.coords.latitude;
  	 longi = e.coords.longitude;
  	 accu = e.coords.accuracy;


  	document.getElementById('position').innerHTML = '緯度: '+lati+'<br>經度: '+longi+'<br>  準確度: '+accu+'公尺';
    var write123 = document.getElementById("inner");
    write123.innerHTML='<a href="sms:'+phonenumber+'?body='+contenttext+''+'緯度: '+lati+'經度: '+longi+'準確度: '+accu+'公尺'+'">發送SOS簡訊</a><br>';

  	var area = document.getElementById('myMap');
  	var myPosition = new google.maps.LatLng(lati, longi);

  	var options = {
  		zoom: 14,
  		center: myPosition,
  		mapTypeId: google.maps.MapTypeId.ROADMAP
  	};

  	var map = new google.maps.Map(area,options);

  	var marker = new google.maps.Marker({
  		position: myPosition,
  		map: map,
  		// icon: '../../images/number/dgtp.gif',
  		title: 'SOS I am here'
  	});

  }//end of succCallback
  function errorCallback(e){
  	// document.getElementById('position').innerHTML = '錯誤碼: '+e.code+'<br>錯誤訊息: '+e.message;
  	alert('錯誤碼: '+e.code+'\n錯誤訊息: '+e.message);
  }

    var write123 = document.getElementById("inner");
    write123.innerHTML='<a href="sms:'+phonenumber+'?body='+contenttext+''+'緯度: '+lati+'經度: '+longi+'準確度: '+accu+'公尺'+'">發送SOS簡訊</a><br>';

  function functionx(){
      contenttext = document.getElementById("inputx").value;
      write123.innerHTML='<a href="sms:'+phonenumber+'?body='+contenttext+''+'緯度: '+lati+'經度: '+longi+'準確度: '+accu+'公尺'+'">發送SOS簡訊</a><br>';
      }
  function functiony(){
      phonenumber = document.getElementById("inputy").value;

        write123.innerHTML='<a href="sms:'+phonenumber+'?body='+contenttext+''+'緯度: '+lati+'經度: '+longi+'準確度: '+accu+'公尺'+'">發送SOS簡訊</a><br>';

      }



  window.addEventListener('load',doFirst,false);
  </script>

</body>

</html>
