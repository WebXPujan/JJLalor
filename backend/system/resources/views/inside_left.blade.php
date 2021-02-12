<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Static Template</title>
    <style type="text/css">
      p {
        font-size: 24px;
        line-height: 7px;
      }
      p.has_wings::before,
      p.has_wings::after {
        content: "-";
        font-size: 30px;
        padding: 10px;
      }
      .wrapper {
        background: pink;
        width: 650px;
        height: 900px;
        padding: 50px;
      }
      .photo {
        height: 450px;
        width: 650px;
        background: red;
        text-align: center;
      }
      .photo_inner_border {
        width: 400px;
        height: 450px;
        background: #fff;
        margin: auto auto;
      }
      .photo_inner_border.rounded_bordered {
        border: 10px solid #d1c28a;
        padding: 5px;
        border-radius: 10px;
        height: 420px;
        width: 350px;
      }
      .photo_inner_border.rounded_bordered .photo_inner {
        border-radius: 10px;
        overflow: hidden;
      }
      .photo_inner_border.rounded .photo_inner {
        border-radius: 100%;
        overflow: hidden;
      }
      .photo_inner_border .photo_inner {
        background: yellow;
        height: 100%;
      }
      .photo_inner_border .photo_inner img {
        width: 100%;
        height: 100%;
      }
      .title {
        text-align: center;
        padding-top: 10px;
      }
      .title h2 {
        text-transform: uppercase;
        font-size: 42px;
        line-height: 12px;
      }
      .details,
      .verse {
        text-align: center;
      }
      .verse p {
        line-height: 20px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="photo">
        <div class="photo_inner_border {{$data['border']}}">
          <div class="photo_inner">
            <img src="{{$data['photo']}}" />
          </div>
        </div>
      </div>
      <div class="title">
        <h2 class="title">In Loving Memory</h2>
        <p class="has_wings">Of</p>
      </div>
      <div class="details">
        <p class="large">{{$data['name']}}</p>
        <p>{{$data['address']}}</p>
        <p>Who died</p>
        <p>on the <span>{{$data['dod']}}</span></p>
        <p>Aged {{$data['age']}} Years</p>
        <p>R.I.P.</p>
      </div>
      <div class="verse">
        {!! App\Models\Cover::getVerse($data['inside_left']) !!}
        
      </div>
    </div>
  </body>
</html>