-- Active: 1741548262656@@127.0.0.1@3306@petopia
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 08:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('Pending','Confirmed','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `user_id`, `pet_id`, `date`, `time`, `status`) VALUES
(1, 5, 1, '2025-01-14', '17:19:59', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `cat_accessories`
--

CREATE TABLE `cat_accessories` (
  `accessories_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_accessories`
--

INSERT INTO `cat_accessories` (`accessories_id`, `type`, `name`, `brand`, `image_url`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(1, 'collar', 'Adjustable Cat Collar ', 'non-brand', 'https://petzonebd.com/wp-content/uploads/2023/10/51RgxrdZgfL._AC_UF10001000_QL80_.jpg', 60.00, 40.00, '2025-01-20 11:12:16', '2025-01-20 11:12:16'),
(2, 'collar', 'LED Light Up Cat Collar', 'GlowPets', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcEC-LT9Zwp3kfF1CKBDi5t10ukXO0AKrMag&s', 150.00, 120.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(3, 'harness', 'Adjustable Cat Harness', 'PawComfort', 'https://images-cdn.ubuy.com.sa/633c5987ec5add70a83948ca-labota-cat-harness-and-leash-set-for.jpg', 300.00, 250.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(4, 'harness', 'Reflective Cat Harness', 'SafePaws', 'https://m.media-amazon.com/images/I/61ujKjtP1XL._AC_SL1002_.jpg', 350.00, 300.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(5, 'scratching', 'Cat Scratching Post', 'PurrfectHome', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQROcqoeL2i-psSx5WVmYiQVrsWnoRYmzvdQ&s', 500.00, 450.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(6, 'scratching', 'Cat Scratching Pad', 'ClawMaster', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx_T3xE9IoQjuYYLbjaKPLqnxVwkG9I1OS4A&s', 150.00, 120.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(7, 'grooming', 'Cat Fur Grooming Brush', 'PetCare', 'https://mewmewshopbd.com/uploads/media-manager/2021/10/20230109165140Round-Shape-Premium-Automatic-Grooming-Brush-1732701345.jpg', 400.00, 350.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(8, 'grooming', 'Cat Nail Clipper', 'PetGroom', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxz7uIQEOtTOM_xM5WVNBX-QKUFJFm4Ojacw&s', 100.00, 80.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(9, 'grooming', 'De-shedding Cat Brush', 'FurAway', 'https://m.media-amazon.com/images/I/71qfz1I1S+L.jpg', 250.00, 220.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(10, 'feeder', 'Automatic Cat Feeder', 'FeedTime', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnsHE1YvrU6Xzz9c62Snn5AnG7l9zfIWcPcw&s', 1500.00, 1300.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(11, 'feeder', 'Stainless Steel Cat Bowl', 'PetEats', 'https://petzonebd.com/wp-content/uploads/2023/10/41zAdO7Gf-L._AC_-300x300.jpg', 300.00, 250.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(12, 'feeder', 'Ceramic Cat Bowl', 'EcoPets', 'https://img.drz.lazcdn.com/static/bd/p/f2cceb5e08748ce094d0860185850d3d.jpg_720x720q80.jpg', 400.00, 350.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(13, 'harness', 'Cat Body Harness with Leash', 'KittyStyle', 'https://5.imimg.com/data5/SELLER/Default/2024/3/405284952/JV/CD/RL/65247454/cat-body-harness-with-leash-500x500.jpg', 450.00, 400.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(14, 'collar', 'Personalized Cat Collar', 'CustomPets', 'https://m.media-amazon.com/images/I/517waofiUzL.jpg', 250.00, 200.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(15, 'harness', 'Comfort Fit Cat Harness', 'PetSoft', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpjz3vRnkhIq5n5Ej1ZpsT-R-6EDTPM32y8A&s', 350.00, 300.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(16, 'scratching', 'Cardboard Cat Scratcher', 'KittyClaws', 'https://img.drz.lazcdn.com/static/bd/p/224e81793d4a33b44c4700edffd90b0b.jpg_960x960q80.jpg_.webp', 200.00, 150.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(17, 'scratching', 'Multi-Level Cat Scratcher', 'ClawCave', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVkqHBgj_y2EVzu7bJOs1ELe525CAg0sTIWA&s', 600.00, 550.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(18, 'grooming', 'Cat Deshedding Glove', 'FurGlove', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNy2LwGgp8e3MRJHH5MqqrwYEnKy6BGdzDng&s', 350.00, 300.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(19, 'grooming', 'Cat Bathing Brush', 'CleanKitty', 'https://ds.rokomari.store/rokomari110/ProductNew20190903/260X372/Cat_Grooming_BrushPet_Deshedding_Tools_O-Non_Brand-490c4-404830.png', 450.00, 400.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(20, 'collar', 'Silicone Cat Collar', 'SoftCollar', 'https://5.imimg.com/data5/SELLER/Default/2023/10/352536812/FQ/IJ/IE/89400773/whatsapp-image-2023-08-11-at-8-42-57-pm-500x500.jpeg', 180.00, 150.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(21, 'feeder', 'Pet Feeder with Water Dispenser', 'DrinkFeed', 'https://m.media-amazon.com/images/I/71opisM5YpL.jpg', 1000.00, 900.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(22, 'collar', 'Luxury Cat Collar with Bowtie', 'ClassyPets', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJCrr2z9jRa48cJmWC_VtPukti7FbBLNtLQQ&s', 500.00, 450.00, '2025-01-20 11:26:42', '2025-01-20 11:26:42'),
(0, 'Accessories', 'Smart Interactive Cat toy', 'none', 'https://cdn.shopify.com/s/files/1/0582/8349/1478/files/Smart_Interactive_Cat_toys_by_Goofy_Tails_Best_cat_toys_480x480.jpg?v=1663588759', 300.00, 350.00, '2025-01-28 11:43:50', '2025-01-28 11:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `cat_listing`
--

CREATE TABLE `cat_listing` (
  `listing_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('available','sold','pending') NOT NULL,
  `certification` varchar(255) DEFAULT NULL,
  `vaccination_status` enum('vaccinated','not vaccinated') NOT NULL,
  `pet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_listing`
--

INSERT INTO `cat_listing` (`listing_id`, `price`, `status`, `certification`, `vaccination_status`, `pet_id`) VALUES
(1, 4999.00, 'available', 'none', 'vaccinated', 1),
(2, 7000.00, 'available', 'none', 'vaccinated', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cat_medicines`
--

CREATE TABLE `cat_medicines` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_medicines`
--

INSERT INTO `cat_medicines` (`medicine_id`, `name`, `type`, `brand`, `image_url`, `description`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(1, 'cat star multivitamin', 'vitamin', 'non- brand', 'https://petzonebd.com/wp-content/uploads/2022/08/CAT-STAR-TONIC.jpg', 'Cat Star Multivitamin is a specially formulated supplement designed to provide cats with a comprehensive blend of vitamins, minerals, and essential nutrients. It helps fill any nutritional gaps in your cat’s diet, ensuring they remain energetic, maintain a healthy coat, and support their immune system.', 40.00, 35.00, '2025-01-20 13:26:46', '2025-01-20 13:26:46'),
(2, 'Bravecto', 'topical solution', 'treats rewards', 'https://s7d2.scene7.com/is/image/PetSmart/5316181?fmt=webp&wid=1400&hei=1400', 'Bravecto Topical Solution for Cats works for 12 weeks to treat and control Ixodes scapularis (black-legged ticks)\r\nas well as Asian longhorned ticks, and to treat existing Ctenocephalides felis (flea) infestations. It also treats and controls Dermacentor variabilis (American dog tick) infestations for 8 weeks. It is approved by the FDA and recommended by trusted veterinarians across the country.\r\n', 40.00, 35.00, '2025-01-21 10:29:55', '2025-01-21 10:29:55'),
(3, 'Advantage II', 'topical treatment', 'Bayer', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzvQA5_ptHkGRDrjc_Ye233So3tpujPZbA0Q&s', 'Advantage II is a topical solution for cats that kills fleas, flea eggs, and larvae. It works for up to 30 days.', 50.00, 45.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(4, 'Frontline Plus', 'topical treatment', 'Merial', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWDZKiv-CI0kdbnyhJRp-FfVj2hx54YMoIYQ&s', 'Frontline Plus for Cats provides long-lasting protection against fleas, ticks, and lice. It is waterproof and easy to apply.', 60.00, 55.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(5, 'Capstar', 'oral tablet', 'Elanco', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQB7-HUZlvqJUaA6ol3k736P9nJRGFadu5flQ&s', 'Capstar tablets start killing adult fleas on cats within 30 minutes. It is fast-acting and ideal for severe infestations.', 35.00, 30.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(6, 'Revolution Plus', 'topical solution', 'Zoetis', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyMhr2lgrC1_sITJWSGB3HuCNZCKNg-yhANg&s', 'Revolution Plus provides comprehensive protection against fleas, ticks, ear mites, roundworms, and hookworms for cats.', 70.00, 65.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(7, 'Cheristin', 'topical solution', 'Elanco', 'https://m.media-amazon.com/images/I/61VyhjBVNtL._AC_UF1000,1000_QL80_.jpg', 'Cheristin for Cats is a long-lasting topical flea treatment that starts killing fleas within 30 minutes.', 45.00, 40.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(8, 'Catego', 'topical solution', 'Ceva Animal Health', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRqPt-uatM0iSg2QRnDqlru2ZDbhjQPYS2Eg&s', 'Catego is a topical treatment for cats that kills fleas, ticks, and chewing lice. It is fast-acting and long-lasting.', 55.00, 50.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(9, 'Profender', 'topical solution', 'Bayer', 'https://i2.wp.com/petmedmart.com/wp-content/uploads/2019/12/11222_420.jpg', 'Profender is a topical dewormer for cats that treats and controls roundworms, hookworms, and tapeworms.', 65.00, 60.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(10, 'Comfortis', 'oral tablet', 'Elanco', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRehVu4AhdX8s5rSM9nfNGjaBNmDDydteNITA&s', 'Comfortis tablets kill fleas and prevent flea infestations for a full month. It is beef-flavored and easy to administer.', 80.00, 75.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(11, 'Advocate', 'spot-on solution', 'Bayer', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR7QpErBG9QCFNAbYkx-Wpxrkw2u5QxVmXMg&s', 'Advocate spot-on solution protects cats against fleas, heartworm, intestinal worms, and ear mites.', 85.00, 80.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(12, 'Seresto Collar', 'flea and tick collar', 'Bayer', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQV4-hKpkey_Qd10riJSeF5yZKaQVg2I7Jn5g&s', 'Seresto Flea and Tick Collar for Cats provides 8 months of continuous protection against fleas and ticks.', 90.00, 85.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(13, 'Bravecto Chews', 'oral chew', 'Merck', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyRHei0x1eT-Gdm51Z8bqwsCwrMcBLk_7xuA&s', 'Bravecto Chews for Cats provide 12 weeks of flea and tick protection in a single dose.', 95.00, 90.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(14, 'Stronghold', 'spot-on solution', 'Zoetis', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTREhc5MT4KTpexpzH3M-tRPT1eqiBMfOPOpA&s', 'Stronghold for Cats is a spot-on treatment that provides protection against fleas, worms, and ear mites.', 60.00, 55.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(15, 'Advantix', 'topical solution', 'Bayer', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQapsOYv1QUl-LwEbal5x11qmlY6q2ODXmmwQ&s', 'Advantix provides protection against fleas, ticks, and mosquitoes. It is not suitable for cats with sensitive skin.', 50.00, 45.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(16, 'Milbemax', 'oral tablet', 'Novartis', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCMOf992IJFMAzS-XskLEn-PzldVj_RNN8VQ&s', 'Milbemax tablets are used to treat and prevent worm infestations in cats, including roundworms and tapeworms.', 40.00, 35.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(17, 'Effipro', 'spot-on solution', 'Virbac', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR953LZYHUVreqce1hg9AhoLTBiUm4Rzzu5MQ&s', 'Effipro Spot-On provides effective flea and tick protection for cats. It is easy to apply and long-lasting.', 55.00, 50.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(18, 'Credelio', 'oral tablet', 'Elanco', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqS-Sr0UTrcv_HWUcFPmypcMApmoDR_0T0LA&s', 'Credelio is an oral flea and tick treatment for cats that starts working within 4 hours.', 70.00, 65.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(19, 'Broadline', 'topical solution', 'Merial', 'https://79pets.com/cdn/shop/files/BroadlineSpot-OnForCats5.5-16.5lbs_2.5-7.5kg_600x.png?v=1689240281', 'Broadline for Cats is an all-in-one topical solution that protects against fleas, ticks, and worms.', 75.00, 70.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(20, 'Activyl', 'spot-on solution', 'Merck', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTN68k-UnLj04GyU6nXtQ2yLPCV2Pd8rzv03Q&s', 'Activyl Spot-On is a topical flea treatment for cats that breaks the flea life cycle.', 45.00, 40.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(21, 'Fiproguard', 'topical solution', 'Sentry', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7ia-r1lY_8686Cmi0WUpzucfJ7HXa27NGag&s', 'Fiproguard for Cats provides flea and tick protection for up to 30 days. It is waterproof and easy to apply.', 35.00, 30.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(22, 'Vectra', 'spot-on solution', 'Ceva Animal Health', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5kGrEJRYZxe1_uPlExl3-QWnctLhZQ7sRdQ&s', 'Vectra for Cats is a fast-acting topical flea treatment that kills fleas in all life stages.', 65.00, 60.00, '2025-01-21 10:42:24', '2025-01-21 10:42:24'),
(0, 'vitamin', 'medicine', 'none', 'https://petcobd.com/wp-content/uploads/2022/06/PBD-Cat-Star-Multivitamin-Coat-Tonic-100ml-300x300.png', 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.\r\n\r\nEach 10ml of CAT STAR Multivitamin & Coat Tonic for Cats contains', 100.00, 110.00, '2025-01-28 11:53:35', '2025-01-28 11:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `cat_toys`
--

CREATE TABLE `cat_toys` (
  `toy_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_toys`
--

INSERT INTO `cat_toys` (`toy_id`, `name`, `type`, `brand`, `image_url`, `description`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(1, 'Mouse toy', 'Toy', 'Non-brand', 'https://i.ebayimg.com/images/g/TcgAAOSwNshnRHBu/s-l400.jpg', 'Product name: Vinyl flocking little mouse\r\nProduct size: length 12 cm/ 4.72 inches\r\nProduct color: As shown in the figure\r\nProduct material: enamel\r\n\r\nProduct features:Made from durable materials: This cat toy is made from high-quality, durable materials such as rubber and plush. This ensures that it can withstand the playful nature of cats and last for a long time.\r\nInteractive design: The toy is designed to engage and entertain cats. It features a small rubber mouse with a soft, plush that makes it appealing to cats. Additionally, it has a built-in sound mechanism that produces a squeaking noise when squeezed or played with, adding to the excitement.\r\nSafe for cats: The toy is designed with the safety of cats in mind. It does not have any small parts that can be easily swallowed, and the materials used are non-toxic and pet-friendly.', 300.00, 210.00, '2025-01-20 12:49:57', '2025-01-20 12:49:57'),
(2, 'Feather Wand', 'Toy', 'CatJoy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv7FzKPCrdrzCyndui6rTPJPR7rAWH65j5-w&s', 'A playful wand with colorful feathers to keep your cat entertained', 250.00, 200.00, '2025-01-20 13:06:59', '2025-01-20 13:09:46'),
(3, 'Laser Pointer', 'Toy', 'LaserFun', 'https://cdn.bdstall.com/product-image/giant_292849.jpg', 'High-quality laser pointer designed for safe cat play.', 400.00, 320.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(4, 'Catnip Ball', 'Toy', 'NaturalPet', 'https://mewmewshopbd.com/uploads/media-manager/2021/08/20210816183221132262906_138733004710585_5795675751668453291_n-1-1732701343.jpg', 'A natural catnip-infused ball for hours of fun.', 150.00, 120.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(5, 'Scratching Post Toy', 'Toy', 'ScratchIt', 'https://m.media-amazon.com/images/I/6120nVra5ML._AC_UF350,350_QL50_.jpg', 'A scratching post combined with a ball toy for dual functionality.', 600.00, 450.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(6, 'Interactive Puzzle Toy', 'Toy', 'BrainyPets', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4BDZtYK4tKTCmpqbwv5tNxIfmZBgmTkzFJA&s', 'A puzzle toy to stimulate your cat’s intelligence.', 800.00, 600.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(7, 'Plush Mouse', 'Toy', 'SoftTails', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJV6QRD-wgSy620PBrVJQaO9oNGn3LtcB27w&s', 'A soft and plush toy mouse with a squeaker inside.', 300.00, 250.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(8, 'Rolling Ball', 'Toy', 'WhiskerPlay', 'https://thumbs.dreamstime.com/b/ball-rolling-downwards-3d-14513153.jpg', 'Self-rolling ball with LED lights to attract your cat.', 500.00, 400.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(9, 'Cat Tunnel', 'Toy', 'HideNSeek', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcmPbvdxtkHeMAz5ji6zGMJb1b9Z-BnxX7tw&s', 'Collapsible play tunnel for cats with a peek-a-boo window.', 700.00, 550.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(10, 'Bird Teaser', 'Toy', 'PetTease', 'https://www.go-saltwater-fishing.com/images/WilliamsonLuresExciterBird.jpg', 'A wand toy with a realistic bird design to mimic prey.', 350.00, 280.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(11, 'Cat Kicker Toy', 'Toy', 'KickyFish', 'https://www.jacksongalaxy.com/cdn/shop/products/IMG_8726_2048x2048.jpg?v=1690382580', 'A fish-shaped kicker toy with a catnip pocket.', 400.00, 300.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(12, 'Crinkle Ball', 'Toy', 'SoundPlay', 'https://m.media-amazon.com/images/I/71qDKwHwBZL.jpg', 'Lightweight crinkle balls that make noise to excite cats.', 200.00, 150.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(13, 'Wind-Up Mouse', 'Toy', 'ClassicPlay', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpNS1UmiU0le4dbQMOZ6tHyoGosV5EH2fWTw&s', 'A wind-up mouse toy for interactive playtime.', 450.00, 350.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(14, 'Catnip Stick', 'Toy', 'NaturalJoy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0zUgh4aBpSEuNrYF4GgYNECF51HWRzX73Ww&s', 'All-natural catnip sticks for chewing and play.', 120.00, 100.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(15, 'Hanging Door Toy', 'Toy', 'DoorPlay', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUZ2cWlRstmLa6ydsuOMp1BsxVhxJOa7EGfw&s', 'A hanging toy that attaches to doors for active cats.', 350.00, 300.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(16, 'LED Ball', 'Toy', 'LightFun', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzbzBBcEwO17hS8dOAdq3kKnatpEwFDU3qnA&s', 'A ball with LED lights that flash during play.', 450.00, 360.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(17, 'Climbing Rope Toy', 'Toy', 'ClimbKitty', 'https://m.media-amazon.com/images/I/414f9hEKFOL._AC_UF1000,1000_QL80_.jpg', 'A durable rope toy that doubles as a climbing challenge.', 600.00, 500.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(18, 'Jingle Bell Ball', 'Toy', 'BellPlay', 'https://amarpet-space.sgp1.digitaloceanspaces.com/production/ab817c9349cf9c4f6877e1894a1faa00/bj4ChJLIVW4RnPFZ48IwYxY2JAkuVP-metaQ2F0IFRveSBCYWxsLnBuZw==-.png', 'A ball with a jingle bell inside to intrigue your cat.', 200.00, 160.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(19, 'Catnip Pillow', 'Toy', 'CozyPaws', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVEgn1-B0v9V6RL-pQUM2uccFxMdZ-BOTJng&s', 'A small pillow stuffed with catnip for napping and play.', 250.00, 200.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(20, 'Moving Snake Toy', 'Toy', 'CreepyCrawl', 'https://m.media-amazon.com/images/I/61ALhUIYUCL._AC_UF1000,1000_QL80_.jpg', 'A realistic moving snake toy to engage hunting instincts.', 800.00, 650.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(21, 'Spring Toy', 'Toy', 'BounceJoy', 'https://m.media-amazon.com/images/I/81cQrgVrDHL._AC_SL1500_.jpg', 'Colorful springs that bounce unpredictably for fun.', 300.00, 250.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59'),
(22, 'Interactive Laser Robot', 'Toy', 'SmartPets', 'https://i.ebayimg.com/images/g/sKQAAOSwQb5hMYke/s-l1200.png', 'A robotic laser toy that moves and rotates automatically.', 1200.00, 950.00, '2025-01-20 13:06:59', '2025-01-20 13:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer_message`
--

CREATE TABLE `customer_message` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Service` enum('Consultation','Service','Other') NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `breed`, `age`, `gender`, `color`, `type`, `user_id`) VALUES
(1, 'none', 2, 'male', 'red', 'cat', 1),
(2, 'persian', 3, 'male', 'Red', 'Cat', 2),
(3, 'none', 4, 'female', 'brown', 'cat', 7);

--
-- Triggers `pets`
--
DELIMITER $$
CREATE TRIGGER `check_role_before_insert` BEFORE INSERT ON `pets` FOR EACH ROW BEGIN
    DECLARE user_role VARCHAR(255);

    -- Get the role of the user who is trying to add the pet
    SELECT role INTO user_role FROM users WHERE user_id = NEW.user_id;

    -- Check if the user's role is 'seller'
    IF user_role != 'seller' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Only users with the seller role can add pets';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pet_foods`
--

CREATE TABLE `pet_foods` (
  `food_id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `nutrition_details` text DEFAULT NULL,
  `recommended_for` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_foods`
--

INSERT INTO `pet_foods` (`food_id`, `brand`, `name`, `type`, `nutrition_details`, `recommended_for`, `image_url`, `price`, `discount_price`) VALUES
(1, 'Royal Canin', 'Royal Canin Persian Kitten Cat Food', 'Cat food', 'Tailored Nutrition for Persian Kittens: Royal Canin understands that Persian kittens are a breed apart, with distinct characteristics that require specialized care. With their luxurious coats, charming personalities, and unique health concerns, Persian kittens deserve a diet that caters specifically to their requirements. Royal Canin has carefully formulated this food to ensure your fluffy companion gets the nutrition they need.', 'Persian cat', 'https://petzonebd.com/wp-content/uploads/2022/11/Royal-Canin-Persian-Kitten-Dry-Cat-Food-2.webp', 2100.00, 1950.00),
(2, 'Kibble', 'Meow Mix', 'dry cat food', 'Exclusive Sam\'s Club Formula that supports heart health and oral care\r\nHeart-healthy mix for your cat with added taurine\r\nCrunchy kibble helps scrape away plaque and tarter\r\nGreat taste with exclusive new red heart and green leaf kibbles.\r\n', 'Cat', 'https://i5.walmartimages.com/seo/Meow-Mix-Original-Choice-Dry-Cat-Food-Formula-32-Pounds_5000bd6a-0e9d-4a3e-a885-08f5a1b5a654.5fe8047834d215829f5ca627bf3670b3.jpeg', 300.00, 380.00),
(3, 'Purina', 'purina one plus', 'dry food', ' Natural, High-Protein, With Vitamins, No Artificial Colors, No Artificial Flavors, No Artificial Preservatives, High Fiber, Low Ash, Omegas\r\n', 'Adult cats', 'https://s7d2.scene7.com/is/image/PetSmart/5162617?fmt=webp&wid=1400&hei=1400', 1000.00, 1100.00),
(4, 'Orijen', 'Six fish cat foods', 'cat food', 'The first 6 ingredients are raw fish ingredients.\r\n90%1 fish ingredients, providing a strong source of essential protein, vitamins, and minerals. It contains no added no added soy, corn, wheat or tapioca.\r\nOur authentic WholePrey diet features the most succulent parts of the prey like fish, organs and bone to mimic what your cat\'s ancestors consumed in the wild.\r\nMade in the USA with the world\'s finest ingredients.', 'Adult cats', 'https://www.orijenpetfoods.com/dw/image/v2/BFDW_PRD/on/demandware.static/-/Sites-orijen-na-master-catalog/default/dw6623e939/ORI%20Cat%20Refresh%202023/Six%20Fish/ORI%20Cat%20Six%20Fish%20PDP-1A.png?sw=450', 450.00, 550.00),
(5, 'Samrtheart', 'mackerel', 'dry cat food', 'Nutritional composition\r\nCrude Protein – min 30%\r\nCrude Fat – min 9%\r\nCrude Fibre – max 3%\r\nMoisture – max 10%', 'All types of cat', 'https://smartheart.my/media/catalog/product/cache/bc2ce02c52e1e20f72b0b85a7588785d/m/8/m8can5410_1.png', 350.00, 450.00),
(6, 'Orijen', 'fit&tirm cat', 'dry cat food', 'Fresh chicken (20%), fresh chicken giblets (liver, heart) (11%), raw whole herring (8%), raw turkey (6%), raw whole hake (5%), fresh eggs (5%), raw whole mackerel (4%), dehydrated chicken (4%), dehydrated turkey (4%), dehydrated mackerel (4%), dehydrated sardine (3%), dehydrated herring (3%), dehydrated whitefish (3%), raw turkey liver (3%), lentil fibre, whole red lentils, whole green lentils, whole peas, whole chickpeas, whole pinto beans, pea starch, whole navy beans, dehydrated blue whiting (1%), chicken fat (1%), apple fibre, dried kelp, algae (source of DHA), fresh whole pumpkin, fresh whole butternut squash, fresh whole zucchini, fresh whole carrots, fresh whole apples, fresh whole pears, dried chicory root, fresh kale, fresh spinach, fresh beet greens, fresh turnip greens, whole cranberries, whole blueberries, whole saskatoon berries, turmeric, milk thistle, burdock root, lavender, marshmallow root, rosehips.', 'Adult cats', 'https://image.makewebcdn.com/makeweb/m_1920x0/EymvaO4rg/orijencat/PETClub_Shopee_orijennew_catfit_cover_1.jpg?v=202405291424', 500.00, 550.00),
(7, 'orijen', 'Regional Red Cat Food', 'dry cat food', 'Raw beef (11%), raw whole pilchard (11%), raw wild boar (5%), raw bison (5%), raw lamb (5%), raw pork (5%), raw beef liver (4%), raw pork liver (4%), fresh eggs (4%), dehydrated lamb (4%), dehydrated beef (4%), dehydrated herring (4%), dehydrated sardine (4%), dehydrated mutton (4%), dehydrated pork (4%), canola oil, whole red lentils, whole peas, whole chickpeas, whole green lentils, pea starch, raw lamb liver (2%), dehydrated whitefish (2%), pollock oil (2%), whole pinto beans, whole navy beans, lentil fibre, raw lamb kidney (0.5%), raw lamb tripe (0.5%), dried kelp, fresh whole pumpkin, fresh whole butternut squash, fresh whole zucchini, fresh whole carrots, fresh whole apples, fresh whole pears, dried chicory root, fresh kale, fresh spinach, fresh beet greens, fresh turnip greens, whole cranberries, whole blueberries, whole saskatoon berries, turmeric, milk thistle, burdock root, lavender, marshmallow root, rosehips.', 'Kittens', 'https://www.homesalive.ca/media/catalog/product/r/e/regioinal_1.jpg?quality=80&bg-color=255,255,255&fit=bounds&height=&width=&canvas=:', 400.00, 450.00),
(8, 'Non- Brand', 'Kitchen Flavor Grain Free Cat Food With Real Meat Cubes', 'Dry cat food', 'Minimizes stress reactions like dyspepsia and diarrhea during weaning.\r\nProvides easily digestible ingredients similar to breast milk.\r\nOffers holistic nutrition with meats, coarse crops, and vegetables.\r\nSatisfies all the nutritional needs of young pets.\r\nContains premium protein sources like chicken, fish, sweet potato, and peas.', 'All types of cat', 'https://ds.rokomari.store/rokomari110/ProductNew20190903/260X372/Kitchen_Flavor_Grain_Free_Cat_Food_With_-Non_Brand-08775-359068.png', 450.00, 500.00),
(9, 'Kitchen Flavour', 'Kitchen Flavor Grain Free Adult Cat Food', 'Cat food', 'Crude Protein: 8% (min)\r\nCrude Fat: 0.2% (min)\r\nCrude Fiber: 1% (max)\r\nMoisture: 89% (max)', 'Adult cats', 'https://images.tokopedia.net/img/cache/900/VqbcmM/2022/11/9/87d334e7-5184-4211-835a-1bce07c72af0.jpg', 95.00, 100.00),
(10, 'Royal Canin', 'Royal Canin Fit 32 ', 'dry food', 'Nutritional additives: Vitamin A: 13000 IU, Vitamin D3: 700 IU, E1 (Iron): 32 mg, E2 (Iodine): 3.2 mg, E4 (Copper): 10 mg, E5 (Manganese): 42 mg, E6 (Zinc): 126 mg, E8 (Selenium): 0.08 mg - Zootechnical additives: Ammonium chloride: 5 g - Preservatives - Antioxidants.', 'persian cats', 'https://www.petsy.online/cdn/shop/files/Fit32-9_1320x1320.png?v=1717584696', 1500.00, 1600.00),
(11, 'Whiskas', 'Whiskas Tuna Pouch', 'wet food', 'Rich in Omega-3, Vitamin E, and Taurine for healthy skin and vision.', 'adult cats', 'https://dtt1c9id3txwq.cloudfront.net/assets/images/001/508/997/original/mockup_wks_pouch_jr_tuna-80g_f_1705068306081_1705677697102-ezgif.com-webp-to-jpg-converter.jpg?1728592717', 100.00, 120.00),
(12, 'Purina', 'Purina ONE Chicken & Rice Formula', 'dry food', 'Protein: 36%, Fat: 14%, Fiber: 2%, Moisture: 10%', 'all breeds', 'https://image.chewy.com/is/image/catalog/1269846_MAIN._AC_SL600_V1719576580_.jpg', 1400.00, 1550.00),
(13, 'Sheba', 'Sheba Melty Cat Treat Tuna', 'treats', 'Moisture: 85%, Protein: 10%, Fat: 3%, Fiber: 1%', 'all cats', 'https://mewmewshopbd.com/uploads/media-manager/2022/02/20220213111510Sheba-Melty-Cat-Treats-Tuna-Seafood-12gx4-e1644729206512-1732701346.jpeg', 50.00, 60.00),
(14, 'Royal Canin', 'Royal Canin Kitten Instinctive', 'wet food', 'Crude protein: 12%, Crude fat: 4.0%, Moisture: 81%', 'kittens', 'https://m.media-amazon.com/images/I/6176Fp3fPQL.jpg', 1200.00, 1350.00),
(15, 'Me-O', 'Me-O Seafood Flavour', 'dry food', 'Crude protein: 30%, Crude fat: 9%, Crude fiber: 5%', 'adult cats', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW3KGNcFocTMDRPLhjGMmuWclU4kAjjP4eAQ&s', 600.00, 650.00),
(16, 'Hill\'s', 'Hill\'s Science Diet Adult Cat', 'dry food', 'Calcium: 1.2%, Phosphorus: 0.9%, Vitamin C: 85 mg/kg', 'senior cats', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRl-8uOIAGiP4x_FVvZ93-RvPPpe9QjACE8zw&s', 2000.00, 2200.00),
(17, 'Friskies', 'Friskies Indoor Delights', 'dry food', 'Protein: 30%, Fat: 10%, Fiber: 3%', 'indoor cats', 'https://img.drz.lazcdn.com/static/bd/p/b324f7733521d6a1d12148661a4fcf39.jpg_960x960q80.jpg_.webp', 800.00, 900.00),
(18, 'Acana', 'Acana Wild Prairie', 'dry food', 'Crude protein: 35%, Crude fat: 15%, Fiber: 6%', 'all cats', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3VytiCJhz39lzK9i7k8Rr--ZQ2ei5FagTcQ&s', 2500.00, 2700.00),
(19, 'Iams', 'Iams Proactive Health', 'dry food', 'Protein: 32%, Fat: 15%, Fiber: 3%', 'all breeds', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvjnnoCTkiwbw4M3RUPOsYeyuhZM5vwqZ1SQ&s', 1500.00, 1600.00),
(20, 'Whiskas', 'Whiskas Chicken in Gravy', 'wet food', 'Protein: 10%, Fat: 4%, Moisture: 85%', 'adult cats', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJnTJ9wYvXB34u8JmTbhknFZebP1ybLiZlwA&s', 90.00, 100.00),
(21, 'Purina', 'Purina Pro Plan LiveClear', 'dry food', 'Protein: 36%, Fat: 18%, Fiber: 4%', 'all breeds', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPSZ43yCMTF0uBBBJXONeNlK1Fia02YdYv0g&s', 3200.00, 3400.00),
(22, 'Royal Canin', 'Royal Canin Persian Adult', 'dry food', 'Protein: 31%, Fat: 22%, Fiber: 6%', 'persian cats', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbO0qXuvfqca0XJV2QuPOOJa48MZVyDXdUHQ&s', 1800.00, 2000.00),
(23, 'Me-O', 'Me-O Kitten Ocean Fish', 'dry food', 'Protein: 33%, Fat: 12%, Fiber: 5%', 'kittens', 'https://dtt1c9id3txwq.cloudfront.net/assets/images/001/509/005/original/1000139691.jpg?1728604615', 800.00, 850.00),
(24, 'Sheba', 'Sheba Perfect Portions Salmon', 'wet food', 'Moisture: 80%, Protein: 10%, Fat: 5%', 'adult cats', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZwIN_fSeEM7O3dkVYf9vbx4uc5MIRTFMRjQ&s', 120.00, 130.00),
(0, 'Meow mix', 'Meow Mix Surf \'N Turf Variety Pack Wet Cat Food', 'cat food', 'Contains one (1) box of twelve 2.75 oz cups of Meow Mix Tenders in Sauce wet cat food in three flavors', 'old cats', 'https://shop.smucker.com/cdn/shop/files/xtpyjqqdhnads3agfcuo.jpg?v=1702052835&width=1400', 1000.00, 900.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','seller','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Rakib', 'rakib@gmail.com', '$2y$10$S4iT/3CspouJAFMEaUPBg.2Y6OcIKl9kHQdiABXAV7ZDVbOrYsJvq', 'admin'),
(2, 'Mominul', 'momin@gmail.com', '$2y$10$1DOoiixxS9ZPWqP8VNXD0Opv5xBr3XdKHa./2gAe9oqDi5DPVtzg2', 'seller'),
(3, 'Jannatul', 'jannat23@gmail.com', '$2y$10$OY3.HN5Fl6P2VYMB8NqTjOD/YWuf2qSNnlqAOCpAqU./buWchnnTi', 'customer'),
(4, 'Ronaldo', 'cr7@gmail.com', '$2y$10$rXt2chLerRJglavk0YBX3OkP7fWBtM7Q.JpJupJ03G2z8IzJCnMha', 'seller'),
(5, 'asif', 'asif@gmail.com', '$2y$10$4aPwLEqqOykjwk7YzTXWqusoNRFLG56FSN2ahcPO5642FChCORhjy', 'customer'),
(6, 'Hasan', 'haasan@gmail.com', '$2y$10$mpdHZbpqQPEEMwa35wjYvONPE.dRLglprJg6..5g0dfGPUmQzSoxm', 'seller'),
(7, 'messi', 'messi@gmail.com', '$2y$10$5MLJcaK8kY1i4WwFrDBsNurebGT0yOkQySpgTf7jXUlSWh9u/fZ46', 'seller'),
(8, 'MominTon', 'momin312@gmail.com', '$2y$10$M2Hwpfr2rGG/sU0fMJozTO.rElD7U7yVX4gflYYU5JsQs/hyRjdwq', 'customer'),
(9, 'monyty', 'monytyer@gmail.com', '$2y$10$n9bBSaMG.UHu/8vSde.O3uDIF2PudlkTP2mWSjGTdP54n81q8J3XC', 'seller'),
(10, 'shagor', 'sh12@gmail.com', '$2y$10$Oj82KRlmP/H/uR1rYAR01u/Z0y2ypLp.LyXTVJUfUjFakkiJ8zo4C', 'admin'),
(11, 'jakaria', 'jaks123@gmail.com', '$2y$10$f6rV3Brop48Ppmf0XMRGCuoB./m9QOejDjoLzyTTzYro1PuHZHtGa', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_listing`
--
ALTER TABLE `cat_listing`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `customer_message`
--
ALTER TABLE `customer_message`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_listing`
--
ALTER TABLE `cat_listing`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_message`
--
ALTER TABLE `customer_message`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cat_listing`
--
ALTER TABLE `cat_listing`
  ADD CONSTRAINT `cat_listing_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`pet_id`);

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
