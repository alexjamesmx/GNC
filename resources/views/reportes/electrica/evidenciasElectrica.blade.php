<div class="evidencias">

    <h2>Evidencias</h2>

    @foreach ($data as $item)

    @if ($item->img1)
    <p>Evidencia 1:</p>
    <img src="http://31.220.57.169/images/hacker.jpg" alt="" style="width: 400px; height: 225px;">
    <p>{{ asset('images/reportes/electrica/'.$item->img1) }}</p>
    @endif

    @if ($item->img2)
    <p>Evidencia 2:</p>
    <img src="http://31.220.57.169/images/hacker.jpg" alt="" style="width: 400px; height: 225px;">
    <p>{{ asset('images/reportes/electrica/'.$item->img2) }}</p>
    @endif

    @if ($item->img3)
    <p>Evidencia 3:</p>
    <img src="http://31.220.57.169/images/hacker.jpg" alt="" style="width: 400px; height: 225px;">
    <p>{{ asset('images/reportes/electrica/'.$item->img3) }}</p>
    @endif

    @if ($item->img4)
    <p>Evidencia 4:</p>
    <img src="http://31.220.57.169/images/hacker.jpg" alt="" style="width: 400px; height: 225px;">
    <p>{{ asset('images/reportes/electrica/'.$item->img4) }}</p>
    @endif

    @if ($item->img5)
    <p>Evidencia 5:</p>
    <img src="http://31.220.57.169/images/hacker.jpg" alt="" style="width: 400px; height: 225px;">
    <p>{{ asset('images/reportes/electrica/'.$item->img5) }}</p>
    @endif

    @if ($item->img6)
    <p>Evidencia 6:</p>
    <img src="http://31.220.57.169/images/hacker.jpg" alt="" style="width: 400px; height: 225px;">
    <p>{{ asset('images/reportes/electrica/'.$item->img6) }}</p>
    @endif

    @endforeach

</div>