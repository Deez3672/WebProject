<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurants</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-8">Available Restaurants</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($restaurants as $restaurants)
        <a href="{{ $restaurant['map_url'] }}" target="_blank" class="bg-white rounded-xl shadow hover:shadow-xl transition duration-300">
            <img src="{{ asset('images/' . $restaurant['image']) }}" alt="{{ $restaurant['name'] }}" class="w-full h-48 object-cover rounded-t-xl">
            <div class="p-4">
                <h2 class="text-xl font-semibold">{{ $restaurant['name'] }}</h2>
                <p class="text-gray-600">{{ $restaurant['cuisine'] }}</p>
                <div class="flex justify-between items-center mt-2 text-sm text-gray-500">
                    <span>{{ $restaurant['delivery_time'] }}</span>
                    <span>{{ $restaurant['delivery_fee'] }}</span>
                </div>
                <div class="mt-2 text-green-600 font-semibold">★ {{ $restaurant['rating'] }}</div>
            </div>
        </a>
        @endforeach
    </div>
</div>

</body>
</html>
