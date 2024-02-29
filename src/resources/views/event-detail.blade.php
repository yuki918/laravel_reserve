@auth
    <x-event-detail-auth :event='$event' :resevablePeople='$resevablePeople' :isReservation='$isReservation' />
@endauth

@guest
    <x-event-detail-guest :event='$event' :resevablePeople='$resevablePeople' :isReservation='$isReservation' />
@endguest