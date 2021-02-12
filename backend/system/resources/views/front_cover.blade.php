<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, init ial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Static Template</title>
  </head><body>
      <div data-html2canvas-ignore="true" id="query_id">{{$dd->id}}</div>
    <table border="1"
      width="750px"
      height="1000px"
      style="text-align: center; background: chocolate;"
    >
    <?php
        $image = base64_encode(file_get_contents('uploads/cover/full/'.$dd->front_cover));
    ?>
      <tr style="text-align: center;">
        <td style="width: 100%; height: 100%;">
            @if($dd->front_cover) 
                <img src="data:image/png;base64,{{$image}}" style="height:100%; width:100%" alt="">
            @endif
        </td>
      </tr>
    </table>
  </body></html>
