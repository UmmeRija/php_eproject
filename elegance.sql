-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 04:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elegance`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dates` varchar(100) DEFAULT NULL,
  `times` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `stylist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Conditioner'),
(2, 'Hair Care'),
(3, 'Mask'),
(4, 'Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'abc', 'abc@gmail.com', '0333-4567891', 'hello this is a test');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `street_address_house` varchar(255) NOT NULL,
  `street_address_apt` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin_code` varchar(20) DEFAULT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `order_date` datetime DEFAULT current_timestamp(),
  `order_items_json` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `street_address_house`, `street_address_apt`, `city`, `state`, `pin_code`, `order_total`, `payment_method`, `status`, `order_date`, `order_items_json`) VALUES
(1, 1, 'yumi', 'abc', 'y@gmail.com', '0321-3880737', 'abc', '', 'abc', 'Sindh', '2345678', 27500.00, '', 'pending', '2025-07-07 19:36:29', '[{\"id\":15,\"name\":\"Biotop 911 Conditioner (500ml)\",\"quantity\":5,\"price_per_item\":5500,\"image\":\"biotop.png\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image`, `created_at`, `category_id`) VALUES
(15, 'Biotop 911 Conditioner (500ml)', 'Biotop 911 Quinoa Conditioner is Biotop best-selling ultra-conditioning treatment for damaged and lifeless hair. The 911 Quinoa formula restores hair’s moisture, repairs frizz and controls breaking.', 5500.00, 7, 'biotop.png', '2025-07-03 16:29:22', 1),
(17, 'Biotop 911 Shampoo (500ml)', 'Biotop Professional 911 Quinoa Shampoo is a nutritive, restorative, creamy shampoo that brings hair back to life using quinoa and vitamin E extracts while gently cleansing the hair. Suitable for use after Brazilian hair straightening treatment.\r\n\r\n', 4000.00, 6, 'biotop sham.png', '2025-07-03 16:33:40', 4),
(18, 'Kenue Care Absolute Volume Conditioner (250ml)', 'Conditioners often weigh your hair down, which is the last thing you want when big volume is your goal. Care Absolute Volume delivers what others can’t: full, thick hair that’s soft, conditioned and moisturized, not limp, listless and flat. Infused with moisturizing, thickening provitamin B5, plumping and strengthening wheat proteins, it lifts your hair up, not weigh it down.', 4999.00, 6, 'kenue.png', '2025-07-03 16:39:52', 1),
(19, 'Kenue Care Miracle Elixir Keratin Spray (140ml) ', 'After lifting, blonde hair needs special care. Keune Ultimate Blonde After Blonde Treatment is a nourishing salon treatment that produces healthy, soft hair with lasting conditioning. This conditioning salon treatment contains integrated Bond Fuser technology and helps to protect the hair’s outer structure.', 3999.00, 3, 'kenue care miracle.png', '2025-07-03 16:47:27', 2),
(22, 'Kenue So Pure Moisturizing Treatment (200ml)', 'Ylang Ylang & Palmarosa aromatherapy Enriched with certified organic Argan Oil. A conditioning treatment to hydrate dry hair, producing healthy, shiny hair. Certified organic Argan Oil restores moisture balance. The Ylang Ylang and Palmarosa aromatherapy has a soft, sweet scent with a sensual aroma. Paraben free.', 4600.00, 10, 'kenue so pure.png', '2025-07-04 10:37:59', 2),
(25, 'Kenue Care Vital Nutrition Shampoo (300ml)', 'the most intensely nourishing shampoo we could make. Massage Care Vital Nutrition Shampoo into wet hair to cleanse, yes, but also to restore and revitalize stressed strands. The rich formula is made with a blend of five essential minerals so your hair is left feeling healthy and soft, never stripped or dry. Thanks to Nutri-Injection Technology, active ingredients dive deep beneath the surface to thoroughly moisturize and form a protective barrier around each strand. Good for all hair types, this is a can’t-go-wrong shampoo.', 1500.00, 4, 'kenue care.png', '2025-07-04 10:57:33', 4),
(27, 'Kenue So Pure Moisturizing Treatment (200ml) ', 'Ylang Ylang & Palmarosa aromatherapy Enriched with certified organic Argan Oil. A conditioning treatment to hydrate dry hair, producing healthy, shiny hair. Certified organic Argan Oil restores moisture balance. The Ylang Ylang and Palmarosa aromatherapy has a soft, sweet scent with a sensual aroma. Paraben free.', 3000.00, 5, 'kenue mosturizing.png', '2025-07-04 11:04:19', 2),
(28, 'Kenue So Pure Recover Treatment (200ml)', 'A treatment with rich lathering to repair, nourish and strengthen damaged hair from inside out. Certified organic Avocado oil conditions and strengthens the hair. Quinoa and certified organic Coconut oil proteins aid in repairing the hair. Certified organic Argan Oil adds moisture, shine and protection.', 4999.00, 8, 'kenue so pure recover.png', '2025-07-04 11:06:23', 2),
(29, 'Kenue Style Volume Root Volumizer (300ml)', 'Big volume starts with good prep. For extra lift of normal to thick hair, we recommend N°75 Root Volumizer. This ultralight spray has level 7 hold, and leaves hair manageable – with a nice touch of shine along the lengths.', 5999.00, 3, 'kenue style vol rooy.png', '2025-07-04 11:07:55', 2),
(30, 'Kenue Ultimate Blonde (500ml)', 'After lifting, blonde hair needs special care. Keune Ultimate Blonde After Blonde Treatment is a nourishing salon treatment that produces healthy, soft hair with lasting conditioning. This conditioning salon treatment contains integrated Bond Fuser technology and helps to protect the hair’s outer', 7300.00, 7, 'Kenue Ultimate Blonde.png', '2025-07-04 11:09:01', 2),
(31, 'Keune Absolute Volume Shampoo (300ml)', 'Big is beautiful. And to give you the biggest, most beautiful hair, we made Absolute Volume. Enriched with moisturizing, thickening provitamin B5, plumping and strengthening wheat proteins, it lifts your hair up where it belongs without adding weight.', 5400.00, 5, 'kenue absolute vol shampoo.png', '2025-07-04 11:09:56', 4),
(32, 'Keune Care Keratin Smooth 2 Phase Spray (200ml)', 'Keratin Smooth 2-Phase Spray is an instantly smoothing, softening and detangling conditioner. Incredibly lightweight thanks to its low pH level, it regulates the moisture balance in your hair while strengthening strands from the inside out. It also adds instant shine and makes your hair easy to comb through and style. Simply mist on damp or dry hair and go about your day!', 4000.00, 7, 'kenue care keratin spray.png', '2025-07-04 11:11:02', 2),
(33, 'Keune Color Ultimate Blonde (300ml)', 'Keune Color Ultimate Blonde Neutralizing Blonde Spray neutralizes unwanted brassiness. Use this genius spray on both dry and wet hair to neutralize unwanted brassiness. It’s also perfect for revealing or emphasizing cool shades and ashy highlights.', 5600.00, 5, 'Keune Color Ultimate Blonde.png', '2025-07-04 11:13:05', 2),
(34, 'Keune Curl Control Shampoo (300ml)', 'This shampoo defines soft and bouncy curls and stimulates the scalp. This mild cleansing shampoo prevents fluff and gives your curls optimal resilience. Keratin nourishes and strengthens the hair structure for strong, bouncy and easily combable curls. Raspberry seed oil moisturises and softens the curls, thanks to vitamin E and the fatty acids omega 3, 6 and 9 that nourish the hair and prevent frizz. The curl bounce system with wood-derived ingredients strengthens curls and revives the pattern for luscious bouncy curls.', 9000.00, 3, 'Keune Curl Control Shampoo.png', '2025-07-04 11:15:42', 4),
(35, 'Keune Essential Conditioner Men (250ml)', 'So you’ve chosen your favorite 1922 by J.M. Keune shampoo, with all those goodies that nourish and strengthen hair. That’s just the beginning of getting hair in great shape. Our Essential Conditioner has what it takes to keep hair under control and ready to face a new day. Now’s the time to top up the nourishment and also give hair another dose of strengthening with creatine. And don’t forget to condition your beard – because facial hair also deserves a little extra loving care.', 6999.00, 4, 'Keune Essential Conditioner Men.png', '2025-07-04 11:16:46', 1),
(36, 'Keune Essential Shampoo Men (250ml)', 'Men’s hair styling depends on healthy hair – and let’s not forget the scalp, where all that fantastic hair comes from. Essential Shampoo is everything in one. A shampoo, beard wash and body wash. To strengthen, thicken and feed hair the nutrients it needs to thrive, we blended in creatine and bamboo. It’s the perfect everyday shampoo for dry hair and scalp.', 5000.00, 11, 'Keune Essential Shampoo Men.png', '2025-07-04 11:17:42', 4),
(37, 'Keune Fortifying Lotion Men (75ml)', 'We put our many decades of experience and scientific expertise into creating a leave-in lotion that actually extends the lifecycle of hair. Fortifying Lotion from 1922 by J.M. Keune is a powerhouse for hair growth. Liposomes significantly increase hair growth – by 25% within just 4 days. Vitamin H (biotin) makes hair’s structure stronger, so hair doesn’t easily break or fall out. Then there’s red ginseng root extract to promote hair growth, stimulating eucalyptus extract – and energizing caffeine to wake up hair roots. Say farewell to delicate, fine and dull hair.', 4999.00, 7, 'Keune Fortifying Lotion Men.png', '2025-07-04 11:18:42', 2),
(38, 'Keune Free Style Spray (300ml)', 'We love the joys of great hairspray, but helmet head is so last century. That’s why we developed N°86 Freestyle Spray. For strong, all-day hold that sets hair and adds natural shine – but also respects hair’s freedom of movement. Well, except for those bits of hair that want to frizz out. We know how to put them in their place.', 1800.00, 7, 'Keune Free Style Spray.png', '2025-07-04 11:20:03', 2),
(39, 'Keune Premier Paste Men (75ml)', 'We believe in having fun with hair – but we’re also serious about styling. Premier Paste is a versatile product that can be used on towel-dry hair for extra control. Or dial it up by working a dab or two through dry hair, for texture and volume that lasts all day long. Of course we make sure our paste keeps hair healthy, with a dose creatine to keep hair going strong. Just remember, a little paste goes a long way.', 4600.00, 4, 'Keune Premier Paste Men.png', '2025-07-04 11:20:49', 2),
(40, 'Keune Satin Oil Treatment (95ml)', 'A smoothing, moisturizing hair oil. It’s easy to use: just run a few drops through your damp or dry lengths. Satin Oil Treatment is super lightweight and won’t make your hair heavy or greasy. Its maracuja, baobab and monoï oil leaves your hair feeling good and looking great: healthy, soft and shiny. And here’s a tip: you can add a few drops of Satin Oil Treatment to other Satin Oil products to boost their moisturizing prowess.', 7999.00, 8, 'Keune Satin Oil Treatment.png', '2025-07-04 11:23:00', 2),
(41, 'Keune So Pure Care Satin Oil Mask (250ml)', 'A sumptuous, supremely moisturizing mask perfect for dull, dry hair. Use once or twice a week to nourish and treat. After cleansing, towel dry, work through lengths and ends, indulge and rinse thoroughly. If you want to go all out, wrap a warm towel around your head while Satin Oil Mask sinks in. Its rich formula is made with maracuja, baobab and monoï oil and a blend of five essential minerals so your hair is left feeling good and looking great: healthy, soft and shiny. Good for all hair types, this is a moisturizing must-have.', 6700.00, 4, 'Keune So Pure Care Satin Oil Mask.png', '2025-07-04 11:30:20', 3),
(42, 'Keune So Pure Color Care Conditioner (250ml)', 'Who needs dull hair color – especially when it’s been created by a talented Keune hairstylist. So Pure Color Care Conditioner is formulated to revitalize color-treated hair after shampooing with So Pure Color Care Shampoo – restoring hair’s moisture balance and preventing color from fading.', 4699.00, 6, 'Keune So Pure Color Care Conditioner.png', '2025-07-04 11:31:37', 1),
(43, 'Keune So Pure Color Care Shampoo (250ml)', 'A great color treatment is a work of art – and we want it to stay beautiful long after leaving the salon. It all begins with the right shampoo. So Pure Color Care Shampoo is sulfate-free – and gently cleanses, hydrates and nourishes, while keeping color sealed into each and every strand of hair.', 2999.00, 9, 'Keune So Pure Color Care Shampoo.png', '2025-07-04 11:32:31', 4),
(44, 'Keune So Pure Moisturizing Conditioner (250ml)', 'Shiny, beautifully hydrated hair – thanks to an organic, plant-based formula. That’s the inspiration behind So Pure Moisturizing Conditioner. We created this conditioner to reconstruct and detangle dry and', 2999.00, 6, 'Keune So Pure Moisturizing Conditioner.png', '2025-07-04 11:35:46', 1),
(45, 'Keune So Pure Moisturizing Shampoo (250ml)', 'As in nature, healthy hair is all about balance. We formulated So Pure Moisturizing Shampoo with organic plant-based ingredients to oh-so-gently restore hair and scalp hydration. Our Moisturizing Shampoo is safe to use on color treated hair, and contains no sulfates – leaving hair soft and shiny without stripping hair’s natural oils', 8999.00, 7, 'Keune So Pure Moisturizing shampoo.png', '2025-07-04 11:40:11', 4),
(46, 'Keune So Pure Recover Shampoo (250ml)', 'Lifeless, brittle hair doesn’t need to be sheared away. Repair it! A gentle So Pure Recover salon treatment is a great first step. Keep up the good work at home with So Pure Recover Shampoo – and let the organic essential oils and plant extracts restore hair to its naturally shiny, healthy fabulousness.', 3499.00, 6, 'Keune So Pure Recover Shampoo.png', '2025-07-04 11:41:34', 4),
(47, 'pH Argan Keratin Mask (200ml)', 'Nourishes, renews and repairs the structure of the hair giving it shine, softness and strength.', 2599.00, 7, 'pH Argan Keratin Mask.png', '2025-07-04 11:43:49', 3),
(48, 'pH Argan Keratin Shampoo (200ml)', 'Deeply moisturises hair leaving it stronger, shiny and soft.', 5500.00, 8, 'pH Argan Keratin Shampoo.png', '2025-07-04 11:45:03', 4),
(49, 'pH Extra Moisture Butter Mask (200ml)v', 'Enriched with kokum nut butter and rose extract\r\nHydrating and regenerating effect', 3400.00, 5, 'pH Extra Moisture Butter Mask.png', '2025-07-04 11:45:48', 3),
(50, 'pH Pure Repair Mask (200ml)', 'Botox effect mask with hyaluronic acid, for bleached and damaged hair. Nourishes and fortifies with a plumping and anti-aging effect, making the hair strong, soft and shiny.', 4000.00, 7, 'pH Pure Repair Mask.png', '2025-07-04 11:46:37', 3),
(51, 'pH Pure Repair Shampoo (400ml)', 'Botox effect shampoo with hyaluronic acid for bleached and treated hair\r\nGently cleanses and moisturizes', 4500.00, 15, 'pH Pure Repair Shampoo.png', '2025-07-04 12:08:26', 4),
(52, 'Schwarzkopf BC Clean Balance Anti-Pollution Water Tocopherol (150ml)', 'Schwarzkopf BC Clean Balance Anti-Pollution Water 150ml is a multipurpose leave-in formula that was specially developed for any hair type exposed to a cosmopolitan or polluted environment. To begin with, this special composition has a revitalizing effect that promises to provide a fresh hair feeling for up to 24 hours. Suitable to apply before and after styling, the Anti-Pollution Water offers, moreover, heat protection and a conditioning and moisturizing effect.', 5900.00, 6, 'Schwarzkopf BC Clean Balance Anti-Pollution Water Tocopherol.png', '2025-07-04 12:09:52', 2),
(53, 'Schwarzkopf BC pH 4.5 Color Freeze Spray Conditioner (200ml)', 'Schwarzkopf BC pH 4.5 Color Freeze Spray Conditioner 200ml is a lightweight leave-in conditioner that revitalizes and restores shine to color-treated hair. It features the exclusive pH 4.5 Balancer Technology, which not only restores the hair to its optimal pH value, but actually stabilizes and strengthens the hair matrix, keeping the color pigments locked inside the hair. At the same time, the lightweight spray-on formula improves the elasticity and strength of the hair, making this conditioner the ideal first step in your hairstyling routine. Simply shake well, spray on towel-dried hair, and let this high-tech formula do the smoothing and detangling work for you! If you tend to blow dry your hair, there’s also a hidden benefit: this spray-on conditioner offers heat protection, helping you maintain healthy hair even after a blow-dry.', 9999.00, 18, 'Schwarzkopf BC pH 4.5 Color Freeze Spray Conditioner.png', '2025-07-04 12:10:48', 1),
(54, 'Schwarzkopf BC Repair Rescue Spray Conditioner Arginine (200ml)', 'Schwarzkopf BC Repair Rescue Arginine Spray Conditioner 200ml is a leave-in bi-phasic conditioner that repairs damaged hair while improving its combability and manageability. The formula is lightweight, and ideal to instantly replenish the hair without adding weight. The formula combines powerful ingredients and cutting-edge technology to offer the best results. Arginine, vegan keratin, and Cell Equalizer Technology work in tandem to repair and restructure the hair, repairing up to 3 years of damage.', 1499.00, 7, 'Schwarzkopf BC Repair Rescue Spray Conditioner Arginine.png', '2025-07-04 12:12:27', 1),
(55, 'Schwarzkopf Moisture Kick Glycerol Spray Conditioner (200ml)', 'Schwarzkopf BC Moisture Kick Glycerol Spray Conditioner 200ml is a leave-in conditioner for normal to dry hair, way or curly. This conditioner will give the hair an instant moisture boost and its biphasic formula gives this conditioner a lightweight feel and makes it easy to distribute it evenly over the hair', 6799.00, 4, 'Schwarzkopf Moisture Kick Glycerol Spray Conditioner.png', '2025-07-04 12:13:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwords` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `passwords`, `phone`) VALUES
(1, 'Yumna', 'yumna@gmail.com', '$2y$10$X1UxiRYL/pFekZSWi/FqYOu0YLIiOxbsbQtarnh5J32dplEfwQF36', '0321-3880737'),
(2, 'Hala', 'hala@gmail.com', '$2y$10$Ue9ZTce24gdLsSU0sKl5L.tkF9u951MHyPKhhGgkCOJG9HWD9v3ey', '0334-9876512'),
(3, 'Raza', 'raza@gmail.com', '$2y$10$IWXQZTnkyM9yDkl2vQ5mD..vCpJNWLb.mRrWkWlj1emf6ucKiNX3O', '0331-9764532'),
(4, 'Sania', 'sania@gmail.com', '$2y$10$CW0Mn6vIFITFuF90vuRXOOw1DrrLZU19XKblkL0Ed10/d3SqPeCTO', '0334-4567891'),
(5, 'Ahmed', 'ahmed@gmail.com', '$2y$10$S7ff5Tb4ijU6Te5lk4hfeOxsvzx.IGpaf50KLe5Bq/RgrKF75aW4K', '0332-4567832'),
(6, 'Hala Khan', 'haladawood2828@gmail.comq', '$2y$10$v.jR5hpKdWkiSw/pP9tAd.OiJfhfe3WI2doKa2XRRRHqKLmujqyD6', '0312-2497999'),
(7, 'Alisha Rajput', 'alishakhan22@gmail.com', '$2y$10$j1oJoPuucqpkEIz421OwZuyBQco47H5MvscgaR4xm2ekAoHQbu4M.', '0312-3333333'),
(8, 'Hala Khan', 'haladawood2828@gmail.com', '$2y$10$WmF.KgMjmft8zLISupMB0umAP6Wa/5cHGWja0paDeSQ6ZEpRmptEG', '0312-2222233');

-- --------------------------------------------------------

--
-- Table structure for table `stylist`
--

CREATE TABLE `stylist` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailAdress` varchar(100) DEFAULT NULL,
  `PhoneNo` int(11) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Specialization` varchar(100) DEFAULT NULL,
  `YearsOfExperience` varchar(100) DEFAULT NULL,
  `WorkingHours` varchar(100) DEFAULT NULL,
  `Portfolio` varchar(100) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Pending',
  `Branch` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stylist`
--

INSERT INTO `stylist` (`Id`, `FullName`, `EmailAdress`, `PhoneNo`, `Gender`, `Specialization`, `YearsOfExperience`, `WorkingHours`, `Portfolio`, `Status`, `Branch`) VALUES
(1, 'Hala Khan', 'haladawood2828@gmail.com', 2147483647, 'Female', 'I am A Nail Painter', '4', '4PM - 7PM ', 'Ffrag.PNG', 'Pending', 'North Nazimabad'),
(2, 'Hala Khan', 'haladawood2828@gmail.com', 2147483647, 'Male', 'HAIR STYLIST & NAIL PAINTER', '0', '4PM - 7PM ', 'cardsss.PNG', 'Pending', 'Male'),
(3, 'Hala Khan', 'haladawood2828@gmail.com', 2147483647, 'Other', 'I AM A HAIR STYLIST', '0', '666565', 'cardsss.PNG', 'Pending', 'Other'),
(4, 'Yumna Hossain', 'yumnahossain@gmail.com', 2147483647, 'Female', 'HAIR STYLIST & NAIL PAINTER', '1', '9AM - 5PM', 'style.PNG', 'Pending', 'PECHS Block II');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailAdress` varchar(100) DEFAULT NULL,
  `Passwords` varchar(255) DEFAULT NULL,
  `ContactNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FullName`, `EmailAdress`, `Passwords`, `ContactNo`) VALUES
(1, 'Hala Khan', 'haladawood2828@gmail.com', '$2y$10$u8h7WlE8TO3hwiqOg5Hj5OGht2IDlB6L7BYHx5Ti4kL4WNKmHlL/W', 2147483647),
(2, 'Alisha', 'alishakhan22@gmail.com', '$2y$10$h7eKREkUtp7ikmjBeTAsZeokwMaGzFq13hgis8cjZyRLFt17C/1NK', 2147483647),
(3, 'Yumna Hossain', 'yumnahossain@gmail.com', '$2y$10$Pzz.0RVkKqr9GIlXoUdkzuRundB7c8ceXsYRGLWxThB25F7ZYY3Jq', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stylist`
--
ALTER TABLE `stylist`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stylist`
--
ALTER TABLE `stylist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
