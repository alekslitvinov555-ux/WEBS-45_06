@extends('layouts.app', ['title' => 'Delivery Calculator'])

@section('content')

<div class="max-w-[1500px] mx-auto px-6 py-20">

    <h1 class="text-6xl md:text-7xl font-black tracking-tight mb-16 select-none">
        DELIVERY_<span class="text-brand">CALCULATOR</span>
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">


        {{-- LEFT SIDE (Image + Info) --}}
        <div>

            {{-- Select Vehicle --}}
            <label class="block text-xs font-mono uppercase tracking-widest mb-3 text-zinc-500">
                Select Vehicle
            </label>

            <select id="vehicle" 
                    class="w-full p-3 mb-6 bg-zinc-950 border border-zinc-800 rounded-xl text-white">
                @foreach($products as $p)
                    <option value="{{ $p->id }}" 
                        data-image="{{ asset('storage/'.$p->image) }}"
                        data-price="{{ $p->price }}"
                        data-make="{{ $p->make }}"
                        data-model="{{ $p->model }}">
                        {{ $p->make }} {{ $p->model }} — ${{ number_format($p->price,0,'.',' ') }}
                    </option>
                @endforeach
            </select>

            {{-- VEHICLE IMAGE --}}
            <img id="carImage"
                 src="{{ asset('storage/'.$product->image) }}"
                 class="w-full h-[450px] object-cover rounded-2xl border border-zinc-800 shadow-xl">

            {{-- TITLE --}}
            <div class="mt-6">
                <h2 id="carTitle" class="text-4xl font-black">
                    {{ $product->make }} {{ $product->model }}
                </h2>

                <p class="text-lg text-zinc-400 font-light mt-2">
                    Base price:
                    <span id="basePrice" class="text-white font-bold">
                        ${{ number_format($product->price,0,'.',' ') }}
                    </span>
                </p>
            </div>
        </div>


        {{-- RIGHT SIDE CALCULATOR --}}
        <div class="bg-zinc-900/60 border border-zinc-800 rounded-2xl p-10">

            <h3 class="text-xl font-black mb-10">
                Choose_<span class="text-brand">Options</span>
            </h3>

            <form id="calcForm" class="space-y-10">

                {{-- PORT --}}
                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest mb-2 text-zinc-500">
                        Port of departure
                    </label>
                    <select id="port"
                            class="w-full p-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white">
                        @foreach($ports as $key => $p)
                            <option value="{{ $key }}">{{ $p['label'] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- BODY TYPE --}}
                <div>
                    <label class="block text-xs font-mono uppercase tracking-widest mb-2 text-zinc-500">
                        Body Type
                    </label>
                    <select id="body"
                            class="w-full p-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white">
                        @foreach($bodyTypes as $key => $b)
                            <option value="{{ $key }}">{{ $b['label'] }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- RESULT BOX --}}
                <div class="bg-black/30 border border-zinc-800 p-8 rounded-xl space-y-4">

                    <p class="text-xs font-mono uppercase tracking-widest text-zinc-500">
                        Est. Delivery Price
                    </p>

                    <div id="totalPrice" class="text-5xl font-black text-white">
                        $0
                    </div>

                    <p class="text-zinc-500 text-sm leading-relaxed">
                        Includes ocean freight, inland logistics, customs, documentation, and processing fees.
                    </p>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- CALC SCRIPT --}}
<script>
let ports = @json($ports);
let bodies = @json($bodyTypes);

function calculate() {
    let portKey = document.getElementById('port').value;
    let bodyKey = document.getElementById('body').value;

    let basePrice = parseFloat(document.getElementById('vehicle')
            .selectedOptions[0]
            .getAttribute('data-price'));

    let sea = ports[portKey].sea;
    let land = ports[portKey].distance * 1.5;
    let bodyCoef = bodies[bodyKey].coef;

    let customs = basePrice * 0.08;
    let service = 400;

    let total = (basePrice * bodyCoef) + sea + land + customs + service;

    document.getElementById('totalPrice').innerText =
        "$" + Math.round(total).toLocaleString();
}


document.getElementById('vehicle').addEventListener('change', function() {
    let opt = this.selectedOptions[0];

    document.getElementById('carImage').src = opt.getAttribute('data-image');
    document.getElementById('carTitle').innerText =
        opt.getAttribute('data-make') + ' ' + opt.getAttribute('data-model');

    document.getElementById('basePrice').innerText =
        '$' + parseInt(opt.getAttribute('data-price')).toLocaleString();

    calculate();
});

document.getElementById('port').addEventListener('change', calculate);
document.getElementById('body').addEventListener('change', calculate);

window.onload = calculate;
</script>

@endsection
