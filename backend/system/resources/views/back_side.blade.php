<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Page Title</title>
</head>
<body>
  <div class="photo">
    <div class="photo_inner_border {{$data['border']}}">
      <div
        class="photo_inner"
        style="
          background: url('{{asset('uploads/cover/full/'.$data['front_cover'])}}') no-repeat center
            center;
          background-size: 100% 100%;
        "
      ></div>
    </div>
  </div> <div class="photo">
    <div class="photo_inner_border {{$data['border']}}">
      <div
        class="photo_inner"
        style="background: url('{{asset('uploads/cover/full/'.$data['back_cover'])}}') no-repeat center center; background-size: 100% 100%;"
      ></div>
    </div>
  </div>>
</body>
</html>