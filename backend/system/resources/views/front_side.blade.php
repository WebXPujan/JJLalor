<html lang="en">
  <head>
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
        background: pink;
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
      .photo_inner_border.rounded.fade .photo_inner {
        border-radius: 100%;
        box-shadow: inset 0px 10px 20px 40px rgba(255, 255, 255, 0.7);
      }
      .photo_inner_border.rounded.fade .photo_inner {
        background-size: cover;
      }
      .photo_inner_border .photo_inner {
        background: yellow;
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
          <div
            class="photo_inner"
            style="
              background: url('{{$data['photo']}}') no-repeat center
                center;
              background-size: 100% 100%;
            "
          ></div>
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
        {!! App\Models\Cover::getVerse($data['inside_right']) !!}
      </div>
    </div>
  </body>
</html>
