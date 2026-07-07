<h2>Notifications</h2>

@foreach($notifications as $note)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <p>{{ $note->data['message'] }}</p>
        <small>Order ID: {{ $note->data['order_id'] }}</small>
    </div>
@endforeach