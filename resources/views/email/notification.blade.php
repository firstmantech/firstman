<a href="{{ route('notifications.edit',$notification->id) }}">Followup the Customer</a>

<br>
{{ $notification->sale_id }}
<br>
Followup Date: {{ $notification->next_follow_date }}
<br>
Followup Time : {{ $notification->next_follow_time }}