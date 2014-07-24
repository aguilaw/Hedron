@foreach ($updates as $update)
    <li>
        <i class='fa {{$update->FA_icon_name}} fa-3x icon'></i>
        <p class='date'>{{$update->date_created}}</p>
        <p class='message'>{{$update->message}}</p>
        <hr>
   </li>
@endforeach