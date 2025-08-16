<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderEats</title>
    <style>
        /* Menu Page Styles */
        .menu-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .menu-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            position: relative;
        }

        .rating {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ffc107;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        .restaurant {
            color: #666;
            font-style: italic;
        }

        .price {
            font-weight: bold;
            margin: 10px 0;
            color: #e53935;
        }

        .add-to-cart {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: #388E3C;
        }

        /* Cart Page Styles */
        .cart-container {
            display: flex;
            height: 100vh;
        }

        .restaurant-tabs {
            width: 30%;
            padding: 20px;
            background-color: #f5f5f5;
            overflow-y: auto;
        }

        .map-container {
            width: 70%;
            padding: 20px;
        }

        #restaurant-map {
            height: 80vh;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .tabs {
            margin-top: 20px;
        }

        .tab {
            padding: 15px;
            margin-bottom: 10px;
            background-color: white;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .tab:hover {
            background-color: #e0e0e0;
        }

        .tab.active {
            background-color: #4CAF50;
            color: white;
        }

        /* Hide cart page by default */
        #cart-page {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Menu Page -->
    <div id="menu-page">
        <div class="menu-container">
            <div class="menu-item">
                <div class="rating">4.4</div>
                <h3>Butter Chicken</h3>
                <p>Creamy butter chicken with naan</p>
                <p class="restaurant">Curry House</p>
                <div class="price">Rs.850</div>
                <button class="add-to-cart" data-restaurant="Curry House">Add to Cart</button>
            </div>

            <div class="menu-item">
                <div class="rating">4.2</div>
                <h3>Chow Mein</h3>
                <p>Stir-fried noodles with vegetables</p>
                <p class="restaurant">Noodle Bar</p>
                <div class="price">Rs.600</div>
                <button class="add-to-cart" data-restaurant="Noodle Bar">Add to Cart</button>
            </div>

            <div class="menu-item">
                <div class="rating">4.3</div>
                <h3>Cheese Burger</h3>
                <p>Classic beef burger with cheese</p>
                <p class="restaurant">Burger Palace</p>
                <div class="price">Rs.750</div>
                <button class="add-to-cart" data-restaurant="Burger Palace">Add to Cart</button>
            </div>

            <div class="menu-item">
                <div class="rating">4.5</div>
                <h3>Vegetable Pizza</h3>
                <p>Fresh veggies on a crispy crust</p>
                <p class="restaurant">Pizza Heaven</p>
                <div class="price">Rs.1100</div>
                <button class="add-to-cart" data-restaurant="Pizza Heaven">Add to Cart</button>
            </div>
        </div>
    </div>

    <!-- Cart Page -->
    <div id="cart-page">
        <div class="cart-container">
            <div class="restaurant-tabs">
                <h2>Your Restaurants</h2>
                <div class="tabs">
                    <!-- Tabs will be populated by JavaScript -->
                </div>
            </div>
            
            <div class="map-container">
                <h2>Restaurant Location</h2>
                <div id="restaurant-map"></div>
            </div>
        </div>
    </div>

    <script>
        // Restaurant data with sample coordinates
        const restaurants = {
            'Curry House': { lat: 28.6139, lng: 77.2090 }, // Delhi coordinates
            'Noodle Bar': { lat: 19.0760, lng: 72.8777 }, // Mumbai coordinates
            'Burger Palace': { lat: 12.9716, lng: 77.5946 }, // Bangalore coordinates
            'Pizza Heaven': { lat: 17.3850, lng: 78.4867 } // Hyderabad coordinates
        };

        let map;
        let markers = {};
        let selectedRestaurant = '';

        // Initialize the application when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Set up menu page event listeners
            setupMenuPage();
            
            // Load Google Maps API
            loadGoogleMaps();
        });

        function setupMenuPage() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    selectedRestaurant = this.getAttribute('data-restaurant');
                    
                    // Switch to cart page
                    document.getElementById('menu-page').style.display = 'none';
                    document.getElementById('cart-page').style.display = 'block';
                    
                    // Initialize the cart page
                    initCartPage();
                });
            });
        }

        function loadGoogleMaps() {
            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
            
            // Make initMap available globally
            window.initMap = initMap;
        }

        function initMap() {
            // Create a new map centered on India
            map = new google.maps.Map(document.getElementById('restaurant-map'), {
                center: { lat: 20.5937, lng: 78.9629 }, // Center of India
                zoom: 5
            });
            
            // If we're on the cart page, initialize it
            if (document.getElementById('cart-page').style.display === 'block') {
                initCartPage();
            }
        }

        function initCartPage() {
            // Create tabs for each restaurant
            const tabsContainer = document.querySelector('.tabs');
            tabsContainer.innerHTML = '';
            
            // Use the selected restaurant or default to first one
            const currentRestaurant = selectedRestaurant || Object.keys(restaurants)[0];
            
            Object.keys(restaurants).forEach(restaurant => {
                // Create tab
                const tab = document.createElement('div');
                tab.className = 'tab';
                if (restaurant === currentRestaurant) {
                    tab.classList.add('active');
                }
                tab.textContent = restaurant;
                tab.addEventListener('click', () => {
                    // Update active tab
                    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    
                    // Update map
                    updateMap(restaurant);
                });
                tabsContainer.appendChild(tab);
                
                // Create marker for each restaurant if not already exists
                if (!markers[restaurant]) {
                    markers[restaurant] = new google.maps.Marker({
                        position: restaurants[restaurant],
                        map: map,
                        title: restaurant
                    });
                    markers[restaurant].setVisible(false);
                }
            });
            
            // Initialize with the selected restaurant
            updateMap(currentRestaurant);
        }

        function updateMap(restaurant) {
            // Center map on the selected restaurant
            map.setCenter(restaurants[restaurant]);
            map.setZoom(15);
            
            // Hide all markers and show only the selected one
            Object.keys(markers).forEach(key => {
                markers[key].setVisible(key === restaurant);
            });
        }
    </script>
</body>
</html>