<!DOCTYPE html>
<html>
    <body>

        @foreach ($list as $ques)
        <h2>{{$ques->questions}}</h2>

        <ul style="list-style-type: none;">
            @foreach ($ques->answers as $ans)

            <li>

                <input type="radio" name="answer" id="answer" value="{{$ans->id}}" style="width:auto;margin-left:10px;" @if($ans->status==1) checked @endif >
                       {{$ans->answers}}

            </li>

            @endforeach

        </ul>  
        @endforeach
    </body>
</html>
