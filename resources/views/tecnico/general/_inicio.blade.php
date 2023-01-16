
<h2 class="text-center">Bienvenido</h2>
</br>
<h2 class="mb-10 text-center">¿Listo para comenzar?</h2>

<div class="flex justify-content-between">
    <div class="w-full">
        <div class="flex justify-content-between gap-3">
            <p class="text-xl semibold">Usuario:</p>

            <p class="text-xl semibold">{{Auth::user()->name}}</p>
        </div>

        <br>
        <div class="flex justify-content-between gap-3">
            <p class="text-xl semibold">Fecha:</p>

            <p class="text-xl semibold">{{Date('Y/m/d')}}</p>
        </div>
    </div>
</div>
<div class="flex justify-content-center mt-8" >
    
    <img src="{{asset('images/gnc/greeting-man-svgrepo-com.svg')}}" alt="" style="aspect-radio:1; width:5rem">
</div>

