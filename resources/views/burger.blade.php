<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery - Pickup Nearby (Tailwind)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <style>
        .restaurant-marker {
            background: none !important;
            border: none !important;
        }
        
    </style> 
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-96 bg-white overflow-y-auto shadow-lg">
            <!-- Header -->
            <div class="p-5 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Pickup nearby</h1>
                <div class="flex gap-3 mb-5">
                    <button class="px-4 py-2 bg-red-500 text-white text-sm rounded-md filter-btn active">Highest rated</button>
                    <button class="px-4 py-2 border border-gray-300 text-sm rounded-md hover:bg-gray-50 filter-btn">Price</button>
                    <button class="px-4 py-2 border border-gray-300 text-sm rounded-md hover:bg-gray-50 filter-btn">Dietary</button>
                    <button class="px-4 py-2 border border-gray-300 text-sm rounded-md hover:bg-gray-50 filter-btn">Sort</button>
                </div>
            </div>

            <!-- Search Box -->
            <div class="px-5 py-3">
                <div class="relative">
                    <input 
                        type="text" 
                        class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" 
                        placeholder="Search restaurants or food..." 
                        id="searchInput"
                    >
                    <button 
                        onclick="searchRestaurants()" 
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-red-500 text-white px-3 py-2 rounded-md text-sm hover:bg-red-600 transition-colors"
                    >
                        🔍
                    </button>
                </div>
            </div>

            <!-- Food Categories -->
            <div class="flex gap-2 px-5 pb-5 overflow-x-auto">
                <div class="food-category flex flex-col items-center min-w-fit px-3 py-2 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors" data-category="fast-food">
                    <div class="text-2xl mb-1">🍟</div>
                    <div class="text-xs font-medium text-center">Fast Food</div>
                </div>
                <div class="food-category flex flex-col items-center min-w-fit px-3 py-2 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors" data-category="ice-cream">
                    <div class="text-2xl mb-1">🍦</div>
                    <div class="text-xs font-medium text-center">Ice Cream</div>
                </div>
                <div class="food-category flex flex-col items-center min-w-fit px-3 py-2 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors" data-category="pizza">
                    <div class="text-2xl mb-1">🍕</div>
                    <div class="text-xs font-medium text-center">Pizza</div>
                </div>
                <div class="food-category flex flex-col items-center min-w-fit px-3 py-2 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors" data-category="chinese">
                    <div class="text-2xl mb-1">🥡</div>
                    <div class="text-xs font-medium text-center">Chinese</div>
                </div>
                <div class="food-category flex flex-col items-center min-w-fit px-3 py-2 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors" data-category="halal">
                    <div class="text-2xl mb-1">🍗</div>
                    <div class="text-xs font-medium text-center">Halal</div>
                </div>
                <div class="food-category flex flex-col items-center min-w-fit px-3 py-2 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors" data-category="japanese">
                    <div class="text-2xl mb-1">🍱</div>
                    <div class="text-xs font-medium text-center">Japanese</div>
                </div>
                <div class="food-category flex flex-col items-center min-w-fit px-3 py-2 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors" data-category="indian">
                    <div class="text-2xl mb-1">🍛</div>
                    <div class="text-xs font-medium text-center">Indian</div>
                </div>
                <div class="food-category flex flex-col items-center min-w-fit px-3 py-2 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors" data-category="healthy">
                    <div class="text-2xl mb-1">🥗</div>
                    <div class="text-xs font-medium text-center">Healthy</div>
                </div>
            </div>

            <!-- Restaurant List -->
            <div class="px-5 space-y-4" id="restaurantList">
                <!-- Restaurants will be populated here -->
            </div>
        </div>

        <!-- Map Container -->
        <div class="flex-1 relative">
            <div id="map" class="w-full h-full"></div>
            <div class="absolute top-5 right-5 bg-white p-4 rounded-lg shadow-lg z-10">
                <div class="font-semibold text-gray-800">Your Location:</div>
                <div class="text-sm text-gray-600">Negombo, Western Province</div>
                <div class="text-sm text-gray-500 mt-1">📍 Showing nearby restaurants</div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script>
        // Same JavaScript code as before
        const restaurants = [
            {
                id: 1,
                name: "Fresh Juice Kadawatha",
                category: "healthy",
                rating: 4.2,
                distance: 1.7,
                time: 10,
                lat: 7.0873,
                lng: 79.8590,
                offer: "Free Item (Spend LKR 1,500)"
            },
            {
                id: 2,
                name: "Deam Cafe",
                category: "fast-food",
                rating: 3.7,
                distance: 2.0,
                time: 15,
                lat: 7.0893,
                lng: 79.8610,
                offer: "Buy 1, Get 1 Free"
            },
            {
                id: 3,
                name: "Pizza Palace",
                category: "pizza",
                rating: 4.5,
                distance: 1.2,
                time: 12,
                lat: 7.0883,
                lng: 79.8570,
                offer: "20% Off on Orders Above LKR 2000"
            },
            {
                id: 4,
                name: "Dragon Wok",
                category: "chinese",
                rating: 4.1,
                distance: 2.5,
                time: 18,
                lat: 7.0903,
                lng: 79.8630,
                offer: "Free Delivery"
            },
            {
                id: 5,
                name: "Halal Brothers",
                category: "halal",
                rating: 4.3,
                distance: 1.8,
                time: 14,
                lat: 7.0863,
                lng: 79.8580,
                offer: "Special Combo Deal"
            },
            {
                id: 6,
                name: "Sakura Sushi",
                category: "japanese",
                rating: 4.6,
                distance: 3.1,
                time: 22,
                lat: 7.0913,
                lng: 79.8650,
                offer: "Happy Hour 3-5 PM"
            },
            {
                id: 7,
                name: "Spice Garden",
                category: "indian",
                rating: 4.0,
                distance: 2.3,
                time: 16,
                lat: 7.0853,
                lng: 79.8560,
                offer: "Lunch Special"
            },
            {
                id: 8,
                name: "Creamy Delights",
                category: "ice-cream",
                rating: 4.4,
                distance: 1.5,
                time: 8,
                lat: 7.0843,
                lng: 79.8550,
                offer: "Buy 2 Get 1 Free"
            }
        ];

        let map;
        let markers = [];
        let currentCategory = null;
        let selectedRestaurant = null;

        function initMap() {
            map = L.map('map').setView([7.0873, 79.8590], 14);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker([7.0873, 79.8590], {
                icon: L.divIcon({
                    html: '📍',
                    className: 'user-location',
                    iconSize: [30, 30]
                })
            }).addTo(map).bindPopup('Your Location');

            displayRestaurants(restaurants);
        }

        function displayRestaurants(restaurantList) {
            markers.forEach(marker => map.removeLayer(marker));
            markers = [];

            const restaurantListElement = document.getElementById('restaurantList');
            restaurantListElement.innerHTML = '';

            restaurantList.forEach(restaurant => {
                const marker = L.marker([restaurant.lat, restaurant.lng], {
                    icon: L.divIcon({
                        html: getCategoryIcon(restaurant.category),
                        className: 'restaurant-marker',
                        iconSize: [30, 30]
                    })
                }).addTo(map);

                marker.bindPopup(`
                    <div class="text-center">
                        <div class="font-semibold">${restaurant.name}</div>
                        <div class="text-sm text-gray-600">Rating: ${restaurant.rating} ⭐</div>
                        <div class="text-sm text-gray-600">Distance: ${restaurant.distance} km</div>
                        <button onclick="selectRestaurant(${restaurant.id})" class="bg-red-500 text-white px-3 py-1 rounded text-sm mt-2 hover:bg-red-600">View Details</button>
                    </div>
                `);

                markers.push(marker);

                const restaurantCard = document.createElement('div');
                restaurantCard.className = 'restaurant-card bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition-shadow cursor-pointer border-2 border-transparent hover:border-red-500';
                restaurantCard.setAttribute('data-id', restaurant.id);
                restaurantCard.innerHTML = `
                    <div class="flex justify-between items-start mb-3">
                        <div class="font-semibold text-gray-800">${restaurant.name}</div>
                        <div class="bg-green-500 text-white px-2 py-1 rounded text-xs font-semibold">${restaurant.rating}</div>
                    </div>
                    <div class="flex gap-3 text-sm text-gray-600 mb-2">
                        <span>${restaurant.time} min</span>
                        <span class="font-medium text-red-500">${restaurant.distance} km</span>
                    </div>
                    <div class="bg-red-500 text-white px-2 py-1 rounded text-xs inline-block">${restaurant.offer}</div>
                `;

                restaurantCard.addEventListener('click', () => selectRestaurant(restaurant.id));
                restaurantListElement.appendChild(restaurantCard);
            });
        }

        function getCategoryIcon(category) {
            const icons = {
                'fast-food': '🍟',
                'ice-cream': '🍦',
                'pizza': '🍕',
                'chinese': '🥡',
                'halal': '🍗',
                'japanese': '🍱',
                'indian': '🍛',
                'healthy': '🥗'
            };
            return icons[category] || '🍽️';
        }

        function selectRestaurant(restaurantId) {
            const restaurant = restaurants.find(r => r.id === restaurantId);
            if (!restaurant) return;

            document.querySelectorAll('.restaurant-card').forEach(card => {
                card.classList.remove('border-red-500');
                card.classList.add('border-transparent');
            });

            const restaurantCard = document.querySelector(`[data-id="${restaurantId}"]`);
            if (restaurantCard) {
                restaurantCard.classList.remove('border-transparent');
                restaurantCard.classList.add('border-red-500');
            }

            map.setView([restaurant.lat, restaurant.lng], 16);

            const marker = markers.find(m => 
                m.getLatLng().lat === restaurant.lat && 
                m.getLatLng().lng === restaurant.lng
            );
            if (marker) {
                marker.openPopup();
            }

            selectedRestaurant = restaurant;
        }

        function filterByCategory(category) {
            currentCategory = category;

            document.querySelectorAll('.food-category').forEach(cat => {
                cat.classList.remove('bg-red-100', 'text-red-600');
                cat.classList.add('hover:bg-gray-100');
            });
            
            const activeCategory = document.querySelector(`[data-category="${category}"]`);
            if (activeCategory) {
                activeCategory.classList.remove('hover:bg-gray-100');
                activeCategory.classList.add('bg-red-100', 'text-red-600');
            }

            const filteredRestaurants = restaurants.filter(r => r.category === category);
            displayRestaurants(filteredRestaurants);
        }

        function searchRestaurants() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            if (!searchTerm) {
                displayRestaurants(restaurants);
                return;
            }

            const filteredRestaurants = restaurants.filter(r => 
                r.name.toLowerCase().includes(searchTerm) ||
                r.category.toLowerCase().includes(searchTerm)
            );
            displayRestaurants(filteredRestaurants);
        }

        document.addEventListener('DOMContentLoaded', function() {
            initMap();

            document.querySelectorAll('.food-category').forEach(category => {
                category.addEventListener('click', function() {
                    const categoryType = this.getAttribute('data-category');
                    filterByCategory(categoryType);
                });
            });

            document.getElementById('searchInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchRestaurants();
                }
            });

            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.filter-btn').forEach(b => {
                        b.classList.remove('bg-red-500', 'text-white');
                        b.classList.add('border', 'border-gray-300', 'hover:bg-gray-50');
                    });
                    
                    this.classList.remove('border', 'border-gray-300', 'hover:bg-gray-50');
                    this.classList.add('bg-red-500', 'text-white');
                    
                    if (this.textContent === 'Highest rated') {
                        const sortedRestaurants = [...restaurants].sort((a, b) => b.rating - a.rating);
                        displayRestaurants(sortedRestaurants);
                    } else if (this.textContent === 'Price') {
                        const sortedRestaurants = [...restaurants].sort((a, b) => a.distance - b.distance);
                        displayRestaurants(sortedRestaurants);
                    }
                });
            });
        });
    </script>
</body>
</html>