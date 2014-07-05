@foreach ($updates as $update)
    <li>
        <i class='fa {{$update->FA_icon_name}} fa-3x icon'></i>
        <h5 class='date'>{{$update->date_created}}</h5>
        <h4 class='message'>{{$update->message}}</h4>
        <hr>
   </li>
@endforeach