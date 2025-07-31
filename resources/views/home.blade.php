<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlavorFiesta - Food Delivery</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .category-card {
      background: linear-gradient(135deg, #FF9A8B 0%, #FF6B95 100%);
      padding: 20px;
      border-radius: 16px;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: all 0.3s ease;
      color: white;
    }
    .category-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    .food-card {
      transition: all 0.3s ease;
      border-radius: 12px;
      overflow: hidden;
    }
    .food-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    .food-img {
      height: 180px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    .food-card:hover .food-img {
      transform: scale(1.05);
    }
    .add-to-cart {
      transition: all 0.3s ease;
    }
    .add-to-cart:hover {
      background-color: #e53e3e;
    }
    .carousel {
      animation: scrollText 20s linear infinite;
    }
    @keyframes scrollText {
      0% { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
    }
    .cart-badge {
      transition: all 0.3s ease;
    }
    .cart-bump {
      animation: bump 300ms ease-out;
    }
    @keyframes bump {
      0% { transform: scale(1); }
      10% { transform: scale(0.9); }
      30% { transform: scale(1.1); }
      50% { transform: scale(1.15); }
      100% { transform: scale(1); }
    }
    .hero-section {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
    }
    .modal {
      transition: all 0.3s ease;
    }
    .modal.active {
      opacity: 1;
      pointer-events: all;
    }
    .modal-content {
      transform: translateY(20px);
      transition: all 0.3s ease;
    }
    .modal.active .modal-content {
      transform: translateY(0);
    }
  </style>
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
          <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Home</a>
          <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Restaurants</a>
          <a href="#" class="text-gray-700 hover:text-red-600 font-medium">Deals</a>
          <a href="#" class="text-gray-700 hover:text-red-600 font-medium">My Orders</a>
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
    
    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-white shadow-lg" id="mobileMenu">
      <div class="px-4 py-2 space-y-2">
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Home</a>
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Restaurants</a>
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Deals</a>
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">My Orders</a>
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Login</a>
        <a href="#" class="block py-2 text-red-600 font-medium">Sign Up</a>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero-section text-center text-white py-24">
    <div class="max-w-3xl mx-auto px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-6">Delicious food delivered to your doorstep</h1>
      <p class="text-xl mb-8">Order from your favorite restaurants with just a few clicks</p>
      <div class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
        <input type="text" placeholder="Search for restaurants or cuisines" class="flex-grow px-6 py-3 rounded-full focus:outline-none text-gray-800">
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-full font-medium transition">Search</button>
      </div>
    </div>
  </section>

  <!-- Popular Categories -->
  <section class="max-w-7xl mx-auto px-4 py-12">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-2xl font-bold text-gray-800">Popular Categories</h2>
      <a href="#" class="text-red-600 hover:underline">View All</a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
      <div class="category-card text-center">
        <div class="text-3xl mb-2">🍔</div>
        <p class="font-medium">Burgers</p>
      </div>
      <div class="category-card text-center">
        <div class="text-3xl mb-2">🍕</div>
        <p class="font-medium">Pizza</p>
      </div>
      <div class="category-card text-center">
        <div class="text-3xl mb-2">🍛</div>
        <p class="font-medium">Rice</p>
      </div>
      <div class="category-card text-center">
        <div class="text-3xl mb-2">🍗</div>
        <p class="font-medium">Chicken</p>
      </div>
      <div class="category-card text-center">
        <div class="text-3xl mb-2">🍜</div>
        <p class="font-medium">Noodles</p>
      </div>
      <div class="category-card text-center">
        <div class="text-3xl mb-2">🍰</div>
        <p class="font-medium">Desserts</p>
      </div>
    </div>
  </section>

  <!-- Special Offers -->
  <section class="bg-red-50 py-8">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-4 bg-gradient-to-r from-red-500 to-orange-500 text-white">
          <h2 class="text-xl font-bold">Special Offers</h2>
        </div>
        <div class="p-4 overflow-hidden">
          <div class="carousel whitespace-nowrap text-lg font-medium text-red-600">
            🎉 50% OFF on first order • 🚀 Free delivery on orders over Rs.1000 • 🍕 Buy 1 Get 1 Free on Pizzas • 🍔 20% OFF all Burgers • 🎉 50% OFF on first order • 🚀 Free delivery on orders over Rs.1000 • 🍕 Buy 1 Get 1 Free on Pizzas • 🍔 20% OFF all Burgers
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Restaurants -->
  <section class="max-w-7xl mx-auto px-4 py-12">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-2xl font-bold text-gray-800">Popular Restaurants</h2>
      <a href="#" class="text-red-600 hover:underline">View All</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="restaurantsContainer">
      <!-- Restaurant cards will be added by JavaScript -->
    </div>
  </section>

  <!-- Featured Foods -->
  <section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Featured Foods</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="foodsContainer">
        <!-- Food items will be added by JavaScript -->
      </div>
    </div>
  </section>

  <!-- App Download -->
  <section class="bg-gradient-to-r from-red-600 to-orange-500 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center">
      <div class="md:w-1/2 mb-8 md:mb-0">
        <h2 class="text-3xl font-bold mb-4">Get the FlavorFiesta App</h2>
        <p class="text-xl mb-6">Download our app for faster ordering and exclusive deals</p>
        <div class="flex flex-col sm:flex-row gap-4">
          <button class="bg-black text-white px-6 py-3 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-1.57 2.73-1.85 3.77-1.83 2.74.15 4.26 1.55 4.41 4.1-3.72.21-5.27 2.11-5.24 5.31 3.27.4 4.93-2.2 5.1-3.33-1.78-1.03-2.14-1.48-4.22-1.48 1.72-3.89 5.02-5.78 7.91-6.1.9-.1 3.46-.2 5.09 2.5-.14.08-3.2 1.83-3.18 5.45.03 4.03 3.13 5.33 3.23 5.38-.03.07-.45 1.54-1.52 3.06zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.2 2.58-2.34 4.5-3.74 4.25z"></path>
            </svg>
            App Store
          </button>
          <button class="bg-black text-white px-6 py-3 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"></path>
            </svg>
            Google Play
          </button>
        </div>
      </div>
      <div class="md:w-1/2 flex justify-center">
        <img src="https://cdn.dribbble.com/users/1787323/screenshots/11324472/media/6a1e6c500c774d1b4e4ec6f5a26a04a1.png" alt="Mobile App" class="h-64 md:h-80">
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-gray-300 py-12">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <h3 class="text-2xl font-bold text-white mb-4">FlavorFiesta</h3>
        <p class="mb-4">Delicious food delivered fast to your doorstep</p>
        <div class="flex space-x-4">
          <a href="#" class="text-white hover:text-red-500">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
            </svg>
          </a>
          <a href="#" class="text-white hover:text-red-500">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.023.047 1.351.058 3.807.058h.468c2.456 0 2.784-.011 3.807-.058.975-.045 1.504-.207 1.857-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.047-1.023.058-1.351.058-3.807v-.468c0-2.456-.011-2.784-.058-3.807-.045-.975-.207-1.504-.344-1.857a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
            </svg>
          </a>
          <a href="#" class="text-white hover:text-red-500">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
            </svg>
          </a>
        </div>
      </div>
      <div>
        <h4 class="text-lg font-semibold text-white mb-4">Company</h4>
        <ul class="space-y-2">
          <li><a href="#" class="hover:text-white">About Us</a></li>
          <li><a href="#" class="hover:text-white">Careers</a></li>
          <li><a href="#" class="hover:text-white">Blog</a></li>
          <li><a href="#" class="hover:text-white">Press</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-lg font-semibold text-white mb-4">Help & Contact</h4>
        <ul class="space-y-2">
          <li><a href="#" class="hover:text-white">Help Center</a></li>
          <li><a href="#" class="hover:text-white">Contact Us</a></li>
          <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
          <li><a href="#" class="hover:text-white">Terms of Service</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-lg font-semibold text-white mb-4">Delivery Cities</h4>
        <ul class="space-y-2">
          <li><a href="#" class="hover:text-white">Colombo</a></li>
          <li><a href="#" class="hover:text-white">Kandy</a></li>
          <li><a href="#" class="hover:text-white">Galle</a></li>
          <li><a href="#" class="hover:text-white">Negombo</a></li>
        </ul>
      </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 pt-8 mt-8 border-t border-gray-800 text-center">
      <p>&copy; 2023 FlavorFiesta. All rights reserved.</p>
    </div>
  </footer>

  <!-- Cart Modal -->
  <div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none" id="cartModal">
    <div class="modal-content bg-white rounded-lg w-full max-w-md max-h-[80vh] overflow-y-auto">
      <div class="p-4 border-b sticky top-0 bg-white z-10">
        <div class="flex justify-between items-center">
          <h3 class="text-xl font-bold">Your Cart (<span id="cartItemCount">0</span> items)</h3>
          <button class="text-gray-500 hover:text-gray-700" id="closeCartModal">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </div>
      <div class="p-4" id="cartItemsContainer">
        <!-- Cart items will be added here -->
        <div class="text-center py-8 text-gray-500" id="emptyCartMessage">
          <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          <p>Your cart is empty</p>
          <p class="text-sm">Add some delicious items to get started!</p>
        </div>
      </div>
      <div class="p-4 border-t sticky bottom-0 bg-white">
        <div class="flex justify-between mb-4">
          <span class="font-bold">Subtotal:</span>
          <span class="font-bold" id="cartSubtotal">Rs.0</span>
        </div>
        <button class="w-full bg-red-600 text-white py-3 rounded-lg font-medium hover:bg-red-700 transition disabled:opacity-50 disabled:cursor-not-allowed" id="checkoutButton" disabled>
          Proceed to Checkout
        </button>
      </div>
    </div>
  </div>-->

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
// Cart data
let cart = [];

// DOM elements
const restaurantsContainer = document.getElementById('restaurantsContainer');
const foodsContainer = document.getElementById('foodsContainer');
const cartIcon = document.getElementById('cartIcon');
const cartCount = document.getElementById('cartCount');
const cartModal = document.getElementById('cartModal');
const closeCartModal = document.getElementById('closeCartModal');
const cartItemsContainer = document.getElementById('cartItemsContainer');
const cartItemCount = document.getElementById('cartItemCount');
const cartSubtotal = document.getElementById('cartSubtotal');
const checkoutButton = document.getElementById('checkoutButton');
const emptyCartMessage = document.getElementById('emptyCartMessage');
const mobileMenuButton = document.getElementById('mobileMenuButton');
const mobileMenu = document.getElementById('mobileMenu');

// Render restaurants
function renderRestaurants() {
  restaurantsContainer.innerHTML = '';
  restaurants.forEach(restaurant => {
    const restaurantCard = document.createElement('div');
    restaurantCard.className = 'bg-white rounded-xl shadow-md overflow-hidden food-card';
    restaurantCard.innerHTML = `
      <img src="${restaurant.image}" alt="${restaurant.name}" class="w-full h-48 object-cover">
      <div class="p-4">
        <div class="flex justify-between items-start">
          <h3 class="font-bold text-lg mb-1">${restaurant.name}</h3>
          <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full flex items-center">
            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            ${restaurant.rating}
          </span>
        </div>
        <p class="text-gray-600 text-sm mb-2">${restaurant.tags.join(' • ')}</p>
        <div class="flex justify-between text-sm text-gray-500">
          <span>${restaurant.time}</span>
          <span>${restaurant.fee}</span>
        </div>
      </div>
    `;
    restaurantsContainer.appendChild(restaurantCard);
  });
}

// Render food items
function renderFoods() {
  foodsContainer.innerHTML = '';
  foods.forEach(food => {
    const foodCard = document.createElement('div');
    foodCard.className = 'bg-white rounded-xl shadow-md overflow-hidden food-card';
    foodCard.innerHTML = `
      <div class="relative">
        <img src="${food.image}" alt="${food.name}" class="w-full food-img">
        <div class="absolute top-2 right-2 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md">
          <span class="text-yellow-500 font-bold">${food.rating}</span>
        </div>
      </div>
      <div class="p-4">
        <h3 class="font-bold text-lg mb-1">${food.name}</h3>
        <p class="text-gray-600 text-sm mb-2">${food.description}</p>
        <p class="text-gray-500 text-sm mb-3">${food.restaurant}</p>
        <div class="flex justify-between items-center">
          <span class="font-bold text-red-600">Rs.${food.price}</span>
          <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-red-700" data-id="${food.id}">
            Add to Cart
          </button>
        </div>
      </div>
    `;
    foodsContainer.appendChild(foodCard);
  });
}

// Update cart count
function updateCartCount() {
  const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
  cartCount.textContent = totalItems;
  
  // Add bump animation when item is added
  if (totalItems > 0) {
    cartCount.classList.add('cart-bump');
    setTimeout(() => {
      cartCount.classList.remove('cart-bump');
    }, 300);
  }
}

// Update cart modal
function updateCartModal() {
  const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
  const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
  
  cartItemCount.textContent = totalItems;
  cartSubtotal.textContent = `Rs.${subtotal}`;
  
  if (totalItems === 0) {
    emptyCartMessage.classList.remove('hidden');
    cartItemsContainer.innerHTML = '';
    checkoutButton.disabled = true;
  } else {
    emptyCartMessage.classList.add('hidden');
    
    // Clear existing items
    cartItemsContainer.innerHTML = '';
    
    // Add current items
    cart.forEach(item => {
      const cartItem = document.createElement('div');
      cartItem.className = 'flex py-4 border-b';
      cartItem.innerHTML = `
        <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg">
        <div class="ml-4 flex-grow">
          <h4 class="font-medium">${item.name}</h4>
          <p class="text-sm text-gray-600">Rs.${item.price}</p>
          <div class="flex items-center mt-1">
            <button class="quantity-btn border rounded-l-lg px-2 py-1 text-gray-600 hover:bg-gray-100" data-id="${item.id}" data-action="decrease">-</button>
            <span class="border-t border-b px-3 py-1 text-sm">${item.quantity}</span>
            <button class="quantity-btn border rounded-r-lg px-2 py-1 text-gray-600 hover:bg-gray-100" data-id="${item.id}" data-action="increase">+</button>
            <button class="ml-auto text-red-500 hover:text-red-700" data-id="${item.id}" data-action="remove">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
              </svg>
            </button>
          </div>
        </div>
      `;
      cartItemsContainer.appendChild(cartItem);
    });
    
    checkoutButton.disabled = false;
  }
}

// Add to cart
function addToCart(foodId) {
  const food = foods.find(item => item.id === foodId);
  if (!food) return;
  
  const existingItem = cart.find(item => item.id === foodId);
  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cart.push({
      id: food.id,
      name: food.name,
      price: food.price,
      image: food.image,
      quantity: 1
    });
  }
  
  updateCartCount();
  updateCartModal();
}

// Update cart item quantity
function updateCartItem(foodId, action) {
  const itemIndex = cart.findIndex(item => item.id === foodId);
  if (itemIndex === -1) return;
  
  if (action === 'increase') {
    cart[itemIndex].quantity += 1;
  } else if (action === 'decrease') {
    if (cart[itemIndex].quantity > 1) {
      cart[itemIndex].quantity -= 1;
    } else {
      // Remove if quantity would go to 0
      cart.splice(itemIndex, 1);
    }
  } else if (action === 'remove') {
    cart.splice(itemIndex, 1);
  }
  
  updateCartCount();
  updateCartModal();
}

// Event listeners
document.addEventListener('DOMContentLoaded', () => {
  renderRestaurants();
  renderFoods();
  
  // Add to cart button click
  document.addEventListener('click', (e) => {
    if (e.target.classList.contains('add-to-cart')) {
      const foodId = parseInt(e.target.getAttribute('data-id'));
      addToCart(foodId);
    }
    
    // Quantity buttons in cart
    if (e.target.classList.contains('quantity-btn') || e.target.closest('[data-action]')) {
      const button = e.target.classList.contains('quantity-btn') ? e.target : e.target.closest('[data-action]');
      const foodId = parseInt(button.getAttribute('data-id'));
      const action = button.getAttribute('data-action');
      updateCartItem(foodId, action);
    }
  });
  
  // Cart icon click
  cartIcon.addEventListener('click', () => {
    cartModal.classList.add('active');
    document.body.style.overflow = 'hidden';
  });
  
  // Close cart modal
  closeCartModal.addEventListener('click', () => {
    cartModal.classList.remove('active');
    document.body.style.overflow = '';
  });
  
  // Mobile menu toggle
  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
});

// Close modal when clicking outside
cartModal.addEventListener('click', (e) => {
  if (e.target === cartModal) {
    cartModal.classList.remove('active');
    document.body.style.overflow = '';
  }
});
</script> 
</body>
</html>