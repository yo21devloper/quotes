<!DOCTYPE html>

<html>

<head>

  <title></title>
<style>

      div {
        width: 27%;
        margin: auto;
        padding: 5%;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        background-color: white;
        box-shadow: 10px 10px 8px #214170;
      }

      h1 {
        font-family: georgia;
      }

      p {
        font-family: arial;
      }

      input {
        background-color: #18C772
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
      }

      input:hover {
        background-color: #aa7922
      }

      img {
        position:absolute;
    	top:64px;
    	margin:auto;
      }

      #subtle {
        color: #b2b2b2;
        font-size: 100%;
      }

      #shoadow{
      	box-shadow: 0 8px 10px 1px rgba(0, 0, 0, 0.14)!important;
      }

    </style>
  </head>
  <body style="padding: 50px 100px;margin:auto;background-color:#E5E6EB!important;width:100% !important;height:100% !important;">
  	<div style="width:80%;background-color: #fff;position: relative;
        top: 50%;transform: translateY(-50%);box-shadow: 10px 10px 8px #214170;border-radius: 3px;">
      <div style="position:relative;background-color: #202A5A !important;width:100% !important;height:80px;text-align: center;">
      <img src="{{URL::asset('assets/logo-mail.png')}}" style="padding-top: 14px;width:100px;height: 50px;margin:auto;" >
      </div>
      <div style="display: block;margin-left: 30px;transform: translateY(-50%);box-shadow: 10px 10px 8px #214170;">
      <h1>Welcome to 100 Degrees!</h1>
      <p>To get started, you need to verify your email address.</p>
      <br>
       <a href="{{$bodymessage}}"> <input type="submit" value="Verify Email" style="background-color: #18C772 !important;border: none !important; border-radius: 5px  !important;color: white !important;padding: 8px 30px !important;text-align: center !important;text-decoration: none !important;display: inline-block !important;font-size: 16px !important;" /></a>
      <br>
      <br>
      <p id="subtle" style="padding-bottom: 30px;">
        Thanks,
        <br>
        <br>
        100 Degrees Team
      </p>
</div>
</div>

</body>

</html>