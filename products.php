<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta name="google-site-verification" content="HFbmTnl3DFY0OcfFafsHdSffB2itOoYCnX-j9iUUCqE" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://www.affinity.salon/products.php">
    <meta name="description" content="Explore our premium range of hair and beauty products.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Bellefair&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <link rel="stylesheet" href="css/slidemenu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <title>Our Products</title>

  <style>
    body {
        font-family: 'Inter', sans-serif;
        color: #333;
        background-color: #000;
    }

    .footer-head h4,
    .footer-heading {
        font-family: 'Bellefair', serif;
        color: #e2b97f;
        font-size: 1.5rem;
        margin-top: 0;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .contact-info {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .contact-info li {
        margin-bottom: 10px;
        color: #bbb;
        font-size: 1rem;
        display: flex;
        align-items: center;
        line-height: 1.4;
    }

    .contact-info li .footer-icon {
        color: #e2b97f;
        margin-right: 10px;
        font-size: 1.2rem;
        width: 20px;
        text-align: center;
    }

    .contact-info li a {
        color: #bbb;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contact-info li a:hover {
        color: #e2b97f;
    }

    .footer-area {
        background-color: #000;
        padding: 60px 0;
    }

    .footer-content {
        padding-top: 0;
        padding-bottom: 0;
    }

    .footer-head {
        margin-top: 0;
        padding-top: 0;
    }

    .products-banner-text-band {
        background-color: #000;
        padding: 60px 0;
        text-align: center;
    }

    .products-page-title {
        font-family: 'Bellefair', serif;
        font-size: 3.5rem;
        font-weight: normal;
        color: #fff;
        margin: 0;
        line-height: 1;
    }

    .products-banner-text-band p {
        font-size: 1.2rem;
        color: #ccc;
        margin-top: 15px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .products-banner-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        display: block;
    }

    .products-content-area {
        background-color: #000;
        padding: 60px 0;
    }

    .products-sidebar {
        background-color: #1a1a1a;
        padding: 30px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .products-sidebar h5 {
        font-family: 'Bellefair', serif;
        color: #e2b97f;
        font-size: 1.3rem;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #333;
        padding-bottom: 10px;
    }

    .products-sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .products-sidebar ul li {
        margin-bottom: 10px;
    }

    .products-sidebar ul li a {
        color: #bbb;
        text-decoration: none;
        font-size: 1rem;
        transition: color 0.3s ease;
        display: block;
        padding: 5px 0;
    }

    .products-sidebar ul li a:hover,
    .products-sidebar ul li a.active {
        color: #e2b97f;
    }

    .products-sidebar .price-filter-range {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
        color: #ccc;
    }

    .products-sidebar .price-filter-range span {
        font-size: 0.9rem;
    }

    .products-sidebar .price-filter-input {
        width: 80px;
        background-color: #000;
        border: 1px solid #333;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .products-sidebar .price-filter-button {
        background-color: #e2b97f;
        color: #000;
        border: none;
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 0.9rem;
        margin-top: 15px;
        display: block;
        width: 100%;
    }

    .products-sidebar .price-filter-button:hover {
        background-color: #d1a86e;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 30px;
    }

    .product-card {
        background-color: #1a1a1a;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .product-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        display: block;
        border-bottom: 1px solid #333;
    }

    .product-info {
        padding: 20px;
    }

    .product-name {
        font-family: 'Inter', sans-serif;
        font-size: 1.2rem;
        font-weight: 500;
        color: #fff;
        margin-bottom: 10px;
        min-height: 2.4em;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-price {
        font-family: 'Bellefair', serif;
        font-size: 1.4rem;
        color: #e2b97f;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .product-button {
        background-color: #e2b97f;
        color: #000;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        text-decoration: none;
        display: inline-block;
    }

    .product-button:hover {
        background-color: #d1a86e;
        transform: translateY(-2px);
        color: #000;
    }

    .product-button:active {
        transform: translateY(0);
    }

    @media (max-width: 1200px) {
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 25px;
        }
        .products-page-title {
            font-size: 3rem;
        }
    }

    @media (max-width: 992px) {
        .products-content-area {
            padding: 40px 0;
        }
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .products-page-title {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .products-page-title {
            font-size: 2rem;
        }
        .products-banner-text-band {
            padding: 40px 20px;
        }
        .products-banner-text-band p {
            font-size: 1rem;
        }
        .product-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .products-sidebar {
            margin-bottom: 30px;
        }
    }

    @media (max-width: 576px) {
        .products-page-title {
            font-size: 1.8rem;
        }
        .products-banner-text-band {
            padding: 30px 15px;
        }
        .products-banner-image {
            height: 250px;
        }
        .product-grid {
            grid-template-columns: 1fr;
        }
        .products-sidebar {
            padding: 20px;
        }
    }
</style>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "Affinity Salon",
            "url": "https://www.affinity.salon/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "{search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Affinity Salon",
            "alternateName": "Affinity Hair & Beauty",
            "url": "https://www.affinity.salon/",
            "logo": "",
            "sameAs": [
                "https://www.facebook.com/affinityeliteindia",
                "https://www.instagram.com/affinity.elite",
                "https://www.affinity.salon/"
            ]
        }
    </script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NJW4QH8K');
    </script>
</head>

<body id="home" class="slide_menu slide-right" data-spy="scroll" data-target="#navbar-example">

    <?php include "navbar.php"; ?>

    <section class="products-banner-section">
        <div class="products-banner-text-band">
            <div class="container">
                <h1 class="products-page-title">OUR PRODUCTS</h1>
                <p>Discover our curated selection of premium hair and skincare products designed to elevate your beauty routine.</p>
            </div>
        </div>
        <img src="img/banner.jpg" alt="Products Banner" class="products-banner-image img-fluid">
    </section>

    <section class="products-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="products-sidebar">
                        <h5>Shop By Category</h5>
                        <ul>
                            <li><a href="#" class="active">All Products</a></li>
                            <li><a href="#">Hair Care</a></li>
                            <li><a href="#">Skin Care</a></li>
                            <li><a href="#">Styling Tools</a></li>
                            <li><a href="#">Fragrances</a></li>
                            <li><a href="#">Gifts & Kits</a></li>
                        </ul>

                        <h5 class="mt-4">Shop By Brand</h5>
                        <ul>
                            <li><a href="#">Kerastase</a></li>
                            <li><a href="#">Skeyndor</a></li>
                            <li><a href="#">Lakme</a></li>
                            <li><a href="#">Other Brands</a></li>
                        </ul>

                        <h5 class="mt-4">Price Range</h5>
                        <div class="price-filter-range">
                            <span>PKR 0</span>
                            <span>PKR 50,000+</span>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <input type="number" class="form-control price-filter-input me-2" placeholder="Min" value="0">
                            <span class="text-white mx-1">-</span>
                            <input type="number" class="form-control price-filter-input ms-2" placeholder="Max" value="50000">
                        </div>
                        <button class="price-filter-button mt-3">Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/iscroll.js"></script>
    <script src="js/slidemenu.js"></script>
    <script src="js/main.js"></script>

    <script>
        var swiperBanner = new Swiper(".banner", {
            slidesPerView: 1,
            spaceBetween: 0,
            autoplay: {
                delay: 5000,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        $(document).ready(function() {
            // Example for active category link
            $('.products-sidebar ul li a').on('click', function(e) {
                e.preventDefault(); // Prevent default link behavior
                $('.products-sidebar ul li a').removeClass('active');
                $(this).addClass('active');
                // In a real application, you would trigger product filtering here
                console.log("Category clicked: " + $(this).text());
            });

            // jQuery UI slider for price range (if you choose to implement it)
            // You'll need to make sure the jQuery UI CSS is also linked in the head for full styling.
            // if ($.fn.slider) {
            //     $("#slider-range").slider({
            //         range: true,
            //         min: 0,
            //         max: 10000,
            //         values: [0, 50000],
            //         slide: function(event, ui) {
            //             $("#amount").val("PKR " + ui.values[0] + " - PKR " + ui.values[1]);
            //         }
            //     });
            //     $("#amount").val("PKR " + $("#slider-range").slider("values", 0) +
            //         " - PKR " + $("#slider-range").slider("values", 1));
            // }
        });
    </script>
</body>

</html>