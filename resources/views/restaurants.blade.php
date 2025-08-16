<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderEats - Order Your Favorite Food</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
    /*footer part */
    .footer {
      background: #2f2f2f;
      color: white;
      padding: 50px 20px 20px;
    }

    .footer-container {
      max-width: 1200px;
      margin: auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 30px;
    }

    .footer h3 {
      color: white;
      margin-bottom: 15px;
    }

    .footer ul {
      list-style: none;
      padding: 0;
    }

    .footer ul li {
      margin: 8px 0;
      color: #ccc;
    }

    .footer ul li a {
      color: #ccc;
      text-decoration: none;
    }

    .footer ul li a:hover {
      color: rgb(233, 74, 0);
    }

    .footer .social-icons a {
      color: rgb(255, 255, 255);
      margin-right: 10px;
      font-size: 20px;
    }

    .bottom-bar {
      background: #444;
      color: white;
      text-align: center;
      padding: 15px 10px;
      margin-top: 30px;
    }

    .payment-icons img {
      height: 30px;
      display: ; /* Makes each image take full width and stack */
      margin: 10px 0; /* Vertical margin only */
    }

    .app-buttons img {
      width: 140px;
      margin-top: 10px;
    }

    @media (max-width: 768px) {
      .app-buttons img {
        width: 100px;
      }
    }
  </style>


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff6b35',
                        secondary: '#2c3e50'
                    }
                }
            }
        }
        
    </script>

</head>
<body class="bg-gray-50">
    <!-- Header -->
  <header class="sticky top-0 z-50 bg-white shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
      <div class="flex items-center space-x-6">
        <a href="#" class="text-2xl font-bold text-red-600 flex items-center">
          <span class="text-orange-500">Order</span>Eats
        </a>
        <select class="border rounded-full px-4 py-2 text-sm bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500" id="locationSelector">
          <option>Colombo</option>
          <option>Kandy</option>
          <option>Galle</option>
          <option>Negombo</option>
          <option>Matale</option>
          <option>Use My Location</option>
        </select>

        <nav class="hidden md:flex space-x-6">
          
          <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 font-medium">Home</a>
          <a href="{{ route('restaurants') }}" class="text-gray-700 hover:text-red-600 font-medium">Restaurants</a>
          <a href="#" class="text-gray-700 hover:text-red-600 font-medium"></a>
          <a href="#" class="text-gray-700 hover:text-red-600 font-medium">About Us</a>
          <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Contact</a>
        </nav>
      </div>
      <div class="flex items-center space-x-4">
        <a href="#" class="text-gray-700 hover:text-red-600 font-medium hidden md:block">Login</a>
        <a href="#" class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition font-medium hidden md:block">Sign Up</a>
        <div class="relative" id="cartIcon">
          <div class="cursor-pointer p-2 rounded-full hover:bg-gray-100 transition">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span id="cartCount" class="cart-badge absolute -top-1 -right-1 bg-orange-500 rounded-full text-white w-5 h-5 text-xs font-bold flex justify-center items-center">0</span>
          </div>
        </div>
        <button class="md:hidden p-2 rounded-lg hover:bg-gray-100" id="mobileMenuButton">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </header>

    <!-- Hero Section -->
    <!--<section class="bg-gradient-to-r from-primary to-orange-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold mb-6">Delicious Food Delivered</h2>
            <p class="text-xl mb-8 opacity-90">Order from your favorite restaurants in Colombo</p>
            <div class="max-w-md mx-auto">
                <div class="relative">
                    <input type="text" id="search" placeholder="Search for food or restaurants..." 
                           class="w-full px-6 py-4 rounded-full text-gray-800 text-lg focus:outline-none focus:ring-4 focus:ring-orange-300">
                    <button class="absolute right-2 top-2 bg-primary text-white p-2 rounded-full hover:bg-opacity-90">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Filter Tabs -->
    <section class="bg-white py-6 shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-wrap gap-4 justify-center">
                <button class="filter-btn active bg-primary text-white px-6 py-2 rounded-full" data-filter="all">
                    All
                </button>
                <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-300" data-filter="Sri Lankan">
                    Sri Lankan
                </button>
                <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-300" data-filter="Chinese">
                    Chinese
                </button>
                <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-300" data-filter="Indian">
                    Indian
                </button>
                <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-300" data-filter="Italian">
                    Italian
                </button>
                <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-300" data-filter="Japanese">
                    Japanese
                </button>
            </div>
        </div>
    </section>

    <!-- Restaurants Section -->
    <section id="restaurants" class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-12 text-secondary">Popular Restaurants</h3>
            <div id="restaurant-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <a id="viewAllButton" class="view-all-link">View All</a>
                <!-- Restaurants will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Popular Food Section -->
    <section id="popular" class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-12 text-secondary">Popular Dishes</h3>
            <div id="food-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Food items will be populated by JavaScript -->
            </div>
        </div>
    </section>



     <!-- Footer Section -->
  <footer class="footer">
    <div class="footer-container">
      <div>
        <h3>OrderEats</h3>
        <p>Your favorite restaurants, delivered fast. OrderEats makes food delivery simple, reliable, and delicious.</p>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div>
        <h3>Our Menus</h3>
        <ul>
          <li><a href="#"></a>Chicken Burger</li>
          <li><a href="#">Brief Pizza</a></li>
          <li><a href="#"></a>Fresh Vegetable</li>
          <li><a href="#"></a>Sea Foods</li>
          <li><a href="#"></a>Desserts</li>
          <li><a href="#"></a>Cold Drinks</li>
          <li><a href="#"></a>Discount</li>
        </ul>
      </div>
      <div>
        <h3>Useful Links</h3>
        <ul>
          <li><a href="#"></a>About Us</li>
          <li><a href="#"></a>Restaurant</li>
          <!--<li><a href="#"></a>Our Chefs</li>
          <li>Testimonials</li>
          <li>Blogs</li>
          <li>FAQs</li>
          <li>Privacy Policy</li>-->
        </ul>
      </div>
      <div>
        <h3>Contact Us</h3>
        <ul>
            <li>📞 +94 77 123 4567</li>
            <li>📞 +94 71 987 6543</li>
            <li>🌐 www.ordereats.com</li>
        </ul>
      </div>
      <div>
        <h3>Download App</h3>
        <p>Save $3 with app & new user only</p>
        <div class="app-buttons">
          <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
          <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store">
        </div>
      </div>
    </div>
    <div class="bottom-bar">
      <p>©2025. All rights reserved by <strong>OrderEats</strong></p>
      <div class="payment-icons">
        <img src="https://img.icons8.com/color/48/000000/paypal.png" alt="paypal">
        <img src="https://img.icons8.com/color/48/000000/visa.png" alt="visa">
        <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" alt="mastercard">
        <img src="https://img.icons8.com/color/48/000000/discover.png" alt="discover">
      </div>
    </div>
  </footer>


    <script>
        // Restaurant data
        const restaurants = [
            {
                id: 1,
                name: "Spice Kingdom",
                rating: 4.5,
                time: "25-35 min",
                fee: "Rs.100 delivery",
                image: "https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Sri Lankan", "Chinese", "Indian"]
            },
            {
                id: 2,
                name: "Burger Palace",
                rating: 4.2,
                time: "20-30 min",
                fee: "Rs.80 delivery",
                image: "https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Burgers", "Fast Food", "American"]
            },
            {
                id: 3,
                name: "Pizza Heaven",
                rating: 4.7,
                time: "30-40 min",
                fee: "Free delivery",
                image: "https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Pizza", "Italian", "Pasta"]
            },
            {
                id: 4,
                name: "Sushi World",
                rating: 4.4,
                time: "35-45 min",
                fee: "Rs.120 delivery",
                image: "https://images.unsplash.com/photo-1579871494447-9811cf80d66c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Japanese", "Sushi", "Asian"]
            },
            {
                id: 5,
                name: "Curry House",
                rating: 4.3,
                time: "25-35 min",
                fee: "Rs.90 delivery",
                image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Indian", "Curry", "Vegetarian"]
            },
            {
                id: 6,
                name: "Noodle Bar",
                rating: 4.1,
                time: "20-30 min",
                fee: "Rs.70 delivery",
                image: "https://images.unsplash.com/photo-1551183053-bf91a1d81141?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Chinese", "Noodles", "Asian"]
            },
            {
                id: 7,
                name: "Lanka Spice",
                rating: 4.6,
                time: "20-30 min",
                fee: "Rs.80 delivery",
                image: "https://images.unsplash.com/photo-1601050690597-df0568f70950?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Sri Lankan", "Traditional", "Rice & Curry"],
                isSriLankan: true
            },
            {
                id: 8,
                name: "Kottu Labs",
                rating: 4.4,
                time: "15-25 min",
                fee: "Rs.70 delivery",
                image: "https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Sri Lankan", "Kottu", "Street Food"],
                isSriLankan: true
            },
            {
                id: 9,
                name: "Hoppers House",
                rating: 4.8,
                time: "30-40 min",
                fee: "Rs.100 delivery",
                image: "https://images.unsplash.com/photo-1631451095765-2ad916eb7222?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Sri Lankan", "Hoppers", "String Hoppers"],
                isSriLankan: true
            },
            {
                id: 10,
                name: "The Coconut Grove",
                rating: 4.7,
                time: "25-35 min",
                fee: "Rs.120 delivery",
                image: "https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                tags: ["Sri Lankan", "Seafood", "Coconut Based"],
                isSriLankan: true
            }
        ];

        // Food items data
        const foods = [
            {
                id: 1,
                name: "Chicken Burger",
                description: "Juicy chicken patty with fresh veggies",
                price: 650,
                rating: 4.5,
                image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                restaurant: "Burger Palace"
            },
            {
                id: 2,
                name: "Pepperoni Pizza",
                description: "Classic pizza with pepperoni and cheese",
                price: 1200,
                rating: 4.7,
                image: "https://images.unsplash.com/photo-1588315029754-2dd089d39a1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                restaurant: "Pizza Heaven"
            },
            {
                id: 3,
                name: "Chicken Kottu",
                description: "Sri Lankan specialty with roti and chicken",
                price: 550,
                rating: 4.8,
                image: "https://images.unsplash.com/photo-1601050690597-df0568f70950?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                restaurant: "Spice Kingdom"
            },
            {
                id: 4,
                name: "Sushi Platter",
                description: "Assorted sushi with wasabi and soy sauce",
                price: 1800,
                rating: 4.6,
                image: "https://images.unsplash.com/photo-1617196035154-1e1b6beee1b1?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                restaurant: "Sushi World"
            },
            {
                id: 5,
                name: "Butter Chicken",
                description: "Creamy butter chicken with naan",
                price: 850,
                rating: 4.4,
                image: "https://images.unsplash.com/photo-1631515243349-e0cb75fb8d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                restaurant: "Curry House"
            },
            {
                id: 6,
                name: "Chow Mein",
                description: "Stir-fried noodles with vegetables",
                price: 600,
                rating: 4.2,
                image: "https://images.unsplash.com/photo-1563245372-f21724e3856d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                restaurant: "Noodle Bar"
            },
            {
                id: 7,
                name: "Cheese Burger",
                description: "Classic beef burger with cheese",
                price: 750,
                rating: 4.3,
                image: "https://images.unsplash.com/photo-1561758033-d89a9ad46330?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                restaurant: "Burger Palace"
            },
            {
                id: 8,
                name: "Vegetable Pizza",
                description: "Fresh veggies on a crispy crust",
                price: 1100,
                rating: 4.5,
                image: "https://images.unsplash.com/photo-1593504049359-74330189a345?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
                restaurant: "Pizza Heaven"
            }
        ];

        let cart = [];
        let currentFilter = 'all';

        // Initialize the page
        function init() {
            renderRestaurants();
            renderFoods();
            setupEventListeners();
        }

        // Render restaurants
        function renderRestaurants(filter = 'all') {
            const grid = document.getElementById('restaurant-grid');
            let filteredRestaurants = restaurants;

            if (filter !== 'all') {
                filteredRestaurants = restaurants.filter(restaurant => 
                    restaurant.tags.some(tag => tag.toLowerCase().includes(filter.toLowerCase()))
                );
            }

            grid.innerHTML = filteredRestaurants.map(restaurant => `
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="${restaurant.image}" alt="${restaurant.name}" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 shadow-lg">
                            <span class="flex items-center text-sm font-medium">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                ${restaurant.rating}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-secondary mb-2">${restaurant.name}</h4>
                        <div class="flex flex-wrap gap-2 mb-4">
                            ${restaurant.tags.map(tag => `<span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">${tag}</span>`).join('')}
                        </div>
                        <div class="flex justify-between items-center text-sm text-gray-600">
                            <span>⏱️ ${restaurant.time}</span>
                            <span class="${restaurant.fee === 'Free delivery' ? 'text-green-600 font-medium' : ''}">${restaurant.fee}</span>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Render food items
        function renderFoods() {
            const grid = document.getElementById('food-grid');
            grid.innerHTML = foods.map(food => `
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="${food.image}" alt="${food.name}" class="w-full h-48 object-cover">
                        <button onclick="addToCart(${food.id})" class="absolute bottom-4 right-4 bg-primary text-white rounded-full p-3 shadow-lg hover:bg-opacity-90 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 7v4H5.83l-.83-2H19c1.1 0 2-.9 2-2s-.9-2-2-2H6.16l-1.94-4H1v2h2.2L7.5 14.2c-.08.56.41 1.06.98 1.05h9.02c.54 0 .98-.44.98-.98 0-.05 0-.1-.01-.15L17 12h-7l1.1-2h7.9z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <h5 class="font-bold text-lg mb-1">${food.name}</h5>
                        <p class="text-gray-600 text-sm mb-3">${food.description}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold text-lg">Rs.${food.price}</span>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <span class="text-sm font-medium">${food.rating}</span>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">from ${food.restaurant}</p>
                    </div>
                </div>
            `).join('');
        }

        // Add to cart function
        function addToCart(foodId) {
            const food = foods.find(f => f.id === foodId);
            cart.push(food);
            updateCartCount();
            
            // Show notification
            const notification = document.createElement('div');
            notification.className = 'fixed top-20 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full';
            notification.textContent = `${food.name} added to cart!`;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 2000);
        }

        // Update cart count
        function updateCartCount() {
            document.getElementById('cart-count').textContent = cart.length;
        }

        // Setup event listeners
        function setupEventListeners() {
            // Filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    // Update active button
                    document.querySelectorAll('.filter-btn').forEach(b => {
                        b.classList.remove('active', 'bg-primary', 'text-white');
                        b.classList.add('bg-gray-200', 'text-gray-700');
                    });
                    this.classList.add('active', 'bg-primary', 'text-white');
                    this.classList.remove('bg-gray-200', 'text-gray-700');
                    
                    // Filter restaurants
                    const filter = this.dataset.filter;
                    currentFilter = filter;
                    renderRestaurants(filter);
                });
            });

            // Search functionality
            document.getElementById('search').addEventListener('input', function(e) {
                const query = e.target.value.toLowerCase();
                if (query.length < 2) {
                    renderRestaurants(currentFilter);
                    return;
                }

                const filteredRestaurants = restaurants.filter(restaurant =>
                    restaurant.name.toLowerCase().includes(query) ||
                    restaurant.tags.some(tag => tag.toLowerCase().includes(query))
                );

                const grid = document.getElementById('restaurant-grid');
                grid.innerHTML = filteredRestaurants.map(restaurant => `
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                        <div class="relative">
                            <img src="${restaurant.image}" alt="${restaurant.name}" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 shadow-lg">
                                <span class="flex items-center text-sm font-medium">
                                    <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    ${restaurant.rating}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-secondary mb-2">${restaurant.name}</h4>
                            <div class="flex flex-wrap gap-2 mb-4">
                                ${restaurant.tags.map(tag => `<span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">${tag}</span>`).join('')}
                            </div>
                            <div class="flex justify-between items-center text-sm text-gray-600">
                                <span>⏱️ ${restaurant.time}</span>
                                <span class="${restaurant.fee === 'Free delivery' ? 'text-green-600 font-medium' : ''}">${restaurant.fee}</span>
                            </div>
                        </div>
                    </div>
                `).join('');
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>