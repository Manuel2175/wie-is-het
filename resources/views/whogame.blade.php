@include('head')

@if($game->player2Choice_id === null)
    <h1>waiting for players.</h1>
    <script>
        setTimeout(() => location.reload(), 3000);
    </script>
@else
    <h2>player found</h2>
@endif
