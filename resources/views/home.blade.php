

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OederEats - Food Delivery</title>
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

/*popular catogories */
 .category-btn {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: all 0.3s ease;
    color: #333;
    border: none;
    overflow: hidden;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
  }
  .category-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    background: linear-gradient(135deg, #ff3e3ee3 0%, #FF6B95 100%);
    color: white;
  }
  .category-btn:hover img {
    opacity: 0.8;
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
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-red-600 font-medium hidden md:block">Login</a>
        <a href="{{ route('restaurants') }}" class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition font-medium hidden md:block">Sign Up</a>
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
    <!--<div class="md:hidden hidden bg-white shadow-lg" id="mobileMenu">
      <div class="px-4 py-2 space-y-2">
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Home</a>
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Restaurants</a>
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Deals</a>
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">My Orders</a>
        <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Login</a>
        <a href="#" class="block py-2 text-red-600 font-medium">Sign Up</a>
      </div>
    </div>-->
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
    <button id="viewAllCategories" class="text-red-600 hover:underline">View All</button>
  </div>
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4" id="categoriesContainer">
    <!-- Category buttons will be added by JavaScript -->
  </div>
</section>

<script>
  // Category data
  const categories = [
    {
      id: 1,
      name: "Burgers",
      emoji: "🍔",
      image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'burgers') }}"
    },
    {
      id: 2,
      name: "Pizza",
      emoji: "🍕",
      image: "https://images.unsplash.com/photo-1588315029754-2dd089d39a1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'pizza') }}"
    },
    {
      id: 3,
      name: "Rice",
      emoji: "🍛",
      image: "https://images.unsplash.com/photo-1601050690597-df0568f70950?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'rice') }}"
    },
    {
      id: 4,
      name: "Chicken",
      emoji: "🍗",
      image: "https://images.unsplash.com/photo-1631515243349-e0cb75fb8d3a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'chicken') }}"
    },
    {
      id: 5,
      name: "Noodles",
      emoji: "🍜",
      image: "https://images.unsplash.com/photo-1551183053-bf91a1d81141?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'noodles') }}"
    },
    {
      id: 6,
      name: "Desserts",
      emoji: "🍰",
      image: "https://images.unsplash.com/photo-1571115177098-24ec42ed204d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'desserts') }}"
    },
    {
      id: 7,
      name: "Salads",
      emoji: "🥗",
      image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'salads') }}"
    },
    {
      id: 8,
      name: "Seafood",
      emoji: "🦞",
      image: "https://images.unsplash.com/photo-1579871494447-9811cf80d66c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'seafood') }}"
    },
    {
      id: 9,
      name: "Vegetarian",
      emoji: "🥦",
      image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'vegetarian') }}"
    },
    {
      id: 10,
      name: "Breakfast",
      emoji: "🥞",
      image: "https://images.unsplash.com/photo-1484723091739-30a097e8f929?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'breakfast') }}"
    },
    {
      id: 11,
      name: "Sushi",
      emoji: "🍣",
      image: "https://unsplash.com/photos/sushi-on-white-ceramic-plate--1GEAA8q3wk",
      link: "{{ route('category', 'sushi') }}"
    },
    {
      id: 12,
      name: "BBQ",
      emoji: "🍖",
      image: "https://images.unsplash.com/photo-1558030006-450675393462?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80",
      link: "{{ route('category', 'bbq') }}"
    }
  ];

  const categoriesContainer = document.getElementById('categoriesContainer');
  const viewAllCategories = document.getElementById('viewAllCategories');

  // Render categories
  function renderCategories(showAll = false) {
    categoriesContainer.innerHTML = '';

    const categoriesToShow = showAll ? categories : categories.slice(0, 6);

    categoriesToShow.forEach(category => {
      const categoryButton = document.createElement('button');
      categoryButton.className = 'category-btn text-center w-full h-full';
      categoryButton.innerHTML = `
        <img src="${category.image}" alt="${category.name}" class="w-full h-24 object-cover rounded-t-lg">
        <div class="p-2">
          <div class="text-2xl mb-1">${category.emoji}</div>
          <p class="font-medium">${category.name}</p>
        </div>
      `;
      categoryButton.addEventListener('click', () => {
        window.location.href = category.link;
      });
      categoriesContainer.appendChild(categoryButton);
    });
  }

  viewAllCategories.addEventListener('click', () => {
    renderCategories(true);
    viewAllCategories.classList.add('hidden');
  });

  document.addEventListener('DOMContentLoaded', () => {
    renderCategories();
  });
</script>




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
        <p>Save $5 with app & new user only</p>
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
  </div>
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

//footer part 


</script> 
</body>
</html>
