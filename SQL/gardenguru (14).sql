-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 12:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gardenguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(10) NOT NULL,
  `aFirstName` varchar(30) NOT NULL,
  `aLastName` varchar(30) NOT NULL,
  `aEmail` varchar(100) NOT NULL,
  `aPassword` varchar(100) NOT NULL,
  `aNIC` varchar(30) NOT NULL,
  `aPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `aFirstName`, `aLastName`, `aEmail`, `aPassword`, `aNIC`, `aPhone`) VALUES
(1, 'Malki', 'Madhubhashini', 'malki@gmail.com', '$2y$10$H6ux6v8yBwBxc9JfcAWb6uZzIaGq53v53OKIuaY8m4G9.HEbfZ/4W', '123456734', '1234567890'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', 'p@$$w0rd', '987654321V', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `adPostedDate` date DEFAULT NULL,
  `image1_filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `user_id`, `title`, `description`, `adPostedDate`, `image1_filename`) VALUES
(1, 2, '🌱 Discover the Garden Hero: The Hand Shovel! 🌱', 'Tired of struggling with flimsy tools that just can\'t handle your garden tasks? Meet your gardening sidekick – the Hand Shovel!\n\n Why Choose Our Hand Shovel?\n\n Durable: Crafted for tough jobs, it\'s built to last!\n Ergonomic: Designed for comfort, no more hand strain!\n Multipurpose: Perfect for planting, digging, and weeding!\n Compact: Ideal for small spaces and easy to carry!\n Rust-Resistant: Endures the elements like a champ!\n Easy to Clean: Rinse, and it\'s ready for action!\n\n Special Offer: Only $19.99! \n\n Order now and get a FREE gardening glove! \n\nContact us today to order:\n📞 Call: 555-123-4567\n📧 Email: info@handshovelheroes.com\n\nUpgrade your garden game with the Hand Shovel – your garden\'s new best friend!', '2023-09-01', '../images/Adevertistment/test1_add.jpg'),
(2, 15, '🌱 Pro-Grade Hand Shovel! 🌱', 'Tired of cheap, flimsy shovels that leave your garden dreams buried? Elevate your gardening game with our Pro-Grade Hand Shovel!\n\n What Makes Our Hand Shovel Stand Out? \n\n Durability: Engineered to last, it\'s a shovel that won\'t quit!\n Comfort: Ergonomic design ensures fatigue-free gardening!\n Versatility: Perfect for planting, digging, weeding, and more!\n Compact Design: Fits into tight spots and is easy to store!\n Rust-Proof: Built to endure the elements for years to come!\n\n Price: Only $24.99! \n\nReady to transform your garden? Contact us today:\n\n📞 Call: 555-789-1234\n📧 Email: info@progradehandshovel.com\n🌐 Website: www.progradehandshovel.com\n\nUpgrade your gardening experience with the Pro-Grade Hand Shovel – your garden\'s ultimate partner!', '2023-09-02', '../images/Adevertistment/test2_add.jpg'),
(3, 16, '🍂 Introducing the Garden Rake  🍂', 'Tired of struggling with inadequate tools that can\'t keep up with your seasonal clean-up? Say goodbye to the hassle and hello to efficiency with our incredible Garden Rake!\n\n Why Choose Our Garden Rake? \n\n Robust and Reliable: Built to last, our garden rake tackles any job with ease!\n Comfortable Grip: Designed for your comfort, it makes yard work a breeze!\n Versatile Wonder: Perfect for leaves, debris, and leveling soil!\n Compact and Convenient: Easy to store and carry for all your yard tasks!\n Rust-Resistant: Designed to withstand the elements for lasting use!\n Effortless Maintenance: A quick hose-down, and it\'s ready for action!\n\n Price: Only $29.99! \n\n Order now and get a FREE pair of gardening gloves! \n\nContact us today to order:\n📞 Call: 555-789-5678\n📧 Email: info@gardenrakepro.com\n🌐 Website: www.gardenrakepro.com\n\nDon\'t miss out on the opportunity to make your yard work easier and more enjoyable. Upgrade your toolkit with the Ultimate Garden Rake today!', '2023-09-03', '../images/Adevertistment/b5cff84ec4e752ba107721c62121f4b1.jpg'),
(4, 22, '🌊 Majestic Water Horse! 🌊', 'Looking for aquatic adventures with style and ease? Discover our stunning Water Horse, designed for unforgettable experiences!\n\n What Sets Our Water Horse Apart? \n\n Elegant Design: It\'s a true beauty on the water!\n Effortless Glide: Maneuver with ease on lakes, rivers, and oceans.\n Supreme Comfort: Plush, ergonomic seating for endless enjoyment.\n Thrilling Performance: Powered by cutting-edge water tech for speed and precision.\n Built to Last: Crafted with quality, ready for countless adventures!\n\n Price: Starting at just $5,999! \n\n Order now and receive a FREE waterproof gear bag for your next expedition! \n\n\n Get in touch today to learn more:\n\n📞 Call: 555-123-4567\n📧 Email: info@waterhorseadventures.com\n🌐 Website: www.waterhorseadventures.com\n\nDive into a world of aquatic wonders – click below to order your Water Horse today! 🌅🌊', '2023-09-03', '../images/Adevertistment/best-garden-hoses-1650293773.jpg'),
(6, 22, '🍂 Introducing the Garden Rake  🍂', 'Tired of struggling with inadequate tools that can\'t keep up with your seasonal clean-up? Say goodbye to the hassle and hello to efficiency with our incredible Garden Rake!\r\n\r\n Why Choose Our Garden Rake? \r\n\r\n Robust and Reliable: Built to last, our garden rake tackles any job with ease!\r\n Comfortable Grip: Designed for your comfort, it makes yard work a breeze!\r\n Versatile Wonder: Perfect for leaves, debris, and leveling soil!\r\n Compact and Convenient: Easy to store and carry for all your yard tasks!\r\n Rust-Resistant: Designed to withstand the elements for lasting use!\r\n Effortless Maintenance: A quick hose-down, and it\'s ready for action!\r\n\r\n Price: Only $29.99! \r\n\r\n Order now and get a FREE pair of gardening gloves! \r\n\r\nContact us today to order:\r\n📞 Call: 555-789-5678\r\n📧 Email: info@gardenrakepro.com\r\n🌐 Website: www.gardenrakepro.com\r\n\r\nDon\'t miss out on the opportunity to make your yard work easier and more enjoyable. Upgrade your toolkit with the Ultimate Garden Rake today!', '2023-09-05', '../images/Adevertistment/8f278c48f76f57020202c58b26ee16b1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answerID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answerDate` date NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answerID`, `questionID`, `user_id`, `answerDate`, `answer`) VALUES
(3, 7, 22, '2023-10-08', 'Successful carrot cultivation depends on soil preparation, sunlight, proper watering, thinning, and pest control. Carrots prefer well-drained soil, full sunlight, and consistent moisture. Thin seedlings to ensure proper spacing, and watch for pests and diseases. Harvest when carrots reach the desired size.'),
(5, 7, 15, '2023-10-08', 'Soil Preparation: Use well-drained, loose, sandy loam soil with a pH of 6.0 to 6.8 and incorporate organic matter.\r\n\r\nClimate and Season: Plant in cool seasons, avoiding extreme heat.\r\n\r\nVariety Selection: Choose varieties suited to your climate and preferences.'),
(6, 5, 2, '2023-10-08', 'Could you advise on the ideal timing and method for pruning tea bushes? I want to promote healthy growth and maximize yields in my tea cultivation. Your insights on when and how to prune effectively would be greatly appreciated.'),
(7, 7, 2, '2023-10-16', 'Thank you all ❤️'),
(8, 8, 22, '2023-10-17', 'Hello, as a mango farmer, soil preparation is vital for successful mango tree growth. Begin with a soil test, ensure well-drained, sunny locations, and amend soil based on results. Adequate spacing, proper watering, and fertilization are key. Consult local experts and resources for specific guidance to ensure healthy mango trees.'),
(9, 9, 36, '2023-10-31', 'In Galle, for successful banana cultivation, I recommend considering varieties such as [specific banana varieties suited for your region], which have proven adaptability to our local climate. Ensure well-drained, loamy soils with a pH range of 5.5 to 6.5, enriched with organic matter. Incorporate well-rotted compost before planting and use a balanced 14-14-14 NPK fertilizer at recommended intervals. Effective pest and disease management is crucial; watch for common threats like aphids, nematodes, and banana weevils. Implement regular inspection and control measures, such as using organic pesticides when necessary, to safeguard your crop&#039;s health and maximize yield. Additionally, remember to tailor your care to the specific conditions in your region to optimize banana growth and production.'),
(10, 10, 18, '2023-10-25', 'To successfully cultivate oranges in Rathnapura, it\'s crucial to choose varieties that thrive in our climate, such as [specific orange varieties suited for your region]. These varieties are well-suited for our local conditions and have a track record of performance. Prior to planting, prepare the soil by ensuring it\'s well-draining, with a pH of around 6.0 to 7.0, and amend it with organic matter like compost or well-rotted manure. When it comes to fertilization, a balanced 10-10-10 NPK fertilizer is suitable for orange trees, and you should apply it in late winter or early spring. Regular pruning to remove dead or diseased branches and proper spacing for good air circulation is essential. Keep a watchful eye for common pests like citrus aphids, scales, and diseases like citrus canker. Implement integrated pest management techniques and consider using horticultural oils or organic insecticides when necessary. For harvesting, oranges are typically ready when they reach their full color, and they should be harvested with care to avoid damage. By following these guidelines, you can optimize your orange orchard\'s health and productivity in our region.'),
(11, 11, 38, '2023-10-31', 'To excel in grapevine cultivation in Jaffna, you should prioritize grape varieties known to thrive in our climate. Varieties such as [specific grape varieties suited for your region] are well-suited to our local conditions and have a track record of success. Prepare the soil by ensuring it&#039;s well-draining, with a pH of around 6.0 to 7.0, and enrich it with organic matter like compost or well-rotted manure before planting. Fertilize the grapevines with a balanced NPK fertilizer, typically in early spring, to support growth and fruit development. Vigilant pest and disease management is essential. Keep an eye out for common grapevine pests like aphids, grapevine leafhoppers, and fungal diseases like powdery mildew. Implement integrated pest management strategies, including the judicious use of fungicides and insecticides when necessary. Pruning is vital to control vine growth and improve fruit quality; the timing and extent of pruning may vary based on the specific grape variety. Harvesting grapes should be done at the optimal ripeness, typically determined by taste and sugar content. By following these guidelines, you can establish a successful and productive grapevine vineyard tailored to our region&#039;s unique conditions.'),
(16, 8, 22, '2023-11-14', 'ggggd');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blogPostedDate` date DEFAULT NULL,
  `blog_details` text NOT NULL,
  `blog_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `blog_title`, `blogPostedDate`, `blog_details`, `blog_image`) VALUES
(1, 15, 'Tea Cultivation in Sri Lanka', '2023-09-01', 'Sri Lanka, often referred to as the \"Pearl of the Indian Ocean,\" is renowned for its stunning landscapes, diverse culture, and rich history. However, it is perhaps most famous for one thing: tea. Sri Lanka is one of the world\'s largest tea producers and exporters, and its lush tea plantations, sprawling across picturesque hills, are a sight to behold. In this article, we will explore the fascinating world of tea cultivation in Sri Lanka, from its historical roots to the modern-day industry.\r\n\r\nA Historical Overview\r\n\r\nTea cultivation in Sri Lanka has a captivating history. Before the arrival of tea, the island\'s primary crops were coffee and cinnamon. However, a devastating coffee blight in the late 19th century forced planters to seek alternative crops. It was then that a Scottish planter named James Taylor planted the first tea seedlings in Sri Lanka\'s central highlands in 1867. Little did he know that he was sowing the seeds of a booming industry that would shape the nation\'s economy for years to come.\r\n\r\nCultivation Methods\r\n\r\nSri Lanka\'s unique geography, with its varying elevations and climatic zones, provides the perfect conditions for tea cultivation. The process of growing tea in Sri Lanka typically involves the following steps:\r\n\r\nSelection of Suitable Land: Tea is cultivated at different elevations in Sri Lanka, each producing tea with distinct flavor profiles. Low-grown teas have a robust, full-bodied taste, while high-grown teas are known for their delicate and nuanced flavors.\r\n\r\nPlanting Tea Bushes: Tea bushes are propagated from seeds or cuttings. They are planted in rows on the hillsides to maximize sunlight exposure.\r\n\r\nPruning and Plucking: Regular pruning and plucking of the tea leaves ensure new growth and a constant supply of fresh leaves. Skilled tea pluckers hand-pick the top two leaves and a bud from each shoot.\r\n\r\nWithering: The freshly plucked leaves are spread out to wither, reducing their moisture content and making them pliable for rolling.\r\n\r\nRolling and Fermentation: After withering, the leaves are rolled to break their cell walls, initiating fermentation. This process is critical for developing the tea\'s flavor.\r\n\r\nDrying and Sorting: The rolled leaves are dried to halt fermentation and reduce moisture content further. They are then sorted into various grades based on size and quality.\r\n\r\nPackaging and Export: Once sorted, the tea is packaged for domestic consumption or export. Sri Lankan tea is highly sought after worldwide, known for its quality and unique flavor profiles.\r\n\r\nThe Diversity of Ceylon Tea\r\n\r\nSri Lanka\'s tea industry produces a wide range of teas, each with its own character and flavor. The country is famous for the following types of tea:\r\n\r\nBlack Tea: Sri Lanka is renowned for its black teas, including the well-known Ceylon tea. These teas are full-bodied and robust, making them ideal for breakfast blends.\r\n\r\nGreen Tea: Although less common than black tea, Sri Lanka also produces green teas, which are lighter and milder in flavor. Green tea has gained popularity for its health benefits.\r\n\r\nWhite Tea: White teas, made from the youngest leaves and buds, are the most delicate and subtle. They have a gentle flavor and are prized by connoisseurs.\r\n\r\nHerbal Teas: In addition to traditional tea types, Sri Lanka also cultivates a variety of herbal teas, such as cinnamon tea, ginger tea, and lemongrass tea.\r\n\r\nEconomic Impact and Sustainability\r\n\r\nTea cultivation plays a vital role in Sri Lanka\'s economy. It provides employment opportunities to hundreds of thousands of people, especially in the central highlands. The industry has also made significant strides in sustainable and ethical practices, with many plantations adopting environmentally friendly farming methods and supporting local communities.', '../images/blog/The Tea Cultivation  1.jpg'),
(2, 2, 'Coconut Cultivation in Sri Lanka', '2023-09-02', 'Coconuts, often referred to as the \"tree of life\" in tropical regions, are among the most versatile and valuable crops grown worldwide. With their myriad uses, from providing food and shelter to offering essential raw materials for various industries, coconuts have earned their place as a vital agricultural commodity. In this article, we will delve into the fascinating world of coconut cultivation, exploring its history, cultivation methods, and the numerous benefits it offers to both growers and consumers.\r\n\r\nHistorical Background\r\n\r\nCoconut cultivation has a rich history that dates back thousands of years. Originating in the tropical regions of Southeast Asia, coconuts have been cultivated and utilized by civilizations across the globe. Their spread can be attributed to ancient seafaring communities who carried coconut palms with them on their voyages. As a result, coconuts are now found throughout the tropics and subtropics, from the Caribbean to the Pacific Islands.\r\n\r\nCultivation Methods\r\n\r\nSuccessful coconut cultivation requires specific environmental conditions and care. Here are the key steps and considerations for growing coconuts:\r\n\r\nClimate: Coconuts thrive in tropical and subtropical regions with consistent temperatures between 85°F to 95°F (29°C to 35°C). They require high humidity and regular rainfall, typically receiving around 60-100 inches (150-250 cm) of rain annually.\r\n\r\nSoil: Well-draining sandy or loamy soil is ideal for coconut palms. They also need a soil pH ranging from 5.0 to 8.0. Soil rich in organic matter promotes healthy growth.\r\n\r\nPlanting: Coconuts are usually grown from seeds (coconuts themselves) or seedlings. Plant the seeds or seedlings in holes that are approximately 2 feet (60 cm) deep and 3 feet (90 cm) apart. Proper spacing ensures sufficient room for each tree to grow.\r\n\r\nWatering: Young coconut palms need regular watering to establish their roots. Once mature, they can tolerate drought conditions. However, consistent moisture is essential during the fruit-bearing stage.\r\n\r\nFertilization: Coconut trees benefit from balanced fertilizers containing essential nutrients like nitrogen, phosphorus, and potassium. Fertilize regularly to support healthy growth and fruit production.\r\n\r\nPest and Disease Control: Monitor your coconut palms for common pests like beetles and diseases such as coconut wilt. Prompt action is essential to prevent damage.\r\n\r\nPruning: Prune dead or diseased fronds to maintain the health and aesthetics of the palm. Pruning also makes it easier to harvest coconuts.\r\n\r\nBenefits of Coconut Cultivation\r\n\r\nCoconut cultivation offers numerous advantages for both growers and consumers:\r\n\r\nNutrient-Rich Food: Coconuts provide a rich source of nutrition. Coconut water is a hydrating beverage, while coconut meat and oil are packed with healthy fats, vitamins, and minerals.\r\n\r\nVersatile Uses: Every part of the coconut tree is utilized. Apart from the edible parts, coir (the fiber from the husk) is used in making ropes and mats, while the shell is used for handicrafts and activated carbon production.\r\n\r\nSustainable Farming: Coconut farming is environmentally friendly as it requires minimal inputs and promotes biodiversity in tropical ecosystems.\r\n\r\nEconomic Opportunities: Coconut cultivation can provide a sustainable source of income for farmers in tropical regions, contributing to economic stability and rural development.\r\n\r\nMedicinal Properties: Coconut oil and other coconut-derived products are believed to have various health benefits, including antimicrobial and anti-inflammatory properties.\r\n\r\nRenewable Energy: Coconut shells and husks can be used as biomass for energy production, contributing to sustainable and renewable energy sources.', '../images/blog/SL771-4-1740x960-c-center.jpg'),
(3, 18, 'A Guide to Growing Roses in Your Home Garden', '2023-09-03', '\r\nTitle: Cultivating Beauty: A Guide to Growing Roses in Your Home Garden\r\n\r\nIntroduction\r\n\r\nRoses have long been cherished for their exquisite beauty, fragrant blossoms, and symbolic significance. Cultivating roses in your home garden can be a rewarding and enjoyable experience, whether you\'re a seasoned gardener or a novice. In this article, we\'ll provide you with a comprehensive guide on how to grow roses successfully in your own outdoor oasis.\r\n\r\nChoosing the Right Rose Varieties\r\n\r\nBefore you start planting, it\'s essential to select rose varieties that are well-suited to your garden\'s climate and your personal preferences. There are three primary types of roses to consider:\r\n\r\nHybrid Tea Roses: These are known for their classic, elegant blooms and are a popular choice for cut flowers. Hybrid teas come in various colors and are often grown for their fragrance.\r\n\r\nFloribunda Roses: Floribundas produce clusters of smaller flowers and are known for their continuous bloom throughout the growing season. They come in a wide range of colors and are great for adding color to your garden.\r\n\r\nShrub Roses: Shrub roses are hardy and versatile, making them an excellent choice for novice gardeners. They come in various forms and sizes and are well-suited for landscaping purposes.\r\n\r\nPreparing the Soil\r\n\r\nRoses thrive in well-drained, fertile soil. Here\'s how to prepare your garden soil for rose cultivation:\r\n\r\nSelect a Sunny Location: Roses require at least six hours of direct sunlight each day. Choose a spot in your garden that receives ample sunlight.\r\n\r\nImprove Drainage: Ensure proper drainage by amending the soil with organic matter like compost or well-rotted manure. This will help prevent root rot, a common issue with roses.\r\n\r\nTest Soil pH: Roses prefer slightly acidic soil with a pH level between 6.0 and 6.5. You can adjust the pH using lime (to raise it) or sulfur (to lower it).\r\n\r\nPlanting Roses\r\n\r\nOnce your soil is prepared, it\'s time to plant your rose bushes. Here are the steps to follow:\r\n\r\nDig a Hole: Dig a hole that is twice as wide and deep as the rose\'s root ball.\r\n\r\nLoosen Roots: Gently remove the rose from its container, and loosen the roots if they appear root-bound.\r\n\r\nPlace the Rose: Position the rose in the hole, ensuring the bud union (the knob-like area where the rose is grafted onto the rootstock) is just above the soil level.\r\n\r\nBackfill: Fill the hole with soil, patting it down gently as you go to remove air pockets.\r\n\r\nWater: Give your newly planted rose a deep watering to settle the soil around the roots.\r\n\r\nCaring for Your Roses\r\n\r\nCaring for roses requires attention to watering, fertilizing, and pruning:\r\n\r\nWatering: Roses need consistent moisture but dislike wet feet. Water deeply at the base of the plant, early in the morning, to allow leaves to dry before evening and prevent fungal diseases.\r\n\r\nFertilizing: Feed your roses with a balanced, slow-release fertilizer in the spring and again after the first flush of blooms. Follow package instructions for application rates.\r\n\r\nMulching: Apply a layer of organic mulch around the base of your roses to retain moisture, suppress weeds, and regulate soil temperature.\r\n\r\nPruning: Prune your roses annually during the dormant season (usually late winter or early spring) to remove dead or weak branches, improve air circulation, and shape the plant.\r\n\r\nDisease and Pest Management: Keep an eye out for common rose pests like aphids and diseases like powdery mildew. Use organic remedies or consult your local nursery for appropriate treatments.', '../images/blog/Grow-Rose-at-Home-USA1.jpg'),
(5, 22, 'The Sweet Success of Mango Cultivation: A Comprehensive Guide', '2023-09-04', '\r\nMango, often referred to as the \"King of Fruits,\" is a tropical delight cherished by people worldwide for its succulent taste and versatility in culinary applications. Mango cultivation has a rich history dating back over 4,000 years, with origins in South Asia. Today, mangoes are grown in various tropical and subtropical regions around the world, and their popularity continues to rise. In this comprehensive guide, we will explore the art and science of mango cultivation, from selecting the right variety to harvesting the sweet rewards.\r\n\r\nChoosing the Right Mango Variety\r\n\r\nThe first step in successful mango cultivation is selecting the right mango variety, as there are thousands of cultivars to choose from. The choice of variety should be influenced by factors such as climate, soil type, and local preferences. Here are a few popular mango varieties:\r\n\r\nAlphonso (Hapus): Known for its rich, sweet flavor, and aromatic fragrance, Alphonso mangoes are often considered the finest mangoes in the world. They are primarily grown in India.\r\n\r\nTommy Atkins: This variety is resistant to disease and can thrive in a variety of climates. It\'s a popular choice for commercial cultivation in many countries, including the United States.\r\n\r\nAtaulfo (Honey Mango): With its creamy texture and sweet taste, Ataulfo mangoes are a favorite for fresh consumption. They are often found in Mexico and other parts of the Americas.\r\n\r\nKeitt: Keitt mangoes are large and green, with a sweet flavor. They are known for their long shelf life and are commonly grown in Florida and California.\r\n\r\nKent: Kent mangoes are sweet and have minimal fiber, making them ideal for smoothies and desserts. They are grown in many countries, including Mexico, Ecuador, and Peru.\r\n\r\nClimatic and Soil Requirements\r\n\r\nMangoes thrive in tropical and subtropical climates with distinct wet and dry seasons. Ideally, mango trees should be planted in areas with temperatures between 30°F and 100°F (-1°C to 38°C). While mango trees are drought-tolerant, they require consistent moisture during the flowering and fruit-setting stages. Well-drained soil with a pH level between 5.5 and 7.5 is ideal for mango cultivation.\r\n\r\nPlanting Mango Trees\r\n\r\nSite Selection: Choose a sunny location that receives at least 6 to 8 hours of sunlight daily.\r\n\r\nSpacing: Mango trees require ample space to grow. Plant them at least 30 to 40 feet apart to allow for proper canopy development.\r\n\r\nPlanting: Dig a hole large enough to accommodate the root ball of the mango tree. Place the tree in the hole, ensuring that the graft union is above ground level. Fill the hole with soil, and water thoroughly.\r\n\r\nCaring for Mango Trees\r\n\r\nWatering: Young mango trees require regular watering. Once established, water deeply and infrequently to encourage deep root growth.\r\n\r\nFertilization: Apply balanced fertilizer in spring and late summer to provide essential nutrients.\r\n\r\nPruning: Prune the tree to maintain its shape and remove dead or diseased branches.\r\n\r\nPest and Disease Control: Monitor for common pests like mango fruit flies and anthracnose, and use appropriate pesticides when necessary.\r\n\r\nHarvesting Mangoes\r\n\r\nThe most exciting part of mango cultivation is harvesting the delicious fruit. Mangoes typically take 3 to 6 years to bear fruit, depending on the variety and growing conditions. Here\'s how to know when your mangoes are ready for harvest:\r\n\r\nColor: Mangoes should develop their characteristic color (e.g., orange, red, or yellow) and start to soften slightly when ripe. However, the exact color can vary depending on the variety.\r\n\r\nFirmness: Gently squeeze the fruit; it should yield slightly to pressure, but not be overly soft.\r\n\r\nSmell: Ripe mangoes emit a sweet, fruity aroma from the stem end.\r\n\r\nTo harvest mangoes, use a pole with a basket or a long-handled fruit picker to avoid damaging the fruit or tree branches. Cut the mango from the tree with a clean, sharp knife, leaving a short stem attached to the fruit.\r\n\r\nConclusion\r\n\r\nMango cultivation is a rewarding endeavor that can yield a bountiful harvest of this delectable fruit. By selecting the right variety, providing optimal growing conditions, and following proper care and maintenance practices, you can enjoy the sweet success of growing your own mangoes. Whether you\'re a commercial grower or a backyard enthusiast, the journey of cultivating mangoes is filled with flavor, fragrance, and the joy of nurturing a tropical treasure from bud to fruit.', '../images/blog/Nelna_Story-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ItemId` int(11) DEFAULT NULL,
  `Item_Name` varchar(150) NOT NULL,
  `Price` decimal(50,0) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `user_id`, `ItemId`, `Item_Name`, `Price`, `Quantity`) VALUES
(57, 38, 2, 'Impatiens', 150, 1),
(87, 22, 1, 'Tomato', 80, 2),
(105, 22, 4, 'Cabbage', 100, 1),
(106, 2, 2, 'Impatiens', 160, 1);

-- --------------------------------------------------------

--
-- Table structure for table `harvesttime`
--

CREATE TABLE `harvesttime` (
  `harvestTimeId` int(11) NOT NULL,
  `harvestTimeName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `harvesttime`
--

INSERT INTO `harvesttime` (`harvestTimeId`, `harvestTimeName`) VALUES
(1, '2 to 6 months'),
(2, '6 to 12 months'),
(3, '> 12 months');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(11) NOT NULL,
  `locationName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `locationName`) VALUES
(2, 'Badulla'),
(3, 'Soranathota'),
(4, 'Meegahakiula'),
(5, 'Kandaketiya'),
(6, 'Rideemaliyadda'),
(7, 'Mahiyanganaya'),
(8, 'Passara'),
(9, 'Lunugala'),
(10, 'Hali Ela'),
(11, 'Ella'),
(12, 'Bandarawela'),
(13, 'Haputale'),
(14, 'Haldummulla'),
(15, 'Uva Paranagama'),
(16, 'Welimada');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `managerID` int(11) NOT NULL,
  `mFirstName` varchar(30) NOT NULL,
  `mLastName` varchar(30) NOT NULL,
  `mEmail` varchar(40) NOT NULL,
  `mPassword` varchar(100) NOT NULL,
  `mNIC` varchar(20) NOT NULL,
  `mPhone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`managerID`, `mFirstName`, `mLastName`, `mEmail`, `mPassword`, `mNIC`, `mPhone`) VALUES
(1, 'Malki', 'Madhubhashini', 'malki@gmail.com', '$2y$10$H6ux6v8yBwBxc9JfcAWb6uZzIaGq53v53OKIuaY8m4G9.HEbfZ/4W', '1234567844', '0762456784'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', 'securepass', '0987654321', '+0987654321'),
(4, 'lashan', 'sachintha', 'lashansachintha@gmail.com', '$2y$10$oo1tX7nGMIqVEPMSifGhMOLntRLLvbW6XHqbht9TpPgtFKfkwZjZO', '12345678923', '0771314567');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `newsPostedDate` date DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `full_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `title`, `newsPostedDate`, `description`, `image`, `full_content`) VALUES
(3, 'Global Seed Vault Celebrates Milestone', '2023-09-01', 'The Svalbard Global Seed Vault, often referred to as the \"Doomsday Vault,\" recently reached a remarkable milestone by storing its one-millionth seed sample.', '../images/newsfeed/1.jpg', 'Located in the Arctic permafrost, the vault serves as a vital resource for preserving plant genetic diversity and safeguarding against potential food crises, climate-related disasters, and other threats to global agriculture.'),
(4, 'Bioengineered Superplants Show Promising Results', '2023-09-03', 'Scientists working on bioengineering projects have made significant strides in developing \"superplants\" that exhibit enhanced resilience to diseases pests and adverse environmental conditions.', '../images/newsfeed/2.jpg', 'By incorporating desirable traits from various plant species these bioengineered crops have demonstrated the potential to increase food security and sustainability though they also raise ethical and ecological concerns.'),
(5, 'What listening to the soil can tell us about our relationship with the land', '2023-09-04', 'How often do you think about the soil beneath our feet? We humans rely on the soil to provide us with a stable supply of food, clean water and clean air. Soils have lived histories and stories to tell. ', '../images/newsfeed/3.jpg', 'They are alive. Soil exists as a varied continuum across Earth’s surface reflecting the intersection of air, water, rock and life linked by the passage of time.'),
(6, 'Four dangers lurking in your garden – and how to protect yourself', '2023-09-05', 'Many people see gardening as a relaxing pastime – an easygoing way to spend hours outdoors when the weather’s nice. But as a consultant in emergency medicine, I deal with all manner of medical emergencies and injuries arising from what may appear to be a harmless hobby.', '../images/newsfeed/4.jpg', 'Over the years, I have seen hand wounds from cutting implements and foot wounds from lawn mowers and garden forks. In recent weeks, I have seen falls from ladders, head wounds from falls on concrete – and, sadly, confirmed the death of a person in their later years whose enthusiastic shovelling proved too much.'),
(7, 'How greenwashing can lead us astray in the pursuit of wildlife-friendly gardens', '2023-09-05', 'In recent years, declining wildlife populations have motivated people to find ways to protect and conserve the biodiversity in their neighbourhoods. And one such initiative that has gained prominence is wildlife-friendly gardening. These urban gardens create a variety of habitats and conserve biodiversity.', '../images/newsfeed/5.jpg', 'Gardens on private property can make up considerable portions of the greenspace in urban landscapes. And so, when individual gardeners decide to plant certain tree species or retain mature trees, these spaces can help meet wildlife needs in human-dominated areas.'),
(8, 'What planting tomatoes shows us about climate change', '2023-09-06', 'There’s a piece of gardening lore in my hometown which has been passed down for generations: never plant your tomatoes before Show Day, which, in Tasmania, is the fourth Saturday in October. If you’re foolhardy enough to plant them earlier, your tomato seedlings will suffer during the cold nights and won’t grow.', '../images/newsfeed/6.jpg', 'But does this kind of seasonal wisdom still work as the climate warps? We often talk about climate change in large-scale ways – how much the global average surface temperature will increase.'),
(9, 'Farmers Adopt Drones for Crop Monitoring and Pest Control', '2023-09-07', 'In modern agriculture, there is a noteworthy shift towards the utilization of drones, or unmanned aerial vehicles, to improve farming practices. The headline \"Farmers Adopt Drones for Crop Monitoring and Pest Control\" encapsulates this evolving trend.', '../images/newsfeed/11.jpg', 'These drones are being increasingly employed for the purpose of crop monitoring. This involves the use of specialized drones equipped with cameras and sensors that capture detailed images and data about the condition of crops. These images are high-resolution and sometimes even include infrared or multispectral data.'),
(10, 'Scientists Discover New Plant Species with Potential Medicinal Benefits', '2023-09-08', 'scientists have made a significant breakthrough in the field of botany by identifying a previously unknown plant species. This discovery is particularly noteworthy because this newly discovered plant exhibits promising medicinal properties.', '../images/newsfeed/12.jpg', 'The plant, which had not been documented before, has the potential to contain chemical compounds or substances that could be used for therapeutic or medicinal purposes.');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `orderItemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `itemQuantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`orderItemID`, `orderID`, `ItemId`, `itemQuantity`) VALUES
(3, 2, 2, 5),
(4, 3, 2, 1),
(5, 4, 2, 5),
(6, 4, 5, 2),
(7, 4, 6, 3),
(8, 4, 10, 1),
(9, 4, 7, 2),
(10, 5, 2, 1),
(11, 5, 8, 2),
(12, 5, 4, 10),
(13, 5, 7, 3),
(14, 5, 15, 5),
(15, 6, 1, 2),
(16, 6, 2, 5),
(17, 6, 6, 6),
(18, 6, 9, 1),
(19, 7, 1, 1),
(20, 7, 10, 2),
(21, 7, 11, 3),
(22, 7, 7, 1),
(23, 8, 10, 1),
(24, 8, 6, 3),
(25, 8, 13, 2),
(26, 9, 3, 1),
(27, 9, 5, 1),
(28, 9, 6, 3),
(29, 9, 9, 3),
(30, 9, 8, 1),
(31, 9, 11, 7),
(32, 10, 7, 3),
(33, 10, 16, 2),
(34, 10, 1, 2),
(35, 11, 2, 1),
(36, 11, 5, 1),
(37, 11, 4, 2),
(38, 11, 9, 1),
(39, 12, 12, 5),
(40, 12, 16, 2),
(41, 13, 2, 1),
(42, 14, 2, 1),
(43, 15, 2, 1),
(44, 15, 7, 1),
(45, 15, 15, 3),
(46, 16, 1, 1),
(47, 17, 1, 1),
(49, 19, 5, 1),
(50, 19, 7, 1),
(51, 19, 9, 1),
(52, 20, 10, 4),
(53, 21, 12, 1),
(54, 21, 11, 3),
(72, 72, 2, 1),
(73, 74, 2, 1),
(74, 76, 2, 1),
(75, 78, 2, 1),
(76, 80, 3, 3),
(81, 82, 5, 3),
(82, 82, 1, 2),
(83, 82, 4, 4),
(84, 82, 2, 1),
(85, 82, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `TotalPrice` int(255) NOT NULL,
  `deliveryAddress` varchar(250) NOT NULL,
  `city` varchar(60) NOT NULL,
  `receiver` varchar(60) NOT NULL,
  `CoNum` int(20) NOT NULL,
  `OrderTransaction` varchar(60) NOT NULL,
  `OrderStatus` varchar(60) NOT NULL,
  `deliveryStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `user_id`, `orderDate`, `TotalPrice`, `deliveryAddress`, `city`, `receiver`, `CoNum`, `OrderTransaction`, `OrderStatus`, `deliveryStatus`) VALUES
(2, 22, '2023-10-06', 750, 'dzgrx', 'Attanagalla', 'Ruwan kumara', 11120, 'success', 'success', 'yes'),
(3, 22, '2023-10-09', 150, 'thtr', 'Attanagalla', 'Ruwan kumara', 11120, 'success', 'success', 'yes'),
(4, 22, '2023-10-16', 1660, '56/2, Temple Rd. Kelaniya', 'Attanagalla', 'Nimal Perera', 771516783, 'success', 'success', 'no'),
(5, 22, '2023-10-16', 2350, '23/1, Main Street, Nittambuwa', 'Nittambuwa', 'Tharindu Buddhika', 771629789, 'success', 'rejected', 'no'),
(6, 22, '2023-10-16', 1780, '56/9, lake round, kurunegala', 'kurunegala', 'lashan sachintha', 778634967, 'success', 'success', 'no'),
(7, 2, '2023-10-17', 930, 'No 23, Kurunegoda, Kotiyakumbura.', 'Kegalle', 'Malki Madhubhashini', 763857450, 'success', 'success', 'yes'),
(8, 15, '2023-10-17', 610, 'No.4, Galle Rd. Makuluwa', 'Galle', 'Sunura Adithya', 2147483647, 'success', 'success', 'yes'),
(9, 2, '2023-10-23', 2785, 'No 23, Kurunegoda, Kotiyakumbura.', 'Kegalle', 'Malki Madhubhashini', 771526789, 'success', 'success', 'yes'),
(10, 34, '2023-10-31', 1110, 'No. 26, Galle', 'Galle', 'Damith Asanka', 762342312, 'success', 'success', 'yes'),
(11, 37, '2023-10-31', 655, 'no.69, Medamulana, Weeraketiya', 'Hambanthota', 'Shiranthi Rajapaksha', 712349204, 'success', 'success', 'yes'),
(12, 36, '2023-10-31', 2275, 'No.91, Pelmadulla rd. Rathnapura', 'Rathnapura', 'Shashika Nisansala', 774519634, 'success', 'success', 'yes'),
(13, 2, '2023-10-31', 150, 'temple rd. kegalla', 'Kegalla', 'Malki Madhubhashini', 772445179, 'success', 'success', 'yes'),
(14, 38, '2023-11-05', 150, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Tharindu Buddhika', 882328345, 'success', 'waiting', 'no'),
(15, 2, '2023-11-11', 650, 'temple rd. kegalla', 'Kegalle', 'Malki Madhubhashini', 771426783, 'success', 'success', 'yes'),
(16, 22, '2023-11-14', 80, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Ruwan kumara', 77245673, 'success', 'rejected', 'no'),
(17, 22, '2023-11-14', 80, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Tharindu Buddhika', 772314567, 'success', 'success', 'no'),
(19, 15, '2023-11-14', 375, 'Colombo Rd, Galle', 'Galle', 'Sunura Adithya', 712341567, 'success', 'success', 'no'),
(20, 36, '2023-11-14', 400, '58/1, waragoda, attanagalla.', 'Nittambuwa', 'Shashika Nisansala', 7714256, 'success', 'success', 'no'),
(21, 34, '2023-11-14', 895, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Damith Asanka', 771456172, 'success', 'waiting', 'no'),
(72, 2, '2023-11-21', 150, '58/1, waragoda, attanagalla.', 'Attanagalla', 'test111111111', 771416968, 'success', 'success', 'no'),
(73, 2, '2023-11-21', 150, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Ruwan kumara', 771415672, 'unsuccess', 'waiting', 'no'),
(74, 2, '2023-11-21', 150, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Ruwan kumara', 771415672, 'success', 'waiting', 'no'),
(75, 2, '2023-11-21', 150, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Ruwan kumara', 771456278, 'unsuccess', 'waiting', 'no'),
(76, 2, '2023-11-21', 150, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Ruwan kumara', 771456278, 'success', 'success', 'no'),
(77, 2, '2023-11-21', 150, '58/1, waragoda, attanagalla.', 'Attanagalla', 'last', 771314562, 'unsuccess', 'waiting', 'no'),
(78, 2, '2023-11-21', 150, '58/1, waragoda, attanagalla.', 'Attanagalla', 'last', 771314562, 'success', 'waiting', 'no'),
(79, 2, '2023-11-22', 600, '58/1, waragoda, attanagalla.', 'Attanagalla', 'lashan', 771415672, 'unsuccess', 'waiting', 'no'),
(80, 2, '2023-11-22', 600, '58/1, waragoda, attanagalla.', 'Attanagalla', 'lashan 22', 661324567, 'success', 'success', 'no'),
(82, 2, '2023-11-22', 1405, '58/1, waragoda, attanagalla.', 'Attanagalla', 'sbsb', 442312345, 'success', 'waiting', 'no'),
(83, 22, '2023-11-22', 260, '58/1, waragoda, attanagalla.', 'Attanagalla', 'Ruwan kumara', 771314562, 'unsuccess', 'waiting', 'no'),
(84, 2, '2023-11-22', 160, '58/1, waragoda, attanagalla.', 'Attanagalla', 'pathum', 771314567, 'unsuccess', 'waiting', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `PlantID` int(11) NOT NULL,
  `PlantName` varchar(50) NOT NULL,
  `FilePath` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `instruction` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`PlantID`, `PlantName`, `FilePath`, `description`, `instruction`) VALUES
(1, 'Beans', '../images/suggesstions/beans.jpg', 'Beans are nutritious legumes, packed with protein, fiber, and vitamins, making them a versatile culinary staple.', 'Beans are a popular and versatile crop to grow in your garden. To plant them, prepare well-drained soil after the last frost, ideally when the soil temperature is around 60°F (15°C). Plant bean seeds about 1 to 2 inches deep, spaced 2 to 4 inches apart in rows. They require full sun and adequate watering, ensuring the soil remains consistently moist but not waterlogged. Beans thrive in temperatures between 70°F to 80°F (21°C to 27°C). Support pole or trellis varieties for upright growth, and bush types will spread. Regular weeding, occasional fertilization, and monitoring for pests and diseases are key to a healthy bean crop. Harvest when the pods are firm and well-formed for optimum taste and texture. Beans are a rewarding addition to your garden, offering fresh and delicious produce.'),
(2, 'Leeks', '../images/suggesstions/leeks.jpg', 'Leeks, with their mild onion flavor, are versatile vegetables, enhancing dishes with their unique taste and texture.', 'Beans are a popular and versatile crop to grow in your garden. To plant them, prepare well-drained soil after the last frost, ideally when the soil temperature is around 60°F (15°C). Plant bean seeds about 1 to 2 inches deep, spaced 2 to 4 inches apart in rows. They require full sun and adequate watering, ensuring the soil remains consistently moist but not waterlogged. Beans thrive in temperatures between 70°F to 80°F (21°C to 27°C). Support pole or trellis varieties for upright growth, and bush types will spread. Regular weeding, occasional fertilization, and monitoring for pests and diseases are key to a healthy bean crop. Harvest when the pods are firm and well-formed for optimum taste and texture. Beans are a rewarding addition to your garden, offering fresh and delicious produce.'),
(3, 'Potato', '../images/suggesstions/potato.jpeg', 'Potatoes are starchy, versatile tubers that form the basis of countless delicious dishes, from fries to mash.', 'Potatoes are a staple crop and a rewarding addition to any garden. To plant them, prepare well-drained soil in early spring, providing a loose, fertile bed. Cut seed potatoes into chunks with at least one \"eye\" and plant them about 3 inches deep and 12 inches apart in rows. Potatoes thrive in full sun but tolerate partial shade. Keep the soil consistently moist, especially during the growing season. As the plants grow, mound soil around them to encourage more tuber development. Regular weeding and hilling to cover exposed potatoes protect them from light, which can turn them green and bitter. Harvest when the foliage dies back, usually in late summer or early fall, for a bountiful potato harvest.'),
(4, 'Carrot', '../images/suggesstions/carrot.jpg', 'Carrots are vibrant orange root vegetables, known for their sweet flavor and high vitamin A content.', 'Carrots are crisp, sweet root vegetables that are easy to grow in home gardens. To plant them, choose well-drained, loose soil, free from rocks or clumps. Sow carrot seeds in early spring or late summer, about 1/4 inch deep and 2 inches apart in rows. Ensure they receive full sun and keep the soil consistently moist. Thinning seedlings is essential to prevent overcrowding, and mulching helps maintain moisture and keeps the soil cool. Carrots require regular weeding to prevent competition from other plants. Harvest when the roots reach the desired size, typically 70-80 days after planting. Enjoy fresh, flavorful carrots in salads, soups, and as snacks.'),
(5, 'Banana', '../images/suggesstions/banana.jpg', 'Bananas are creamy, potassium-rich fruits with a natural sweetness, making them a nutritious and convenient snack choice.', 'Bananas are tropical delights with lush foliage and tasty fruit. To plant them, select a sunny, frost-free location with well-drained soil. Choose healthy banana suckers or young plants from a nursery and plant them in holes deep enough to accommodate their root ball. Maintain consistently warm temperatures (around 78-86°F or 25-30°C) and ensure regular watering to keep the soil moist. Provide mulch to conserve moisture and suppress weeds. Fertilize banana plants with a balanced, slow-release fertilizer. Protect them from strong winds and provide support for heavy fruit bunches. Prune dead leaves and manage pests and diseases for a thriving banana plantation. Enjoy the tropical bounty when the fruit matures.'),
(6, 'Papaya', '../images/suggesstions/papaya.jpg', 'Papaya is a tropical fruit with vibrant orange flesh, known for its sweet, exotic flavor and digestive benefits.', 'Papayas are tropical wonders known for their sweet, vibrant fruit. To plant them, select a sunny, frost-free location with well-drained soil. Papaya seeds can be sown directly in the ground or started indoors in pots. Plant seeds 1/2 inch deep, and maintain warm soil temperatures (around 75-85°F or 24-29°C) for germination. Keep the soil consistently moist but not waterlogged. Papaya plants require ample space and should be planted at least 6-8 feet apart. Provide support for young plants and protect them from strong winds. Prune regularly, fertilize with balanced nutrients, and manage pests and diseases for a bountiful papaya harvest, typically within 6-9 months. Enjoy the delicious and nutritious tropical fruit.'),
(7, 'Pineapple', '../images/suggesstions/pineapple.jpg', 'Pineapple is a tropical fruit, featuring a sweet, tangy taste and vibrant yellow flesh, perfect for refreshing treats.', 'Pineapples, the epitome of tropical sweetness, can be grown in warmer climates. To plant them, obtain a healthy pineapple crown from a mature fruit, and let it dry for a few days. Then, plant it in well-drained, sandy soil, or in a large pot if you live in a colder area. Pineapples thrive in full sun and require warm temperatures, ideally around 70-85°F (21-29°C). Keep the soil consistently moist but not waterlogged. Fertilize with a balanced fertilizer and protect young plants from harsh winds. Pineapples take time to grow, usually taking 18-24 months to bear fruit. Harvest when the fruit reaches a golden hue and enjoy the unique, tangy-sweet flavor of homegrown pineapples.'),
(8, 'Mango', '../images/suggesstions/mango.jpg', 'Mangoes are luscious tropical fruits, celebrated for their juicy, aromatic flesh and rich, exotic flavor.', 'Mangoes, revered for their luscious, tropical flavor, thrive in warm climates. To plant them, select a sunny, frost-free location with well-drained soil. Obtain a healthy mango seed or a grafted sapling from a nursery. Plant the seed about an inch deep or transplant the sapling, keeping it well-irrigated during the establishment phase. Mango trees require full sun and warm temperatures, ideally between 70-100°F (21-38°C). Regular watering is crucial, especially during dry spells, and they benefit from a balanced fertilizer regimen. Prune for shape and size control and protect against pests and diseases. Mango trees typically bear fruit within 3-6 years and offer a delicious bounty of succulent mangoes when mature.'),
(9, 'Guava', '../images/suggesstions/guava.jpg', 'Guava is a tropical fruit, prized for its fragrant, pink flesh, and delightful sweet-tart taste, packed with nutrients.', 'Guavas, known for their sweet-tangy flavor and rich nutritional content, are a delight to grow. To plant them, select a sunny location with well-drained soil. Guava seeds or seedlings can be planted directly in the ground or in pots. Plant them in holes with good spacing and provide consistent watering, especially during dry periods. Guavas flourish in warm, tropical or subtropical conditions with temperatures around 77-95°F (25-35°C). Fertilize with balanced nutrients to support growth and fruiting. Prune for shape and size control, and protect against pests and diseases. Guavas typically produce fruit within 2-4 years and offer a bounty of delicious, nutrient-rich fruits for your enjoyment.'),
(10, 'Passion Fruit', '../images/suggesstions/passion.jpg', 'Passion fruit is an exotic, round fruit with aromatic seeds, celebrated for its unique flavor and health benefits.', 'Passionfruit, known for its unique, aromatic fruit and vibrant vines, is a captivating addition to any garden. To plant them, choose a sunny, well-drained location and provide support for the vigorous vines. Plant seeds or seedlings in rich, loamy soil. Passionfruit thrives in warm climates with temperatures between 68-86°F (20-30°C) and appreciates consistent moisture, especially during the growing season. Fertilize regularly with a balanced nutrient mix. Prune to control the vine\'s growth and promote air circulation. Protect against pests and diseases. Passionfruit vines typically bear fruit within 12-18 months, rewarding you with exotic, aromatic fruits that are perfect for fresh consumption or culinary use.'),
(11, 'Jackfruit', '../images/suggesstions/jackfruit.jpg', 'Jackfruit is a massive tropical fruit with fibrous, sweet flesh, popular as a meat substitute in vegan cuisine.', 'Jackfruit, a tropical marvel, produces enormous fruits with a sweet and unique flavor. To plant them, select a sunny, frost-free location with well-drained soil. Obtain jackfruit seeds from ripe fruits and plant them in holes about 1 inch deep. Jackfruit thrives in warm, tropical climates with temperatures around 77-95°F (25-35°C). Keep the soil consistently moist, especially during the growing season. Fertilize with a balanced nutrient mix to support growth. Prune for shape and to maintain manageable size. Jackfruit trees can take several years to bear fruit, but once mature, they yield a bounty of massive, nutritious fruits that are perfect for a variety of culinary uses.'),
(12, 'Avocado', '../images/suggesstions/avacado.png', 'Avocado, a creamy green fruit, is prized for its rich, buttery texture and healthy monounsaturated fats. Deliciously nutritious!', 'Avocado, a creamy and nutritious fruit, is a delight to grow. To plant them, select a warm, frost-free location with well-drained soil. Start with an avocado pit, sprout, or grafted seedling. Plant it in well-draining soil, ensuring proper spacing, and keep it well-irrigated, especially during the establishment phase. Avocado trees thrive in a subtropical or tropical climate with temperatures around 60-85°F (15-30°C). Fertilize with a balanced nutrient mix to encourage healthy growth. Pruning can help shape the tree and encourage fruiting. Protect against pests and diseases. Avocado trees may take several years to bear fruit, but the reward is worth the wait—delicious, buttery avocados for your culinary delights.'),
(13, 'Pomegranate', '../images/suggesstions/pomegranate.jpg', 'Pomegranate, with jewel-like seeds, offers a sweet-tart taste and antioxidant richness, making it a nutritious, delightful fruit.', 'Pomegranate, known for its vibrant, jewel-like seeds and health benefits, is a captivating addition to any garden. To plant them, choose a sunny, well-drained location and provide proper spacing. Plant pomegranate saplings or cuttings in loamy, fertile soil. Pomegranates thrive in warm, arid climates with temperatures around 40-90°F (4-32°C). They tolerate drought but benefit from regular watering, especially in the early stages. Fertilize with a balanced nutrient mix and prune to shape the tree and encourage fruit production. Protect against pests and diseases. Pomegranate trees typically produce fruit within 2-3 years, offering a bounty of nutrient-rich, delicious seeds for fresh consumption or culinary use.'),
(14, 'Dragon Fruit', '../images/suggesstions/dragon.jpg', 'Dragon fruit, visually striking with pink or yellow skin and white flesh, is sweet, tropical, and exotic.', 'Dragonfruit, a visually striking and exotic fruit, is a tropical treasure. To plant them, select a sunny, well-drained location with support for the climbing vines. Begin with a dragonfruit cutting or seedling, planting it in well-drained, sandy soil or a container with good drainage. Dragonfruit thrives in warm, tropical conditions with temperatures between 65-85°F (18-29°C) and requires regular watering, particularly during the growing season. Fertilize with a balanced nutrient mix and provide trellises or support for the vines to climb. Protect against pests and diseases. Dragonfruit plants typically start bearing fruit within 6-12 months, offering visually stunning, sweet, and nutritious fruits for your enjoyment.'),
(15, 'Rambutan', '../images/suggesstions/rambutan.jpg', 'Rambutan is a hairy, tropical fruit with sweet, juicy flesh, known for its unique appearance and delightful taste.', 'Rambutan, a delectable tropical fruit, is a delight to cultivate. To plant them, choose a warm, humid location with well-drained, fertile soil. Begin with fresh rambutan seeds or seedlings, planting them in well-draining soil at the right spacing. Rambutan trees thrive in tropical climates with temperatures between 70-95°F (21-35°C) and require consistent moisture, especially during dry spells. Fertilize with a balanced nutrient mix to support growth and fruit production. Prune for shape and to manage size. Protect against pests and diseases. Rambutan trees usually start bearing fruit within 3-4 years, offering clusters of sweet, hairy fruits that are perfect for snacking and desserts.'),
(16, 'Orange', '../images/suggesstions/orange.jpg', 'Oranges are vibrant citrus fruits, bursting with vitamin C and a zesty, sweet-tart flavor. A refreshing, healthy choice.', 'Oranges, beloved for their juicy sweetness and high vitamin C content, are a delight to grow. To plant them, select a sunny, frost-free location with well-drained soil. Start with orange trees or saplings from a reputable nursery. Plant them at the appropriate spacing and provide consistent watering, especially during dry spells. Oranges thrive in subtropical or tropical climates, with temperatures between 55-100°F (13-38°C). Fertilize with a balanced nutrient mix, and prune to shape the tree and encourage fruiting. Protect against pests and diseases. Orange trees can start bearing fruit within a few years, delivering a bounty of refreshing, nutritious oranges for fresh consumption and various culinary uses.'),
(17, 'Lime', '../images/suggesstions/lime.jpg', 'Limes are small, tangy citrus fruits, perfect for adding zesty flavor to dishes, drinks, and desserts.', 'Limes, known for their zesty, tangy flavor, are a delightful addition to any garden. To plant them, choose a sunny, frost-free location with well-drained soil. Start with lime trees or saplings from a nursery. Plant them at the appropriate spacing, and ensure they receive regular watering, especially during dry spells. Limes thrive in subtropical or tropical climates, with temperatures between 70-100°F (21-38°C). Fertilize with a balanced nutrient mix and prune for shape and to encourage fruiting. Protect against pests and diseases. Lime trees can produce fruit within a few years, offering a generous supply of zesty, versatile limes for culinary delights and refreshing beverages.'),
(18, 'Tamarind', '../images/suggesstions/tamarind.jpeg', 'Tamarind, a tangy tropical fruit, boasts a unique sweet-sour taste and is a key ingredient in many cuisines.', 'Tamarind, a unique and tangy fruit, is a fascinating addition to gardens. To plant them, choose a sunny, well-drained location with ample space. Start with tamarind seeds or seedlings, planting them in well-drained soil. Tamarind thrives in tropical and subtropical climates with temperatures between 77-95°F (25-35°C) and needs regular watering, particularly during the dry season. Fertilize with a balanced nutrient mix and provide support for the spreading branches. Pruning helps manage size and shape. Protect against pests and diseases. Tamarind trees can start bearing fruit within 3-5 years, yielding pods filled with a uniquely sweet and sour pulp used in a variety of culinary dishes and beverages.'),
(19, 'Watermelon', '../images/suggesstions/watermelon.jpg', 'Watermelon is a juicy, hydrating fruit with vibrant pink flesh, perfect for quenching thirst on hot days.', 'Watermelons, synonymous with summer refreshment, are a joy to grow. To plant them, select a sunny, well-drained location with nutrient-rich soil. Sow watermelon seeds or transplant seedlings in hills or mounds, allowing adequate spacing. Watermelons thrive in warm temperatures, ideally between 70-90°F (21-32°C), and require consistent watering, especially as the fruits develop. Mulch helps conserve moisture and suppress weeds. Fertilize with a balanced nutrient mix and provide trellises or supports for vining varieties. Protect against pests and diseases, and monitor for signs of ripeness—usually a dull skin and a hollow sound when tapped. Harvest for sweet, juicy, and cooling slices of summer goodness.'),
(20, 'Tomato', '../images/suggesstions/tomato.jpeg', 'Tomatoes are versatile red fruits, essential in various dishes, offering a blend of sweetness and acidity.', 'Tomatoes, versatile and flavorful, are a staple in home gardens. To plant them, choose a sunny location with well-drained, fertile soil. Start with tomato seeds or young seedlings, placing them in rows or containers, ensuring proper spacing. Tomatoes thrive in warm temperatures, around 70-85°F (21-29°C), and need consistent watering to maintain evenly moist soil. Mulch helps retain moisture and deter weeds. Fertilize with a balanced nutrient mix and stake or cage taller varieties for support. Regular pruning encourages airflow and reduces disease risk. Protect against common tomato pests and diseases. Harvest when ripe for an array of culinary delights, from salads to sauces.'),
(21, 'Cabbage', '../images/suggesstions/cabbage.jpg', 'Cabbage is a leafy, cruciferous vegetable, offering a mild, crisp texture and a versatile addition to meals.', 'Cabbage, a nutritious and versatile vegetable, is easy to grow in home gardens. To plant them, select a sunny location with well-drained, fertile soil. Plant cabbage seeds or young seedlings, ensuring proper spacing and rows. Cabbage thrives in cooler temperatures, ideally around 60-70°F (15-21°C). Keep the soil consistently moist, and mulch helps to retain moisture and control weeds. Fertilize with a balanced nutrient mix. Protect against common cabbage pests like cabbage worms and aphids. Regularly monitor for maturing heads, and harvest when they are firm and fully formed. Cabbage offers a variety of culinary possibilities, from coleslaw to stir-fries, and is a valuable addition to any kitchen garden.'),
(22, 'Cucumber', '../images/suggesstions/cucumber.jpg', 'Cucumbers are refreshing, crisp vegetables, low in calories, and perfect for salads, snacks, and hydration.', 'Cucumbers, refreshing and versatile, are a garden favorite. To plant them, choose a sunny location with well-drained, fertile soil. Plant cucumber seeds or seedlings in mounds or rows, ensuring proper spacing. Cucumbers thrive in warm temperatures, around 70-85°F (21-29°C), and require consistent watering to maintain even soil moisture. Mulch helps retain moisture and control weeds. Fertilize with a balanced nutrient mix. Trellises or supports are useful for vining varieties, and regular pruning encourages airflow. Protect against cucumber pests and diseases. Harvest cucumbers when they\'re young and tender for crisp salads or pickles. Cucumbers add a fresh, hydrating element to your garden and culinary creations.'),
(23, 'Lettuce', '../images/suggesstions/lettuce.jpg', 'Lettuce is a leafy, green vegetable, commonly used in salads, providing a fresh, crisp, and nutritious base.', 'Lettuce, a staple in salads and sandwiches, is a straightforward and rewarding crop to grow. To plant it, choose a location with partial shade in hot climates or full sun in cooler regions, with well-drained, fertile soil. Sow lettuce seeds directly in rows or containers, ensuring proper spacing. Lettuce prefers cooler temperatures, ideally around 50-70°F (10-21°C), and needs consistent moisture. Mulch helps keep soil cool and retain moisture. Fertilize with a balanced nutrient mix. Protect against common pests like aphids and slugs. Harvest lettuce leaves as they mature for fresh, crisp greens. Lettuce offers an abundance of textures and flavors, making it a delightful addition to any garden.'),
(24, 'Radish', '../images/suggesstions/radish.jpg', 'Radishes are vibrant, crunchy root vegetables, adding a peppery kick to salads and enhancing culinary diversity.', 'Radishes, known for their zesty, crunchy roots, are one of the quickest and easiest vegetables to grow. To plant them, choose a sunny location with well-drained soil. Sow radish seeds directly in rows or containers, ensuring proper spacing. Radishes prefer cool temperatures, typically between 50-70°F (10-21°C), and grow rapidly. Regular moisture keeps the roots from becoming woody, and consistent watering is essential. Fertilize with a balanced nutrient mix. Protect against common pests like flea beetles and aphids. Harvest radishes as soon as they reach the desired size for a peppery addition to salads, pickles, and garnishes. Radishes are a beginner\'s delight in the world of gardening.'),
(25, 'Eggplant', '../images/suggesstions/eggplant.jpg', 'Eggplant, a deep purple, glossy vegetable, offers a meaty texture and absorbs flavors, perfect for diverse dishes.', 'Eggplants, with their rich, meaty texture and versatile culinary uses, thrive in warm climates. To plant them, choose a sunny location with well-drained, fertile soil. Start with eggplant seedlings or young plants, spacing them adequately in rows or containers. Eggplants prefer warm temperatures, around 70-85°F (21-29°C), and need regular watering to maintain even moisture in the soil. Mulching helps retain moisture and control weeds. Fertilize with a balanced nutrient mix. Protect against common eggplant pests like aphids and flea beetles. Stake or support larger varieties, and prune for optimal airflow. Harvest eggplants when they reach their glossy, mature size for delectable dishes like baba ghanoush and eggplant Parmesan.'),
(26, 'Spinach', '../images/suggesstions/spinach.jpg', NULL, NULL),
(27, 'Beetroot', '../images/suggesstions/beetroot.jpg', NULL, NULL),
(28, 'Peas', '../images/suggesstions/peas.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plantharvesttime`
--

CREATE TABLE `plantharvesttime` (
  `PlantID` int(11) NOT NULL,
  `harvestTimeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantharvesttime`
--

INSERT INTO `plantharvesttime` (`PlantID`, `harvestTimeId`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 1),
(5, 3),
(6, 2),
(7, 3),
(8, 2),
(9, 2),
(10, 1),
(11, 3),
(12, 2),
(13, 1),
(14, 1),
(15, 1),
(16, 3),
(17, 2),
(18, 3),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plantlocation`
--

CREATE TABLE `plantlocation` (
  `PlantID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantlocation`
--

INSERT INTO `plantlocation` (`PlantID`, `locationID`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 2),
(2, 8),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 15),
(4, 2),
(4, 3),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(8, 2),
(8, 2),
(8, 3),
(8, 3),
(8, 4),
(8, 4),
(8, 5),
(8, 5),
(8, 6),
(8, 6),
(8, 7),
(8, 7),
(8, 8),
(8, 8),
(8, 9),
(8, 9),
(8, 10),
(8, 10),
(8, 11),
(8, 11),
(8, 15),
(10, 2),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(10, 13),
(10, 14),
(10, 16),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 8),
(11, 9),
(11, 10),
(11, 11),
(11, 12),
(11, 13),
(11, 14),
(11, 15),
(11, 16),
(12, 2),
(12, 3),
(12, 4),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(12, 13),
(12, 16),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(13, 14),
(13, 15),
(13, 16),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(15, 12),
(15, 13),
(15, 14),
(15, 15),
(15, 16),
(16, 2),
(16, 3),
(16, 6),
(16, 8),
(16, 9),
(16, 10),
(16, 11),
(16, 12),
(16, 13),
(16, 16),
(17, 2),
(17, 8),
(17, 9),
(17, 10),
(17, 11),
(17, 12),
(17, 13),
(17, 14),
(17, 15),
(17, 16),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(18, 10),
(18, 11),
(18, 12),
(18, 13),
(18, 14),
(18, 15),
(18, 16),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(20, 10),
(20, 11),
(20, 12),
(20, 13),
(20, 14),
(20, 15),
(21, 10),
(21, 11),
(21, 12),
(21, 13),
(21, 14),
(21, 15),
(21, 16),
(22, 4),
(22, 5),
(22, 6),
(22, 7),
(23, 10),
(23, 11),
(23, 12),
(23, 13),
(23, 14),
(23, 15),
(23, 16),
(24, 10),
(24, 11),
(24, 12),
(24, 13),
(24, 14),
(24, 15),
(24, 16),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 9),
(25, 10),
(25, 11),
(25, 12),
(25, 13),
(25, 14),
(25, 15);

-- --------------------------------------------------------

--
-- Table structure for table `plantsoil`
--

CREATE TABLE `plantsoil` (
  `PlantID` int(11) NOT NULL,
  `soilTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantsoil`
--

INSERT INTO `plantsoil` (`PlantID`, `soilTypeID`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(8, 1),
(8, 2),
(9, 2),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `plantspace`
--

CREATE TABLE `plantspace` (
  `PlantID` int(11) NOT NULL,
  `spaceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantspace`
--

INSERT INTO `plantspace` (`PlantID`, `spaceID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 3),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 2),
(8, 3),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 2),
(11, 3),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 3),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plantsunexpo`
--

CREATE TABLE `plantsunexpo` (
  `PlantID` int(11) NOT NULL,
  `sunExpoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantsunexpo`
--

INSERT INTO `plantsunexpo` (`PlantID`, `sunExpoID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(8, 3),
(9, 3),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(19, 1),
(20, 1),
(21, 2),
(22, 1),
(23, 2),
(24, 2),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plantwater`
--

CREATE TABLE `plantwater` (
  `PlantID` int(11) NOT NULL,
  `waterLevelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantwater`
--

INSERT INTO `plantwater` (`PlantID`, `waterLevelID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 2),
(19, 3),
(20, 1),
(21, 1),
(22, 3),
(23, 1),
(24, 1),
(25, 1),
(25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `askDate` date NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `user_id`, `askDate`, `question`) VALUES
(5, 22, '2023-10-08', 'Could you please provide guidance on the ideal timing and technique for pruning tea bushes to ensure optimal growth and yield?'),
(7, 2, '2023-10-08', 'What are the key factors for successful carrot cultivation?'),
(8, 15, '2023-10-17', 'Hello, I&#039;m a mango farmer, and I&#039;m looking for guidance on how to properly prepare the soil for planting mango trees. Could you please provide me with some advice or direct me to a reliable source of information? I want to ensure that the soil conditions are optimal for the health and growth of my mango trees.?'),
(9, 34, '2023-10-20', 'I&#039;m new to banana cultivation in Galle. Could you please provide me with advice on the best banana varieties suited for this region, the ideal soil conditions and fertilization requirements, effective pest and disease management strategies, as well as any specific climate-related tips to ensure a successful banana crop?'),
(10, 36, '2023-10-24', 'I\'m interested in cultivating oranges in Rathnapura. Could you please provide advice on the most suitable orange varieties for our climate, the ideal soil preparation and fertilization methods, strategies for pest and disease control, and any particular considerations regarding pruning and harvesting to ensure a successful orange orchard?'),
(11, 37, '2023-10-30', 'I&#039;m considering starting a grapevine cultivation project in Jaffna. Could you please provide guidance on the most suitable grape varieties for our climate, the best practices for soil preparation and fertilization, effective methods for pest and disease control, and advice on pruning and harvesting to ensure a thriving grapevine vineyard?');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewID`, `user_id`, `rate`, `description`) VALUES
(4, 22, 5, 'I stumbled upon this plant-selling website, and it&#039;s like stumbling into a lush, botanical paradise right in the heart of the internet. As an avid plant enthusiast, I&#039;ve explored numerous online plant shops, but this one has truly captured my heart and green thumb.'),
(5, 2, 4, 'In the ever-expanding world of e-commerce, I stumbled upon a hidden gem - a delightful online floral emporium that has rekindled my love for all things botanical. This website has surpassed my expectations and ignited a newfound passion for flowers.'),
(6, 15, 5, 'If you&#039;re on a quest to transform your living space into a lush, green paradise, look no further than this remarkable plant-selling website. From the moment I landed on their homepage, I was captivated by the beauty and sheer diversity of their offerings.'),
(7, 18, 3, 'I recently explored this plant-selling website, and my experience, while generally positive, left room for improvement.'),
(8, 34, 5, 'I recently stumbled upon a plant-selling website that left me in awe. From the moment I landed on the homepage, I knew I had found a horticultural gem that deserved a resounding five-star review.'),
(9, 36, 4, 'I recently had the pleasure of exploring a plant-selling website that has taken my plant-loving experience to new heights. I am delighted to award this website a perfect four-star rating'),
(10, 37, 5, 'I recently had the pleasure of discovering a plant-selling website that has completely captivated my heart and soul. It&#039;s an absolute honor to bestow a perfect five-star rating on this verdant sanctuary'),
(11, 38, 5, 'If you&#039;re looking to delve into the art of grape cultivation or simply enhance your existing vineyard, you&#039;ve arrived at the perfect destination. This comprehensive guide to grape cultivation deserves nothing less than a five-star rating for its outstanding wealth of knowledge and support in achieving bountiful grape harvests.');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ItemId` int(20) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemQuantity` int(11) DEFAULT NULL,
  `ItemPrice` decimal(50,0) NOT NULL,
  `ItemImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ItemId`, `ItemName`, `ItemQuantity`, `ItemPrice`, `ItemImage`) VALUES
(1, 'Tomato', 5, 80, '../images/Selling1/veg1.jpeg'),
(2, 'Impatiens', 7, 160, '../images/Selling1/flower12.jpeg'),
(3, 'Grapes', 18, 200, '../images/Selling1/grapes.jpeg'),
(4, 'Cabbage', 35, 100, '../images/Selling1/cab12.jpeg'),
(5, 'Rose', 4, 175, '../images/Selling1/flower45.jpeg'),
(6, 'pomegranate', 8, 120, '../images/Selling1/prom.jpeg'),
(7, 'Red Chillie', 19, 50, '../images/Selling1/redp2.jpeg'),
(8, 'Lilly', 4, 200, '../images/Selling1/lily3.jpeg'),
(9, 'Mango', 4, 150, '../images/Selling1/mango.jpeg'),
(10, 'Verbena', 70, 100, '../images/Selling1/purple1.jpeg'),
(11, 'Baby Rose', 22, 200, '../images/Selling1/rose.jpeg'),
(12, 'Sunflower', 16, 295, '../images/Selling1/wh2.jpeg'),
(13, 'Brinjole', 76, 75, '../images/Selling1/brin1.jpeg'),
(15, 'Corn', 2, 150, '../images/Selling1/corn.jpeg'),
(16, 'Banana', 6, 400, '../images/Selling1/2ce3976a24da11b5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `soiltype`
--

CREATE TABLE `soiltype` (
  `soilTypeID` int(11) NOT NULL,
  `soilTypeName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soiltype`
--

INSERT INTO `soiltype` (`soilTypeID`, `soilTypeName`) VALUES
(1, 'Reddish Brown Earths'),
(2, 'Red Yellow Podzolic');

-- --------------------------------------------------------

--
-- Table structure for table `space`
--

CREATE TABLE `space` (
  `spaceID` int(11) NOT NULL,
  `spaceName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `space`
--

INSERT INTO `space` (`spaceID`, `spaceName`) VALUES
(1, 'Limited'),
(2, 'Average'),
(3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `sunexposure`
--

CREATE TABLE `sunexposure` (
  `sunExpoID` int(11) NOT NULL,
  `sunExpoName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sunexposure`
--

INSERT INTO `sunexposure` (`sunExpoID`, `sunExpoName`) VALUES
(1, 'High'),
(2, 'Medium'),
(3, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_FirstName` varchar(30) NOT NULL,
  `user_LastName` varchar(30) NOT NULL,
  `user_Email` varchar(60) NOT NULL,
  `user_PhoneNo` varchar(15) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_Password` varchar(150) NOT NULL,
  `user_District` varchar(15) NOT NULL,
  `user_Gender` varchar(10) NOT NULL,
  `profile_picture` text DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `expdate` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_FirstName`, `user_LastName`, `user_Email`, `user_PhoneNo`, `user_address`, `user_Password`, `user_District`, `user_Gender`, `profile_picture`, `token`, `expdate`) VALUES
(2, 'Malki', 'Madhubhashini', 'malki@gmail.com', '0771314545', '58/1, waragoda, attanagalla.', '$2y$10$f4mGEjsEPgjVKdg3Qf.KjuNMPnc8nVNYkuEaJMHlCcXjhRwRjGni.', 'Mullaitivu', 'Female', '../images/profile_pictures/2.jpg', NULL, NULL),
(15, 'senura', 'adithya', 'senura@gmail.com', '0883678234', 'No.29 Galle', '$2y$10$f4mGEjsEPgjVKdg3Qf.KjuNMPnc8nVNYkuEaJMHlCcXjhRwRjGni.', 'Galle', 'Male', '../images/profile_pictures/pp,840x830-pad,1000x1000,f8f8f8.u2.jpg', NULL, NULL),
(16, 'sasan', 'dilantha', 'sasan@gmail.com', '0752245147', 'maravila, halawatha', '$2y$10$f4mGEjsEPgjVKdg3Qf.KjuNMPnc8nVNYkuEaJMHlCcXjhRwRjGni.', 'Puttalam', 'Male', '../images/profile_pictures/Default.png', NULL, NULL),
(18, 'Chamara', 'Weerasinghe', 'chamara@gmail.com', '0752245147', 'maravila, halawatha', '$2y$10$f4mGEjsEPgjVKdg3Qf.KjuNMPnc8nVNYkuEaJMHlCcXjhRwRjGni.', 'Puttalam', 'Male', '../images/profile_pictures/18.jpg', NULL, NULL),
(22, 'Migara', 'Thiyunuwan', 'migarathiyunuwan@gmail.com', '0771416968', '58/1, waragoda, attanagalla.', '$2y$10$M.eylxWD0b4AKyfD3DxoEOxXIN4I2WNUFv4JsmGvMKXHXrZLCXYQW', 'Gampaha', 'Male', '../images/profile_pictures/22.jpg', NULL, NULL),
(34, 'Damith', 'Asanka', 'damith@gmail.com', '3434636', '58/1, waragoda, attanagalla.', '$2y$10$f4mGEjsEPgjVKdg3Qf.KjuNMPnc8nVNYkuEaJMHlCcXjhRwRjGni.', 'Monaragala', 'Female', '../images/profile_pictures/34.png', NULL, NULL),
(36, 'Shashika', 'Nisansala', 'shashika@gmail.com', '0752245147', '58/1, waragoda, attanagalla.', '$2y$10$f4mGEjsEPgjVKdg3Qf.KjuNMPnc8nVNYkuEaJMHlCcXjhRwRjGni.', 'Matale', 'Male', '../images/profile_pictures/36.jpg', NULL, NULL),
(37, 'Princess', 'Shiranthi', 'shiranthi@gmail.com', '0771314567', '58/1, waragoda, attanagalla.', '$2y$10$f4mGEjsEPgjVKdg3Qf.KjuNMPnc8nVNYkuEaJMHlCcXjhRwRjGni.', 'Jaffna', 'Male', '../images/profile_pictures/37.jpg', NULL, NULL),
(38, 'Mahinda', 'Rajapaksha', 'mahinda@gmail.com', '0752245147', 'Medamulana, Weeraketiya', '$2y$10$f4mGEjsEPgjVKdg3Qf.KjuNMPnc8nVNYkuEaJMHlCcXjhRwRjGni.', 'Kandy', 'Female', '../images/profile_pictures/38.jpeg', NULL, NULL),
(39, 'gegee', 'ghehe4h', 'dxtht@gmail.com', '0883678234', '58/1, waragoda, attanagalla.', '$2y$10$oj/2oV3T9I9molqwNasJI.JPqL2FMz0xzyLBEUn36DOUBocHtm2hC', 'Kilinochchi', 'Female', '../images/profile_pictures/Default.png', NULL, NULL),
(40, 'sfdghgh', 'dsfrhh', 'sgwsr@gmail.com', '0771536245', '58/1, waragoda, attanagalla.', '$2y$10$StFxehQ24lo/Ks1ARZr9G.P9DSbVdpAgwF2UxKEoLBCR3snnfvrei', 'Gampaha', 'Female', '../images/profile_pictures/Default.png', NULL, NULL),
(41, 'rghweh', 'wehte', 'het@gmail.com', '0771314567', '58/1, waragoda, attanagalla.', '$2y$10$OPc4r7ilUOCEMv2gfzwHaumi1vwRlXofHeOnQ4GoNom/LzhrTlaZu', 'Gampaha', 'Male', '../images/profile_pictures/Default.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waterlevel`
--

CREATE TABLE `waterlevel` (
  `waterLevelID` int(11) NOT NULL,
  `waterLevelName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waterlevel`
--

INSERT INTO `waterlevel` (`waterLevelID`, `waterLevelName`) VALUES
(1, 'Easy to Find'),
(2, 'Medium'),
(3, 'Rare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `questionID` (`questionID`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `harvesttime`
--
ALTER TABLE `harvesttime`
  ADD PRIMARY KEY (`harvestTimeId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`orderItemID`),
  ADD KEY `orderID` (`orderID`,`ItemId`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`PlantID`);

--
-- Indexes for table `plantharvesttime`
--
ALTER TABLE `plantharvesttime`
  ADD KEY `PlantID` (`PlantID`),
  ADD KEY `harvestTimeId` (`harvestTimeId`);

--
-- Indexes for table `plantlocation`
--
ALTER TABLE `plantlocation`
  ADD KEY `PlantID` (`PlantID`,`locationID`),
  ADD KEY `locationID` (`locationID`);

--
-- Indexes for table `plantsoil`
--
ALTER TABLE `plantsoil`
  ADD KEY `PlantID` (`PlantID`),
  ADD KEY `soilTypeID` (`soilTypeID`);

--
-- Indexes for table `plantspace`
--
ALTER TABLE `plantspace`
  ADD KEY `PlantID` (`PlantID`,`spaceID`),
  ADD KEY `spaceID` (`spaceID`);

--
-- Indexes for table `plantsunexpo`
--
ALTER TABLE `plantsunexpo`
  ADD KEY `PlantID` (`PlantID`),
  ADD KEY `sunExpoID` (`sunExpoID`);

--
-- Indexes for table `plantwater`
--
ALTER TABLE `plantwater`
  ADD KEY `PlantID` (`PlantID`),
  ADD KEY `waterLevelID` (`waterLevelID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ItemId`);

--
-- Indexes for table `soiltype`
--
ALTER TABLE `soiltype`
  ADD PRIMARY KEY (`soilTypeID`);

--
-- Indexes for table `space`
--
ALTER TABLE `space`
  ADD PRIMARY KEY (`spaceID`);

--
-- Indexes for table `sunexposure`
--
ALTER TABLE `sunexposure`
  ADD PRIMARY KEY (`sunExpoID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `waterlevel`
--
ALTER TABLE `waterlevel`
  ADD PRIMARY KEY (`waterLevelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `harvesttime`
--
ALTER TABLE `harvesttime`
  MODIFY `harvestTimeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `managerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `orderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ItemId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `soiltype`
--
ALTER TABLE `soiltype`
  MODIFY `soilTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `space`
--
ALTER TABLE `space`
  MODIFY `spaceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sunexposure`
--
ALTER TABLE `sunexposure`
  MODIFY `sunExpoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `waterlevel`
--
ALTER TABLE `waterlevel`
  MODIFY `waterLevelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ItemId`) REFERENCES `shop` (`ItemId`) ON DELETE CASCADE;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `shop` (`ItemId`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `plantharvesttime`
--
ALTER TABLE `plantharvesttime`
  ADD CONSTRAINT `plantharvesttime_ibfk_1` FOREIGN KEY (`PlantID`) REFERENCES `plant` (`PlantID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `plantharvesttime_ibfk_2` FOREIGN KEY (`harvestTimeId`) REFERENCES `harvesttime` (`harvestTimeId`) ON DELETE CASCADE;

--
-- Constraints for table `plantlocation`
--
ALTER TABLE `plantlocation`
  ADD CONSTRAINT `plantlocation_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`) ON DELETE CASCADE,
  ADD CONSTRAINT `plantlocation_ibfk_2` FOREIGN KEY (`PlantID`) REFERENCES `plant` (`PlantID`) ON DELETE CASCADE;

--
-- Constraints for table `plantsoil`
--
ALTER TABLE `plantsoil`
  ADD CONSTRAINT `plantsoil_ibfk_1` FOREIGN KEY (`PlantID`) REFERENCES `plant` (`PlantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantsoil_ibfk_2` FOREIGN KEY (`soilTypeID`) REFERENCES `soiltype` (`soilTypeID`) ON DELETE CASCADE;

--
-- Constraints for table `plantspace`
--
ALTER TABLE `plantspace`
  ADD CONSTRAINT `plantspace_ibfk_1` FOREIGN KEY (`PlantID`) REFERENCES `plant` (`PlantID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `plantspace_ibfk_2` FOREIGN KEY (`spaceID`) REFERENCES `space` (`spaceID`) ON DELETE CASCADE;

--
-- Constraints for table `plantsunexpo`
--
ALTER TABLE `plantsunexpo`
  ADD CONSTRAINT `plantsunexpo_ibfk_1` FOREIGN KEY (`PlantID`) REFERENCES `plant` (`PlantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantsunexpo_ibfk_2` FOREIGN KEY (`sunExpoID`) REFERENCES `sunexposure` (`sunExpoID`) ON DELETE CASCADE;

--
-- Constraints for table `plantwater`
--
ALTER TABLE `plantwater`
  ADD CONSTRAINT `plantwater_ibfk_1` FOREIGN KEY (`PlantID`) REFERENCES `plant` (`PlantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plantwater_ibfk_2` FOREIGN KEY (`waterLevelID`) REFERENCES `waterlevel` (`waterLevelID`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
